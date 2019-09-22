<?php
session_start();

require("dbconnect.php");   
require 'dao.php';
require 'model.php';
require 'validation.php';
$d = new dao();
$m = new model();
$v=new Validation();
extract($_POST);




if (isset($_POST) && !empty($_POST)){
    if(isset($_POST['Insert'])){
        $m->set_data("cmpname",$cmpname);
        $m->set_data("athlete",$athlete);
        $m->set_data("status",$status);
        $m->set_data("cdate",$cdate);
         $m->set_data("manager",$manager);
        $m->set_data("venue",$venue);
        $m->set_data("opp",$opp);
   

        $a = array('cmp_name '=>$m->get_data(test_input('cmpname')),
            'status'=>$m->get_data(test_input('status')),
            'date'=>$m->get_data(test_input('cdate')),
            'venue'=>$m->get_data(test_input('venue')),
            'u_id'=>$m->get_data(test_input('athlete')),
            'mngr_id'=>$m->get_data(test_input('manager')),
            'opp'=>$m->get_data(test_input('opp')),


        );
        $q = $d->insert("competition_master",$a);
        if ($q>0) {

              $_SESSION['city']="ok";
              header("location:../cpt_add.php");
   
        
            // header("location:../view_sport-autho.php");
        }
        else{
            echo "Something is wrong";
        }
    }
}






?>