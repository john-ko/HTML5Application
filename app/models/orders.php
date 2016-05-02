<?php

class Orders extends Model
{
	protected static $table = 'orders';

	protected $_attributes = array(
		'id' => null,
		'customer_id' => null,
		'subtotal' => null,
		'tax' => null,
		'total' => null,
		'shipping' => null,
	);

	public function __construct()
	{
		parent::__construct();
	}

	public function save()
	{
		parent::save();
	}

	public static function place(Customer $customer, Cart $cart)
	{
		// none of this works, but this is what I intend to happen
		$order = new Orders();
		$customer->save();
		$order->customer_id = $customer->getLastInsertID();

		var_dump($cart->getTax());
		$order->tax = $cart->getTax();
		$order->subtotal = $cart->getSubTotal();
		$order->total = $cart->getTotal();

		$order->save();

		$order_id = $order->getLastInsertID();
		
		// loop through cart items and save items
		foreach($cart->getItems() as $product) {
			$product_orders = new Product_Orders();
			$product_orders->product_id = $product['id'];
			$product_orders->qty = $product['qty'];
			$product_orders->order_id = $order_id;
			$product_orders->save();
		}
	}
}