<?php
/**
 *
 */

class Routes
{
	public $routes = [];
	public function get($slug, Closure $closure)
	{
		$this->routes[$slug] = $closure;
	}

	public function test($slug) {
		$this->routes[$slug]();
	}
}