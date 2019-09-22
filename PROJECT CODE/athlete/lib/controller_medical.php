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
        $m->set_data("athlete",$athlete);
        $m->set_data("Dieses",$Dieses);
        $m->set_data("bgroup",$bgroup);
        
 


        $a = array('u_id'=>$m->get_data(test_input('athlete')),
            'past_dieses'=>$m->get_data(test_input('Dieses')),
            'blood_grp'=>$m->get_data(test_input('bgroup')),
            


        );
        $q = $d->insert("medical_prof_master",$a);
        if ($q>0) {
            echo "data is inserted";
        
            // header("location:../view_sport-autho.php");
        }
        else{
            echo "Something is wrong";
        }
    }
}






?>