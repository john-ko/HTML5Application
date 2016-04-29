<?php

/**
 * cs137 tiny mvc php framework
 *
 */

// define root directory and directory separator
DEFINE('ROOT', dirname(__DIR__));
DEFINE('DS', DIRECTORY_SEPARATOR);
DEFINE('DEV', true);

if (DEV) {
	ini_set("display_errors", "1");
	error_reporting(E_ALL);
}

// bootstrap our app
include(ROOT . DS . 'app' . DS . 'bootstrap.php');

$routes = new Routes();
$routes->get('asdf', function() {
	echo 'hello';
});

echo 'world?';
$routes->test('asdf');
//var_dump($http);