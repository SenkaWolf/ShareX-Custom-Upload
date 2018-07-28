<?php

/* Image Serever Index LogIn*/
/* Use the below details to ;ogin to view uploaded images. This is usually at http://www.domain.com/i/login.php */
	global $USERNAME;
	$USERNAME = 'Login';

	global $PASSWORD;
	$PASSWORD = 'Password';

return array(
	/* This is a secure key that only you should know, an added layer of security for the image upload */
    'secure_key' => 'somerandomlongstringoftextforkey',

    /* This is the url your output will be, usually http://www.domain.com/i/uploads/. OR setup a subdomain called 'i' to point at the direct to the left and then use http://i.domain.com/ */
    'output_url' => 'http://www.domain.com/i/uploads/',

    /* This is a redirect url if the script is accessed directly */
    'redirect_url' => 'http://domain.com/',

    /* This is a list of IPs that can access the gallery page (Leave empty for universal access) */
    'allowed_ips' => array(),

    /* Page title of the gallery page */
    'page_title' => 'Image Server',

    /* Heading text at the top of the gallery page */
    'heading_text' => 'Image Server',
);
?>