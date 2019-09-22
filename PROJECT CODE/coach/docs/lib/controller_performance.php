<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$counter==0;
require("dbconnect.php");   
require 'dao.php';
require 'model.php';
require 'validation.php';
require '../abc.php';
$d = new dao();
$m = new model();
$v=new Validation();
extract($_POST);

if(isset($_FILES['vid_url']))
{
 
      $file_name = $_FILES['vid_url']['name'];
      $file_size = $_FILES['vid_url']['size'];
      $file_tmp = $_FILES['vid_url']['tmp_name'];
      $file_type = $_FILES['vid_url']['type'];
      $tmp = explode('.',$_FILES['vid_url']['name']);
      $file_ext = end($tmp);
    
      $expensions= array("mp4", "wma","3GP","3gp","MP4");
      
      if(in_array($file_ext,$expensions) == false)
      {
          $_SESSION['fmsg']="extension not allowed, please choose MP4 or WMA or 3GP file";
      }
       else {

         if($file_size > 104857600)
          {
          $_SESSION['fmsg'] = "File size must be less than 40 MB" ;
          } 
         else {
            $counter++;
             }
         $counter++;
         }
     }
      

   else 
    {
     $_SESSION['fmsg']="Empty not allowed";
     }


if($counter==2)
{
if (isset($_POST) && !empty($_POST)){
    if(isset($_POST['Insert'])){
         $file_name = round(microtime(true)).".".$file_name;
        move_uploaded_file($file_tmp,"../../../manager/template/docs/Performance _video/".$file_name);
        $file_name = mysqli_real_escape_string($conn,$file_name);

        $m->set_data("athlete",$athlete);
        $m->set_data("cmpname",$cmpname);
        $m->set_data("achivement",$achivement);
        $m->set_data("file_name",$file_name);

        $a = array('u_id'=>$m->get_data(test_input('athlete')),
              'vid_url'=>$m->get_data(test_input('file_name')),
            'cpt_id'=>$m->get_data(test_input('cmpname')),
            'spe_achivment'=>$m->get_data(test_input('achivement')),


        );
        $q = $d->insert("performance_master",$a);
        if ($q>0) {
           
              $_SESSION['city']="ok";
            header("location:../perfo_add.php");

        }
        else{
            echo "Something is wrong";
        }
    }
}


}
else{

   header("location:../perfo_add.php");
}



?>