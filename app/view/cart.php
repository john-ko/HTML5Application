


<?php

if ($obj) {
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
				<button class="btn" onclick="removeItems('<?php echo $product->id ?>')">remove</button>
			</div>
		</div>
	</div>
	<?php } ?>
<div>
	<p style="padding-left:45px">*Estimated Tax: $0.00</p>
	<p style="padding-left:45px; padding-bottom:10px">Subtotal: $<?php echo number_format($this->cart->total, 2, '.', '') ?> </p>
<div class="row">
	<button class="big-btn" id="checkout-button" onclick="window.location.href='/index.php/checkout'" >Checkout</button>
</div>
<div>
	<p style="padding-left:45px; padding-top: 80px">*Tax calculated at checkout.</p>

<?php } else {
	?>

	<h1 class="cart-empty"> Your cart seems sad :( </h1>
<?php
}?>