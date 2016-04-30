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



//$routes->dispatch();
//$template->render([]);
// $routes = new Routes();
// $routes->get('asdf', function() {
// 	echo 'hello';
// });

// echo 'world?';
// $routes->test('asdf');

$m = new Model();
$m2 = new Model();
echo '<pre>';
// $printthis = $m->query( 'SELECT * FROM products WHERE id = :id', [':id' => 1]);
// $printthis2 = $m2->query('SELECT url from products, product_images, images where products.id=product_images.product_id AND products.id = :id AND product_images.image_id = images.id', [':id' => 1]);

echo "hi\n";
//var_dump($printthis2);

//var_dump($printthis);

$p = new Products();
//$printthis3 = $p->findProductInfo([':color' => "%gr%"]);
$printthis3 = $p->findProductInfo([':id' => 5]);
//var_dump($printthis3);
//var_dump($http);

