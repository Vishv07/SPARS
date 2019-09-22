
<?php
session_start();
require ("dbconnect.php");

require 'dao.php';

require 'model.php';

require 'validation.php';

$d = new dao();
$m = new model();
$v = new Validation();

if (isset($_GET['id']))
	{
	extract($_GET);
	$q = $d->delete("sport_master", "s_id='$_GET[id]'");
	if ($q > 0)
		{
		/*$_SESSION['msg'] = "data deleted.";*/
		header("location:../view_sport.php");
		exit();
		}
	  else
		{
		/*$_SESSION['msg'] = "data not deleted.";*/
		header("location:../view_sport.php");
		exit();
		}
	}

extract($_POST);
$counter = 0;

if ($v->onlychar($sport))
	{
	$counter++;
	}
  else
	{
	$_SESSION['cityerr'] = "only Charcter!!";
	if (isset($_POST['btnupdate']))
		{
		header("location:../edit_sport.php?id=$editID");
		exit();
		}
	  else
		{
		header("location:../Sport.php");
		exit();
		}
	}

if ($v->duplicationcheck2("sport_master", "s_name='$sport'"))
	{
	$counter++;
	}
  else
	{
	$_SESSION['exist'] = "already exist!!";
	if (isset($_POST['btnupdate']))
		{
		header("location:../edit_sport.php?id=$editID");
		exit();
		}
	  else
		{
		header("location:../Sport.php");
		exit();
		}
	}

if ($counter == 2)
	{
	if (isset($_POST) && !empty($_POST))
		{
		if (isset($_POST['Insert']))
			{
			$m->set_data("sport", $sport);
			$a = array(
				's_name' => $m->get_data(test_input('sport'))
			);
			$q = $d->insert("sport_master", $a);
			if ($q > 0)
				{

				// echo "data is inserted";
				// header("Location:view.php");

				echo "Inserted ";
				}
			  else
				{
				echo "Something is wrong";
				}
			}

		if (isset($_POST['btnupdate']))
			{
			$m->set_data("sport", $sport);
			$a = array(
				's_name' => $m->get_data(test_input('sport'))
			);
			$q = $d->update("sport_master", $a, "s_id='$editID'");
			if ($q > 0)
				{
				header("location:../view_sport.php");
				}
			  else
				{
				echo "Something is wrong";
				}
			}
		}
	}
  else
	{
	if (isset($_POST['btnupdate']))
		{
		header("location:../edit_sport.php?id=$editID");
		exit();
		}
	  else
		{
		header("location:../Sport.php");
		exit();
		}
	}



?>


  

 
