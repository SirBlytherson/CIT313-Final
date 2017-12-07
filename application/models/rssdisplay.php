<?php
class RssDisplay extends Model {

	protected $feed_url;
	protected $num_feed_items;
	
	public function __construct($url){
		parent::__construct();
	
		$this->feed_url = $url;
		
	}
  
  public function getFeedItems($num_feed_items) {
    
    $items = simplexml_load_file($this->feed_url);
	
	$response = array("title" => $items->channel->title,"items"=>array());
	
	for($i = 0; $i < $num_feed_items; $i += 1) {
		if($items->channel->item[$i]) {
			array_push($response['items'], (object)array(
				"title" => $items->channel->item[$i]->title,
				"pubDate" => $items->channel->item[$i]->pubDate,
				"guid" => $items->channel->item[$i]->guid,
				"description" => $items->channel->item[$i]->description
			));
		}
	}
	
	return $response;
	return $items->channel->item;
	
	$this->num_feed_items = $num_feed_items;
	
	$return = array();
	
	for($i = 0; $i < $num_feed_items; $i += 1) {
		array_push($return, array(
			"title" => $items->channel->item[$i]->title,
			"description" => $items->channel->item[$i]->description,
			"link" => $items->channel->item[$i]->guid,
			"pubDate" =>$items->channel->item[$i]->pubDate
		));
	}
    
    return $items;
    
  }
  
}
