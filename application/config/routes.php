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
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['register'] = 'Account/toRegister';
$route['login'] = 'Account/toLogin';
$route['cart'] = 'Order/cart';
$route['order'] = 'Order/order';

$route['allproduct'] = 'Product/viewAllProduct/1';
$route['allproduct/(:num)'] = 'Product/viewAllProduct/$1';
$route['viewproduct/cat/(:num)'] = "Product/viewProductByCat/$1/1";
$route['viewproduct/cat/(:num)/(:num)'] = "Product/viewProductByCat/$1/$2";
$route['viewproduct/cat/(:num)/subcat/(:num)'] = "Product/viewProductBySubCat/$1/$2/1";
$route['viewproduct/cat/(:num)/subcat/(:num)/(:num)'] = "Product/viewProductBySubCat/$1/$2/$3";

$route['product/(:num)'] = "Product/viewProducts/$1";
$route['producttype/(:num)/(:num)'] = "Product/viewProductsType/$1/$2";

$route['about'] = "Direct/about";
$route['howtoorder'] = "Direct/howToOrder";
$route['payment'] = "Direct/payment";
$route['delivery'] = "Direct/logistic";

$route['admin/admin/admin/login'] = "Direct/loginAdmin";
$route['admin/admin/admin/product'] = "Direct/product";
$route['admin/admin/admin/typeproduct'] = "Direct/typeproduct";
$route['admin/admin/admin/merk'] = "Direct/merk";
$route['admin/admin/admin/category'] = "Direct/category";
$route['admin/admin/admin/subcategory'] = "Direct/subcategory";

