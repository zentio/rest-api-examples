<?php

/* http://www.zent.io
/* @author antonio.moreno@zent.io */

$zentio_instance = 'example';
$api_key = "x4W4Fb6saceBoMuvK7l0grzVEyr1W6";
$url = "https://" . $zentio_instance . ".zent.io/api/v1/story/new?apikey=" . $api_key; 

$extendedModel = '{"Custom Field": "This is an example"}';

$fields = array('customer' => urlencode('john.doe@email.com'),
	           'user' => null,
	           'subject' => urlencode("My order is broken"),
	           'message' => urlencode("This is my message, you can answer to my e-mail account."),
	           'extendedModel' => $extendedModel);


//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);

//execute post
$result = curl_exec($ch);
//we should see our new story id here
var_dump($result);

//close connection
curl_close($ch);

?>
