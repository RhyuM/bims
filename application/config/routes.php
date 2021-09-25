<?php
defined('BASEPATH') OR exit('No direct script access allowed');


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


// bid opening
$route['bidopening'] = 'BidOpeningController';
$route['bidopening/bid_openers/(:any)'] = 'BidOpeningController/bid_openers/$1';
$route['bidopening/bids_opened/(:any)'] = 'BidopeningController/bids_opened/$1';
$route['bidopening/evaluate_bidder/(:any)'] = 'BidopeningController/evaluate_bidder/$1';
$route['bidopening/financial_evaluation/(:any)'] = 'BidopeningController/financial_evaluation/$1';
$route['bidopening/evaluation_result/(:any)'] = 'BidopeningController/evaluation_result/$1';


$route['projectmanagement'] = 'ProjectManagementController/index';
$route['projectmanagement/create'] = 'ProjectManagementController/create';

$route['usermanagement/certified-bidder'] = 'UserManagementController/index';
$route['usermanagement/new-entry'] = 'UserManagementController/index2';

// bidder
$route['bidderbidmanagement/list-of-projects'] = 'BidderBidManagementController/index';
$route['bidderbidmanagement/my_active_bids'] = 'BidderBidManagementController/my_active_bids';
$route['usermanagement/my-documents'] = 'BidderUserManagementController/index';