<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/



$route['submitData'] = 'submitData/getjson';

$route['my/admin/locationsadmin/(:num)'] = 'locationsadmin/update_display_flag/$1';
$route['my/admin/locationsadmin/locations/(:any)'] = 'locationsadmin/locations/$1';
$route['my/admin/locationsadmin/locations'] = 'locationsadmin/locations';
$route['my/admin/locationsadmin'] = 'locationsadmin/locations/locationsadmin';

$route['my/admin/dbadmin/(:num)'] = 'dbadmin/update_display_flag/$1';
$route['my/admin/dbadmin'] = 'dbadmin/view/dbadmin';

$route['infotech'] = 'hobbies/view/infotech';

$route['gardening'] = 'hobbies/gardening';
$route['gardening\.xml'] = "hobbies/xml/gardeningXML";
$route['wheelbarrowgarden\.xml'] = "hobbies/xml/wheelbarrowgardenXML";
$route['flowergarden\.xml'] = "hobbies/xml/flowergardenXML";

$route['nails'] = 'nails/view/nails';

$route['hobbies/(:any)'] = 'hobbies/view/$1';


/*"2nd line at end is: controller/function/data" */

/*allows 'education' part of url to be omitted */

$route['educationTAFE'] = 'education/view/educationTAFE';
$route['educationGriffith'] = 'education/view/educationGriffith';
$route['educationUSYD'] = 'education/view/educationUSYD';
$route['educationQUT'] = 'education/view/educationQUT';

/* routes url with education plus anything after to educationQUT as a default  */

$route['education/(:any)'] = 'education/view/$1';

$route['professionalHistory/(:any)'] = 'histoscience/view/$1';
$route['histoscience'] = 'histoscience/view/histoscience';
$route['mohs'] = 'histoscience/view/mohs';


$route['maps/(:num)'] = 'maps/view/$1';
$route['maps'] = 'maps/show';

$route['changehistory/(:any)'] = 'changehistory/view/$1';
$route['changehistory'] = 'pages/view/changehistory';

$route['messages/(:any)'] = 'messages/view/$1';
$route['messages/create'] = 'messages/create';
$route['messages'] = 'messages';

$route['(:any)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/view';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
