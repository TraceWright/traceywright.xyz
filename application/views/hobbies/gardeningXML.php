<?php
    $resources = $this->config->item('resources');
    echo '<?xml version="1.0" encoding="UTF-8"?>';

	$array = array('1' => 'Pile_of_Wood',
               '2' => 'Vege_Garden_Constructed',
               '3' => 'Vege_Garden_in_Ground',
			   '4' => 'Vege_Garden_Soil_Loosened',
               '5' => 'Vege_Garden_Filled_with_Soil',
               '6' => 'Vege_Garden_Topped_Up_with_Manure',
               '7' => 'Vege_Garden_with_Veges',
			   '8' => 'Tomato_Plant',
			   '9' => 'Zucchini_Plant',
               '10' => 'Zucchinis',
               '11' => 'Tomatoes');


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