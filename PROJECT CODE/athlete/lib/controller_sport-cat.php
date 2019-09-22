
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
		$q = $d->delete("sport_category","sc_id='$_GET[id]'");
		if($q>0)
		{
			/*$_SESSION['msg'] = "data deleted.";*/
			header("location:../view_sport-cat.php");
			exit();
		}
		else
		{
			/*$_SESSION['msg'] = "data not deleted.";*/
			header("location:../view_sport-ca.php");
						exit();

		} 
	}
extract($_POST);
$counter = 0;

if($sport!=0){
	$counter++;
}
else{
	$_SESSION['sporterr'] = "please Select Sport";


}
if (strlen($sc) > 0 && strlen(trim($sc)) == 0)
{
	$_SESSION['caterr'] = "no white space";

	  if (isset($_POST['btnupdate']))
		{
	header("location:../edit_sport-cat.php?id=$editID");
		exit();
		}
	  else
		{
		header("location:../sport-cat.php");

		exit();
		}

}

if($v->numchar($sc))
{
	$counter++;
}
else{
	$_SESSION['caterr'] = "only Charcter!!";

	  if (isset($_POST['btnupdate']))
		{
	header("location:../edit_sport-cat.php?id=$editID");
		exit();
		}
	  else
		{
		header("location:../sport-cat.php");

		exit();
		}
	}




if($v->duplicationcheck2("sport_category","cat_name='$sc'"))
{
	$counter++;
}
else{

	$_SESSION['exist'] = "already exist!!";
	 if (isset($_POST['btnupdate']))
		{
	header("location:../edit_sport-cat.php?id=$editID");
		exit();
		}
	  else
		{
		header("location:../sport-cat.php");

		exit();
		}
	}


if ($counter == 3)
	{
	
	if (isset($_POST) && !empty($_POST)){
		if(isset($_POST['Insert'])){
			$m->set_data("sport",$sport);
			$m->set_data("sc",$sc);

			$a = array('s_id'=>$m->get_data(test_input('sport')),
				'cat_name'=>$m->get_data(test_input('sc')),
			);
			$q = $d->insert("sport_category",$a);
			if ($q>0) {
			//echo "data is inserted";
			//header("Location:view.php");		
				echo "Inserted ";
			}
			else{
				echo "Something is wrong";
			}
		}


	if(isset($_POST['btnupdate'])){

		$m->set_data("sport",$sport);
		$m->set_data("sc",$sc);
		
		$a = array('s_id'=>$m->get_data(test_input('sport')),
			'cat_name'=>$m->get_data(test_input('sc')),
		);
		$q = $d->update("sport_category",$a,"sc_id='$editID'");

		if ($q>0) 
		{
			echo "updated ";
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
		header("location:../edit_sport-cat.php?id=$editID");
		exit();
		}
	  else
		{
		header("location:../sport-cat.php");
		exit();
		}
	}


?>


  

 
