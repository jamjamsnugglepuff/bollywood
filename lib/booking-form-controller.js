
// console.log(y[i]);


// true: XXX@gmail.com FALSE: saxs@dsd
function emailIsValid (email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
}

function stringAlphaOnly(string){
	return /[0-9]/gi.test(string);
}

function stringNumericOnly(string){
	return /[a-z]/gi.test(string);
}





// current tab
var current = 0;
// display the tab
let displayTab = (n) =>{
	let x = document.getElementsByClassName('field');
	let prev = document.getElementById('bckBtn');
	let next = document.getElementById('nxtBtn');
	x[n].style.display = 'block';
	// fix next back buttons
	n == 0 ? prev.disabled = true : prev.disabled = false;

	if (n == x.length - 1 ){
		next.innerHTML = "Submit";
	}else{
		next.innerHTML = "Next";
	}
}


let nextPrevious = (n) =>{
	// get tabs
	let x = document.getElementsByClassName('field');
	// exit if tab is invalid
	if(n == 1 && !validateForm()) return false;
	// hide current tab
	x[current].style.display = 'none';

	current += n;

	if(current >= x.length){
		// submit form
		document.getElementById('form').submit();
		return false;
	}
	// otherwise show tab
	displayTab(current);
}

let validateForm = () =>{
	// validation forms of the field
	let x, y, i, valid = true;
		x = document.getElementsByClassName('field');
		y = x[current].getElementsByTagName('input');
		let z = document.getElementsByClassName('field__span--required');
		// loop through fields in current tab
		if(x[current].getAttribute('id') == "sessions"){

				let sessions = document.getElementsByName('sessionID');
				valid = false;
				document.getElementById('sessionSelector').classList.add('invalid');
				 
				let i;

				for(i = 0; i < sessions.length ; i ++ ){
					if (sessions[i].checked == true) valid = true;
					document.getElementById('sessionSelector').classList.add('valid');
					y[i].classList.remove('invalid');
					 
				}
				
		}

		for(let i = 0; i < y.length; i++){
			// if field is empty

			 if(y[i].value == ""){
				y[i].className += ' invalid';
				z[i].style.display = "inline-block";
				valid = false;
			}else if(y[i].classList.contains('email')){
				


				if(!emailIsValid(y[i].value)){
					y[i].classList.remove('valid');
					y[i].classList.add('invalid');
					valid = false;
					z[i].style.display = "inline-block";
				}else{
					z[i].style.display = "none";
					y[i].classList.remove('invalid');
					y[i].classList.add('valid');
				}
				
			}else if(y[i].classList.contains('text')){
				if(stringAlphaOnly(y[i].value)){
					y[i].classList.remove('valid');
					z[i].style.display = "inline-block";
					y[i].className += " invalid";
					valid = false;
				}else{
					z[i].style.display = "none";
					y[i].classList.remove('invalid');
					y[i].classList.add('valid');
				}
			}else if(y[i].classList.contains('contact-number')){
				if(stringNumericOnly(y[i].value)){
					z[i].style.display = "inline-block";
					y[i].classList.remove('valid');
					y[i].className += " invalid";
					valid = false;
				}else{
					z[i].style.display = "none";
					y[i].classList.remove('invalid');
					y[i].classList.add('valid');
				}
			}else if(y[i].classList.contains('cvv')){
				if(stringNumericOnly(y[i].value)){
					z[i].style.display = "inline-block";
					y[i].classList.remove('valid');
					y[i].className += " invalid";
					valid = false;
				}else{
					z[i].style.display = "none";
					y[i].classList.remove('invalid');
					y[i].classList.add('valid');
				}
			}
		}
		// IF VALID MARK AS TRUE AND VALID;
		if(valid){
			document.getElementsByClassName('field')[current].className += " finish"
		}

		return valid;
}


let fixStepInidicator = (n) =>{
	let i, x = document.getElementsByClassName('field');
	for(i = 0; i < x.length ; i++){
		x[i].className = x[i].className.replace(" active", "");
	}

	x[n].className += " active";
}

displayTab(current);
