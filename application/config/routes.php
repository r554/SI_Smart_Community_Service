<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
| example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
| https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
| $route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
| $route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
| $route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples: my-controller/index -> my_controller/index
|   my-controller/my-method -> my_controller/my_method
*/
$route['default_controller'] = 'auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = true;

//api laporan
$route['api/laporan/id_laporan/(:num)'] = 'api/laporan/index/id_laporan/$1';
$route['api/laporan/all/limit/(:num)'] = 'api/laporan/index/all//$1';
$route['api/laporan/id_user/(:num)'] = 'api/laporan/index/id_user/$1';
$route['api/laporan/(:num)'] = 'api/laporan/index/$1';

//api pemberitahuan
$route['api/pemberitahuan/id_pemberitahuan/(:num)'] = 'api/pemberitahuan/index/id_pemberitahuan/$1';
$route['api/pemberitahuan/id_user/(:num)'] = 'api/pemberitahuan/index/id_user/$1';
$route['api/pemberitahuan/id_penerima/(:num)'] = 'api/pemberitahuan/index/id_penerima/$1';
$route['api/pemberitahuan/all'] = 'api/pemberitahuan/index/all';

//api user
$route['api/auth/id_user/(:num)'] = 'api/auth/index/id_user/$1';
$route['api/auth/profil/(:num)'] = 'api/auth/index/profil/$1';
$route['api/auth/level/(:num)'] = 'api/auth/index/level/$1';
$route['api/auth/all'] = 'api/auth/index/all';

//auth
$route['login'] = 'auth';
$route['registration'] = 'auth/registration';
$route['forgotpassword'] = 'auth/forgotpassword';
$route['recoverpassword'] = 'auth/recoverpassword';
$route['verifyemail'] = 'auth/verifyemail';
$route['logout'] = 'auth/logout';

/*
| -------------------------------------------------------------------------
| Sample REST API Routes
| -------------------------------------------------------------------------
*/
$route['api/example/users/(:num)'] = 'api/example/users/id/$1'; // Example 4
$route['api/example/users/(:num)(\.)([a-zA-Z0-9_-]+)(.*)'] = 'api/example/users/id/$1/format/$3$4'; // Example 8
