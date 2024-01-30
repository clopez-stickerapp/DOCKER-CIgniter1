<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Overview');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Routes.php
$routes->get('/', 'Overview::index');
$routes->get('overview/change_cave', 'Overview::change_cave');

$routes->get('ladda_upp', 'LaddaUpp::index');
$routes->get('ladda_upp/reprint/(:num)', 'LaddaUpp::reprint/$1');
$routes->post('ladda_upp/upload', 'LaddaUpp::upload');
$routes->post('ladda_upp/upload/(:num)', 'LaddaUpp::upload/$1');

$routes->get('files/(:segment)', 'Files::view/$1');

$routes->get('ordrar', 'Ordrar::index');
$routes->get('ordrar/printad', 'Ordrar::printad');
$routes->get('ordrar/klar', 'Ordrar::klar');
$routes->get('ordrar/arkiverad', 'Ordrar::arkiverad');
$routes->get('ordrar/sok', 'Ordrar::sok');
$routes->get('ordrar/visa/(:num)', 'Ordrar::visa/$1');
$routes->get('ordrar/radera/(:num)', 'Ordrar::radera/$1');
$routes->get('ordrar/order_by/(:segment)/(.*)', 'Ordrar::order_by/$1/$2');
$routes->post('ordrar/update_status/(:num)/(.*)/(.*)/(.*)', 'Ordrar::update_status/$1/$2/$3/$4');
$routes->post('ordrar/add_comment/(:num)', 'Ordrar::add_comment/$1');

$routes->get('settings', 'Settings::index');
$routes->get('settings/edit_data/(.+)', 'Settings::edit_data/$1');
$routes->post('settings/save_data/(.+)', 'Settings::save_data/$1');
$routes->post('settings/add_data/(.+)', 'Settings::add_data/$1');

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
