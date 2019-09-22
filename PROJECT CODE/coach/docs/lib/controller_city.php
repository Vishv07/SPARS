
<?php
session_start();
require ("dbconnect.php");

require 'dao.php';

require 'model.php';

require 'validation.php';

$d = new dao();
$m = new model();
$v = new Validation();

if(isset($_GET['id']))
	{
		extract($_GET);
		$q = $d->delete("city_master","city_id='$_GET[id]'");
		if($q>0)
		{
			/*$_SESSION['msg'] = "data deleted.";*/
			header("location:../view_city.php");
			exit();
		}
		else
		{
			/*$_SESSION['msg'] = "data not deleted.";*/
			header("location:../view_city.php");
						exit();

		} 
	}
extract($_POST);
$counter = 0;
 if($v->onlychar($city)){
       $counter++;
   }
   else{
     $_SESSION['cityerr'] = "only Charcter!!";
   if (isset($_POST['btnupdate']))
		{
		header("location:../edit_city.php?id=$editID");
		exit();
		}
	  else
		{
		header("location:../cityadd.php");
		exit();
		}
	}
   
   
if($v->duplicationcheck2("city_master","city_name='$city'"))
{
	$counter++;
}
else{
	$_SESSION['exist'] = "already exist!!";
	if (isset($_POST['btnupdate']))
		{
		header("location:../edit_city.php?id=$editID");
		exit();
		}
	  else
		{
		header("location:../cityadd.php");
		exit();
		}
	}
   
   


    if($State!=0){
       $counter++;
   }
   else{
     $_SESSION['stateerr'] = "please Select State";
     
   
   }



if ($counter == 3)
	{
	
	if (isset($_POST) && !empty($_POST)){
		if(isset($_POST['Insert'])){
			$m->set_data("State",$State);
			$m->set_data("city",$city);

			$a = array('state_id'=>$m->get_data(test_input('State')),
				'city_name'=>$m->get_data(test_input('city')),
			);
			$q = $d->insert("city_master",$a);
			if ($q>0) {
			//echo "data is inserted";
			header("Location:../view_city.php");		
			
			}
			else{
				echo "Something is wrong";
			}
		}


		if(isset($_POST['btnupdate'])){

			$m->set_data("State",$State);
			$m->set_data("city",$city);
			$a = array('state_id'=>$m->get_data(test_input('State')),
				'city_name'=>$m->get_data(test_input('city')),
			);
			$q = $d->update("city_master",$a,"city_id='$editID'");

			if ($q>0) 
			{
				header("Location:../view_city.php");
			}
			else{
				echo "Something is wrong";
			}

		}	
	
}
	}
  else
	{
	if (isset($_POST['btnupdate']))
		{
		header("location:../edit_city.php?id=$editID");
		exit();
		}
	  else
		{
		header("location:../cityadd.php");
		exit();
		}
	}


?>


  

 
