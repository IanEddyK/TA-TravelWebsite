<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
//$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Site::index');
$routes->get('/home', 'Site::home');
$routes->get('/about', 'Site::about');
$routes->get('/package', 'Site::package');
$routes->get('/book', 'Site::book');
$routes->get('/details', 'Site::details/$1');
$routes->get('/delete', 'Site::cancel/$1');
$routes->get('/bookpackage/(:segment)', 'Site::bookpackage/$1');
$routes->get('/bookform', 'Site::bookform');
$routes->get('/savebook', 'Site::savebook');
$routes->get('/logout', 'Site::logout');

$routes->post('/chart-transaction', 'Admin::showBooksChart');
$routes->post('/chart-customer', 'Admin::showCustomerChart');

$routes->get('/admin', 'Admin::index', ['filter' => 'authGuard']);
$routes->get('/invoices', 'Admin::invoices');
$routes->get('/deleteinvoice/(:num)', 'Admin::deleteInvoice/$1');
$routes->get('/users', 'Admin::users');
$routes->get('/create', 'Admin::createpackage');
$routes->get('/update/(:num)', 'Admin::updatepackage/$1');
$routes->get('/editpackage/(:segment)', 'Admin::editpackage/$1');
$routes->get('/deletepackage/(:segment)', 'Admin::deletepackage/$1');

$routes->get('/login/login', 'Login::login');
$routes->get('/register', 'Register::index');
$routes->post('/register/auth', 'Register::auth');
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
