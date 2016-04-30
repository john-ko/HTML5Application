<?php

class Products extends Model {

	protected static $table = 'products';

	protected $_attributes = [
		'id' => null,
		'brand' => null,
		'name' => null,
		'color' => null,
		'images' => [],
		'default_image' => null,
		'slug' => null,
		'details' => null,
	];

	public function __construct()
	{
		parent::__construct();
	}

	public static function findProductInfo(array $params)
	{
		//$product = new Products();
		$testModel = new Model();
		//$row = $product->query("SELECT * FROM products WHERE id = :id", $params);
		$row = $testModel->query("SELECT brand, p.color as color, price, default_image, p.id as id, p.name as name, p.details as details, p.slug as slug, p.gender as gender, p.category as category, i.url as url FROM products as p LEFT JOIN product_images as pi ON (pi.`product_id` = p.id) LEFT JOIN images as i ON (i.id = pi.image_id) WHERE p.id = :id", $params);
		//var_dump($row);

		$mainArray = []; //initial array of product info

		$finalProductArray = []; //array of product objects


		if (count($row) > 0) {
			// what if theres 2 products?
			$pastIDArray = [];

			foreach($row as $attribute){
				//var_dump($mainArray);

				if(!isset($pastIDArray[$attribute['id']])){
				$mainArray[$attribute['id']] = array(
					'id' => $attribute['id'],
					'brand' => $attribute['brand'],
					'name' => $attribute['name'],
					'color' => $attribute['color'],
					'default_image' => $attribute['default_image'],
					'slug' => $attribute['slug'],
					'details' => $attribute['details'],
					'images' => array()
				);
				$pastIDArray[$attribute['id']] = 1;
			}
				//var_dump($mainArray[$attribute['id']]['images']);
				//var_dump($attribute['id']);
				echo"-----\n";
				$mainArray[$attribute['id']]['images'][]= $attribute['url'];
				// if (!isset($mainArray[$attribute['id']]['images'])){
				// 	echo "in here1\n";
				// 	$mainArray[$attribute['id']]['images']= array($attribute['url']);
				// 	//var_dump($attribute['id']);
				// 	var_dump($mainArray[$attribute['id']]['images']);
				// 	echo"===\n";
				// 	var_dump($mainArray);
				// } else {
				// 	echo "in here 2\n";
				// 	$mainArray[$attribute['id']]['images'][] = $attribute['url'];
				// 	var_dump($mainArray);
				// }

			}
			//var_dump($mainArray);

			foreach($mainArray as $item){
				$product = new Products();
				$product->id = $item['id'];
				$product->brand = $item['brand'];
				$product->name = $item['name'];
				$product->color = $item['color'];
				//$product->images = $item['images'];
				$product->default_image = $item['default_image'];
				$product->slug = $item['slug'];
				$product->details = $item['details'];
				$product->images = $item['images'];
				$finalProductArray[] = $product;
			}

			var_dump($finalProductArray);

			// foreach($finalProductArray as $product){
			// 	var_dump($product);
			// }

			// $images = [];
			// foreach($row as $item) {
			// 	//if array_key_exists()
			// 	//var_dump($item);
			// 	$product->id = $item['id'];
			// 	$product->brand = $item['brand'];
			// 	$product->name = $item['name'];
			// 	$product->color = $item['color'];
			// 	//$product->images = $item['images'];
			// 	$product->default_image = $item['default_image'];
			// 	$product->slug = $item['slug'];
			// 	$product->details = $item['details'];
			// 	$images[] = $item['url'];
			// }
			// $product->images = $images;
		}
		//var_dump($product->id);
	}

	private static function assign_row_to_product(array $row)
	{
		$p = new Products();
		$p->id = $row['id'];
		// no images

		return $p;
	}

	public function __get($name)
	{
		return $this->_attributes;
	}

	public function __set($name, $value)
	{
		$this->_attributes[$name] = $value;
	}
// public static function addID
// {
// 	$this->id = 
// }

}

// $p = Products::find(['gender' => 'men']);
// $p->id;
// $p->images;

?>