


<div class="row">
	<h1>Order Confirmation</h1>
	<h2>here are your order details</h2>
</div>

<?php
foreach($obj as $product) { ?>
<div class="row cart-container" id="<?php echo $product->id ?>">
	<div class="cart-item">
		<div class="cart-img-container">
			<img src="/assets/images/products<?php echo $product->default_image;?>" />
		</div>
		<div class="cart-description">
			<span class="product-attr product-name"><?php echo $product->name; ?></span>
			<span class="product-attr product-brand"><?php echo $product->brand;?></span>
			<span class="product-attr">$<?php echo $product->price;?></span>
			<span class="product-attr">qty: <?php echo $product->qty; ?></span>
		</div>
	</div>
</div>
<?php } ?>
<div class="row">
	<p id="subtotal">Subtotal: $<?php echo $this->cart->getTotal(); ?> </p>
	<p>Tax: $ (<?php echo $this->cart->getTaxRate(); ?>) <?php echo $this->cart->getTax(); ?></p>
	<p><h2>Total: <?php echo $this->cart->total;?></h2></p>

	<h1>Thanks for Shopping!</h1>
</div>

<?php
$this->cart->destroy_cart();?>

