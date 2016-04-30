<?php
session_start();
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
$template = new Template();

$routes->get('/test', function() use ($template) {
	echo json_encode(array(
		'asdf' => 123,
		'fdsa' => 'sdfs',
	));
});

$routes->get('/', function() use ($template) {
	$template->setView('contact');
	$template->render();
});

$routes->get('/contact', function() use ($template) {
	$template->setView('contact');
	$template->render();
});

$routes->get('/about', function() use ($template) {
	$template->setView('about');
	$template->render();
});

$routes->get('/men/:category/:slug', function($category, $slug) use ($template){

	$data = null;
	if ($slug) {
		//$data = Products::find(['slug' => $slug])
	} else if ($category) {
		// $data = Products::find([
		//		'category' => $category,
		//		'gender' => 'men',
		// ]);
		//
	} else {
		// $data = Products::find(['gender' => 'men']);
	}

	$template->setView('product');
	$template->render($data);
});



$routes->dispatch();
