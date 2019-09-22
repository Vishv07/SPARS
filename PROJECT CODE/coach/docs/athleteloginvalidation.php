<?php 
require "abc.php";
error_reporting(~E_NOTICE);
session_start();

if (!isset($_SESSION['logged']) or $_SESSION['role_coach']!='coach') {
header("location:../../project/template/spars/login.php");
exit();
}	/*else {
	if ($_SESSION['type']=="Admin") {}
		else {
			$type = $_SESSION['type'];
			if ($type = "VRP") {
				$type = "VehicleRentalProvider";
			
						header("location:../$type");
		}
	}*/

 ?>	
 