<?php

class Cart
{
	public $items = array();
	public $subtotal = 0.0;
	public $totalQty = 0;
	public $total = 0.0;
	public $tax = 0.0;
	public $taxrate = 0.0;

	public function __construct()
	{
		if (isset($_COOKIE['items']) ) {
			$this->items = json_decode($_COOKIE['items'], true);
		}

		if (isset($_COOKIE['tax_rate'])) {
			$this->taxrate = $_COOKIE['tax_rate'];
		}

		$this->update();
	}

	public function destroy_cart()
	{
		unset($_COOKIE['items']);
		unset($_COOKIE['tax_rate']);
		$this->items = array();
		$this->totalQty = 0;
		$this->subtotal = 0.0;
		$this->total = 0.0;
		$this->tax = 0.0;

	}

	public function save()
	{
		$_COOKIE['items'] = json_encode($this->items);
		$_COOKIE['tax_rate'] = $this->taxrate;
	}

	public function add($id, $qty)
	{
		if (array_key_exists($id, $this->items)) {
			$this->items[$id]['qty'] += $qty;
		} else {
			$product = Products::find(array('id' => $id));
			$this->items[$id] = array(
				'id' => $id,
				'qty' => $qty,
				'price' => $product[0]->price,
			);
		}

		$this->update();
		$this->save();
	}

	public function remove($id)
	{
		$this->items[$id]['qty'] = 0;
		$this->update();
		$this->save();
	}

	public function setTaxRate($rate)
	{	
		$this->taxrate = $rate;
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
			if($item['qty'] == 0) {
				unset($this->items[$item['id']]);
				continue;
			}
			$this->totalQty += $item['qty'];
			$this->subtotal += ($item['qty'] * $item['price']);
		}

		$this->tax = $this->subtotal * $this->taxrate;
		$this->total = $this->tax + $this->subtotal;

	}

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
		return number_format($this->subtotal, 2, '.', '');
	}

	public function getQty()
	{
		return $this->totalQty;
	}

	public function getTotal()
	{
		return number_format($this->total, 2, '.', '');
	}

	public function getItems()
	{
		return $this->items;
	}

	public function getTax()
	{
		return number_format($this->tax, 2, '.', '');
	}

	public function getTaxRate()
	{
		return number_format($this->taxrate, 2, '.', '');
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

		foreach($products as $product) {
			$product->qty = $this->items[$product->id]['qty'];
		}

		return $products;
	}
}