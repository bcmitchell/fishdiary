<!DOCTYPE html>

<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
	<title>untitled</title>
</head>
<body>
	<h2>Welcome Back, <?php echo $this->session->userdata('username'); ?>!</h2>
     <p>This section represents the area that only logged in members can access.</p>
	<h4><?php echo anchor('login/logout', 'Logout'); ?></h4>
	
	 <?php
foreach( $photos['photos']['photo'] as $photo ): ?>
<div class="photobox">
<a href="<?php echo $base_url . $photo['id']; ?>" title="<?php echo $photo['title']; ?>" target="_blank"><img alt="<?php echo $photo['title']; ?>" src="<?php echo $flickr->buildPhotoURL($photo, 'square'); ?>" /></a>
</div>
<?php endforeach; ?>

</body>
</html>	