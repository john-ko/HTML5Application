<?php
/**
 * cs137 tiny mvc php framework
 *
 */
// define root directory and directory separator
DEFINE('ROOT', dirname(__DIR__));
DEFINE('DS', DIRECTORY_SEPARATOR);
DEFINE('DEV', true);

session_save_path(ROOT . DS . 'sess');
session_start();
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
	$tax = Tax::find(array(':zipcode' => $zip));
	$cart->setTaxRate($tax->tax_rate? : 0);
	$response = array(
		'subtotal' => $cart->getSubtotal(),
		'tax_rate' => $cart->getTaxRate(),
		'tax' => $cart->getTax(),
		'total' => $cart->getTotal(),
	);
	echo json_encode($response);
});

$routes->get('/removefromcart/:id', function($id) use ($cart) {
	$cart->remove($id);
	$items = array(
		'qty' => $cart->getQty(),
		'removed' => $id,
		'subtotal' => $cart->getSubtotal(),
	);
	echo json_encode($items);
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
	$template->setView('checkout');
	$template->render();
});

$routes->post('/checkout', function() use ($template, $cart) {

	$customer = new Customer();
	$customer->first_name = $_POST['first_name'];
	$customer->last_name = $_POST['last_name'];
	$customer->address = $_POST['address'];
	$customer->state = $_POST['state'];
	$customer->city = $_POST['city'];
	$customer->zip = $_POST['zipcode'];

	Orders::place($customer, $cart);

	$products = $cart->getItemsAsProductObjects();
	$template->setView('checkedout');
	$template->render($products);
});

$routes->get('/men/:category/:slug', function($category, $slug) use ($template){

	$data = null;
	if ($slug) {
		$data = Products::find(array('slug' => $slug));
		$template->setView('product');
		$template->render($data[0]);
	} else if ($category) {
		$data = Products::find(array(
			'category' => $category,
			'gender' => 'men',
		));
		$template->setView('men');
		$template->render($data);
	} else {
		$data = Products::find(array('gender' => 'men'));
		$template->setView('men');
		$template->render($data);
	}
});

$routes->get('/women/:category/:slug', function($category, $slug) use ($template){

	$data = null;
	if ($slug) {
		$data = Products::find(array('slug' => $slug));
		$template->setView('product');
		$template->render($data[0]);
	} else if ($category) {
		$data = Products::find(array(
			'category' => $category,
			'gender' => 'women',
		));
		$template->setView('women');
		$template->render($data);
	} else {
		$data = Products::find(array('gender' => 'women'));
		$template->setView('women');
		$template->render($data);
	}
});


$routes->dispatch();
