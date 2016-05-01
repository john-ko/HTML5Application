<?php

class Products extends Model {

	protected static $table = 'products';

	public $_attributes = [
		'id' => null,
		'brand' => null,
		'name' => null,
		'color' => null,
		'price' => null,
		'images' => array(),
		'default_image' => null,
		'slug' => null,
		'details' => null,
		'gender' => null,
		'category' => null
	];

	public function __construct()
	{
		parent::__construct();
	}

	public static function find(array $where)
	{
		$testModel = new Model();

		$whereClause = "WHERE ";

		$attributes = array();

		if ( ! self::isAssoc($where)) {
			$whereClause .= 'p.id IN (' . implode(',', $where) . ')';

		} else {

			foreach ($where as $searchCategory => $value) {
				$attributes[$searchCategory] = "p." . ltrim($searchCategory, ':') . " = " . ":" . $searchCategory;
			}

			$whereClause = $whereClause . implode(" AND ", $attributes);
		} 
		$sql = "SELECT brand, p.color as color, price, default_image, p.id as id, p.name as name,
			p.details as details, p.slug as slug, p.gender as gender, p.category as category,
			i.url as url FROM products as p LEFT JOIN product_images as pi ON (pi.`product_id` = p.id)
			LEFT JOIN images as i ON (i.id = pi.image_id) ";
		$sql = $sql . $whereClause;

		$row = $testModel->query($sql, $where);

		$mainArray = array(); //initial array of product info

		$finalProducts = array(); //array of product objects

		if (count($row) > 0) {

			foreach ($row as $attribute) {

				if(array_key_exists($attribute['id'], $finalProducts)){
					$finalProducts[$attribute['id']]->images = $attribute['url'];
				} else {
					$product = new Products();
					$product->id = $attribute['id'];
					$product->brand = $attribute['brand'];
					$product->name = $attribute['name'];
					$product->color = $attribute['color'];
					$product->price = $attribute['price'];
					$product->default_image = $attribute['default_image'];
					$product->slug = $attribute['slug'];
					$product->details = $attribute['details'];
					$product->images = $attribute['url'];
					$product->gender = $attribute['gender'];
					$product->category = $attribute['category'];
					$finalProducts[$attribute['id']] = $product;
				}

			}

		}
		return array_values($finalProducts);
	}

	////////////////////////////////////////////////////////////////////////////////////////
	//Example usages for this findLike function                                           //
	//$p = new Products();                                                                //
	//$theResults = $p->findLike(array(':search' => '%bottom%'));                         //
	//The userInput attributes that are passed in as paramaters must be in the form of:   //
	//					array(':search' => '%USER_QUERY_HERE%')                           //
	//			where 'USER_QUERY_HERE' is what the user types into the search bar.       //
	////////////////////////////////////////////////////////////////////////////////////////

public static function findLike(array $userInput)
	{
		$testModel = new Model();

		$sql = "SELECT * FROM products WHERE name LIKE :search 
			OR details LIKE :search OR
			category LIKE :search OR
			color LIKE :search OR
			brand LIKE :search LIMIT 5";

		$row = $testModel->query($sql, $userInput);

		$finalProducts = array(); //array of product objects

		if (count($row) > 0) {

			foreach($row as $attribute){
				$product = new Products();
				$product->id = $attribute['id'];
				$product->brand = $attribute['brand'];
				$product->name = $attribute['name'];
				$product->color = $attribute['color'];
				$product->price = $attribute['price'];
				$product->default_image = $attribute['default_image'];
				$product->slug = $attribute['slug'];
				$product->details = $attribute['details'];
				$product->gender = $attribute['gender'];
				$product->category = $attribute['category'];
				$finalProducts[] = $product;
			}
		}

			return $finalProducts;
		}
		

}
