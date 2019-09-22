<?php
session_start();

require("dbconnect.php");	
require 'dao.php';
require 'model.php';
require 'validation.php';
$d = new dao();
$m = new model();
$v=new Validation();

if(isset($_GET['id']))
{
	extract($_GET);
	$q = $d->delete("authority_master","ar_id='$_GET[id]'");
	if($q>0)
	{
		/*$_SESSION['msg'] = "data deleted.";*/
		header("location:../view_sport-autho.php");
		exit();
	}
	else
	{
		echo "data not deleted.";
		header("location:../view_sport-autho.php");
			exit();
	} 
}
extract($_POST);
$counter = 0;

if (strlen($sa) > 0 && strlen(trim($sa)) == 0)
{
	$_SESSION['saerr'] = "no white space";

	  if (isset($_POST['btnupdate']))
		{
	header("location:../edit_sport-autho.php?id=$editID");
		exit();
		}
	  else
		{
		header("location:../sport-autho.php");

		exit();
		}

}
 if($sport!=0){
       $counter++;
   }
   else{
     $_SESSION['sporterr'] = "please Select State";
   
   }


if($v->onlychardot($sa))
{
	$counter++;
}
else{
	$_SESSION['saerr'] = "Only Charcters and no white Space!!";
  if (isset($_POST['btnupdate']))
		{
	header("location:../edit_sport-autho.php?id=$editID");
		exit();
		}
	  else
		{
		header("location:../sport-autho.php");

		exit();
		}
	}
if($v->duplicationcheck2("authority_master","ar_name='$sa'and ar_id!='$editID'"))
{
	$counter++;
}
else{
	$_SESSION['exist'] = "already exist!!";
  if (isset($_POST['btnupdate']))
		{
	header("location:../edit_sport-autho.php?id=$editID");
		exit();
		}
	  else
		{
		header("location:../sport-autho.php");

		exit();
		}
	}
	if($v->duplicationcheck2("authority_master","ar_email='$email'and ar_id!='$editID'"))
{
	$counter++;
}
else{
	$_SESSION['emailexist'] = "already exist!!";
  if (isset($_POST['btnupdate']))
		{
	header("location:../edit_sport-autho.php?id=$editID");
		exit();
		}
	  else
		{
		header("location:../sport-autho.php");

		exit();
		}
	}
	if($v->duplicationcheck2("authority_master","ar_contact='$cn'"))
{
	$counter++;
}
else{
	$_SESSION['cnexist'] = "already exist!!";
  if (isset($_POST['btnupdate']))
		{
	header("location:../edit_sport-autho.php?id=$editID");
		exit();
		}
	  else
		{
		header("location:../sport-autho.php");

		exit();
		}
	}
if($v->address($add))
{
	$counter++;
}
else{
	$_SESSION['add'] = "Not Null & Maximum 50 Character! ";
	  if (isset($_POST['btnupdate']))
		{
	header("location:../edit_sport-autho.php?id=$editID");
		exit();
		}
	  else
		{
		header("location:../sport-autho.php");

		exit();
		}
	}

if($v->emailValidation($email))
{
	$counter++;
}
else{
	$_SESSION['email'] = "Invalid Email!";

$_SESSION['add'] = "Not Null & Maximum 50 Character! ";
	  if (isset($_POST['btnupdate']))
		{
	header("location:../edit_sport-autho.php?id=$editID");
		exit();
		}
	  else
		{
		header("location:../sport-autho.php");

		exit();
		}
	}
if($counter==7)
{

if (isset($_POST) && !empty($_POST)){
	if(isset($_POST['Insert'])){
		$m->set_data("sa",$sa);
		$m->set_data("sport",$sport);
		$m->set_data("add",$add);
		$m->set_data("cn",$cn);
		$m->set_data("email",$email);
		
		$a = array('ar_name'=>$m->get_data(test_input('sa')),
			's_id'=>$m->get_data(test_input('sport')),
			'off_add'=>$m->get_data(test_input('add')),
			'ar_contact'=>$m->get_data(test_input('cn')),
			'ar_email'=>$m->get_data(test_input('email')),

		);
		$q = $d->insert("authority_master",$a);
		if ($q>0) {
			//echo "data is inserted";
			//header("Location:view.php");		
			header("location:../view_sport-autho.php");
		}
		else{
			echo "Something is wrong";
		}
	}
}

if(isset($_POST['btnupdate'])){

	$m->set_data("sa",$sa);
	$m->set_data("sport",$sport);
	$m->set_data("add",$add);
	$m->set_data("cn",$cn);
	$m->set_data("email",$email);

	$a = array('ar_name'=>$m->get_data(test_input('sa')),
		's_id'=>$m->get_data(test_input('sport')),
		'off_add'=>$m->get_data(test_input('add')),
		'ar_contact'=>$m->get_data(test_input('cn')),
		'ar_email'=>$m->get_data(test_input('email')),

	);
	$q = $d->update("authority_master",$a,"ar_id='$editID'");

	if ($q>0) 
	{
		echo "updated ";
	}
	else{
		echo "Something is wrong";
	}

}	 }
  else{
  	header("location:../sport-autho.php");
  }


if(isset($_GET['id']))
{
	extract($_GET);
	$q = $d->delete("authority_master","ar_id='$_GET[id]'");
	if($q>0)
	{
		/*$_SESSION['msg'] = "data deleted.";*/
		header("location:../view_sport-autho.php");
	}
	else
	{
		echo "data not deleted.";
		header("location:../view_sport-autho.php");
	} 
}

?>