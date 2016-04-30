<?php
/**
 *
 */

class Routes
{
	public $get = array();
	public function get($slug, Closure $closure)
	{
		$parts = explode('/', trim($slug, '/'));
		$this->get[$parts[0]] = array(
			'closure' => $closure,
			'parts' => $parts,
		);
	}

	public function dispatch()
	{
		$request = new Request();

		$params = $request->get();
		$object = $this->get[$request->get(0)];
		array_shift($params);

		while (count($object['parts']) > count($params)) {
			$params[] = null;
		}
		call_user_func_array($object['closure'], $params);
	}
}