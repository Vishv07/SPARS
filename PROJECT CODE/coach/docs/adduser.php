<!DOCTYPE html>
<html lang="en">
   <head>
    <title>Add user</title>
<?php
session_start();
include 'header.php';

?>

      <main class="app-content" style="background-color: #FFFFFF; ">
         <div class="app-title" style="background-color: #FFFFFF">
            <div class="login-box" style="height: 1400px; width:350px;" >
               <!--  <img src="img/logo1.png" style="height: 150px; margin-left:180px;"> -->
               <form class="login-form"  method="POST" action="lib/controller_reg.php" enctype="multipart/form-data">
                  <!--  <br />
                     <br />
                     <br /> -->
                  <h3 style="margin-left: 60px;">Performance Records
                  </h3>
                  <hr style="border:2px solid #007065;">
                  <div class="form-group">
                     <label class="control-label">First Name</label>
                     <input class="form-control" type="text" id="fname" placeholder="First Name" autofocus name="fn">
                     <?php
                        if (isset($_SESSION['fnerr']))
                          {
                          echo "<span style='color:red'>" . $_SESSION['fnerr'] . "</span>";
                          unset($_SESSION['fnerr']);
                          }
                        
                        ?>
                  </div>
                  <div class="form-group" >
                     <label class="control-label">Last Name</label>
                     <input class="form-control" type="text" id="lname" placeholder="Last Name" name="ln">
                     <?php
                        if (isset($_SESSION['lnerr']))
                          {
                          echo "<span style='color:red'>" . $_SESSION['lnerr'] . "</span>";
                          unset($_SESSION['lnerr']);
                          }
                        
                        ?>
                  </div>
                  <div class="form-group">
                     <label for="exampleSelect1">State</label>
                     <select class="form-control" name="state">
                        <option value="-1">Select State</option>
                        <?php
                           $con = mysqli_connect('localhost', 'root', '', 'spars');
                           $sql = "SELECT state_id,state_name FROM state_master";
                           $result = mysqli_query($con, $sql);
                           while ($row = mysqli_fetch_array($result))
                             {
                             echo "<option value='" . $row['state_id'] . "'>" . $row['state_name'] . "</option>";
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
                     <label for="exampleSelect1">City</label>
                     <select class="form-control" name="city">
                        <option value="-1">Select city</option>
                        <?php
                           $con = mysqli_connect('localhost', 'root', '', 'spars');
                           $sql = "SELECT city_id,city_name FROM city_master";
                           $result = mysqli_query($con, $sql);
                           
                           while ($row = mysqli_fetch_array($result))
                             {
                             /*echo "<select name='username' class='form-control'>";*/
                             echo "<option value='" . $row['city_id'] . "'>" . $row['city_name'] . "</option>";
                             }
                           
                           /* echo "</select>";*/
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
                     <label class="control-label">Gender</label>
                     <div class="form-check">
                        <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="gender" value="male" required>Male
                        </label>
                        <label class="form-check-label" style="margin-left:25px;">
                        <input class="form-check-input" type="radio" name="gender" value="female" required>Female
                        </label>
                     </div>
                  </div>
                  <div class="form-group">
                    <label for="pfp">Profile Picture</label>
                    <input class="form-control" name="profilepic" required type="file">
                     <?php
        if(isset($_SESSION['fmsg'])){
          echo "<span style='color:red'>".$_SESSION['fmsg']."</span>";
          unset($_SESSION['fmsg']);
        }
        ?>
         </div>
                  <div class="form-group">
                     <label class="control-label">Birthdate</label>
                     <input class="form-control" type="Date" name="date">
                     <?php
                        if (isset($_SESSION['dateerr']))
                          {
                          echo "<span style='color:red'>" . $_SESSION['dateerr'] . "</span>";
                          unset($_SESSION['dateerr']);
                          }
                        
                        ?>
                  </div>
                  <div class="form-group">
                     <label class="control-label">Email</label>
                     <input class="form-control" type="Email" placeholder="Email" name="email">
                     <?php
                        if (isset($_SESSION['emailerr']))
                          {
                          echo "<span style='color:red'>" . $_SESSION['emailerr'] . "</span>";
                          unset($_SESSION['emailerr']);
                          }
                        
                        ?>
                  </div>
                  <div class="form-group">
                     <label class="control-label">Contact No (format: xxxxxxxxxx)</label>
                     <input class="form-control" type="text" required placeholder=" Enter Contact No" name="cn" pattern="^\d{10}$" required >
                  </div>
                  <div class="form-group">
                     <label for="exampleSelect1">Authority</label>
                     <select class="form-control" name="ar">
                        <option value="-1">Select Authority</option>
                        <?php
                           $con = mysqli_connect('localhost', 'root', '', 'spars');
                           $sql = "SELECT ar_id,ar_name FROM authority_master";
                           $result = mysqli_query($con, $sql);
                           /*echo "<select name='username' class='form-control'>";*/
                           
                           while ($row = mysqli_fetch_array($result))
                             {
                             echo "<option value='" . $row['ar_id'] . "'>" . $row['ar_name'] . "</option>";
                             }
                           
                           /* echo "</select>";*/
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
                     <label for="exampleSelect1">Sport</label>
                     <select class="form-control" name="sport">
                        <option value="-1">Select Sport</option>
                        <?php
                           $con = mysqli_connect('localhost', 'root', '', 'spars');
                           $sql = "SELECT s_id,s_name FROM sport_master";
                           $result = mysqli_query($con, $sql);
                           /*echo "<select name='username' class='form-control'>";*/
                           
                           while ($row = mysqli_fetch_array($result))
                             {
                             echo "<option value='" . $row['s_id'] . "'>" . $row['s_name'] . "</option>";
                             }
                           
                           /* echo "</select>";*/
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
                     <label for="exampleSelect1">Category</label>
                     <select class="form-control" name="cat">
                        <option value="-1">Select Category</option>
                        <?php
                           $con = mysqli_connect('localhost', 'root', '', 'spars');
                           $sql = "SELECT s_id,cat_name FROM sport_category";
                           $result = mysqli_query($con, $sql);
                           /*echo "<select name='username' class='form-control'>";*/
                           
                           while ($row = mysqli_fetch_array($result))
                             {
                             echo "<option value='" . $row['s_id'] . "'>" . $row['cat_name'] . "</option>";
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
                     <label for="exampleSelect1">Role</label>
                     <select class="form-control" name="role">
                        <option value="-1">Select Role</option>
                        <?php
                           $con = mysqli_connect('localhost', 'root', '', 'spars');
                           $sql = "SELECT role_id,role_name FROM role_master";
                           $result = mysqli_query($con, $sql);
                           /*echo "<select name='username' class='form-control'>";*/
                           
                           while ($row = mysqli_fetch_array($result))
                             {
                             echo "<option value='" . $row['role_id'] . "'>" . $row['role_name'] . "</option>";
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
                     <label class="control-label">Password</label>
                     <input class="form-control" type="Password" id="pass" placeholder="Password" autofocus name="pass" required>
                  </div>
                  <div class="form-group" >
                     <label class="control-label">Confirm Password</label>
                     <input class="form-control" type="Password" id="cpass" placeholder="Conf Your Password " name="cpass" required>
                     <?php
                        if (isset($_SESSION['passmatch']))
                          {
                          echo "<span style='color:red'>" . $_SESSION['passmatch'] . "</span>";
                          unset($_SESSION['passmatch']);
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
      <script type="text/javascript">
      
      </script>
      <!-- Google analytics script-->
      <script type="text/javascript">
         if(document.location.hostname == 'pratikborsadiya.in') {
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
          ga('create', 'UA-72504830-1', 'auto');
          ga('send', 'pageview');
         }
      </script>
   </body>
</html>