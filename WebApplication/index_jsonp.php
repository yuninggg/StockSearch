
<?php
// Get rid of space
	if($_SERVER["REQUEST_METHOD"] == "GET"){
		function reform_input($_data) {
			$data=trim($_data);
			return $data;
		}
	}

	if($_SERVER["REQUEST_METHOD"] == "GET"){
		if (isset($_GET['symbol']) && $_GET["status"] == "quote"){
			$url="http://dev.markitondemand.com/MODApis/Api/v2/Quote/json?symbol=" . urlencode($_GET["symbol"]);
			$content = file_get_contents($url);
			$json = json_decode($content, true);
			echo $_GET['callback'].'('.$json.')';
		} else if ($_GET["status"] == "autoComplete" && isset($_GET['input'])) {
			$url="http://dev.markitondemand.com/MODApis/Api/v2/Lookup/json?input=" . urlencode($_GET["input"]);
			$content = file_get_contents($url);
			$json = json_decode($content, true);
			
			echo $_GET['callback'].'('.$jsondata.')';
		} else if($_GET["status"] == "news" && isset($_GET['company'])) {
			$url = 'https://api.datamarket.azure.com/Bing/Search/v1/News?Query=%27'. urlencode($_GET['company']). '%27&$format=json' ;
			$accountKey = 'C4ktZGiHb+yqLpcPEPktenqfdlZFt1cAXcOGc4ms5lU';
			$context = stream_context_create(array(
                        'http' => array(
                            'request_fulluri' => true,
                            'header'  => 'Authorization: Basic ' . base64_encode($accountKey . ":" . $accountKey)
                        )
                    ));
			$data=file_get_contents($url,0,$context);
			echo $_GET['callback'].'('.$data.')';
			
	}
	

?>

