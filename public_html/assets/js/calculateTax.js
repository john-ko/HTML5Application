/**
 * Created by john on 5/1/16.
 */

function calculateTax(zipcode) {

	if (zipcode.length < 5) {
		return;
	}

	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			console.log(xhr.responseText);

		}
	};

	xhr.open('GET', '/index.php/calculatetax/' + zipcode, true);
	xhr.send();
}