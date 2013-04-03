<?php

	//please register at http://developer.myspace.com for a CONSUMERK_KEY
	define('CONSUMER_KEY', '7a352ef93c254dfbac6d90f8de1a02e6');

	//please register at http://developer.myspace.com for a CONSUMER_SECRET
	define('CONSUMER_SECRET', 'c337862228864f1ebd33ab056c7b1eb3e042423d247247e68ccc0fafd36ee55d');

	/**
     * This is where the example will store its OpenID information.
     * You should change this path if you want the example store to be
     * created elsewhere.  After you're done playing with the example
     * script, you'll have to remove this directory manually.
     */
	define('TEMP_STORE_PATH', "tmp/_php_consumer_test");

	/**
	 * map the following CONST to a proper file for your opperatin system/ enviroment
	 *
	 * "source/Auth/OpenID/CryptUtil.php"
	 *
	 * define('Auth_OpenID_RAND_SOURCE', 'C:\_net_capture\001.pcap');
	 */
?>