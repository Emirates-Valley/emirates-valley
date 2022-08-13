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
$route['default_controller'] = 'welcome';

/*****************ADMIN AREA START*************************/
$route['admin/login'] = 'home/login';
$route['admin/logout'] = 'home/logout';
$route['admin/profile'] = 'Dashboard/profile';
$route['admin/dashboard'] = 'Dashboard';
/*****************ADMIN AREA END*************************/

/*****************SLIDER AREA START*************************/
$route['admin/slider/listing'] = 'Slider';
$route['admin/slider/listing/(:num)'] = 'Slider';
$route['admin/slider/add'] = 'Slider/add_slider';
$route['admin/slider/edit/(:any)'] = 'Slider/edit_slider';
$route['admin/slider/delete/(:any)'] = 'Slider/delete_slider';
/*****************SLIDER AREA END**************************/

/*****************LOGO AREA START*************************/
$route['admin/logo/listing'] = 'Logo';
$route['admin/logo/listing/(:num)'] = 'Logo';
$route['admin/logo/add'] = 'Logo/add_logo';
$route['admin/logo/edit/(:any)'] = 'Logo/edit_logo';
$route['admin/logo/delete/(:any)'] = 'Logo/delete_logo';
/*****************LOGO AREA END**************************/

/*****************VIDEO GALLERY AREA START*************************/
$route['admin/video/listing'] = 'Video';
$route['admin/video/listing/(:num)'] = 'Video';
$route['admin/video/add'] = 'Video/add_video';
$route['admin/video/edit/(:any)'] = 'Video/edit_video';
$route['admin/video/delete/(:any)'] = 'Video/delete_video';
/*****************VIDEO GALLERY AREA END**************************/

/*****************TEAM AREA START*************************/
$route['admin/team/listing'] = 'Team';
$route['admin/team/listing/(:num)'] = 'Team';
$route['admin/team/add'] = 'Team/add_team';
$route['admin/team/edit/(:any)'] = 'Team/edit_team';
$route['admin/team/delete/(:any)'] = 'Team/delete_team';
/*****************TEAM AREA END**************************/

/*****************PAYMENT PLAN AREA START*************************/
$route['admin/payment/listing'] = 'Payment';
$route['admin/payment/listing/(:num)'] = 'Payment';
$route['admin/payment/add'] = 'Payment/add_payment';
$route['admin/payment/edit/(:any)'] = 'Payment/edit_payment';
$route['admin/payment/delete/(:any)'] = 'Payment/delete_payment';
/*****************PAYMENT PLAN AREA END**************************/

/*****************NEWS AREA START*************************/
$route['admin/news/listing'] = 'News';
$route['admin/news/listing/(:num)'] = 'News';
$route['admin/news/add'] = 'News/add_news';
$route['admin/news/edit/(:any)'] = 'News/edit_news';
$route['admin/news/delete/(:any)'] = 'News/delete_news';
/*****************NEWS AREA END**************************/

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
