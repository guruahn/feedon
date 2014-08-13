<?php

class FeedsController extends Controller {

    public $id;
    public $providerId;
    public $title;
    public $url;
    public $description;
    public $regDate;
    public $pubDate;

    function view($id = null,$column = '*', $name = null) {

        if( is_array($id) && !is_null($id) )
        {
            $this->Feed->where("id",$id);
        }
        $this->set('title',$name.' - My Feed App');
        $this->set('feed', $this->Feed->getFeed($column) );

    }

    function viewall() {
        $this->set('title','My feed List App');
        $this->set('feeds', $this->Feed->getList() );
    }

    function setFeed($item){
        $this->id = $item['id'];
        $this->providerId = $item['providerId'];
        $this->title = $item['title'];
        $this->url = $item['url'];
        $this->description = $item['description'];
        $this->regDate = $item['regDate'];
        $this->pubDate = $item['pubDate'];
    }

    /*
	* Get feed
	* @param
	* @return array
	*/
    public function getFeed($column, $where = null)
    {
        if( is_array($where) && !is_null($where) )
        {
            foreach($where as $key => $value)
            {
                $this->Feed->where($key,$value);
            }
        }
        return	$stats = $this->Feed->getOne("feed", $column);
    }

    /*
	* Update a feed
	* @param
	* @return bools
	*/
    public function updateFeed($item, $provider)
    {
        $data = Array(
            "title" => trim(strval($item->title)),
            "url" => trim(strval($item->link)),
            "description" => trim(strval($item->description)),
            "providerId" => $provider['id'],
            "pubDate" => date("Y-m-d H:i:s",strtotime($item->pubDate))
        );
        return $this->Feed->update('feed', $data);
    }

    /*
     * Insert a feed
     * @param
     * @return bools
     */
    public function insertFeed($item, $provider)
    {
        $data = Array(
            "title" => trim(strval($item->title)),
            "url" => trim(strval($item->link)),
            "description" => trim(strval($item->description)),
            "providerId" => $provider['id'],
            "regDate" => date("Y-m-d H:i:s"),
            "pubDate" => date("Y-m-d H:i:s",strtotime($item->pubDate))
        );
        return $this->Feed->insert('feed', $data);
    }

    /*
     * update feeds
     * @param
     * @return array
     *
     */
    public function updateFeeds($provider_id){
        global $is_API;
        $update_count = 0;
        $provider_model = new Provider;
        $provider = $provider_model->getProvider( "*", array('id'=>$provider_id) );

        $result = array(
            'result'=>0,
            'message'=>'failed insert',
            'id'=>''
        );

        $received_rss_feeds = $this->readRssFeed( $provider['name'], urldecode($provider['url']) );
        $update_count = $this->parseRssFeedXml($received_rss_feeds, $provider);
        if($update_count > 0 ){
            $result['result'] = 1;
            $result['message'] = $update_count.'개 업데이트 완료';
        }
        if($is_API){
            echo json_encode($result);
        }else{
            $this->set( 'result', $result );
        }
        //
        //return
    }

    /*
     * update feeds all
     * @param
     * @return array
     *
     */
    public function updateFeedsAll(){
        global $is_API;
        $update_count = 0;
        $provider_model = new Provider;
        $providers = $provider_model->getList();

        $result = array(
            'result'=>0,
            'message'=>'failed insert',
            'id'=>''
        );

        foreach ( $providers as $provider ) :
            $received_rss_feeds = $this->readRssFeed( $provider['name'], urldecode($provider['url']) );
            $update_count = $this->parseRssFeedXml($received_rss_feeds, $provider);
        endforeach;

        if($update_count > 0 ){
            $result['result'] = 1;
            $result['message'] = $update_count.'개 업데이트 완료';
        }

        if($is_API){
            echo json_encode($result);
        }else{
            $this->set( 'result', $result );
        }
        //
        //return
    }

    /*
	* Read rss feed
	* @param
	* @return array
	*/
    public function readRssFeed($rss_provider_name, $rss_provider_url)
    {
        $received_rss_feeds = perform_curl_operation($rss_provider_url);
        if(!mb_detect_encoding($received_rss_feeds, "utf8")){
            $received_rss_feeds = utf8_encode($received_rss_feeds);
        }
        // Is it empty?
        if (empty($received_rss_feeds)) {
            // Return an empty array.
            $empty_array = array();
            return($empty_array);
        } // End of if (empty($received_rss_feeds))

        return $received_rss_feeds;
    }

    /*
	* Parse rss feed xml
	* @param
	* @return number
	*/
    public function parseRssFeedXml($received_rss_feeds, $provider)
    {
        $xml = simplexml_load_string($received_rss_feeds);

        // 유효한 xml 문서인지 검사
        if ((is_object($xml) == false) || (sizeof($xml) <= 0)) {
            // XML parsing error. Return now.
            return(false);
        }

        // <rss> 혹은 <rdf> 루트의 직속 자식으로 <item>이 있는 경우는 포맷1
        // <channel>요소의 자식으로서 <item> 요소가 있는 경우 포맷2
        $obj1 = $xml->item;
        if ((is_object($obj1) == false) || (sizeof($obj1) <= 0)) {
            // <item> 요소가 직속 자식이 아니므로 포맷1로 변경해줘야 한다.
            // <channel> 요소를 새로운 루트로 설정함으로서 가능하다.
            $xml = $xml->channel;
        }

        // 처리된 rss 아이템의 갯수 초기화
        $count_of_rss_items_retrieved = 0;

        // 처음 등록한 provider의 경우 피드를 insert하고
        // 기 등록된 경우 최신 피드만 insert하거나 update 한다.
        if( count($xml) > 0 )
        {
            //해당 provider의 최신날짜
            $where = Array(
                "providerId" => $provider['id']
            );
            $last_item = $this->getFeed("max(pubDate) as recentDate", $where);

            foreach($xml->item as $item)
            {
                if($last_item)
                {
                    //이미 등록되어있는 provider의 경우
                    if( $last_item['recentDate'] < date( "Y-m-d H:i:s",strtotime($item->pubDate) ) )
                    {
                        //insert or update
                        if( $this->getFeed("id", array( "url"=>trim( strval( $item->link ) ) ) ) )
                        {
                            $this->updateFeed($item, $provider);
                        }
                        else
                        {
                            $this->insertFeed($item, $provider);

                        } // end of if
                        $count_of_rss_items_retrieved++;
                    } // end of if
                }
                else
                {
                    //처음 등록한 provider의 경우
                    $this->insertFeed($item, $provider);
                    $count_of_rss_items_retrieved++;
                } // end of if

            } // end of foreach

        } // end of if

        return $count_of_rss_items_retrieved;

    } // end of function
}