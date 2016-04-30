<?php if ( ! defined('ROOT')) die ("err");
/**
 * bootstrap.php
 */

require('kaonic.php');
require('routes.php');


require('model.php');


require('template.php');

class Autoloader
{
	public static $autoloader = [
		'Model' => '',
		'Products' => 'models',
	];
}


function koanic_autoloader($classname)
{
	echo $classname;
	if (array_key_exists($classname, Autoloader::$autoloader)) {
		echo "REQUIRED!";
		require_once(ROOT . DS . Autoloader::$autoloader[$classname] . DS . $classname . DS . '.php');
	}
}

spl_autoload_register('koanic_autoloader');
