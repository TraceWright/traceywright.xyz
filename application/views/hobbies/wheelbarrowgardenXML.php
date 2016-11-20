<?php
    $resources = $this->config->item('resources');
    echo '<?xml version="1.0" encoding="UTF-8"?>';

	$array = array('1' => 'Rusty_Old_Wheelbarrow',
               '2' => 'Ready_for_Painting',
               '3' => 'Rust_Proof_Spraypaint',
			   '4' => 'Green_and Clean',
               '5' => 'Flowers_Planted',
               '6' => 'The_Finished_Product',
               '7' => 'Wheelbarrow_Garden',
               '8' => 'Wheelbarrow_Flowers_in_Bloom',);
			   


	$wheelbarrowGardenArray = new ArrayObject($array);

?>

<juiceboxgallery galleryTitle="Juicebox Lite Gallery">



<?php

// getIterator is a function of ArrayObject which allows the for loop to get the current iteration from the array. 

// Current is a function of ArrayObject which fetches the current iteration to pass into the variable

	for($i = $wheelbarrowGardenArray->getIterator();
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