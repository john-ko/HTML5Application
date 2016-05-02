<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
	<link href='https://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:200' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="/assets/css/style.css">
	<script src="/assets/js/formvalidation.js"></script>
	<script src="/assets/js/calculateTax.js"></script>
	<script src="/assets/js/addToCart.js"></script>
	<script src="/assets/js/imageswap.js"></script>
	<script src="/assets/js/removeFromCart.js"></script>

	<title>T H O R N E & S P I N D L E | Main Index </title>
	<script>
	function getResults(theInput) {
	if (theInput.length < 3) {
		document.getElementById("searchResults").innerHTML="";
		document.getElementById("searchResults").style.border="0px";
		return;
	}
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} 
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("searchResults").innerHTML=xmlhttp.responseText;
			//document.getElementById("searchResults").style.border="1px solid #A5ACB2";
		}
	};
	xmlhttp.open("GET","/index.php/search/" +theInput,true);
	xmlhttp.send();
}

</script>

</head>
<body>


	<header>
		<div class="header">
			<h1 class="header-logo-text"> <a href="/index.php"> T H O R N E & S P I N D L E </a> </h1>
			<nav class = "navigationBar">
				<ul class="headernav">
					<li class="navItem"><a href="/index.php/women">Women</a></li>
					<li class="navItem"><a href="/index.php/men">Men</a></li>
					<li class="navItem"><a href="/index.php/about">About</a></li>
					<li class="navItem"><a href="/index.php/contact">Contact</a></li>
					<li class="navItem" id="cartimage">
						<a class="cart-icon" href="/index.php/cart">
							<img src = "/assets/images/thecarticon.png" alt="cart icon" /><span id="cart-qty">
								(<?php echo $this->cart->getQty(); ?>)
							</span>
						</a>
					</li>
				</ul>
				<form>
					<input type="text" id="searchBar" placeholder="Search products" onFocus="this.placeholder=''" onkeyup="getResults(this.value)">
					<img src="/assets/images/searchicon.png" alt="search icon" />
					<div id = searchContainer>
						<div id="searchResults"></div>
					</div>
				</form>
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
					<div><a href="/index.php/women">Women</a></div>
					<div><a href="/index.php/men">Men</a></div>
					<div><a href="/index.php/cart">View Cart</a></div>
				</div>
				<div class="third">
					<h3 class="footer-header">Company Info</h3>
					<div><a href="/index.php/about">About Us</a></div>
					<div><a href="/index.php/contact">Contact Us</a></div>
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