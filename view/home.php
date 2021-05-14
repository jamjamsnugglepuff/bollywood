<?php session_start(); ?>
<?php $pageName = "Home" ?>
<?php include('templates/header.php'); ?>
<div class="container">
	<div class="container--centered">
		<h1>Now Showing</h1>
		<ul class="movie--list">
			<li><div class="movie--container"><img alt="cover" src="../resources/imgs/guilty/cover.jpg"></div></li>
			<li><div class="movie--container"><img alt="cover" src="../resources/imgs/panga/cover.jpg"></div></li>
			<li><div class="movie--container"><img alt="cover" src="../resources/imgs/raat_akeli_hai/cover.jpg"></div></li>
			<li><div class="movie--container"><img alt="cover" src="../resources/imgs/sadak_2/cover.jpg"></div></li>
		</ul>
	</div>
	<div class="container--centered">
		<h1>Welcome To Bollywood!</h1>
		<h2>Bollywood Movies</h2>
		<h4>The newest films for all too see</h4>
	</div>
	<div class="container--form">
	<form class="form">
		<h4>Contact Us</h4><br>
		<div class="field"></div>
		<label class="field__label">First Name: <br><input class="field__input" type="text" name="firstName"></label><br>
		<label class="field__label">Last Name: <br><input class="field__input" type="text" name="lastName"></label><br>
		<label class="field__label">Email Address:<br> <input class="field__input" type="email" name="emailAddress"></label><br>
		<label class="field__label">Provide some info:<br> <textarea class="field__text-area"></textarea></label>
		<div>
			<input type="submit" name="submit" value="Send">
		</div>
	</form>
</div>
</div>
<?php include('templates/footer.php'); ?>
