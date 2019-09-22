<?php

	class dbconnect
	{
		function connect()
		{
			$connection = mysqli_connect("localhost","root","","spars");
			return $connection;
		}
	}

?>