<div class="row">
	<div id="productDisplay">
		<div class="big-image">
			<img id="bigpic" src="/assets/images/products<?php echo $obj->default_image;?>" alt="productImage" width="auto" height="auto">
		</div>
		<div class="big-image-body">
			<div>
				<?php
				foreach($obj->images as $image) {
					echo '<img onclick="imageswap(this)" src="/assets/images/products' . $image . '" alt="productImage" width="15%" height="auto">';
					
				}
				?>
			</div>
			<h3 class="product-name"><?php echo $obj->name; ?></h3>
			<p> by <span class="product-brand"><?php echo $obj->brand; ?></span></p>
			<br>
			<p class="product-name">Price</p>
			<p><?php echo $obj->price; ?></p>
			<br>
			<p class="product-name"> Color</p>
			<p></p>
			<p><?php echo $obj->color; ?></p>
			<br>
			<p class="product-name">Details</p>
			<?php
				foreach(explode(',', $obj->details) as $detail) {
					$detail = ucfirst(trim($detail));
					echo "<p> - " . $detail . "</p>";
				}
			?>
			<br>
			<input id="product-qty" class="mailinglist-input" type="number" name="product-qty" value="1">
			<button onclick="addItems('women','tops','en-elie-embroidered-sanna-top')">Add Items To Cart </button>
		</div>
	</div>

<!-- </div>"/assets/images/products/women/tops/embroideredSannaFront.jpg" -->