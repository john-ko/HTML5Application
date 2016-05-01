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

					$tops = array();
					$bottoms = array();
					$dresses = array();
					
					foreach($obj as $product) {
						if($product->category === "tops") {
							array_push($tops, $product);
						} elseif($product->category === "bottoms") {
							array_push($bottoms, $product);
						} else {
							array_push($dresses, $product);
						}
					}
					
					foreach($tops as $a_top) {
						
						?>

						<div class="main-page">
							<a href="/<?php echo $a_top->gender; ?>/<?php echo $a_top->category; ?>/<?php echo $a_top->slug; ?>" >
								<img class="product-image" src="/assets/images/products<?php echo $a_top->default_image; ?>" alt="productImage" width="150" height="auto"/></a>
								<p class="product-name"><?php echo $a_top->name; ?></p>
								<p class="product-brand"><?php echo $a_top->brand; ?></p>
								<p><?php echo $a_top->price; ?></p>
							</div>

							<?php
						}
						
						foreach($bottoms as $a_bottom) {
							
							?>

							<div class="main-page">
								<a href="/<?php echo $a_bottom->gender; ?>/<?php echo $a_bottom->category; ?>/<?php echo $a_bottom->slug; ?>" >
									<img class="product-image" src="/assets/images/products<?php echo $a_bottom->default_image; ?>" alt="productImage" width="150" height="auto"/></a>
									<p class="product-name"><?php echo $a_bottom->name; ?></p>
									<p class="product-brand"><?php echo $a_bottom->brand; ?></p>
									<p><?php echo $a_bottom->price; ?></p>
								</div>

								<?php
							}
							
							foreach($dresses as $a_dress) {
								
								?>

								<div class="main-page">
									<a href="/<?php echo $a_dress->gender; ?>/<?php echo $a_dress->category; ?>/<?php echo $a_dress->slug; ?>" >
										<img class="product-image" src="/assets/images/products<?php echo $a_dress->default_image; ?>" alt="productImage" width="150" height="auto"/></a>
										<p class="product-name"><?php echo $a_dress->name; ?></p>
										<p class="product-brand"><?php echo $a_dress->brand; ?></p>
										<p><?php echo $a_dress->price; ?></p>
									</div>

									<?php
								}
								
								?>

							</div>
						</div>

					</div>