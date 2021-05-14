<?php 
	if(!isset($_SESSION['success'])) {
	    // echo "SESSION success IS NOT SET";
	} else {
	    // echo "SESSION success IS SET" . "<br>";

	    echo "<div class='success-box'>";
	    
	    	echo "<p class='success'>&#8226; ".$_SESSION['success'] .'</p>'."<br/>";
	   
	    echo "</div>";
	    unset($_SESSION['success']);
}
?>