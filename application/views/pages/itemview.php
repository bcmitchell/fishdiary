<?php
	foreach ($rows as $num => $row){
    echo "<p>Item: ${row['item']}</p>
	<p>Item Type: ${row['itemtype']}</p>
	<p>Urgency: ${row['urgency']}</p>
	<p>".anchor('', 'Back')."</p>";
	}
	?>
