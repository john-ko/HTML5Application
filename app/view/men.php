	<div class="row">
		<div class="sidebar">

			<a href="/index.php/men"> <h1 style="color: #5E9DC8">Men</h1> </a>
			<a href="/index.php/men/tops">
				<h4>Tops</h4>
			</a>
			<a href="/index.php/men/bottoms">
				<h4>Bottoms</h4>
			</a>
		</div>

		<?php

		$tops = array();
		$bottoms = array();

		foreach($obj as $product) {
			if($product->category === "tops") {
				array_push($tops, $product);
			} else {
				array_push($bottoms, $product);
			}
		}

		foreach($tops as $a_top) { ?>

		<div class="main-page">
			<a href="/index.php/<?php echo $a_top->gender; ?>/<?php echo $a_top->category; ?>/<?php echo $a_top->slug; ?>" >
				<img class="product-image" src="/assets/images/products<?php echo $a_top->default_image; ?>" alt="productImage" width="150" height="auto"/>
			</a>
			<p class="product-name"><?php echo $a_top->name; ?></p>
			<p class="product-brand"><?php echo $a_top->brand; ?></p>
			<p><?php echo $a_top->price; ?></p>
		</div>

		<?php
		}

		foreach($bottoms as $a_bottom) { ?>

		<div class="main-page">
			<a href="/index.php/<?php echo $a_bottom->gender; ?>/<?php echo $a_bottom->category; ?>/<?php echo $a_bottom->slug; ?>" >
				<img class="product-image" src="/assets/images/products<?php echo $a_bottom->default_image; ?>" alt="productImage" width="150" height="auto"/>
			</a>
			<p class="product-name"><?php echo $a_bottom->name; ?></p>
			<p class="product-brand"><?php echo $a_bottom->brand; ?></p>
			<p><?php echo $a_bottom->price; ?></p>
		</div>

		<?php } ?>

		</div>
	</div>

</div>
