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
$route['default_controller'] = 'HomeController';
$route['404_override'] = '';    
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| COOKIE MADE ROUTES
| -------------------------------------------------------------------------
*/
$route['login-register'] = 'loginregister/index';
$route['about'] = 'HomeController/about';
$route['services'] = 'HomeController/services';
$route['contact'] = 'HomeController/contact';
$route['invitation-to-bid'] = 'HomeController/invitation_to_bid';



$route['bidopening'] = 'BidOpeningController';
$route['bidOpening/bid_openers/(:any)'] = 'BidOpeningController/bid_openers/$1';

$route['projectmanagement'] = 'ProjectManagementController/index';
$route['projectmanagement/create'] = 'ProjectManagementController/create';

$route['usermanagement/certified-bidder'] = 'UserManagementController/index';
$route['usermanagement/new-entry'] = 'UserManagementController/index2';

// bidder
$route['bidderbidmanagement/list-of-projects'] = 'BidderBidManagementController/index';
$route['bidderbidmanagement/my_active_bids'] = 'BidderBidManagementController/my_active_bids';
$route['usermanagement/my-documents'] = 'BidderUserManagementController/index';