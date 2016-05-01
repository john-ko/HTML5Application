<?php

class Cart
{
	public $items = array();
	public $subtotal = 0.0;
	public $totalQty = 0;

	public function __construct()
	{
		if(isset($_SESSION['items']) ) {
			$this->items = json_decode($_SESSION['items'], true);
		}

		$this->update();
	}

	public function destroy_cart()
	{
		unset($_SESSION['items']);
	}

	public function save()
	{
		$_SESSION['items'] = json_encode($this->items);
	}

	public function add($id, $qty, $price)
	{
		if (array_key_exists($id, $this->items)) {
			$this->items[$id]['qty'] += $qty;
		} else {
			$this->items[$id] = array(
				'id' => $id,
				'qty' => $qty,
				'price' => $price,
			);
		}

		$this->update();
		$this->save();
	}

	/**
	 * update
	 *
	 * updates totalPrice and totalQty by looping through cart contents
	 */
	public function update()
	{
		$this->subtotal = 0;
		$this->totalQty = 0;
		foreach($this->items as $item) {
			$this->subtotal += $item['qty'] * $item['price'];
			$this->totalQty += $item['qty'];
		}
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

		foreach($this->items as $key => $value) {
			$return_array[$key] = $value;
		}

		return $return_array;

	}

	public function getSubtotal()
	{
		return $this->subtotal;
	}

	public function getQty()
	{
		return $this->totalQty;
	}

	public function getItems()
	{
		return $this->items;
	}

	/**
	 * getItemsAsProductObjects
	 * to be used in the front end
	 * @return array of Products
	 */
	public function getItemsAsProductObjects()
	{
		$keys = array_keys($this->items);

		$products = Products::find($keys);

		return $products;
	}
}