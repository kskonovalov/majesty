<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 11.4.16
 * Time: 23.42
 */
require_once __DIR__.'/../vendor/autoload.php';
require_once __DIR__.'/../helpers/functions.php';
require_once __DIR__.'/../config/config.php';

$app = new Silex\Application();

// ... definitions
$app['debug'] = true;

$app->get('/', function () {


    $ip = getUserIP();
    //$ip = "178.127.26.170"; //to test

    if(!$ip) {
        return "Can't get your ip, sorry =(";
    }

    $jsonData = [
        "common" => [
            "version" => "1.0",
            "api_key" => APIKEY
        ],
        "ip" => $ip
    ];

    $client = new GuzzleHttp\Client();

    $response = $client->request('POST', 'http://api.lbs.yandex.net/geolocation', [
        'content-type' => 'application/json',
        'form_params'    => [
            'json' => json_encode($jsonData)
        ]
    ]);

    if($response->getStatusCode() == 200) {
        $results = json_decode($response->getBody());

        $result["lat"] = $results->position->latitude;
        $result["lon"] = $results->position->longitude;

        return json_encode($result);
    }
    else return "Nothing found";
});


$app->run();