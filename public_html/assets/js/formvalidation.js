
/**
 * formvalidation
 * lori ipsulm
 *
 * Usages: 
 */
 
function isNumeric(n) {
	return !isNaN(parseFloat(n)) && isFinite(n);
}
	
function formvalidation() {
	var firstname = document.getElementById("first-nameId");
	var lastname = document.getElementById("last-nameId");
	var street = document.getElementById("streetId");
	var city = document.getElementById("cityId");
	var state = document.getElementById("stateId");
	var zip = document.getElementById("zipId");
	var area = document.getElementById("phone-area");
	var three = document.getElementById("phone-first3");
	var four = document.getElementById("phone-last4");
	var email = document.getElementById("emailId");
	
	var name = document.getElementById("nameOnCardId");
	var number = document.getElementById("cardNumberId");
	var month = document.getElementById("expMonthId");
	var year = document.getElementById("expYearId");
	var cvc = document.getElementById("csvCscId");
	
	var triggered = 0;
	
	if (firstname.value.length < 1 || isNumeric(firstname.value)) {
		firstname.style.borderColor = "red";
		triggered++;
	} else {
		firstname.style.borderColor = "";
	}
	
	if (lastname.value.length < 1 || isNumeric(lastname.value)) {
		lastname.style.borderColor = "red";
		triggered++;
	} else {
		lastname.style.borderColor = "";
	}
	
	if (street.value.length < 4) {
		street.style.borderColor = "red";
		triggered++;
	} else {
		street.style.borderColor = "";
	}
	
	if (isNumeric(city.value)) {
		city.style.borderColor = "red";
		triggered++;
	} else {
		city.style.borderColor = "";
	}
	
	if (state.value.length != 2) {
		state.style.borderColor = "red";
		triggered++;
	} else {
		state.style.borderColor = "";
	}
	
	if (zip.value.length != 5 || !isNumeric(zip.value)) {
		zip.style.borderColor = "red";
		triggered++;
	} else {
		zip.style.borderColor = "";
	}
	
	if (area.value.length != 3 || !isNumeric(area.value)) {
		area.style.borderColor = "red";
		triggered++;
	} else {
		area.style.borderColor = "";
	}
	
	if (three.value.length != 3 || !isNumeric(three.value)) {
		three.style.borderColor = "red";
		triggered++;
	} else {
		three.style.borderColor = "";
	}
	
	if (four.value.length != 4 || !isNumeric(four.value)) {
		four.style.borderColor = "red";
		triggered++;
	} else {
		four.style.borderColor = "";
	}

	if(!/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email)) {
		email.style.borderColor = "red";
		triggered++;
	} else {
		email.style.borderColor = "";
	}
	
	if (name.value.length < 2) {
		name.style.borderColor = "red";
		triggered++;
	} else {
		name.style.borderColor = "";
	}
	
	if (number.value.length != 16) {
		number.style.borderColor = "red";
		triggered++;
	} else {
		number.style.borderColor = "";
	}
	
	if (!isNumeric(month.value) || !(month.value >= 1 && month.value <= 12)) {
		month.style.borderColor = "red";
		triggered++;
	} else {
		month.style.borderColor = "";
	}
	
	if (!isNumeric(year.value) || year.value < 16) {
		year.style.borderColor = "red";
		triggered++;
	} else {
		year.style.borderColor = "";
	}

	if (cvc.value.length != 3 || !isNumeric(cvc.value)) {
		cvc.style.borderColor = "red";
		triggered++;
	} else {
		cvc.style.borderColor = "";
	}
	
	if (triggered > 0) {
		return false;
	}
}
