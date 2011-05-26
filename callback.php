<?php
session_start();

set_include_path('library' . PATH_SEPARATOR . get_include_path());

if (!isset($_GET['oauth_token'])) {
    die("oauth_token not set");
}

$response = array(
    'oauth_token'    => $_GET['oauth_token'],
    'oauth_verifier' => $_GET['oauth_verifier'],
);

require_once 'Zend/Oauth/Consumer.php';
$consumer = new Zend_Oauth_Consumer(require_once 'config.php');        

$requestToken = unserialize($_SESSION['requestToken']);


$accessToken = $consumer->getAccessToken($response, $requestToken);

unset($_SESSION['requestToken']);

parse_str($accessToken->getResponse()->getBody(), $params);

$params['oauth_token'] = '--==hidden==--';
$params['oauth_token_secret'] = '--==hidden==--';

$_SESSION['auth'] = $params;

header('Location: index.php');