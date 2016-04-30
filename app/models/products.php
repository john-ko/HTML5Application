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

	public static function find(array $where)
	{
		$testModel = new Model();

		$whereClause = "Where ";

		if(count($where) > 1){
			
			foreach($where as $searchCategory => $value){
				$attributeArray[$searchCategory] = "p.". ltrim($searchCategory, ':'). " = " . ":". $searchCategory;
			}

			$whereClause = $wherClause . implode(" AND ", $attributeArray);
		} else { //just searching via 1 category
			foreach($where as $searchCategory => $value){
				$whereClause = $whereClause . "p.". ltrim($searchCategory, ':'). " = " . ":". $searchCategory;
			}

		}

		$sql = "SELECT brand, p.color as color, price, default_image, p.id as id, p.name as name, p.details as details, p.slug as slug, p.gender as gender, p.category as category, i.url as url FROM products as p LEFT JOIN product_images as pi ON (pi.`product_id` = p.id) LEFT JOIN images as i ON (i.id = pi.image_id) ";
		$sql = $sql . $whereClause;

		$row = $testModel->query($sql, $where);

		$attributeArray = array();

		$mainArray = array(); //initial array of product info

		$finalProductArray = array(); //array of product objects


		if (count($row) > 0) {
			$pastIDArray = array();

			foreach($row as $attribute){

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
				$pastIDArray[$attribute['id']] = 1; //set the past ID array as 1/true
			}
				$mainArray[$attribute['id']]['images'][]= $attribute['url'];
			}
			foreach($mainArray as $item){
				$product = new Products();
				$product->id = $item['id'];
				$product->brand = $item['brand'];
				$product->name = $item['name'];
				$product->color = $item['color'];
				$product->default_image = $item['default_image'];
				$product->slug = $item['slug'];
				$product->details = $item['details'];
				$product->images = $item['images'];
				$finalProductArray[] = $product;
			}
		}
		return $finalProductArray;
	}

	private static function assign_row_to_product(array $row)
	{
		$p = new Products();
		$p->id = $row['id'];
		// no images

		return $p;
	}

}
