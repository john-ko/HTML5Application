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
	$customer = new Customer();
	$customer->first_name = 'sharon';
	$customer->last_name = 'park';
	$customer->save();
	echo $customer->getLastInsertID();
});

$routes->get('/search/:arguments', function($arguments) use ($template) {
	$data = Products::findLike(array(":search" => "%$arguments%"));
	$results = array();
	foreach($data as $prod){
		$results[] = $prod->_attributes;
	}

	foreach($results as $product){
		echo"<p>" . "<a href='/index.php/" . $product['gender']. "/". $product['category']. "/" .$product['slug'] . "'>" . $product['name'] . "</a></p>";
	}

});

$routes->get('/', function() use ($template) {
	$template->setView('home');
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

$routes->get('/checkout', function() use ($template) {

	//$cart = new Cart();
	$template->setView('checkout');
	$template->render();
});


$routes->get('/men/:category/:slug', function($category, $slug) use ($template){

	$data = null;
	if ($slug) {
		$data = Products::find(['slug' => $slug]);
		$template->setView('product');
		$template->render($data[0]);
	} else if ($category) {
		$data = Products::find([
			'category' => $category,
			'gender' => 'men',
		]);
		$template->setView('men');
		$template->render($data);
	} else {
		$data = Products::find(['gender' => 'men']);
		$template->setView('men');
		$template->render($data);
	}
});

$routes->get('/women/:category/:slug', function($category, $slug) use ($template){

	$data = null;
	if ($slug) {
		$data = Products::find(['slug' => $slug]);
		$template->setView('product');
		$template->render($data[0]);
	} else if ($category) {
		$data = Products::find([
			'category' => $category,
			'gender' => 'women',
		]);
		$template->setView('women');
		$template->render($data);
	} else {
		$data = Products::find(['gender' => 'women']);
		$template->setView('women');
		$template->render($data);
	}
});


$routes->dispatch();

	// echo'<form>';
	// echo'<input type="text" size="30" onkeyup="getResults(this.value)">';
	// echo'<div id="searchResults" class = "thesearchresults"></div>';
	// echo'</form>';

