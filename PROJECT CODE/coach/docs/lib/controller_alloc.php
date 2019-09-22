
<?php
session_start();
/*error_reporting(0);*/
require("dbconnect.php");
require 'dao.php';
require 'model.php';
require 'validation.php';
require '../abc.php';


$d = new dao();
$m = new model();
$v = new Validation();
if (isset($_GET['id'])) {
    extract($_GET);
    $q = $d->delete("user_master", "u_id='$_GET[id]'");
    if ($q > 0) {
        /*$_SESSION['msg'] = "data deleted.";*/
        header("location:../view_sport-manager.php");
        exit();
    } else {
        echo "data not deleted.";
        header("location:../view_sport-manager.php");
        exit();
        
    }
}
extract($_POST);
$counter = 0;
if ($athlete ==-1 || $coach ==-1 || $physio ==-1 || $trainer ==-1 || $nr == -1) {
    
    $_SESSION['drpdwn'] = "please Select One Option!!";
}

else {
    $counter++;
}





if ($counter == 1) {
    if (isset($_POST) && !empty($_POST)) {
        if (isset($_POST['Insert'])) {
        	
            $m->set_data("athlete", $athlete);
               $m->set_data("coach", $coach);
            $m->set_data("physio", $physio);
            $m->set_data("trainer", $trainer);
            $m->set_data("nr", $nr);

            
            
            
            $a = array(
               
                'u_id' => $m->get_data(test_input('athlete')),
                'coach_id' => $m->get_data(test_input('coach')),
                'physio_id' => $m->get_data(test_input('physio')),
                'trainer_id' => $m->get_data(test_input('trainer')),
                'nr_id' => $m->get_data(test_input('nr')),
                
                
            );
            $q = $d->insert("allocation_master", $a);
            if ($q > 0) {
                //echo "data is inserted";
                //header("Location:view.php");        
                echo "Inserted ";
            } else {
                echo "Something is wrong";
            }
        }
        
        
        if (isset($_POST['btnupdate'])) {
            
            $m->set_data("fn", $fn);
            $m->set_data("ln", $ln);
            $m->set_data("city", $city);
            $m->set_data("state", $state);
            $m->set_data("gender", $gender);
            $m->set_data("date", $date);
            $m->set_data("email", $email);
            $m->set_data("cn", $cn);
            $m->set_data("ar", $ar);
            $m->set_data("sport", $sport);
            $m->set_data("role", $role);
            $m->set_data("cat", $cat);
            
            
            
            $a = array(
                'u_fname' => $m->get_data(test_input('fn')),
                'u_lname' => $m->get_data(test_input('ln')),
                'city_id' => $m->get_data(test_input('city')),
                'state_id' => $m->get_data(test_input('state')),
                'u_gender' => $m->get_data(test_input('gender')),
                'u_bdate' => $m->get_data(test_input('date')),
                'u_email' => $m->get_data(test_input('email')),
                'u_contactno' => $m->get_data(test_input('cn')),
                'ar_id' => $m->get_data(test_input('ar')),
                's_id' => $m->get_data(test_input('sport')),
                'role_id' => $m->get_data(test_input('role')),
                'sc_id' => $m->get_data(test_input('cat'))
                
                
            );
            $q = $d->update("user_master", $a, "u_id='$editID'");
            
            if ($q > 0) {
                echo "updated ";
            } else {
                echo "Something is wrong";
            }
            
        }
    }
} else {
    if (isset($_POST['btnupdate'])) {
        /*header("location:../edit_sport_manager.php?id=$editID");*/
        exit();
    } else {
            header("location:../alloc.php");

        exit();
    }
}

?>
