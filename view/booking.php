<?php session_start(); ?>
<?php $pageName = "Booking" ?>
<?php include('templates/header.php'); ?>
<?php include_once('../controller/form_controller.php'); ?>
<script >
	
	let cart = 0;
	let session;
</script>
<script src="../lib/sessions.js"></script>
		<div class="container">
			<form id="form" class="form" action="../controller/booking_processor.php" method="POST">
				<?php include('templates/errorbox.php'); ?>
				<?php include('templates/success.php'); ?>
				<h2>Booking</h2>
				<div class="field">
					<h3>Contact Details</h3>
					<label class="field__label">First Name:</label>
					<span class="field__span field__span--required"><small><small>Required * </small></small></span>
					<input class="field__input text" type="text" name="firstName" maxlength="32"><br>
					<label class="field__label">Last Name:</label>
					<span class="field__span field__span--required"><small><small>Required * </small></small></span>
					<input class="field__input text" type="text" name="lastName" maxlength="32"><br>
					<label class="field__label ">Email Address:</label>
					<span class="field__span field__span--required"><small><small>Required * </small></small></span>
					<input class="field__input email" type="email" name="emailAddress" maxlength="128"><br>
					<label class="field__label">Contact Number:</label>
					<span class="field__span field__span--required"><small><small>Required * </small></small></span>
					<input class="field__input contact-number" type="text" name="contactNumber" maxlength="10"><br>
				</div>
				<div class="field" id="sessions">
					<label>Pick a Movie</label>
						<select id="movieID" onchange="select_dates_for_movies(this.value)">
							<?php
							// print out all movies
							$movies = select_active_movies() ;
								foreach ($movies as $movie) {
									echo '<option data-price="50" value='.$movie['movieID'].'>'.$movie['title'].'</option>';
								}
							?>
						</select><br>
					<label>Pick a session</label>
					<select id="sessionTimeSelect" onclick="select_sessions_for_movies(this.value, document.getElementById('movieID').value)"></select><br>
					
					<div id="sessionSelector" class="display--items">
						
					</div>

					<script >
						function calculateTotal(item){
							document.querySelectorAll('input[type=checkbox]').checked=false;
							cart = 50;
							document.getElementById('priceTag').innerHTML = cart;
							session = item.value;
						}

					</script>


				</div>			
				<div class="field">
					<h3>Payment Method</h3>
					<label class="field__label">Card Name:</label>
					<span class="field__span field__span--required"><small><small>Required * </small></small></span>
					<input class="field__input" type="text" name="cardName" maxlength="128"><br>
					<label class="field__label">Card Number:</label>
					<span class="field__span field__span--required"><small><small>Required * </small></small></span>
					<input class="field__input" type="text" name="cardNumber" maxlength="16" onkeyup="this.value=this.value.replace(/[^\d]/,'')"><br>
					<label class="field__label">Expiry Date:</label>
					<label class="field__label"><small>MM</small></label>
					<select>
						<?php
							for($i = 1; $i <= 12; $i++){
								echo "<option value=".$i.">$i</option>";
							}
						?>
					</select>
					<label class="field__label"><small>YYYY</small></label>
					<select>
						<?php
							for($i = 2020; $i <= 2080; $i++){
								echo "<option value=".$i.">$i</option>";
							}
						?>
					</select><br><br>
					<label class="field__label"><small>CVV</small></label><input class="field__input--cvv cvv" type="text" name="cardCVV" maxlength="4" onkeyup="this.value=this.value.replace(/[^\d]/,'')"> 
					<span class="field__span field__span--required"><small><small>Required * </small></small></span>
					<br>
				</div>

					<div class="bcontainer">
						<label>Price: $<span id="priceTag">0.00</span></label>
						<button id="bckBtn" type="button" onclick="nextPrevious(-1)" class="bcontainer__btn">Back</button>
						<button id="nxtBtn" type="button" onclick="nextPrevious(1)" class="bcontainer__btn">Next</button>
					</div>	

				
			</form>
		</div>
		<script src="../lib/booking-form-controller.js"></script>
	<?php include('templates/footer.php'); ?>
	