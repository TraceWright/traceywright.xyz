<?php $resources = $this->config->item('resources'); ?>

<article>
    <style>
       #map {
        height: 300px;
        width: 45%;
        resize:both;
	    overflow:auto;
      margin-right: 70px;
      margin-top: 30px
	   /* margin-left: auto;
	    margin-right: auto;*/
       }
    </style>

    <script src="<?php echo $resources;?>plugins/charts/Chart.bundle.min.js"></script>


  

<div class="expanded row">
 
  <div class="medium-5 columns">
<h4 style="color: #F95B45"> <?php echo $walkDescription; ?></h4>
	<p style="float: left;">
	Distance = <?php echo $distance ?> km <br>
	Time = <?php echo $time ?> minutes <br>
	Average Speed = <?php echo $averageSpeed ?> km/hr <br>
  Elevation = <?php echo $elevation ?> feet <br>
  <!-- Split Time = <?php echo($splitcalc)  ?> seconds<br> -->
  <?php
    $currentKey = -1; 
    $currentItem = -1;

    foreach ($arraysplits as $key => $item)
    {
      if ($currentKey != -1)
      {
        echo "Split Time between $currentKey and $key = ".($item - $currentItem)." seconds<br>";
      }

      $currentKey = $key;
      $currentItem = $item;
    }
  ?>
  Route Number = <?php print_r ($routeNumber)  ?>



	</p>

  </div>

  <!-- <div class="small-2 columns"></div> -->

<div id="map" class="medium-7 columns"></div>



</div><br>
  <!--  <h5 style="margin-left: auto; margin-right: auto;"> Distance = <?php echo $distance ?> km </h5>
   <h5 style="margin-left: auto; margin-right: auto;"> Time = <?php echo $time ?> minutes </h5>
   <h5 style="margin-left: auto; margin-right: auto;"> Average Speed = <?php echo $averageSpeed ?> km/hr </h5> -->



<br>
    
    <script>
      function initMap() {
        var walkingCoordinates = [
<?php foreach ($locationData as $key => $item){ echo "{lat: $item->lat, lng: $item->lng},\n"; } ?>
        ]

        var splitCoordinates = [
<?php foreach ($arraysplits as $key => $item){ echo "{num: $key, time: $item},\n"; } ?>
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

    <div class="expanded row">

  <div class="small-3 columns">

    
 <h4 style="color: #F95B45">Data Analysis</h4>
    <p>
      
      This graph illustrates the data captured by the Android mobile application that I custom-developed for this project using Visual Studio. You'll notice that a lot of the walks will have stretches of a few minutes where the velocity is zero, which is probably because I've stopped for a few moments to play games on my phone (ahem, Pokemon Go, cough cough). There's sometimes also a few spikes where I've done intervals of jogging, which hopefully balances things out a little. Altitude is just recently implemented, and may require tweaking to acheive more accurate results.
      <br>
      <br>



    </p></div>  

    <div class="small-8 columns">

    <canvas style="margin-left: auto; margin-right: auto; resize:both; overflow:auto; width: 600px; height: 400px" id="myChart" <!-- width="600" height="400" -->></canvas>

    
<br>
<br>

</div>
</div>


    <script>
     	var ctx = $("#myChart");
  

new Chart(ctx, {
  type: 'line',
  data: {
    labels: <?php echo json_encode($velocityArray['x'])?>,
    datasets: [{
      label: 'Velocity',
      yAxisID: 'Velocity',
      data: <?php echo json_encode($velocityArray['y'])?>,
      pointRadius: 0,
      borderColor: '#8BC3F5',
      backgroundColor: 'transparent', 
    }, {
      label: 'Altitude',
      yAxisID: 'Altitude',
      data: <?php echo json_encode($velocityArray['z'])?>,
      pointRadius: 0,
      borderColor: '#F7272D',
      backgroundColor: 'transparent', 
    }]
  },
  options: {
    title: {
      display: true,
      text: 'Walk/Cycle Data',
      fontSize: 16,
    },
    scales: {
       xAxes: [{
        scaleLabel: {
          display: true,
          labelString: "Time (minutes)",
          fontSize: 14,
          },
            ticks: {
            autoSkipPadding: 5,
          },
      }],
      yAxes: [{
        id: 'Velocity',
        type: 'linear',
        position: 'left',
        scaleLabel: {
          display: true,
          labelString: "Change in Distance (meters)",
          fontSize: 14
        }, 
      }, {
        id: 'Altitude',
        type: 'linear',
        position: 'right',
        scaleLabel: {
          display: true,
          labelString: "Altitude (feet)",
          fontSize: 14
        },         
      }]
    }
  }
});

	</script>

    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCRLNDPnXyvBJqPD061mOGZm5vXunjTXms&callback=initMap">
    </script>


</article>