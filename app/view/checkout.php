<div class="row">
	<!--<form id="checkout-form" name="checkoutForm" method="post">-->
	<table id="checkout-table">
		<td>
			<h2>Shipping & Billing Address</h2>
			<div id="shippingAddress">
				First Name <input id="first-nameId" type="text" required /><br />
				Last Name <input id="last-nameId" type="text" required /><br />
				Street <input id="streetId" type="text" required /><br />
				City <input id="cityId" type="text" required /><br />
				State <select id="stateId" required>
					<option value="AL">Alabama</option>
					<option value="AK">Alaska</option>
					<option value="AZ">Arizona</option>
					<option value="AR">Arkansas</option>
					<option value="CA">California</option>
					<option value="CO">Colorado</option>
					<option value="CT">Connecticut</option>
					<option value="DE">Delaware</option>
					<option value="DC">District Of Columbia</option>
					<option value="FL">Florida</option>
					<option value="GA">Georgia</option>
					<option value="HI">Hawaii</option>
					<option value="ID">Idaho</option>
					<option value="IL">Illinois</option>
					<option value="IN">Indiana</option>
					<option value="IA">Iowa</option>
					<option value="KS">Kansas</option>
					<option value="KY">Kentucky</option>
					<option value="LA">Louisiana</option>
					<option value="ME">Maine</option>
					<option value="MD">Maryland</option>
					<option value="MA">Massachusetts</option>
					<option value="MI">Michigan</option>
					<option value="MN">Minnesota</option>
					<option value="MS">Mississippi</option>
					<option value="MO">Missouri</option>
					<option value="MT">Montana</option>
					<option value="NE">Nebraska</option>
					<option value="NV">Nevada</option>
					<option value="NH">New Hampshire</option>
					<option value="NJ">New Jersey</option>
					<option value="NM">New Mexico</option>
					<option value="NY">New York</option>
					<option value="NC">North Carolina</option>
					<option value="ND">North Dakota</option>
					<option value="OH">Ohio</option>
					<option value="OK">Oklahoma</option>
					<option value="OR">Oregon</option>
					<option value="PA">Pennsylvania</option>
					<option value="RI">Rhode Island</option>
					<option value="SC">South Carolina</option>
					<option value="SD">South Dakota</option>
					<option value="TN">Tennessee</option>
					<option value="TX">Texas</option>
					<option value="UT">Utah</option>
					<option value="VT">Vermont</option>
					<option value="VA">Virginia</option>
					<option value="WA">Washington</option>
					<option value="WV">West Virginia</option>
					<option value="WI">Wisconsin</option>
					<option value="WY">Wyoming</option>
				</select>
				Zip <input id="zipId" type="text" maxlength="5"required /><br />
				Phone (<input id="phone-area" type="text" value="" maxlength="3" required />) <input id="phone-first3" type="text" value="" maxlength="3" required /> - <input id="phone-last4" type="text" value="" maxlength="4" required /><br />
				Email <input id="emailId" type="email" required /><br />
			</div>
		</td>
		<td>
			<div id="creditCardInfo">
				<h2>Credit Card Information</h2>
				Name on Card <input id="nameOnCardId" type="text" required /><br />
				Card Number <input id="cardNumberId" type="text" maxlength="16" required /><br />
				Expiration Date <input id="expMonthId" type="text" value="" maxlength="2" required /> / <input id="expYearId" type="text" value="" maxlength="2" required /><br />
				CSV/CSC <input id="csvCscId" type="text" value="" maxlength="3" required /><br />
			</div>
		<td>
	</table>

	<div id="errors"></div>
	<div id="checkout-order-summary">
		<h2>Order Summary</h2>
		Shipping Method<select id="checkout-ship-method" required>
			<option value="Standard">Standard . . . Free</option>
			<option value="Priority">Priority . . . Free</option>
		</select>
		<p>Total Merchandise: <span id="checkout-qty"></span></p>
		<p>Shipping: $0.00</p>
		<p>Price Total: $<span id="checkout-price"></span></p>
		<button id="checkout-submit-button" class="big-btn" onclick="formValidation(theMailFunction, clearCheckout);">Purchase</button>
	</div>
	<!--</form>-->
</div>