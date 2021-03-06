<?php
    $resources = $this->config->item('resources');
?>




<article>

<h3 style="color: salmon">Fitness Tracking</h3>

			
<figure style="float: right">
<img src="<?php echo $resources;?>images/App2.jpg" style="height:300px;"/>
<figcaption>'App2' GUI</figcaption>
		</figure>

<p>I've developed a simple Android app (pictured right) which records latitude and longitude coordinates, as well as altitude and other basic information. The app integrates with this website to display exercise routes that I record using the app. From the app, collected data is formatted to JSON, then sent by HTTP post request to the website server and inserted into the website database. I'm utilising <a href="https://developers.google.com/maps/">Google Maps API's</a> to visually display the data coordinates as polylines on Google maps. I chose to implement my own code for the total distance calculation, rather than Google API's, and have worked in <a href="http://stackoverflow.com/questions/10053358/measuring-the-distance-between-two-coordinates-in-php">Haversine's Great Circle Distance</a> formula for this. Altitude recording has just recently been implemented (you'll see that the first few graphs have an altitude of zero), though this may require some further tweaking to achieve accuracy (if that's possible). There appears to be inherent challenges in acheiving an accurate reading, so I'll capture some more datasets and have a ponder about what can be done about this.


</p><p>

Future features will include the capture of additional data to provide richer data analysis features which allow more meaningful insights to be drawn. I'm envisioning geocode functions that allow splits to be recorded for specified routes, and further x-axis plots to illustrate changes in heart rate. If you have any other ideas/suggestions for useful features, I'd love for you to <a href="http://traceywright.xyz/messages/create">get in touch</a> and share your thoughts.
 </p>
 <?php // print_r($idwalksdata) ?>
<p style="font-weight: bold;">Select a walk/cycle description to view the data collected for that trip.</p>

<ul style="list-style: none;">
	<?php foreach ($idwalksdata as $key => $item): ?>
		<li>
			<a href='<?php echo site_url("maps/".$item->sepflagid); ?>'> <?php echo $item->walkdescription; ?></a>
		    <?php //print_r($item) ?>

		    <?php $dt = new DateTime("@$item->timestamp", new DateTimeZone('Australia/Brisbane'));
					echo $dt->format('Y-m-d'); 
					//echo $item->timestamp; ?>
		</li>
	<?php endforeach ?>
</ul>



</article>