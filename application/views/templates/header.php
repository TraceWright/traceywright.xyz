<?php
    $base_url = $this->config->item('base_url'); 
    $resources = $this->config->item('resources');
    if(!isset ($headerImage))
    {
    	$headerImage = 'brissunset.jpg';
    }
?>

<!DOCTYPE html>
<html>
        <head>
            <!-- Foundation --> 
		    <link rel="stylesheet" href="<?php echo $resources;?>plugins/foundation/stylesheets/foundation.min.css">
		    <link rel="stylesheet" href="<?php echo $resources;?>plugins/foundation/stylesheets/app.css">


			<style type="text/css">
				
				div.container {
    				width: 100%;
					}

				header {
				    padding: 3em;
				    color: white;
				    background-image: url("<?php echo $resources.'images/'.$headerImage;?>");
				    background-size: 100%;
				    clear: left;
				    text-align: left;
				    text-indent: 210px;
					}

					footer {
				    padding: 1em;
				    color: white;
				    background-image: url("<?php echo $resources.'images/'.$headerImage;?>");
				    background-size: 100%;
				    clear: left;
				    text-align: left;
				    text-indent: 170px;
				    background-attachment: fixed;
				    background-position: center bottom;
				    position: fixed;
				    bottom: 0;
				    width:100%;
					}

					nav {
					float: left;
					width: 200px;
					margin: 0;
					padding: 1em;
					}

					article {
				    padding: 1em;
				    overflow: hidden;
					}

					section {

						margin-left: 170px
						border-left: 1px solid gray;
				    	padding: 1em;
				    	overflow: hidden;
					}

					img {

						border: solid;
						border-color: #D5D8DC;
						margin: 0px 0px 10px 0px;
					}

					figcaption {
						text-align: center; 
						font-size: small; 
						font-weight: bold;
					}

			</style>
        </head>
        
        <body>

        <header></header>

        <div class="container">


        