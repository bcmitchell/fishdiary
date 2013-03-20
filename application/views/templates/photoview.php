<?php
foreach( $photos['photos']['photo'] as $photo ): ?>
<div class="thumbnail">
<a href="<?php echo $base_url . $photo['id']; ?>" title="<?php echo $photo['title']; ?>" target="_blank"><img alt="<?php echo $photo['title']; ?>" src="<?php echo $flickr->buildPhotoURL($photo, 'square'); ?>" /></a>
</div>
<?php endforeach; ?>