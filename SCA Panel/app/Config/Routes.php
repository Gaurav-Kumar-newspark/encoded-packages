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
$routes->setDefaultController('Login');
$routes->setDefaultMethod('login');
$routes->setTranslateURIDashes(false);
$routes->set404Override(function()
{
    return view('errors/html/pages-error-404');
});
$routes->setAutoRoute(false);


/****************** Without Filter Routing **************/
$routes->add('/adminconfiguration', 'Adminconfiguration::adminconfiguration');

$routes->add('/api', 'Api::api');

$routes->get('/', 'Login::login');    

$routes->add('/login', 'Login::login');

$routes->get('/banned', 'Banned::banned');

$routes->get("test", "Testing::test");
/****************** Without Routing End *****************/





/******************* Filter start here *********************/

$routes->group('',['filter'=>'isLoggedIn'], function($routes)
{
    

    $routes->add('/profile', 'Profile::profile');
    
    $routes->add('/settings', 'Settings::settings');
    
    $routes->add('/generalsettings', 'Settings::generalsettings');
    
    $routes->add('/smtpsettings', 'Settings::smtpsettings');
    
    $routes->add('/addvertisement', 'Addvertisement::addvertisement');
    
    $routes->add('/logout', 'Logout::logout');
    
    $routes->add('/dashboard', 'Dashboard::dashboard');  
    
    $routes->add('/addsrecords', 'Addsrecords::addsrecords');
    
    $routes->add('/editadd/(:num)','Addsrecords::editadd/$1');
    
    $routes->add('/changeorderbyid','Addsrecords::changeorderbyid');
    
    $routes->add('/generateapi', 'Generateapi::generateapi');

    $routes->post('/sendmailtoadmin','Generateapi::sendmailtoadmin');

    $routes->post('/confirmationadminpassword','BaseController::confirmationadminpassword');

    $routes->add('/codes', 'Codes::codes');

    $routes->get('/geneartenewcodes', 'Codes::geneartenewcodes');

    $routes->post('/processingcodes', 'Codes::processingcodes');
    
    $routes->post('/loopcodesprocess', 'Codes::loopcodesprocess');

    $routes->post("load-data-for-list", "Codes::loaddatafortable");

    $routes->add("managerecords/(:num)", "Codes::managerecords/$1");

    $routes->get("editfile/(:num)", "Codes::editfile/$1");

    $routes->post("updaterecords/(:num)", "Codes::updaterecords/$1");

    $routes->add('/deleterecords/(:num)', 'Codes::deleterecords/$1');

    $routes->post('/editfiledataprocessing', 'Files::editfiledataprocessing');

    $routes->post("get-codes-list", "Codes::getcodeslist");
     
    $routes->post("deletefiledata", "Files::deletefiledata");

    $routes->add('/addcodes/(:num)', 'Codes::addcodes/$1');

    $routes->post("addcodestofile", "Codes::addcodestofile");

    $routes->add("addgroup", "Addgroup::addgroup");

    $routes->get("listgroups", "Addgroup::listgroups");

    $routes->post("loade-data", "Addgroup::loaddataforgrouptbl");

    $routes->add("editgroup/(:num)", "Addgroup::editgroup/$1");

    $routes->post("checkgroupexitsbeforedelete", "Addgroup::checkgroupexitsbeforedelete");
    
    $routes->post("deletefilegroupdata", "Addgroup::deletefilegroupdata");
    
    $routes->post("removelogo", "Settings::removelogo");

    $routes->post("createcsv", "Codes::createcsv");
    
    $routes->post("deletecodes", "Codes::deletecodes");

    $routes->add("configurelicense", "License::configurelicense");
    
    $routes->add("unblockips", "Unblockips::unblockips");

    $routes->post("blockipslist", "Unblockips::blockipslist");

    $routes->post("deletemultipalips", "Unblockips::deletemultipalips");

        
});
/******************* Filter End here ****************************/




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
