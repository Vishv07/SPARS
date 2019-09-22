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



if($counter==0){
if (isset($_POST) && !empty($_POST)){
    if(isset($_POST['Insert'])){
        
       
        $m->set_data("athlete",$athlete);
        $m->set_data("iodate",$iodate);
        $m->set_data("icdate",$icdate);
        $m->set_data("m_e_name",$m_e_name);
        $m->set_data("ir_des",$ir_des);
        $m->set_data("hospital",$hospital);
         $m->set_data("expense",$expense);
        
        $a = array('u_id'=>$m->get_data(test_input('athlete')),
            'ir_occ_date'=>$m->get_data(test_input('iodate')),
            ' ir_fin_date'=>$m->get_data(test_input('icdate')),
            'match_event_name'=>$m->get_data(test_input('m_e_name')),
            'ir_des'=>$m->get_data(test_input('ir_des')),
            'hos_name'=>$m->get_data(test_input('hospital')),
            'ir_expenditure'=>$m->get_data(test_input('expense')),
            

        );


        $q = $d->insert("injuries_master",$a);
        if ($q>0) 
        {
            echo "data is inserted";
        
           //  header("location:../view_sport-autho.php");
        }
        else{
            echo "Something is wrong";
        }
    }
}}
else{

    header("location:../in_ex.php");

}






?>