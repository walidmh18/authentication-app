<?php
session_start();
include_once('https://walidmh.rf.gd/authentication-app/fb-fallback.php');
$fb = new Facebook\Facebook(array(
	'app_id' => '769369371603007', // Replace with your app id
	'app_secret' => 'a8ca90d994154ef0ed8cbbc07e711834',  // Replace with your app secret
	'default_graph_version' => 'v17.0',
));

$helper = $fb->getRedirectLoginHelper();
?>