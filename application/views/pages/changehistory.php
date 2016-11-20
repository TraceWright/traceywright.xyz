<?php
    $resources = $this->config->item('resources');
?>




<article>

	<h3 style="color: #2471A3">Change History</h3>

	<p>
		
	<b>31/10/2016</b>

	<br>

	The LAMP stack was created more than a month ago, however the development had to go on hold as I prioritised uni work. Most of the progress over the past month has been with working through the CodeIgniter documentation and tutorials, until about a week ago when I moved on from following the tutorial instructions to actually implementing some of my own ideas. The past week has seen the functionality of the webiste grow exponentially as I become increasingly familiar with the tools I'm using.
	<br>
	<br>
	The current state of the website is as follows: 
	<br>
	Functioning drilldown menu, though it shows underlying menu items if the submenu is shorter in length than the underlying menu. 
	<br>
	Website Development menu contains a Scope Statement; messaging page with database integration; message board with database integration and client-side admin controls; and change history. Client-side admin controls will require increased security, though the severity of percieved risks is currently low. Contact and messages pages will need to be moved out of the Website Development menu, into the main menu.
	<br>
	About Tracey menu, with Professional History, Education, and Hobbies and Interests submenus. 
	<br>
	Profesional History submenu has Histopathology Scientist and Mohs Technician pages which currently has BPM process model images. Needs change of header/footer background, text descriptions and further images.
	<br>
	Education submenu has pages for QUT, USYD, Griffith, and TAFE. Has an appropriate header/footer background image. Needs descriptions of education history.
	<br>
	Hobbies and Interests submenu has pages for Nail Art, Gardening and Youtube. Nail art has HTML image slideshow from W3schools. Gardening has image/thumbnails slideshow from Juicebox. 
	<br>
	<br>
	All completed features are functioning adequately. Website is live under the domain name traceywright.xyz.

	</p>

	<p>

	<br>
		
	<b>13/11/2016</b>

	<br>

	Mobile app is functioning as a minimum viable product (MVP). Functions to collect latitudes, longitiudes, timestamps, and a flag to distinguish between walk/cycle events. Posts this data to the web server for insertion into a database and display on a Google Map. Data is validatated as received by the web server before deletion on the phone database. Admin controls on the website enable input of descriptions for walks/cycles before data is displayed on maps page. Next priority is getting the app to collect data whilst running in the background, as it currently only updates locations when the app is running in the foreground.
	<br>
	Switched drilldown menu to accordian menu. Drilldown had an issue with showing parent menus whilst displaying submenus.
	<br>
	Added additional content to Mohs, Histopathology, and Gardening. 
	<br>
	Created GitHub repository https://github.com/TraceWright/traceywright.xyz

	</p>

	<p>

	<br>
		
	<b>14/11/2016</b>

	<br>
	Solved background service bug for mobile app so the app now records gps data when running in both foreground and background.
	<br>
	Commenced writing content for Education pages.
	</p>

</article>