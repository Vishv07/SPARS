<!DOCTYPE html>
<html lang="en">
   <head>
    <title>Performance</title>
<?php
session_start();
  require 'lib/dao.php';
  $d = new dao();
include 'header.php';
$dt = $_SESSION['user_id'];
?>

     <main class="app-content" style="background-color: #FFFFFF; ">
         <div class="app-title" style="background-color: #FFFFFF">
            <div class="login-box" style="height: 1400px; width:350px;" >
               <!--  <img src="img/logo1.png" style="height: 150px; margin-left:180px;"> -->
               <form class="login-form"  method="POST" action="lib/controller_performance.php" enctype="multipart/form-data">
                  <!--  <br />
                     <br />
                     <br /> -->
                  <h3 style="margin-left: 60px;">Performance Records</h3>
                  <hr style="border:2px solid #007065;">
                    <div class="form-group">
                     <label for="exampleSelect1">Athlete</label>
                     <select class="form-control" name="athlete">
                        <option value="-1">Select Athlete</option>
                        <?php
                                         $q1 = $d->select("allocation_master","coach_id='$dt'");
                       while ( $result1 = mysqli_fetch_array($q1)){

                      $q = $d->select("user_master","role_id=9 AND user_master.u_id='$result1[u_id]'");
      
                           while ($row = mysqli_fetch_array($q))
                             {
                             echo "<option value='" . $row['u_id'] . "'>" . $row['u_fname'] . "</option>";
                             }
                           }
                           ?>
                     </select>
                     <?php
                        if (isset($_SESSION['drpdwn']))
                          {
                          echo "<span style='color:red'>" . $_SESSION['drpdwn'] . "</span>";
                          }
                        
                        ?>
                  </div>

                    <div class="form-group">
                     <label for="exampleSelect1">Competititon Name</label>
                     <select class="form-control" name="cmpname">
                        <option value="-1">Select  Name</option>
                        <?php
                           $con = mysqli_connect('localhost', 'root', '', 'spars');
                           $sql = "SELECT * FROM competition_master";
                           $result = mysqli_query($con,$sql);
                           while ($row = mysqli_fetch_array($result))
                             {
                             echo "<option value='" . $row['cpt_id'] . "'>" . $row['cmp_name'] . "</option>";
                             }
                           
                           ?>
                     </select>
                     <?php
                        if (isset($_SESSION['drpdwn']))
                          {
                          echo "<span style='color:red'>" . $_SESSION['drpdwn'] . "</span>";
                          }
                        
                        ?>
                  </div>
                       <div class="form-group">
                    <label for="pfp">Performance Video [ Up to 100 MB ]</label>
                    <input class="form-control" name="vid_url" required type="file">
                     <?php
        if(isset($_SESSION['fmsg'])){
          echo "<span style='color:red'>".$_SESSION['fmsg']."</span>";
          unset($_SESSION['fmsg']);
        }
        ?>
         </div>
                  <div class="form-group">
                     <label class="control-label">Special Achivement</label>
                     <input class="form-control" type="text" placeholder="Achivement" autofocus name="achivement">
                     <?php
                        if (isset($_SESSION['fnerr']))
                          {
                          echo "<span style='color:red'>" . $_SESSION['fnerr'] . "</span>";
                          unset($_SESSION['fnerr']);
                          }
                        
                        ?>
                  </div>
                

                
                  <div class="form-group btn-container">
                     <input type="submit" name="Insert" class="btn btn-primary btn-block">
                     <?php unset($_SESSION['drpdwn']); ?>
                  </div>
               </form>
            </div>
         </div>
      </main>
      <!-- Essential javascripts for application to work-->
      <script src="js/jquery-3.2.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <!-- The javascript plugin to display page loading on top-->
      <script src="js/plugins/pace.min.js"></script>
      <!-- Page specific javascripts-->
      <script type="text/javascript" src="js/plugins/chart.js"></script>
      <script type="text/javascript" src="js/alert.js"></script>
      <?php if(isset($_SESSION['city'])){?>
        <script>
          swal("Records Entered Successfully ","");
         
        </script>   
    <?php }
     unset($_SESSION['city']);?>
   </body>
</html>