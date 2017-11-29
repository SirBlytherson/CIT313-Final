<?php

class WeatherController extends Controller {

	public $result;

	public function index(){
		
		$this->set('result',false);
	}
		
	public function getResults() {

		$url = "http://www.myweather2.com/developer/forecast.ashx?uac=ASgXhCvg-Y&output=xml&query=";
		$url .= $_POST['zip']."&temp_unit=f";
		$xml = simplexml_load_file($url);
		
		$xml->zip = $_POST['zip'];
		
		$this->set('result',true);		
		$this->set('weather',$xml);
    
	}	
	
}
