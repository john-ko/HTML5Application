<?php
/**
 *
 */

class Routes
{
	public $get = [];
	public function get($slug, Closure $closure)
	{
		$this->get[$slug] = $closure;
	}

	public function _get($slug) 
	{
		$this->get[$slug]();
	}
}