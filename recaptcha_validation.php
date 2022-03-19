<?php

///////////////// GOOGLE RECAPTCHA V3 (INVISIBLE) STARTS ///////////////// 
	$secretKey 	= 'SECRET_KEY_HERE';
	$page_url 	= 'SUCCESS_URL_HERE';
	$token 		= $_POST["g-token"];
	$ip		= $_SERVER['REMOTE_ADDR'];
	
	$url = "https://www.google.com/recaptcha/api/siteverify";
	$data = array('secret' => $secretKey, 'response' => $token, 'remoteip'=> $ip);
 
	// use key 'http' even if you send the request to https://...
	$options = array('http' => array(
		'method'  => 'POST',
		'content' => http_build_query($data)
	));
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	$response = json_decode($result);
	if($response->success)
	{
		//echo '<center><h1>Validation Success!</h1></center>';
    		//---YOUR ACTION CONTINUES HERE---//
	}
	else
	{
		//echo '<center><h1>Captcha Validation Failed..!</h1></center>';exit;
		echo '<script>window.location.href = $page_url;</script>';exit;
	}
///////////////// GOOGLE RECAPTCHA V3 (INVISIBLE) ENDS ///////////////// 
