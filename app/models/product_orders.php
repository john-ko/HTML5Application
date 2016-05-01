<?php

class Product_Orders extends Model
{
	protected static $table = 'customers';

	protected $_attributes = array(
		'product_id' => null,
		'order_id' => null,
		'qty' => null,
	);

	public function __construct()
	{
		parent::__construct();
	}
}