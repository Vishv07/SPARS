<!DOCTYPE html>
<html lang="en">
   <head>
    <title>Athlete -Performance</title>

</head>

<?php
 require 'athleteloginvalidation.php';
  require 'lib/dao.php';
  $d = new dao();
include 'header.php';
extract($_GET);

?>

<body style="background-color: #E5E5E5;">

     <main class="app-content"  style="width:1000px; ">
 <div class="container-fluid">
         
       <label><h2>Performance records</h2></label>
                            <?php


                                                                 
         $q = $d->select("performance_master","u_id='$id'");
          while( $result1 = mysqli_fetch_array($q))
  
{
      
             $q2 = $d->select("competition_master","u_id='$id'");
          while($result3 = mysqli_fetch_array($q2))
          {

            $q1 = $d->select("user_master","u_id='$result3[mngr_id]'");
             $result2 = mysqli_fetch_array($q1);

             $q4 = $d->select("user_master","u_id='$result1[coach_id]'");
             $result4 = mysqli_fetch_array($q4);

        ?> <div class="row w-100 p-3"  style="background-color: #ffffff" >
        <div class="col" >
         
         
           <table class>
            
          <tr>
            <td>
              <b>Game Name:</b>
            </td>
            <td>
              <?php echo $result3['cmp_name'];?>
            </td>
         </tr>
 
          <tr>
            <td>
              <b>Status:</b>
            </td>
            <td>
              <?php echo $result3['status']; ?>
            </td>
         </tr>

           <tr>
            <td>
              <b>Special Achivement:</b>
            </td>
            <td>
              <?php echo $result1['spe_achivment']; ?>
            </td>
         </tr>

          <tr>
            <td>
              <b>date:</b>
            </td>
            <td>
              <?php echo $result3['date']; ?>
            </td>
         </tr>

          <tr>
            <td>
              <b>Venue:</b>
            </td>
            <td>
              <?php echo $result3['venue']; ?>
            </td>
         </tr>
          <tr>
                  <td>
              <b>Opposite [team/player]:</b>
            </td>
            <td>
              <?php echo $result3['opp']; ?>
            </td>
         </tr>
            <td>
              <b>Sport Manager:</b>
            </td>
            <td>
              <?php echo $result2['u_fname']."  ".$result2['u_lname']  ; ?>
            </td>
         </tr>
      </tr>
            <td>
              <b>Coach:</b>
            </td>
            <td>
              <?php echo $result4['u_fname']."  ".$result4['u_lname']  ; ?>
            </td>
         </tr>



            
       
        </table>
   
      </div>
        <div class="col" style="padding: 0px;">
           
 <video width="300" height="200" controls>
 <source src="../manager/template/docs/Performance _video\<?php echo $result1['vid_url'];?>" type="video/mp4">
 </video> 

            </div>
      </div>
          <div >
            <p style="background-color: #E5E5E5">
              <br>
            </p>
            </div>

          <?php
      }}
      ?>
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


