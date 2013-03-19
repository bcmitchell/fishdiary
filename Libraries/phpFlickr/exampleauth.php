<?php
/**
* phpFlickr API Class - Detailed Public Example
*
* Works with phpFlickr 3.1
*
* This example shows how to make unauthorized/public API requests.
* Make SURE the privacy settings allow for the user to be found for the
* `people_findByUsername()` method, otherwise this won't work.
* See http://www.flickr.com/account/prefs/optout/?from=privacy and make sure those aren't checked.
*
* Secondly, be sure you add your API key to the config.php file or else this is vanity.
*
* This example script is hosted at https://gist.github.com/1306604
* phpFlickr can be downloaded from http://phpflickr.com
*/
 
require 'config.php';
require 'phpFlickr.php';
 
// Istantiate the phpFlickr class with our API details in config.php
// The third parameter is set to `true`, which will die on error and output error information.
// In a production website, this should be set to `false` and the error retrieved from the
// getErrorMsg() & getErrorCode() methods in the phpFlickr class when false is returned.
$flickr = new phpFlickr(FLICKR_API_KEY, FLICKR_API_SECRET, true);
 
// Specify a flickr user to retrieve results for.
// (I've used a random user for example, no association)
$flickr_user = 'gcbp';
 
// Get the user's details by their username.
// You can also lookup a user by the people_findByEmail() method.
// Check this for a `false` value on error, Example:
// if( $user === false )
// die('User not found. Check privacy settings/username. Error:'. $flickr->getErrorMsg());
$user = $flickr->people_findByUsername($flickr_user);
 
// Get the user's base photo URL needed for linking retrieved images.
$base_url = $flickr->urls_getUserPhotos($user['id']);
 
// Get the user's 100 most-recent public photos (number determined by the 4th parameter).
// Here's the method and it's parameters for reference:
// people_getPublicPhotos ($user_id, $safe_search = NULL, $extras = NULL, $per_page = NULL, $page = NULL)
$photos = $flickr->people_getPublicPhotos($user['id'], NULL, NULL, 100);
 
// At this point, we should have some photo results if nothing failed!
// Uncomment the following two lines to dump the results, which should be an array:
// echo '<pre>'. print_r($photos, true) .'</pre>'; // If nothing is shown, change to var_dump().
// exit();
 
// Now let's format the results! ?>
<!DOCTYPE html>
<head>
<meta charset="utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<title>Flickr API - Public Test</title>
<meta name="description" content="An example page showing a detailed example of how to
use the phpFlickr class for public requests in a project." />
<meta name="author" content="Amereservant" />
<meta name="viewport" content="width=device-width,initial-scale=1" />
 
<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.0.6/modernizr.min.js"></script>
<!--
<script src="js/libs/respond.min.js"></script>
-->
<style>
/* HTML5 Defaults Reset
*----------------------------------------------------------------------------------*/
html, body, body div, span, object, iframe, h1, h2, h3, h4, h5, h6, p, blockquote, pre, abbr, address, cite, code, del, dfn, em, img, ins, kbd, q, samp, small, strong, sub, sup, var, b, i, dl, dt, dd, ol, ul, li, fieldset, form, label, legend, table, caption, tbody, tfoot, thead, tr, th, td, article, aside, figure, footer, header, hgroup, menu, nav, section, time, mark, audio, video { margin:0; padding:0; border:0; outline:0; font-size:100%; vertical-align:baseline; background:transparent; }	
 
article, aside, figure, footer, header, hgroup, nav, section { display:block }
img, object, embed { max-width: 100%; }
 
/* force a vertical scrollbar to prevent a jumpy page */
html { overflow-y:scroll; }
 
/* we use a lot of ULs that aren't bulleted.
don't forget to restore the bullets within content. */
ul { list-style:none }
 
