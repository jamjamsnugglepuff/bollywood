
function select_sessions_for_movies(date, movie){
	console.log(date);
	console.log(movie);
	cart = 0;
	session = null;
	document.getElementById('priceTag').innerHTML = cart;
	if(window.XMLHttpRequest){
					// code for modern browsers
					xhttp = new XMLHttpRequest();
				}else{
					// code for older browsers
					xhttp = new ActiveXObject('Microsoft.XMLHTTP');
				}
				// when xhttp is ready
				xhttp.onreadystatechange = function(){
					if(this.readyState == 4 && this.status == 200){
						// change inner html to response text of the xhttp object
						document.getElementById('sessionSelector').innerHTML = this.responseText;
					}
				};

				xhttp.open("GET", 'templates/resultDates.php?movieID='+movie+'&date='+date, true);
				xhttp.send();
}

function select_dates_for_movies(movieID){
		
				select_sessions_for_movies(document.getElementById('sessionTimeSelect').value, document.getElementById('movieID').value)
				if(window.XMLHttpRequest){
					// code for modern browsers
					xhttp = new XMLHttpRequest();
				}else{
					// code for older browsers
					xhttp = new ActiveXObject('Microsoft.XMLHTTP');
				}
				// when xhttp is ready
				xhttp.onreadystatechange = function(){
					if(this.readyState == 4 && this.status == 200){
						// change inner html to response text of the xhttp object
						document.getElementById('sessionTimeSelect').innerHTML = this.responseText;
					}
				};

				xhttp.open("GET", 'templates/results.php?movieID='+movieID, true);
				xhttp.send();
}
