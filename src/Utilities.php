<?php

namespace Paydunya;

use Requests;

class Utilities
{
    // prevent instantiation of this class
    private function __construct() {}

    public static function httpJsonRequest($url, $data = array())
    {
        $headers = array(
            'Accept'                => 'application/json',
            'PAYDUNYA-PUBLIC-KEY'   => Setup::getPublicKey(),
            'PAYDUNYA-PRIVATE-KEY'  => Setup::getPrivateKey(),
            'PAYDUNYA-MASTER-KEY'   => Setup::getMasterKey(),
            'PAYDUNYA-TOKEN'        => Setup::getToken(),
            'PAYDUNYA-MODE'         => Setup::getMode(),
            'User-Agent'            => Paydunya::VERSION_NAME
        );

        $json_payload = json_encode($data);

        $request = Requests::post($url, $headers, $json_payload, array('timeout' => 10));

        return json_decode($request->body, true);
    }

    public static function httpPostRequest($url, $data = array())
    {
        $headers = array(
            'Accept'                => 'application/x-www-form-urlencoded',
            'PAYDUNYA-PUBLIC-KEY'   => Setup::getPublicKey(),
            'PAYDUNYA-PRIVATE-KEY'  => Setup::getPrivateKey(),
            'PAYDUNYA-MASTER-KEY'   => Setup::getMasterKey(),
            'PAYDUNYA-TOKEN'        => Setup::getToken(),
            'PAYDUNYA-MODE'         => Setup::getMode(),
            'User-Agent'            => Paydunya::VERSION_NAME
        );

        $request = Requests::post($url, $headers, $data, array('timeout' => 10));

        return json_decode($request->body, true);
    }

    public static function httpGetRequest($url)
    {
        $headers = array(
            'PAYDUNYA-PUBLIC-KEY'   => Setup::getPublicKey(),
            'PAYDUNYA-PRIVATE-KEY'  => Setup::getPrivateKey(),
            'PAYDUNYA-MASTER-KEY'   => Setup::getMasterKey(),
            'PAYDUNYA-TOKEN'        => Setup::getToken(),
            'PAYDUNYA-MODE'         => Setup::getMode(),
            'User-Agent'            => Paydunya::VERSION_NAME
        );

        $request = Requests::get($url, $headers, array('timeout' => 10));

        return json_decode($request->body, true);
    }
}
