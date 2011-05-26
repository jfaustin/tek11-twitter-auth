<?php
error_reporting(E_ALL);

session_start();

set_include_path('library' . PATH_SEPARATOR . get_include_path());

if (isset($_SESSION['auth'])) {
    echo "already logged in";
    die();
}

require_once 'Zend/Oauth/Consumer.php';
$consumer = new Zend_Oauth_Consumer(require_once 'config.php');

$token = $consumer->getRequestToken();

$_SESSION['requestToken'] = serialize($token);
        
$consumer->redirect(); 