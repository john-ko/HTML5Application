<?php
/**
 * Created by PhpStorm.
 * User: john
 * Date: 4/30/16
 * Time: 1:25 PM
 */
class Customer extends Model
{

	protected static $table = 'customers';

	protected $_attributes = array(
		'id' => null,
		'first_name' => null,
		'last_name' => null,
		'address' => null,
		'city' => null,
		'state' => null,
		'zip' => null,
	);

	public function __construct()
	{
		parent::__construct();
	}

	public function save()
	{
		// do some checks here

		parent::save();
	}
}
