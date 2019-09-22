<?php
session_start();

require("dbconnect.php");	
require 'dao.php';
require 'model.php';
require 'validation.php';
$d = new dao();
$m = new model();
$v=new validation();
if(isset($_GET['id']))
{
	extract($_GET);
	$q = $d->delete("state_master","state_id='$_GET[id]'");
	
	if($q>0)
	{
		/*$_SESSION['msg'] = "data deleted.";*/
		header("location:../view_state.php");
		exit();
	}
	else
	{
		/*$_SESSION['msg'] = "data not deleted.";*/
		header("location:../view_state.php");
		exit();
	} 
}
extract($_POST);
$counter = 0;
$statename=trim($statename);
if($v->onlychar($statename)){
	$counter++;
	}
else{
	
	$_SESSION['nameError'] = "only Charcter!!";
if(isset($_POST['btnupdate']))
		{
	header("location:../edit_state.php?id=$editID");
		exit();
}
else{
		header("location:../stateadd.php");
		exit();

}
	
}	
if($v->duplicationcheck2("state_master","state_name='$statename'"))
{
	$counter++;
}
else{
	$_SESSION['exist'] = "already exist!!";
	 if(isset($_POST['btnupdate']))
		{
	header("location:../edit_state.php?id=$editID");
		exit();
}
else{
		header("location:../stateadd.php");
		exit();

}

}

if($counter==2)
{
	
	if (isset($_POST) && !empty($_POST)){
		if(isset($_POST['add'])){
			$m->set_data("statename",$statename);
			
			$a = array('state_name'=>$m->get_data(test_input('statename')));
			
			$q = $d->insert("state_master",$a);
			if ($q>0) {
			//echo "data is inserted";
			//header("Location:view.php");		
				echo "inserted ";
			}
			else{
				echo "Something is wrong";
			}
		}

	}

if(isset($_POST['btnupdate'])){
	
	$m->set_data("statename",$statename);
	$a = array('state_name'=>$m->get_data(test_input('statename')));
	$q = $d->update("state_master",$a,"state_id='$editID'");
	
	if ($q>0) 
	{
		header("location:../view_state.php");
	}
	else{
		echo "Something is wrong";
	}

}	
}
else
{
	if(isset($_POST['btnupdate']))
		{
	header("location:../edit_state.php?id=$editID");
		exit();
}
else{
		header("location:../stateadd.php");
		exit();

}


}


?>
