<div id="photo">  
<?php  
// The photo's title once again  
echo"<h2>$photo[title]</h2>";  
  
// The photo itself, you'll recognise $photoUrl from above where we  built the photo's url, we are also accessing the $size array that we  prepared earlier to get the width and height  
// and the title once again   
// We'll also make it link to the version on Flickr for good measure  
echo"<a href=\"http://flickr.com/photos/$username/$photo[id]/\" title=\"View $photo[title] on Flickr \">";  
echo"<img src=\"$photoUrl\" width=\"$size[width]\" height=\"$size[height]\" alt=\"$photo[title]\" />";  
echo"</a>";  
  
// The photo's description  
echo"<p>$photo[description]</p>";  
?>  
</div><!-- end photo --> 