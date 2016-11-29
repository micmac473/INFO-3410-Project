<?php
session_start();

include_path='C:\xampp\php\PEAR';

require_once __DIR__ . '/vendor/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '552065338336275', // Replace {app-id} with your app id
  'app_secret' => 'fed80c20693c796130702fc8f4be751f',
  'default_graph_version' => 'v2.5',
  ]);

$redirect ='hompage.php';

$helper = $fb->getRedirectLoginHelper();

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

if (! isset($accessToken)) {

$permissions = ['email']; // Optional permissions
$loginUrl = $helper->getLoginUrl($redirect, $permissions);

echo '<a href="' . htmlspecialchars($loginUrl) . '">Log in with Facebook!</a>';

}

