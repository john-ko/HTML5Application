<?php


class Products extends Model {

	protected static $table = 'products';

	protected $_attributes = [
		'id' => null,
		'brand' => null,
		'name' => null,
		'color' => null,
		'price' => null,
		'images' => [],
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
		return $this->_attributes[$name];
	}

	public function __set($name, $value)
	{
		$this->_attributes[$name] = $value;
	}
}