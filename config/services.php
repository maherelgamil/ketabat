<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => '',
		'secret' => '',
	],

	'mandrill' => [
		'secret' => '',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'User',
		'secret' => '',
	],

	'google' => [
	    'client_id' => '395699211823-j3c706d4j4e332td3k7o1anrg5p6iif5.apps.googleusercontent.com',
	    'client_secret' => 'kAYuJU-ir2Eg94yfIpMU6om2',
	    'redirect' => 'http://localhost/Sites/laravel/public/auth/google',
	],
];
