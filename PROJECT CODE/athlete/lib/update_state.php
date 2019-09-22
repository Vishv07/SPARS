<?php
	require 'dao.php';
	require 'model.php';
	$d = new dao();
	$m = new model();
	extract($_POST);
	
		if(isset($_POST['btnupdate']))
		{
			$m->set_data("statename",$statename);
			$a = array('state_name'=>$m->get_data(test_input('statename')));
			$q = $d->update("state_master",$a,"state_id='$editID'");
		if ($q>0) 
		{
		echo "updated ";
		}
		else{
			echo "Something is wrong";
		}

	}	
	

?>
