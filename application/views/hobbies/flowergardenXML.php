<?php
    $resources = $this->config->item('resources');
    echo '<?xml version="1.0" encoding="UTF-8"?>';

	$array = array('1' => 'First_Daisy_to_be Planted',
               '2' => 'A_Work_in_Progress',
               '3' => 'An_Early_Spring_Bloom',
			   '4' => 'A_Full_Garden',
               '5' => 'Mulched_and_Growing',
               '6' => 'Added_Some_Fence_Art',
               '7' => 'Night_Lights');


	$vegeGardenArray = new ArrayObject($array);

?>

<juiceboxgallery galleryTitle="Juicebox Lite Gallery">



<?php

// getIterator is a function of ArrayObject which allows the for loop to get the current iteration from the array. 

// Current is a function of ArrayObject which fetches the current iteration to pass into the variable

	for($i = $vegeGardenArray->getIterator();
	    $i->valid();
	    $i->next()):

$imagename = $i->current();

?>

  <image
	linkURL="<?php echo $resources. 'images/garden/' .$imagename.'.jpg'?>"
	imageURL="<?php echo $resources. 'images/garden/' .$imagename.'.jpg'?>"
	thumbURL="<?php echo $resources. 'images/garden/thumbnails/tn_' .$imagename.'.jpg'?>"
	linkTarget="_blank">
	<title><?php echo str_replace('_', ' ', $imagename); ?></title>
  </image>

  <?php endfor; ?>


</juiceboxgallery>