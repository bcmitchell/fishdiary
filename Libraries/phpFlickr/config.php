<?php
/**
* Configuration File
*
* Enter your API Key and API Secret below.
* Be sure to include this file before istantiating the phpFlickr class!
*/
 
/**
* API Key
*
* This is required for ALL API calls.
* You can yours from http://www.flickr.com/services/api/key.gne
* You MUST replace the default one since it's not a valid key and won't work.
*
* @var string
*/
defined('FLICKR_API_KEY') || define('FLICKR_API_KEY', 'a48cc5f89643ecfaabff6e14efd1b6ed');
 
/**
* API Secret
*
* This is required for all private API calls.
* Any time you want to request private information, you must authenticate and the
* secret is a required part of making the authentication.
* It is NOT needed for public requests.
* This can also be found at http://www.flickr.com/services/api/key.gne
*
* You MUST replace the default value since it is not a valid key and will not work.
*
* @var string
*/
defined('FLICKR_API_SECRET') || define('FLICKR_API_SECRET', '0de01a07f03d6cf8');