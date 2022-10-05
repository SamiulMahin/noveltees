<?php

	// Defining Constants
	define( 'HOST', 'localhost' );
	define( 'DB', 'noveltees' );
	define( 'USER', 'root' );
	define( 'PASS', '
	VFraATgdRjlG' );

    $conn = mysqli_connect('localhost','root','','noveltees');
if(!$conn){
    echo mysqli_connect_error();
   
}
else{
 
}

?>