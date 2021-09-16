<?php

namespace Config;

use CodeIgniter\Router\Router;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/',  function () {
    return view('home');
});
$routes->get('/home', "Home::");
$routes->get('/login', 'Home::login');
$routes->match(['get', 'post'], '/check', 'Home::Check_Login');
$routes->post('/signup', 'Home::SignUp');
$routes->get('/register', function () {
    echo view('register');
});
$routes->get('gd', function () {
    return redirect()->to('/Home/Getdata');
});
$routes->get('logout', 'Home::Logout');
$routes->get('Update', 'Home::Update');
$routes->post('UpdateData', 'Home::UpdateData');
$routes->post('Forgotpass', 'Home::Forgotpass');
$routes->get('resetpass', 'Home::resetpass');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}