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

						<div class="main-page">
							<a href="/<?php echo $product->gender; ?>/<?php echo $product->category; ?>/<?php echo $product->slug; ?>" >
								<img class="product-image" src="/assets/images/products<?php echo $product->default_image; ?>" alt="productImage" width="150" height="auto"/></a>
								<p class="product-name"><?php echo $product->name; ?></p>
								<p class="product-brand"><?php echo $product->brand; ?></p>
								<p><?php echo $product->price; ?></p>
							</div>

							<?php
						}
						
						?>
						
					</div>
				</div>

			</div>

