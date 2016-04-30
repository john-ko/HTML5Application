<?php

Class Tax extends Model
{
	protected static $table = 'tax_rates';

	protected $_attributes = array(
		'state' => null,
		'zipcode' => null,
		'tax_region' => null,
		'tax_rate' => null,
	);

	public function __construct()
	{
		parent::__construct();
	}

	public static function find($params)
	{
		$p = $params["param"];
		$tax = new Tax();
		$results = $tax->query("select * from tax_rates where zipcode=:p", [":p" => $p]);
		//var_dump($results);
		//load obj
		try {
			$tax->state = $results[0]['state'];
			$tax->tax_rate = $results[0]['tax_rate'];
		} catch (Exception $e) { }

		return $tax;
	}
}