<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 4/28/16
 * Time: 8:36 PM
 */

class Request
{
	private $params = array();

	public function __construct()
	{
		if (isset($_SERVER['PATH_INFO']) && $_SERVER['PATH_INFO'] != '/') {
			$this->params = explode("/", trim($_SERVER['PATH_INFO'], '/'));
		}
	}

	public function get($index = NULL)
	{
		//gets $params
		if (!isset($index)) {
			return $this->params;
		}

		//allows for optional parameter to allow framework to check element at specific position
		if (count($this->params) > $index) {
			return $this->params[$index];
		}
		return NULL;

	}
}
