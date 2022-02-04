<?php

namespace Config;

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
$routes->get('/', 'Home::index');

$routes->get('/simple', "SiteController::simple");
$routes->get('/about', "SiteController::aboutUs");
$routes->get('/contact', "SiteController::contact");

$routes->get("/call-me/(:any)/(:any)", "SiteController::callMe/$1/$2");
$routes->get("/query-param", "SiteController::queryParam");

$routes->get('/simple-call', function(){
    // echo "<h1>Welcome to OnlyFans</h1>";
    return view("simple-call");
});

// raw queries
$routes->get("/raw-insert", "SiteController::insertRaw");
$routes->get("/raw-update", "SiteController::updateRaw");
$routes->get("/raw-delete", "SiteController::deleteRaw");
$routes->get('/list-data', "SiteController::getData");
$routes->get('/list-data2', "SiteController::getData2");
$routes->get("/insert-data2", "SiteController::insertData2");
$routes->get('/delete-data2', "SiteController::deleteData2");
$routes->get('/updated-data2', "SiteController::updateData2");

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
