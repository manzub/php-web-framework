<?php
/**
 * 
 * 
 * Index/Root page
 * handles all server request
 * ============
 * All routes and application params here
 * ============
 * 
 */
error_reporting(E_ALL | E_STRICT);
// ini_set('memory_limit', -1);
// include router script
include 'config/router.php';

// initialise application routes
$router = new Router($_SERVER);
$router->add("/");
// example application route with router params
$router->add("/shop", 2);
// run application
$router->run();