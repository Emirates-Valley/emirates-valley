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
$route['default_controller'] = 'Web_Home';
$route['latest_news'] = 'Web_Home/news_listing_home';
$route['features'] = 'Web_Home/features_detials';
$route['contact_us'] = 'Web_Home/contact_us';
$route['news_details'] = 'Web_Home/news_details';
$route['about_us'] = 'Web_Home/about_us';

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

/*****************TESTIMONIAL AREA START*************************/
$route['admin/testimonial/listing'] = 'Testimonial';
$route['admin/testimonial/listing/(:num)'] = 'Testimonial';
$route['admin/testimonial/add'] = 'Testimonial/add_testimonial';
$route['admin/testimonial/edit/(:any)'] = 'Testimonial/edit_testimonial';
$route['admin/testimonial/delete/(:any)'] = 'Testimonial/delete_testimonial';
/*****************TESTIMONIAL AREA END**************************/

/*****************FEATURE AREA START*************************/
$route['admin/feature/listing'] = 'Feature';
$route['admin/feature/listing/(:num)'] = 'Feature';
$route['admin/feature/add'] = 'Feature/add_feature';
$route['admin/feature/edit/(:any)'] = 'Feature/edit_feature';
$route['admin/feature/delete/(:any)'] = 'Feature/delete_feature';
/*****************FEATURE AREA END**************************/

/*****************ABOUT MANAGEMENT START*************************/
$route['admin/about'] = 'Page';
/*****************ABOUT MANAGEMENT START*************************/

/*****************OPEN FORM MANAGEMENT START*************************/
$route['admin/open/file'] = 'OpenForm';
$route['admin/open/file/(:num)'] = 'OpenForm';
$route['admin/open/file/add'] = 'OpenForm/open_form_add';
$route['admin/open/file/edit/(:any)'] = 'OpenForm/open_form_edit';
$route['admin/open/file/delete/(:any)'] = 'OpenForm/delete_open_file';
/*****************OPEN FORM MANAGEMENT END*************************/

/*****************QR CODE MANAGEMENT START*************************/
$route['admin/generate-qrcode'] = 'OpenForm/generate_qrcode';
$route['open-file/(:any)'] = 'OpenForm/open_file';
/*****************QR CODE MANAGEMENT END*************************/

/*****************DEALER AREA START*************************/
$route['admin/dealer/listing'] = 'Dealer';
$route['admin/dealer/listing/(:num)'] = 'Dealer';
$route['admin/dealer/add'] = 'Dealer/add_dealer';
$route['admin/dealer/edit/(:any)'] = 'Dealer/edit_dealer';
$route['admin/dealer/delete/(:any)'] = 'Dealer/delete_dealer';
/*****************DEALER AREA END**************************/

/*****************Home Slider **************************/
$route['homeslider'] = 'Home_Slider';
$route['homefeatures'] = 'Home_Features';
$route['hometestimonial'] = 'Home_Testimonial';
$route['hometeam'] = 'Home_Team';
$route['homegallery'] = 'Home_gallery';
$route['homenews'] = 'Home_news';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
