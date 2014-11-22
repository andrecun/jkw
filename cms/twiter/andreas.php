<?php
ini_set('display_errors', 1);
error_reporting("E_ALL");
//require_once('TwitterAPIExchange.php');
require_once('TwitterBaru.php');
echo "masu2k";
/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "1168515372-PPJWqkwtjLrmUNS7qF9q49Z2BK2tRrztwktxZoB",
    'oauth_access_token_secret' => "si5cV1pQQn66c6zu7s66UDZ5WfJG3efxBiFgj73HY",
    'consumer_key' => "b8qWpmYSZByZb8NgJsmOYg",
    'consumer_secret' => "ke4fLUKWgd6UfbmEVzYWVyN5EoVnEv9reC3zuiFKXo"
);

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
$url = 'https://api.twitter.com/1.1/statuses/update.json';
$requestMethod = 'POST';

$postfields = array(
    'status' => 'masukk andreas'
);
/** POST fields required by the URL above. See relevant docs as above **/
/*$postfields = array(
    'screen_name' => 'usernameToBlock', 
    'skip_status' => '1'
);
*/
/** Perform a POST request and echo the response **/
$setting_perform=array(
	'CURLOPT_SSL_VERIFYPEER' => 'false');
$twitter = new TwitterAPIExchange($settings);
$response=$twitter->buildOauth($url, $requestMethod)
             ->setPostfields($postfields)
             ->performRequest();
var_dump(json_decode($response));

/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
/*$url = 'https://api.twitter.com/1.1/followers/ids.json';
$getfield = '?screen_name=J7mbo';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
echo $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();
*/
