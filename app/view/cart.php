


<?php

if ($obj) {
	foreach($obj as $product) { ?>
	<div class="row cart-container">
		<div class="cart-item">
			<div class="cart-img-container">
				<img src="/assets/images/products<?php echo $product->default_image;?>" />
			</div>
			<div class="cart-description">
				<span class="product-attr product-name"><?php echo $product->name; ?></span>
				<span class="product-attr product-brand"><?php echo $product->brand;?></span>
				<span class="product-attr">$<?php echo $product->price;?></span>
				<span class="product-attr">qty: <?php echo $product->qty; ?></span>
				<button class="btn" >remove</button>
			</div>
		</div>
	</div>
	<?php } ?>
<div class="row">
	<button class="big-btn" id="checkout-button" onclick="window.location.href='/checkout'" >Checkout</button>
</div>

<?php } else {
	?>

	<h1 class="cart-empty"> Your cart seems sad :( </h1>
<?php
}?>