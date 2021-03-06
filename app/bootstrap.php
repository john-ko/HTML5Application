<?php if ( ! defined('ROOT')) die ("err");
/**
 * bootleg bootstrap
 * bootstrap.php
 */

class Autoloader
{
	public static $autoloader = array(
		'Cart' => '',
		'Customer' => 'models',
		'Controller' => '',
		'Database' => '',
		'Kaonic' => '',
		'Model' => '',
		'Orders' => 'models',
		'Products' => 'models',
		'Product_Orders' => 'models',
		'Request' => '',
		'Routes' => '',
		'Tax' => 'models',
		'Template' => '',
	);
}

function kaonic_autoloader($classname)
{
	if (array_key_exists($classname, Autoloader::$autoloader)) {
		$folder = Autoloader::$autoloader[$classname];
		$class = ROOT . DS . 'app'. DS . ($folder ? ($folder . DS) : '') . strtolower($classname) . '.php';

		require_once($class);
	}
}

spl_autoload_register('kaonic_autoloader');
