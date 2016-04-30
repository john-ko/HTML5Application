<?php


class Products extends Model {

	protected static $table = 'products';

	protected $_attirbutes = [
		'id' => null,
		'brand' => null,
		'name' => null,
		'color' => null,
		'price' => null,
		'images' => null,
		'default_image' => null,
		'slug' => null,
		'details' => null,
	];

	public function __construct()
	{
		parent::__construct();
	}

	public static function find(array $params)
	{

	}

	public function __get($name)
	{
		return $this->_attirbutes[$name];
	}

	public function __set($name, $value)
	{
		$this->_attirbutes[$name] = $value;
	}
}