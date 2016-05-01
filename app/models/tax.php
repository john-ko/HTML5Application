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
		$results = $tax->query("SELECT * FROM tax_rates WHERE zipcode= :p ", [":p" => $p]);
		//var_dump($results);
		//load obj
		if($results) {
			$tax->state = $results[0]['state'];
			$tax->tax_rate = $results[0]['tax_rate'];
		}

		return $tax;
	}
}