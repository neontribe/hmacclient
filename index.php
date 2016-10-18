<?php

use tabs\api\client\ApiClient;

require __DIR__ . '/vendor/autoload.php';

// create object
$smarty = new Smarty;

//Set variables to be assigned to the template and used by the program. 
$apiurl = (isset($_REQUEST['apiurl'])) ? $_REQUEST['apiurl'] : 'http://zz.api.carltonsoftware.co.uk/';
$apikey = (isset($_REQUEST['apikey'])) ? $_REQUEST['apikey'] : 'mouse';
$apisecret = (isset($_REQUEST['apisecret'])) ? $_REQUEST['apisecret'] : 'cottage';
$route = (isset($_REQUEST['route'])) ? $_REQUEST['route'] : 'property';
$parameters = (isset($_REQUEST['parameters'])) ? $_REQUEST['parameters'] : '';
$req_method = (isset($_REQUEST['req_method'])) ? $_REQUEST['req_method'] : 0;

$dump_json = (isset($_REQUEST['dump_json'])) ? $_REQUEST['dump_json'] : false;

if (isset($_REQUEST['apiurl'])) {
    require_once dirname(__FILE__) . '/tabs-api-client/tabs/autoload.php';

    $apiclient = ApiClient::factory($apiurl, $apikey, $apisecret);
    $lines = explode("\n", $parameters);

    $params = array();

    foreach ($lines as $line) {
        list($key, $val) = explode('=', $line);
        $key = trim($key);
        $val = trim($val);
        if (!empty($val) || $val == "0") {
            $params[$key] = is_numeric($val) ? (int)$val : $val;
        }
    };

    $postThis = json_encode($params);

    switch($req_method) {
    	case 0:
    		//GET
    		$data = $apiclient->get($route, $params);
    		break;
    	case 1:
    		//POST
	    	$data = $apiclient->post($route, array(
	            'data' => $postThis
	        ));
    		break;
    	case 2:
    		//OPTIONS
    		$data = $apiclient->options($route, $params);
    		break;
    }

 	if (isset($data)) {
      	$json_result = json_encode($data, JSON_PRETTY_PRINT);
  	}
}

if(!isset($json_result)) {
	$json_result = "{}";
}

//SET SMARTY TEMPLATE VALUES
$smarty->assign('apiurl', $apiurl);
$smarty->assign('apikey', $apikey);
$smarty->assign('apisecret', $apisecret);
$smarty->assign('route', $route);
$smarty->assign('parameters', $parameters);

$smarty->assign('json_result', $json_result);

//REQUEST TYPE DROPDOWN
$smarty->assign('req_method', $req_method); //DEFAULT TO GET

$request_types = array(
	0 => "GET",
	1 => "POST",
	2 => "OPTIONS",
);

$smarty->assign('request_types', $request_types);

// display it
if($dump_json) {
	header('Content-Type: application/json');
	$smarty->display('templates/dump.tpl');
} else {
	$smarty->display('templates/index.tpl');
}