blockquote, q { quotes:none }
blockquote:before, blockquote:after, q:before, q:after { content:''; content:none }
a { margin:0; padding:0; font-size:100%; vertical-align:baseline; background:transparent }
del { text-decoration:line-through }
abbr[title], dfn[title] { border-bottom:1px dotted #000; cursor:help }
/* tables still need cellspacing="0" in the markup */
table { border-collapse:collapse; border-spacing:0 }
th { font-weight:bold; vertical-align:bottom }
td { font-weight:normal; vertical-align:top }
hr { display:block; height:1px; border:0; border-top:1px solid #ccc; margin:1em 0; padding:0 }
input, select { vertical-align:middle }
pre {
white-space: pre; /* CSS2 */
white-space: pre-wrap; /* CSS 2.1 */
white-space: pre-line; /* CSS 3 (and 2.1 as well, actually) */
word-wrap: break-word; /* IE */
}
 
input[type="radio"] { vertical-align:text-bottom }
input[type="checkbox"] { vertical-align:bottom; *vertical-align:baseline }
.ie6 input { vertical-align:text-bottom }
select, input, textarea { font:99% sans-serif }
table { font-size:inherit; font:100% }
/* Accessible focus treatment
people.opera.com/patrickl/experiments/keyboard/test */
a:hover, a:active { outline:none }
 
small { font-size:85% }
strong, th { font-weight:bold }
td, td img { vertical-align:top }
 
/* Make sure sup and sub don't screw with your line-heights
gist.github.com/413930 */
sub, sup { font-size:75%; line-height:0; position:relative }
sup { top:-0.5em }
sub { bottom:-0.25em }
 
/* standardize any monospaced elements */
pre, code, kbd, samp { font-family:monospace, sans-serif }
 
/* hand cursor on clickable elements */
.clickable, label, input[type=button], input[type=submit], button { cursor:pointer }
 
/* Webkit browsers add a 2px margin outside the chrome of form elements */
button, input, select, textarea { margin:0 }
 
/* make buttons play nice in IE */
button { width:auto; overflow:visible }
/* scale images in IE7 more attractively */
.ie7 img { -ms-interpolation-mode:bicubic }
 
/* prevent BG image flicker upon hover */
.ie6 html { filter:expression(document.execCommand("BackgroundImageCache", false, true)); }
 
/* let's clear some floats */
.clearfix:before, .clearfix:after { content:"\0020"; display:block; height:0; overflow:hidden }
.clearfix:after { clear:both }
.clearfix { zoom:1 }
 
 
/* Custom Styling Begins Here!
*----------------------------------------------------------------------------------*/
#header-container { background:#000; border-bottom:4px solid #555; color:#FFF; padding:10px; width:100% }
#title { font-size:2em }
#main { padding:10px 0; margin:0 auto; width:960px }
.photobox { border:1px solid #EEE; float:left; margin:5px 5px 0; padding:5px }
article header h2 { padding:10px 0 }
article footer { background:#EEE; border:1px dotted #999; color:#444; font-size:0.8em; margin:10px 0; padding:10px }
article footer h3 { font-size:1.2em; padding:10px 0 }
article footer ul { padding:20px }
#footer-container { background:#888; border-top:3px solid #CCC; color:#ECECEC; font-size:0.8em; font-style:italic; padding:20px; text-align:center; width:100% }
#footer-container a { color:#FFF }
</style>
</head>
<body>
<div id="header-container">
<header class="wrapper">
<h1 id="title">Flickr API - Public Test</h1>
</header>
</div>
<div id="main" class="wrapper">
<article>
<header>
<h2>User <?php echo $user['username']; ?>'s public photos:</h2>
</header>
<section class="clearfix">
<?php
foreach( $photos['photos']['photo'] as $photo ): ?>
<div class="photobox">
<a href="<?php echo $base_url . $photo['id']; ?>" title="<?php echo $photo['title']; ?>" target="_blank"><img alt="<?php echo $photo['title']; ?>" src="<?php echo $flickr->buildPhotoURL($photo, 'square'); ?>" /></a>
</div>
<?php endforeach; ?>
</section>
<footer>
<h3>About the author</h3>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sodales urna non odio egestas tempor. Nunc vel vehicula ante. Etiam bibendum iaculis libero, eget molestie nisl pharetra in. In semper consequat est, eu porta velit mollis nec. Curabitur posuere enim eget turpis feugiat tempor.</p>
<ul>
<li><strong>ID:</strong> <?php echo $user['id']; ?></li>
<li><strong>NSID:</strong> <?php echo $user['nsid']; ?></li>
<li><strong>USERNAME:</strong> <?php echo $user['username']; ?></li>
</ul>
</footer>
</article>
</div><!-- #main -->
<div id="footer-container">
<footer class="wrapper">
<p><a href="http://phpflickr.com/" title="phpFlickr">phpFlickr</a> example by <a href="http://amereservant.com/2011/10/22/phpflickr-detailed-usage-example-how-to/" title="Amereservant - phpFlickr Example">Amereservant</a> hosted at <a href="https://gist.github.com/1306604" title="phpFlickr Example hosted at GitHub">github:gist</a></p>
</footer>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<!--[if lt IE 7 ]>
<script src="https://ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->
</body>
</html>