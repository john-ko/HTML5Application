<?php
/**
 * cs137 tiny mvc php framework
 *
 */
session_start();
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
$cart = new Cart();
$template = new Template($cart);

$routes->get('/test', function() use ($template) {
	echo '<pre>';

	$product = Products::find(array(
		'id' => 1
	));


	var_dump($product);
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

$routes->get('/addtocart/:id/:qty', function($id, $qty) use ($cart) {
	$cart->add($id, $qty);
	echo $cart->getQty();

});

$routes->get('/calculatetax/:zip', function($zip) use ($cart) {
	$tax = Tax::find(array('zipcode' => $zip));
	$cart->setTaxRate($tax->tax_rate);
	echo $tax->tax_rate;
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

$routes->get('/cart', function() use ($template, $cart) {
	$products = $cart->getItemsAsProductObjects();
	$template->setView('cart');
	$template->render($products);
});

$routes->get('/checkout', function() use ($template, $cart) {

	$products = $cart->getItemsAsProductObjects();
	$template->setView('checkout');
	$template->render();
});

$routes->post('/checkout', function() use ($template, $cart) {

	$products = $cart->getItemsAsProductObjects();
	$template->setView('checkedout');
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
