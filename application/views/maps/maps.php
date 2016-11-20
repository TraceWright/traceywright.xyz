<?php $resources = $this->config->item('resources'); ?>

<article>
    <style>
       #map {
        height: 400px;
        width: 60%;
       } 

       #map {
	    resize:both;
	    overflow:auto;
       }
    </style>

    <script src="<?php echo $resources;?>plugins/charts/Chart.bundle.min.js"></script>


   <h4 style="color: #F95B45"> <?php echo $walkDescription; ?></h4>

    <div id="map"></div>
    <script>
      function initMap() {
        var walkingCoordinates = [
<?php foreach ($locationData as $key => $item){ echo "{lat: $item->lat, lng: $item->lng},\n"; } ?>
        ]

        // var uluru = {lat: -25.363, lng: 131.044};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 13,
          center: walkingCoordinates[0]
        });


        var walkPath = new google.maps.Polyline({
            path: walkingCoordinates,
            geodesic: true,
            strokeColor: '#FF0000',
            strokeOpacity: 1.0,
            strokeWeight: 2
          });

          walkPath.setMap(map);

        // var marker = new google.maps.Marker({
        //   position: uluru,
        //   map: map
        // });
      }


    </script>

    Total Distance = <?php echo $distance ?> km

    <br><br><br>

    <canvas id="myChart" width="800" height="400"></canvas>

    <br><br><br>

    <script>
    	var ctx = $("#myChart");
    	var data = <?php echo json_encode($velocityArray)?>;
    	var myLineChart = new Chart(ctx, {
		    type: 'line',
		    data: {
        		datasets: [{
            		label: 'Velocity',
            		data: data,
            		pointRadius: 0
            	}]
    		},
		    options: {
		    	responsive: false,
		        scales: {
		            xAxes: [{
		                type: 'linear',
		                position: 'bottom'
		            }]
		        }
		    }
		});
	</script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRLNDPnXyvBJqPD061mOGZm5vXunjTXms&callback=initMap">
    </script>


</article>