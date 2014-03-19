<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'info';
$route['404_override'] = 'errors/four_oh_four';

//User controller
$route['info/index'] = '/';
$route['login'] = 'users/login';
$route['logout'] = 'users/logout';

//Dash controller
$route['dash'] = 'dash';
$route['dash/requirements'] = 'dash/requirements';
$route['dash/point-requests'] = 'dash/point_requests';
$route['dash/messages'] = 'dash/messages';
$route['dash/settings'] = 'dash/settings';

//Events controller
$route['events'] = 'events/index';
$route['events/event'] = 'events/event';
$route['events/fundraising'] = 'events/fundraising';
$route['events/meeting'] = 'events/meeting';
$route['events/social'] = 'events/social';

//Prevents revealing the architecture underneath



/* End of file routes.php */
/* Location: ./application/config/routes.php */
