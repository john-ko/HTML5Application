
function removeItems(id) {

	var currentElement = document.getElementById(id);

	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			console.log(xhr.responseText);
			var cartElement = document.getElementById('cart-qty');
			cartElement.innerHTML = "(" + xhr.responseText + ")";
		}
	};

	xhr.open('GET', '/index.php/removefromcart/' + id, true);
	xhr.send();
}
