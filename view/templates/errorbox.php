<?php 
	if(!isset($_SESSION['errors'])) {
	    // echo "SESSION ERRORS IS NOT SET";
	} else {
	    // echo "SESSION ERRORS IS SET" . "<br>";

	    echo "<div class='error-box'>";
	    foreach ($_SESSION['errors'] as $key => $value) {
	    	echo "<p class='error'>&#8226; ".$value .'</p>'."<br/>";
	    }
	    echo "</div>";
	    unset($_SESSION['errors']);
}
?>