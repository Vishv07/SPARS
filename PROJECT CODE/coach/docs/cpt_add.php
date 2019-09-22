<!DOCTYPE html>
<html lang="en">
   <head>
    <title>Competition</title>
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
               <form class="login-form"  method="POST" action="lib/controller_cmp.php" enctype="multipart/form-data">
                  <!--  <br />
                     <br />
                     <br /> -->
                  <h3 style="margin-left: 60px;">Competition Records</h3>
                  <hr style="border:2px solid #007065;">
                    <div class="form-group">
                     <label for="exampleSelect1">Competition Name:</label>
                     <input class="form-control" type="text"  placeholder="Enter Competition Name" autofocus name="cmpname">
                     <?php
                        if (isset($_SESSION['drpdwn']))
                          {
                          echo "<span style='color:red'>" . $_SESSION['drpdwn'] . "</span>";
                          }
                        
                        ?>
                  </div>
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
                     <label for="exampleSelect1">Sport Manager</label>
                     <select class="form-control" name="manager">
                        <option value="-1">Select Sport Manager</option>
                        <?php
                           $con = mysqli_connect('localhost', 'root', '', 'spars');
                           $sql = "SELECT * FROM user_master WHERE role_id=7";
                           $result = mysqli_query($con,$sql);
                           while ($row = mysqli_fetch_array($result))
                             {
                             echo "<option value='" . $row['u_id'] . "'>" . $row['u_fname'] . "</option>";
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
                     <label class="control-label">Status</label>
                     <input class="form-control" type="text" id="sdate" placeholder="Match Status" autofocus name="status">
                     <?php
                        if (isset($_SESSION['fnerr']))
                          {
                          echo "<span style='color:red'>" . $_SESSION['fnerr'] . "</span>";
                          unset($_SESSION['fnerr']);
                          }
                        
                        ?>
                  </div>
                  <span style="color: red">Enter Proper data</span>
                  <div class="form-group" >
                     <label class="control-label">Date</label>
                     <input class="form-control" type="date" id="edate"  name="cdate">
                     <?php
                        if (isset($_SESSION['lnerr']))
                          {
                          echo "<span style='color:red'>" . $_SESSION['lnerr'] . "</span>";
                          unset($_SESSION['lnerr']);
                          }
                        
                        ?>
                  </div>
                      <div class="form-group" >
                     <label class="control-label">Venue</label>
                     <textarea class="form-control" rows="4" placeholder="Venue" name="venue"></textarea>
                     <?php
                        if (isset($_SESSION['lnerr']))
                          {
                          echo "<span style='color:red'>" . $_SESSION['lnerr'] . "</span>";
                          unset($_SESSION['lnerr']);
                          }
                        
                        ?>
                  </div>
                                        <div class="form-group" >
                     <label class="control-label">Opposition [Teamname Or Individual Player]</label>
                     <input class="form-control" type="text" id="opp"  name="opp" placeholder='Teamname Or Individual Player' >
                     <?php
                        if (isset($_SESSION['lnerr']))
                          {
                          echo "<span style='color:red'>" . $_SESSION['lnerr'] . "</span>";
                          unset($_SESSION['lnerr']);
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