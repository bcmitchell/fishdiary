<?php
require_once('inc/db.php');
include("flickr_key.php");
require_once("Libraries/phpFlickr/phpFlickr.php");

$api = new phpFlickr(API_KEY, API_SECRET);

#
# Get user's ID
#
$username = 'Raymond Yee';
if (isset($_GET['username']))
  $username = $_GET['username'];
$user_id = $api->people_findByUsername($username);
$user_id = $user_id['id'];

print $user_id;

?>