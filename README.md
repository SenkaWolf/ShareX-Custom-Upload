# ShareX-Custom-Upload
A little PHP script created for uploading custom sharex files to your own webserver

# Setup
First we start by uploading the contents of the 'public_html' directory to the root of our website

Next is the configuration file, found in /i/protected/config.php here there are a few key settings
```
/* Image Server Index LogIn*/
/* Use the below details to ;ogin to view uploaded images. This is usually at http://www.domain.com/i/login.php */
	global $USERNAME;
	$USERNAME = 'Login';

	global $PASSWORD;
	$PASSWORD = 'Password';

/* This is a secure key that only you should know, an added layer of security for the image upload */
  'secure_key' => 'somerandomlongstringoftextforkey',

This is the url your output will be, usually http://www.domain.com/i/uploads/. OR setup a subdomain called 'i' to point at the direct to the left and then use http://i.domain.com/ */
  'output_url' => 'http://www.domain.com/i/uploads/',

/* This is a redirect url if the script is accessed directly */
  'redirect_url' => 'http://domain.com/',

/* This is a list of IPs that can access the gallery page (Leave empty for universal access) */
  'allowed_ips' => ['192.168.0.0', '0.0.0.0'],

/* Page title of the gallery page */
  'page_title' => 'My Upload Site',

/* Heading text at the top of the gallery page */
  'heading_text' => 'Uploading Site',
  
/* Delete file option (true to enable, disabled by default) */
    'enable_delete' => false,
    
/* Show image in tooltip  (true to enable, disabled by default) */
    'enable_tooltip' => false,
```

# ShareX Configuration
Next we need to setup our ShareX to use the custom uploader. A screenshot of the setup can be seen below!
```
1. From the ShareX main application we go to Destinations > Destination Settings
2. Scroll down to 'custom uploaders' add a new profile
3. Request type POST, the url should be http://www.domain.com/upload.php
4. File form name: "d" (without quotation marks)
5. Arguments are:
    - key, this should be set to the 'secure key' you set in your config.php
    - name, this is how the files will be named, for mine, I use '%h.%mi.%s-%d.%mo.%yy'
6. The setup is now complete, test your uploader and it 'should' work!
```

# Preview of the gallery page
![Preview of Login](https://github.com/SenkaWolf/ShareX-Custom-Upload/blob/master/Screenshots/Login.png?raw=true)
![Preview of Image Server](https://github.com/SenkaWolf/ShareX-Custom-Upload/blob/master/Screenshots/Image%20Server.png?raw=true)
![Preview of ShareX Setup](https://github.com/SenkaWolf/ShareX-Custom-Upload/blob/master/Screenshots/ShareX.png?raw=true)
