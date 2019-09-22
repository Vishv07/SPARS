<?php
session_start();

require("dbconnect.php");   
require 'dao.php';
require 'model.php';
require 'validation.php';
require '../abc.php';
$d = new dao();
$m = new model();
$v=new Validation();
extract($_POST);
$counter=0;

if(isset($_FILES['proof'])){
      $file_name = $_FILES['proof']['name'];
      $file_size = $_FILES['proof']['size'];
      $file_tmp = $_FILES['proof']['tmp_name'];
      $file_type = $_FILES['proof']['type'];
      $tmp = explode('.',$_FILES['proof']['name']);
      $file_ext = end($tmp);
    /*  $file_ext=strtolower(end(explode('.',$_FILES['proof']['name'])));*/
      $expensions= array("jpeg","jpg","png","PNG","JPEG","JPG",'pdf ','PDF','xls');
      
      if(in_array($file_ext,$expensions) == false){
          $_SESSION['fmsg']="extension not allowed, please choose a JPEG,JPG or PNG file.";
      } else {
         if($file_size > 2097152) {
          $_SESSION['fmsg'] = "File size must be less than 2 MB" ;
      } else {$counter++;}
        $counter++;}
   } else { $_SESSION['fmsg']="Empty not allowed"; }

if($counter==2){
if (isset($_POST) && !empty($_POST)){
    if(isset($_POST['Insert'])){
        $file_name = round(microtime(true)).".".$file_name;
        move_uploaded_file($file_tmp,"../Dietchart/".$file_name);
        $file_name = mysqli_real_escape_string($conn,$file_name);

        $m->set_data("athlete",$athlete);
          $m->set_data("file_name",$file_name);
        $m->set_data("sdate",$sdate);
        $m->set_data("edate",$edate);
   
     
        
        $a = array('u_id'=>$m->get_data(test_input('athlete')),
                   'diet_plan'=>$m->get_data(test_input('file_name')),
                  'from_date'=>$m->get_data(test_input('sdate')),
                    'to_date'=>$m->get_data(test_input('edate')),
                   
            

        );


        $q = $d->insert("diet_master",$a);
        if ($q>0) {
            echo "data is inserted";
        
           //  header("location:../view_sport-autho.php");
        }
        else{
            echo "Something is wrong";
        }
    }
}}
else{

    header("location:../dietchart.php");

}






?>