<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 11.4.16
 * Time: 23.42
 */
require_once __DIR__.'/../vendor/autoload.php';

$app = new Silex\Application();

// ... definitions
$app['debug'] = true;

$app->get('/', function () {
    $output = 'Hello world';

    return $output;
});

$app->run();