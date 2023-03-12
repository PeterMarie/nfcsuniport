<?php
		$connection= mysqli_connect("localhost","root","");
		
		//check_connect($connection);
		
		// 2. Select a database to use 
		$db_select= mysqli_select_db($connection, "nfcsuniport");
		//check_connect($connection);
        
	/* Plesk db
	$connection= mysqli_connect("50.62.209.38","petermarie2","4wesomE!ReTep");
		
	//check_connect($connection);
	
	// 2. Select a database to use 
	$db_select= mysqli_select_db($connection, "nfcsuniport");
	//check_connect($connection);
	*/

?>