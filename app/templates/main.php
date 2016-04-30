<h1> hello world!M</h1>

<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link href='https://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<script src="/assets/js/templates.js"></script>
	<script src="/assets/js/cart.js"></script>
	<script src="/assets/js/products.js"></script>

	<title>T H O R N E & S P I N D L E | Main Index </title>

</head>
<body>


	<header>
		<div class="header">
			<h1 class="header-logo-text"> <a href="/"> T H O R N E & S P I N D L E </a> </h1>
			<nav class = "navigationBar">
				<ul class="headernav">
					<li class="navItem"><a href="/women">Women</a></li>
					<li class="navItem"><a href="/men">Men</a></li>
					<li class="navItem"><a href="/about">About</a></li>
					<li class="navItem"><a href="/contact">Contact</a></li>
					<li class="navItem" id="cartimage">
						<a class="cart-icon" href="/cart">
							<img src = "/assets/images/thecarticon.png" alt="cart icon" /><span id="cart-qty"></span>
						</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>

	<?php
	echo $_contents;
	?>

	<footer>
		<div class="footer" style="margin-top:75px">
			<div class="row">
				<div class="third">
					<h3 class="footer-header">Site Map</h3>
					<div><a href="/women">Women</a></div>
					<div><a href="/men">Men</a></div>
					<div><a href="/cart">View Cart</a></div>
				</div>
				<div class="third">
					<h3 class="footer-header">Company Info</h3>
					<div><a href="/about">About Us</a></div>
					<div><a href="/contact">Contact Us</a></div>
					<br>
					Join our mailing list!<br>
					<input class="mailinglist-input" type="text" name="do" />
					<button type="button" class="mailinglist-subscribe-button">Subscribe</button>
					
				</div>
				<div class="third">
					<h3 class="footer-header">Connect</h3>
					<div>
						<a href="https://twitter.com/justinbieber">
							<img src="/assets/images/twitter.png" width="20" height="auto"/>     Twitter
						</a>
					</div>
					<div>
						<a href="https://www.facebook.com/zuck">
							<img src="/assets/images/facebook.png" width="20" height="auto"/> Facebook
						</a>
					</div>
					<div>
						<a href="https://www.instagram.com/kang_gary8888/">
							<img src="/assets/images/instagram.png" width="20" height="auto"/> Instagram
						</a>
					</div>
				</div>
			</div>
			<p class="copyright">Copyright  2016 - TNS. All Rights Reserved</p>

		</div>
	</footer>

</body>
</html>