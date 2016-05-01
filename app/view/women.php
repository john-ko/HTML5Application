<!-- <pre>
	<?php var_dump($obj); ?> -->

	<div class="row">

		<div class="sidebar">
			
			<a href="/index.php/women"> <h1 style="color: #5E9DC8">Women</h1> </a>
			<a href="/index.php/women/tops">
				<h4>Tops</h4> </a>
				<a href="/index.php/women/bottoms">
					<h4>Bottoms</h4> </a>
					<a href="/index.php/women/dresses">
						<h4>Dresses</h4> </a>
					</div>
					<?php

					foreach($obj as $product) {

						?>

						<img id="bigpic" src="/assets/images/products<?php echo $product->default_image; ?>" alt="productImage" width="auto" height="auto">

						<p class="product-name"><?php echo $product->name; ?></p>
						<p class="product-brand"><?php echo $product->brand; ?></p>
						<p><?php echo $product->price; ?></p>


						<?php
					}
					?>
				</div>

			</div>
