<?php  
/**
 * Feed model
 *
 * @author  Tendency
 * @author  Tendency Dev Team
 * @package tdc_lib
 */

 class Feed
 {
	public $id;
	public $providerId;
	public $title;
	public $url;
	public $description;
	public $regDate;
	public $pubDate;

	public function __construct($db)
	{
		$this->db = $db;
	}
	
	public function __destruct()
	{
		
		
	}

	/*
	* Get list
	* @param
	* @return array
	*/
	public function getList($orderby = null)
	{
		if( is_array($orderby) && !is_null($orderby) ) 
		{
			foreach($orderby as $key => $value)
			{
				$this->db->orderBy($key,$value);
			}
		}
		echo "this is feeds class!!";
		$feeds = $this->db->get('feeds');
		return $feeds;
	}

	/*
	* Get list
	* @param
	* @return array
	*/
	public function getFeed($column, $where = null)
	{
		if( is_array($where) && !is_null($where) )
		{
			foreach($where as $key => $value)
			{
				$this->db->where($key,$value);
			}
		}
		return	$stats = $this->db->getOne("feeds", $column);
	}

	/*
	* Update feeds
	* @param
	* @return bools
	*/
	public function updateFeeds($provider)
	{
		//printr($provider['url']);
		$received_rss_feeds = $this->readRssFeed($provider['name'], $provider['url']);
		return $this->parseRssFeedXml($received_rss_feeds, $provider);
	}

	/*
	* Insert feed
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
		return $this->db->insert('feeds', $data);
	}

	/*
	* Update feed
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
		return $this->db->update('feeds', $data);
	}

	/*
	* Read rss feed
	* @param
	* @return array
	*/
	public function readRssFeed($rss_provider_name, $rss_provider_url)
	{
		$received_rss_feeds = perform_curl_operation($rss_provider_url);
		if(!mb_detect_encoding($str, "utf8")){
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
	
	/*
	* set item
	* @param item
	* @return
	*/
	public function setItem($item)
	{
		$this->id = $item['id'];
		$this->providerId = $item['providerId'];
		$this->title = $item['title'];
		$this->url = $item['url'];
		$this->description = $item['description'];
		$this->regDate = $item['regDate'];
		$this->pubDate = $item['pubDate'];
	}
	
 }// end of class

