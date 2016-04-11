<?php
/**
 * Created by PhpStorm.
 * User: konstantin
 * Date: 12.4.16
 * Time: 0.50
 */
// Function to get the client ip address
function getUserIP() {
    if (getenv('HTTP_CLIENT_IP'))
        $userIP = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $userIP = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $userIP = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $userIP = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $userIP = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $userIP = getenv('REMOTE_ADDR');
    else
        $userIP = false;

    return $userIP;
}