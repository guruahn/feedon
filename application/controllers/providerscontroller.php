<?php

class ProvidersController extends Controller {

    public $id;
    public $name;
    public $url;

    /*
     * viewall
     * @param
     * @return array
     */
    function viewall() {
        $this->set('title','My Providers List App');
        $this->set('providers', $this->Provider->getList() );
    }

    /*
     * view
     * @param
     * @return array
     */
    function view($id = null,$column = '*', $name = null) {
        $this->set('title',$name.'Provider List - My Feed App');
        $this->set('provider', $this->Provider->getProvider( $column, array("id"=>$id)) );

    }

    /*
     * list of provider
     * @param
     * @return array
     */
    function feeds($provider_id, $thispage = null) {
        global $is_API;
        $result = array(
            'result'=>0,
            'message'=>'failed get feed',
            'feed_list'=>''
        );

        if(is_null($thispage)) $thispage = 1;
        $limit = array( ($thispage-1)*10, 10 );
        $feed = new Feed();
        $list = $feed->getList( array('pubDate'=>'desc'), $limit, array("providerId"=>$provider_id) );
        $this->set('title','My feed List App');

        if(count($list) > 0 ){
            $result['result'] = 1;
            $result['message'] = 'total '.count($list).' feeds';
            $result['feed_list'] = $list;
        }
        if($is_API){
            echo json_encode($result);
        }else{
            $this->set('feeds', $list );
        }
    }

    /*
     * insert
     * @param
     * @return array
     *
     */
    function insert(){
        global $is_API;
        $result = array(
            'result'=>0,
            'message'=>'failed insert',
            'id'=>''
        );
        //feed name or url check
        if( !isset($_POST['feed_name']) || !isset($_POST['feed_url']) ){
            $result['message'] = "Undefined feed name or feed url";
            json_encode($result);
            exit;
        }
        $data = array(
            'url'=>$_POST['feed_url'],
            'link'=>$_POST['feed_link'],
            'description'=>$_POST['feed_desc'],
            'name'=>$_POST['feed_name'],
            'type'=>$_POST['feed_type']
        );
        if( $this->Provider->getProvider( "id", array('url'=>$data['url']) ) ){
            $result['message'] = "already exist";
        }else{
            $id = $this->Provider->insert('feed_provider', $data);
            if($id){ //success
                $result['result'] = 1;
                $result['message'] = "success insert";
                $result['id'] = $id;
            }
        }

        if($is_API){
            echo json_encode($result);
        }else{
            $this->set( 'result', $result );
        }
    }


}