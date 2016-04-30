<?php

class Cart
{
	public $mycart;
	public $total;

	public function __construct()
	{
		if(isset($_SESSION['mycart']) ) {
			$this->mycart = json_decode($_SESSION['mycart'], true);
			$this->total = $_SESSION['total'];
		}
		else {
			$this->mycart = array();
			$this->total = 0;
		}
	}

	public function destroy_cart()
	{
		unset($_SESSION['mycart']);
		unset($_SESSION['total']);
	}

	public function save()
	{
		$_SESSION['mycart'] = json_encode($this->mycart);
		$_SESSION['total'] = $this->total;
	}

	public function add($id, $qty)
	{
		if(array_key_exists($id, $this->mycart))
			$this->total += $qty - $this->mycart[$id];
		else 
			$this->total += $qty;
		
		if($qty == 0)
			unset($this->mycart[$id]);
		else
			$this->mycart[$id] = $qty;

		$this->save();
	}

	// private function generateCartItem($name, $brand, $image, $price, $qty, $gender, $category, $item)
	// {
	// 	echo '' .
 //            '<div class="row cart-container">' .
 //            '<div class="cart-item">' .
 //                '<div class="cart-img-container">'.
 //                    '<img src="/assets/images/products' . $image . '" />' .
 //                '</div>' .
 //                '<div class="cart-description">' .
 //                    '<span class="product-attr product-name">'. $name .'</span>' .
 //                    '<span class="product-attr product-brand">'. $brand .'</span>' .
 //                    '<span class="product-attr">$'. $price.toFixed(2) .'</span>' .
 //                    '<span class="product-attr">qty: ' . $qty . '</span>' .
 //                    '<button class="btn" onclick=cart.remove("' . $gender+'","'. $category .'","' .$item.'") >remove</button>' .
 //                '</div>' .
 //            '</div>' .
 //        '</div>';
	// }
	public function getContents()
	{
		$return_array = array();

		foreach($this->mycart as $key => $value) {
			$return_array[$key] = $value;
		}

		return $return_array;

	}

	public function getTotal()
	{
		return $this->total;
	}
}