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

$route['default_controller'] = "login";
$route['404_override'] = 'error_404';
$route['translate_uri_dashes'] = FALSE;


/*********** USER DEFINED ROUTES *******************/

$route['loginMe'] = 'login/loginMe';
$route['dashboard'] = 'Dashboard/dashboard';
$route['user'] = 'user/userListing';
$route['logout'] = 'user/logout';
$route['userListing'] = 'user/userListing';
$route['userListing/(:num)'] = "user/userListing/$1";
$route['report/(:num)'] = 'admin/report/report/$1';

$route['admin'] = "admin/admin";
$route['addadmin'] = "admin/admin/add";
$route['viewadmin/(:num)'] = "admin/admin/view/$1";
$route['editadmin/(:num)'] = "admin/admin/edit/$1";
$route['get_report'] = "admin/report/get_report";


$route['stock'] = "admin/stock";
$route['stock/allocate/(:num)'] = "admin/stock/allocate/$1";

$route['addfuncation'] = "/admin/funcation/add";
$route['addNew'] = "user/addNew";
$route['addNewUser'] = "user/addNewUser";
$route['addNewbranches'] = "branches/addNewbranches";
$route['addNewBranch'] = "/admin/branches/addNewBranch";
$route['addstock'] = "/admin/inventory/addstock";
$route['listproduct'] = "admin/inventory/listproduct";
$route['beneficiary'] = "admin/Beneficiary";
$route['checkstock/(:num)'] = "admin/branches/checkstock/$1";
$route['beneficiary/view/(:num)'] = "admin/beneficiary/view/$1";
$route['funcation/view/(:num)'] = "admin/funcation/view/$1";
$route['funcation/edit/(:num)'] = "admin/funcation/edit/$1";

$route['beneficiary/edit/(:num)'] = "admin/beneficiary/edit/$1";
$route['inventory/addstockbyid/(:num)'] = "admin/inventory/addstockbyid/$1";
$route['assignstock'] = "admin/inventory";

$route['notiboard/view/(:num)'] = "admin/notiboard/view/$1";
$route['notiboard/edit/(:num)'] = "admin/notiboard/edit/$1";
$route['addstockbyid/(:num)'] = "admin/inventory/addstockbyid/$1";
$route['editOld'] = "user/editOld";
$route['editOld/(:num)'] = "user/editOld/$1";
$route['editbranchs/(:num)'] = "user/editbranchs/$1";
$route['editbranch/(:num)'] = "user/editbranch/$1";
$route['viewbranch/(:num)'] = "user/viewbranch/$1";
$route['branches'] = "/admin/branches";
$route['view/(:num)'] = "user/view/$1";
$route['editUser'] = "user/editUser";
$route['deleteUser'] = "user/deleteUser";
$route['approveUser'] = "user/approveUser";
$route['profile'] = "user/profile";
$route['profile/(:any)'] = "user/profile/$1";
$route['profileUpdate'] = "user/profileUpdate";
$route['profileUpdate/(:any)'] = "user/profileUpdate/$1";

$route['loadChangePass'] = "user/loadChangePass";
$route['changePassword'] = "user/changePassword";
$route['changePassword/(:any)'] = "user/changePassword/$1";
$route['pageNotFound'] = "user/pageNotFound";
$route['checkEmailExists'] = "user/checkEmailExists";
$route['login-history'] = "user/loginHistoy";
$route['login-history/(:num)'] = "user/loginHistoy/$1";
$route['login-history/(:num)/(:num)'] = "user/loginHistoy/$1/$2";

$route['forgotPassword'] = "login/forgotPassword";
$route['resetPasswordUser'] = "login/resetPasswordUser";
$route['resetPasswordConfirmUser'] = "login/resetPasswordConfirmUser";
$route['resetPasswordConfirmUser/(:any)'] = "login/resetPasswordConfirmUser/$1";
$route['resetPasswordConfirmUser/(:any)/(:any)'] = "login/resetPasswordConfirmUser/$1/$2";
$route['createPasswordUser'] = "login/createPasswordUser";

$route['roleListing'] = "roles/roleListing";
$route['roleListing/(:num)'] = "roles/roleListing/$1";
$route['roleListing/(:num)/(:num)'] = "roles/roleListing/$1/$2";
$route['updateinsurance/(:num)'] = "admin/insurance/insurance_update/$1";


/* End of file routes.php */
/* Location: ./application/config/routes.php */
