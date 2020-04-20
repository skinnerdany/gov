<?php

// server
ini_set('display_errors', true);
error_reporting(E_ALL);
ini_set("soap.wsdl_cache_enabled", "0");

class test
{
    public function wsdlSend($r1, $r2)
    {
        $res = array_merge((array) $r1, (array) $r2);
        return (object) $res;
    }

    public function wsdlTest($r)
    {
        $r = new stdClass();
        $r->status = 'YYES';
        return $r;
        /*
        $resp = new stdClass();
        $resp->status = true;
        return $resp;
         *
         */
    }
}

$server = new SoapServer("http://wsdl/wsdl.php");
$server->setClass('test');
$server->handle();


// client
$client = new SoapClient('http://wsdl/wsdl.php');
$res = $client->wsdlTest();
echo '<pre>';print_r($res);