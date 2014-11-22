<?php

/**
 * Tweets a message from the user whose user token and secret you use.
 *
 * Although this example uses your user token/secret, you can use
 * the user token/secret of any user who has authorised your application.
 *
 * Instructions:
 * 1) If you don't have one already, create a Twitter application on
 *      https://dev.twitter.com/apps
 * 2) From the application details page copy the consumer key and consumer
 *      secret into the place in this code marked with (YOUR_CONSUMER_KEY
 *      and YOUR_CONSUMER_SECRET)
 * 3) From the application details page copy the access token and access token
 *      secret into the place in this code marked with (A_USER_TOKEN
 *      and A_USER_SECRET)
 * 4) Visit this page using your web browser.
 *
 * @author themattharris
 */

function tweeter($id,$kategori){
     
     $status=0;
     switch ($kategori) {
          case 1://fokus
                  $sql_find="select judul_id,waktu from fokus where id='$id' limit 1 ";
                    $result=  mysql_query($sql_find)or die(mysql_error());
                    while ($row = mysql_fetch_object($result)) {
                         $tmp=$row->waktu;
                         $judul=$row->judul_id;
                         $tmp2=  explode(" ", $tmp);
                         $waktu=  str_replace("-", "/", $tmp2[0]);
                         $url="http://presidenri.go.id/index.php/fokus/$waktu/$id.html";
                         $status=1;
                    }     
               break;
        case 2://topik
                  $sql_find="select judul_id,waktu from topik where id='$id' limit 1 ";
//             echo $sql_find;
                    $result=  mysql_query($sql_find)or die(mysql_error());
                    while ($row = mysql_fetch_object($result)) {
                         $tmp=$row->waktu;
                         $judul=$row->judul_id;
                         $tmp2=  explode(" ", $tmp);
                         $waktu=  str_replace("-", "/", $tmp2[0]);
                         $url="http://presidenri.go.id/index.php/topik/$waktu/$id.html";
                         $status=1;
                    }     
               break;
          default:
               break;
     }
     if($status==1){
     $teks="$judul $url";
  //echo $teks;   
          require_once('TwitterAPIExchange.php');
		  $settings = array(
	      'oauth_access_token' => "1358901308-mQyJ1lE9iIJmKIVAObFRa1bXnfWN1dM8aQb33XY",
	      'oauth_access_token_secret' => "ygnZMePWyEyWHvW9PAjM1x4tvEBgFuAnMt69VqiIwsU",
	      'consumer_key' => "5aorYKOl1JzFc3VpocXsNQ",
	      'consumer_secret' => "Orky9VaNbd1bvBz0kSADXNfGXY7Sd1fqeIgrutrDbs"
	  );

	  /** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
	  $url = 'https://api.twitter.com/1.1/statuses/update.json';
	  $requestMethod = 'POST';

	  $postfields = array(
	      'status' => "$teks"
	  );
	  /** POST fields required by the URL above. See relevant docs as above **/
	  /*$postfields = array(
	      'screen_name' => 'usernameToBlock', 
	      'skip_status' => '1'
	  );
	  */
	  /** Perform a POST request and echo the response **/
	  $twitter = new TwitterAPIExchange($settings);
	 /* $response= $twitter->buildOauth($url, $requestMethod)
                      ->setPostfields($postfields)
                      ->performRequest();*/
  	echo "run $teks<br/>";
	var_dump(json_decode($response));
/*	echo $twitter->buildOauth($url, $requestMethod)
		      ->setPostfields($postfields)
		      ->performRequest();*/

     }
}
?>
