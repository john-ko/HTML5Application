<?php
/**
 *
 */

class Routes
{
	public $route = array();

	public function get($slug, Closure $closure)
	{
		$parts = explode('/', trim($slug, '/'));
		$this->route['GET'][$parts[0]] = array(
			'closure' => $closure,
			'parts' => $parts,
		);
	}

	public function post($slug, Closure $closure)
	{
		$parts = explode('/', trim($slug, '/'));
		$this->route['POST'][$parts[0]] = array(
			'closure' => $closure,
			'parts' => $parts,
		);
	}

	public function dispatch()
	{
		$request = new Request();

		$params = $request->get();
		$object = $this->route[$_SERVER['REQUEST_METHOD']][$request->get(0)];
		array_shift($params);

		while (count($object['parts']) > count($params)) {
			$params[] = null;
		}
		//$closure = $object['closure'];
		call_user_func_array($object['closure'], $params);
	}
}