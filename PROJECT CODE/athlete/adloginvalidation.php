<?php 
require "abc.php";
error_reporting(~E_NOTICE);
session_start();

if (!isset($_SESSION['logged'])) {
header("location:../spars/login.php");
exit();
}	/*else {
	if ($_SESSION['type']=="Admin") {}
		else {
			$type = $_SESSION['type'];
			if ($type = "VRP") {
				$type = "VehicleRentalProvider";
			}
			header("location:../$type");
		}
	}*/

 ?>	