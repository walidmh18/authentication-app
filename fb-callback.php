<?php
include_once('fb-config.php');
include('connection.php');
session_destroy();
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (!isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
  }
  exit;
}

if(!$accessToken->isLongLived()){
  // Exchanges a short-lived access token for a long-lived one
  try {
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
    exit;
  }
}

//$fb->setDefaultAccessToken($accessToken);

# These will fall back to the default access token
$res 	= 	$fb->get('/me',$accessToken->getValue()); 
$fbUser	=	$res->getDecodedBody();
$user = json_decode(file_get_contents("https://graph.facebook.com/".$fbUser['id']."?fields=id,name,email,picture&access_token=".$accessToken->getValue()));
$email = $user->email;

$sql = "SELECT * FROM users WHERE email = '$email'";

$result = mysqli_query($con , $sql);
$row = mysqli_fetch_array($result , MYSQLI_ASSOC);
$emailCount = mysqli_num_rows($result);

// $resImg		=	$fb->get('/me/picture?type=large&amp;amp;redirect=false',$accessToken->getValue());
$name = $fbUser['name'];
$picture = $user->picture->data->url;
$id = $fbUser['id'];
if ($emailCount == 0) {
  
  // $picture	=	$resImg->getGraphNode();
  $sql = "INSERT INTO users (name,picture,email,password,username) VALUES ('$name', '$picture', '$email', '','')";
  
  $res = mysqli_query($con,$sql);
  
}
$sql = "SELECT * FROM users WHERE email = '$email'";

$result = mysqli_query($con , $sql);
$row = mysqli_fetch_array($result , MYSQLI_ASSOC);



  session_start();
  $_SESSION['loginType']= 'fb';
  $_SESSION['id']		=	$row['id'];
  $_SESSION['name']		=	$fbUser['name'];
  $_SESSION['image'] = $user->picture->data->url;
  $_SESSION['email'] = $user->email;
  $_SESSION['fbAccessToken']	=	$accessToken->getValue();
  $_SESSION['bio'] = '';
  $_SESSION['phone'] = '';

  echo '<pre>';
  print_r($_SESSION);
  echo '</pre>';

  header('Location: ./set-info');


exit;
?>