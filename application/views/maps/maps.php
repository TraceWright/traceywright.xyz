<?php $resources = $this->config->item('resources'); ?>

<article>
    <style>
       #map {
        height: 400px;
        width: 50%;
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
	Time = <?php echo $time ?> mins <br>
	Average Speed = <?php echo $averageSpeed ?> km/hr <br>
  Elevation = <?php echo $elevation ?> ft <br>
  Route Number = <?php print_r ($routeNumber)  ?> <br>
  Split Times: <br>
  <?php
    $currentKey = -1; 
    $currentItem = -1;

    foreach ($arraysplits as $key => $item)
    {
      if ($currentKey != -1)
      {
        echo "&emsp; $currentKey to $item->snum = ".(round(($item->stimestamp - $currentItem)/60, 1, PHP_ROUND_HALF_UP))." mins<br>";
      }

      $currentKey = $item->snum;
      $currentItem = $item->stimestamp;
    }
  ?>
  

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

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 14,
          center: walkingCoordinates[0]
        });

        var iconBase = '<?php echo $resources;?>images/';
        var icons = {
          Flag: {
            icon: iconBase + 'MarkerPink.png'
          },
          StartFinish: {
            icon: iconBase + 'ChequeredFlagPink.png'
          },
        };

<?php foreach ($arraysplits as $key => $item){ 
          echo " var marker = new google.maps.Marker({
          position: {lat: $item->slat, lng: $item->slng},
          map: map,
          title: 'Split Location: $item->snum',
          ";

          if ($key == 0 || sizeof($arraysplits) - 1 == $key) 
          {
            echo "icon: icons['StartFinish'].icon,";
          }
          else
          {
            echo "icon: icons['Flag'].icon,";
          }

          echo "
        });\n"; 
      }
?>

       

        var walkPath = new google.maps.Polyline({
            path: walkingCoordinates,
            geodesic: true,
            strokeColor: '#3333cc',
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
      
      This graph illustrates the data captured by the Android mobile application, creatively named App2, which was custom-developed for this project. I've noticed that where there are increases in altitude, velocity often decreases and conversely when there are decreases in altitude, velocity often increases which is what is expected when travelling up and down a hill or stairs. Not exactly profound stuff, but its kinda cool to see how my travels are tracking. 
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