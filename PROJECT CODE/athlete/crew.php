<!DOCTYPE html>
<html lang="en">
   <head>
    <title>Athlete</title>
 

</head>

<?php
 require 'athleteloginvalidation.php';
  require 'lib/dao.php';
  $d = new dao();
include 'header.php';
extract($_GET);

?>

<body style="background-color: #E5E5E5;">
      <main class="app-content"  style="width:=900px; ">

       <div class="row" >
        <div class="col-md-12" >
          <div class="tile"><!-- u_id='$id' -->
            <div class="tile-body">
      
                                                  <?php
         $q = $d->select("allocation_master","u_id='$id'");
           $result1 = mysqli_fetch_array($q);
          $q1 = $d->select("allocation_master,user_master",
            "user_master.u_id = allocation_master.physio_id AND user_master.u_id='$result1[physio_id]'");
          $q2 = $d->select("allocation_master,user_master",
            "user_master.u_id = allocation_master.coach_id AND user_master.u_id='$result1[coach_id]'");
          $q3 = $d->select("allocation_master,user_master",
            "user_master.u_id = allocation_master.trainer_id AND user_master.u_id='$result1[trainer_id]'");
          $q4 = $d->select("allocation_master,user_master",
            "user_master.u_id = allocation_master.nr_id AND user_master.u_id='$result1[nr_id]'");

          
            $result2 = mysqli_fetch_array($q1);
             $result3 = mysqli_fetch_array($q2);
              $result4 = mysqli_fetch_array($q3);
               $result5 = mysqli_fetch_array($q4);
        


            ?>

         <label><h2>Alloted Crew</h2></label>
       
            
           <table class>
            
          <tr>
            <td>
              <b>Physio:</b>
            </td>
            <td>
              <?php echo $result2['u_fname']; ?>
            </td>
         </tr>

          <tr>
            <td>
              <b>Coach:</b>
            </td>
            <td>
              <?php echo $result3['u_fname']; ?>
            </td>
         </tr>

          <tr>
            <td>
              <b>Trainer:</b>
            </td>
            <td>
              <?php echo $result4['u_fname']; ?>
            </td>
         </tr>

          <tr>
            <td>
              <b>Nutritionist:</b>
            </td>
            <td>
              <?php echo $result5['u_fname']; ?>
            </td>
         </tr>


            
       
        </table>
     
            </div>
          </div>

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
    
       <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

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


