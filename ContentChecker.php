<?php
/**
 *
 *
 *
 *
 *
 **/

	namespace ctrlbox;
	include 'ContentCheckerRegex.php';


class ContentChecker {
	/**
	 * check
	 * main checker/
	 **/
	public static function checkUrl($data){
			$n_data = self::get($data);
		if($n_data==false) return self::error();
			$r_data = self::scan($n_data);
		if(self::$format=="json"){
			if(self::$onlyFound) $r_data = self::sort_b($r_data);
			   echo json_encode($r_data);
		}elseif(self::$format=="text"){
			if(self::$onlyFound) $r_data = self::sort_b($r_data);
				foreach($r_data as $k => $v ){
					echo $k .", ". $v['total']."<br>";
				}
		}else{
		   echo $r_data;
		}
	}
	/**
	 * check
	 * main checker/
	 **/
	public static function checkData($data){
			$r_data = self::scan($data);
		if(self::$format=="json"){
			if(self::$onlyFound) $r_data = self::sort_b($r_data);
			   echo json_encode($r_data);
		}elseif(self::$format=="text"){
			if(self::$onlyFound) $r_data = self::sort_b($r_data);
				foreach($r_data as $k => $v ){
					echo $k .", ". $v['total']."<br>";
				}
		}else{
		   echo $r_data;
		}
	}
	/**
	 * private variables.
	 **/
	private static $format 				= "xml";

	private static $options 			= array();
		
	private static $results 			= "";
	
	private static $errorMsg 			= "";
	
	private static $errorCode 			= "";
	
	private static $onlyFound 			= false;
	/**
	 * scan
	 * scanner
	 **/
	private static function scan($data){
		$found = 0;
		$filters = ContentCheckerRegex::setup();
		foreach($filters as $name => $info){
			@preg_match_all($info['re'], $data, $raw);
			$info['raw']  = $raw[0];
			$found++;
			$info['total']  = count($info['raw']);
			$info['unique'] = array_unique($info['raw']);
			$filters[$name] = $info;
		}
		return $filters;
	}
	/**
	 * get
	 * curl based get
	 **/
	private static function get($url){
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (compatible; WCC/0.0.1; +http://ctrlbox.com)"); 	// custom user agents, make it crafty
		curl_setopt($ch, CURLOPT_URL, $url); 	// url that we are trawling
		curl_setopt($ch, CURLINFO_HEADER_OUT, true); 			// get header headers
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); 		// follow the location incase of 304/301 redirects
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 		// return the data as chunks
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 			// check ssl host and ignore
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 			// check ssl client and ignore
		$output = curl_exec($ch);
		$re 	= curl_getinfo($ch);
		if($re['http_code']=='404'){
			self::$errorMsg 	= "Not Found";
			self::$errorCode 	= $re['http_code'];
			curl_close($ch);
			return false;
		}
		curl_close($ch);
		return $output;
	}	
	/**
	 * sort_b
	 * sort when we display only found
	 **/
	public static function sort_b($data){
		foreach($data as $k => $v ){
			if((int)$v['total']==(int)0){
				unset($data[$k]);
			}
		}
		return $data;
	}	
	/**
	 * error
	 * error throwing,
	 **/
	public static function error(){
		header('HTTP/ 501 '.self::$errorMsg );
		echo 'Error: '.self::$errorMsg;
	}
	/**
	 * setFormat
	 * setup to display type
	 **/
	public static function setFormat($data){
		return self::$format = $data;
	}
	/**
	 * displayAll
	 * set up to display all or not
	 **/
	public static function displayAll($data = false){
		return self::$onlyFound = $data;
	}
}

?>