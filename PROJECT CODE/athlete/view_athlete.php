<!DOCTYPE html>
<html lang="en">
   <head>
    <title>Athlete</title>

 <!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->

<?php
 include 'athleteloginvalidation.php';
  require 'lib/dao.php';
  $d = new dao();
include 'header.php';

?>

<body style="background-color: #E5E5E5;">
      <main class="app-content"  style="width:500px;">
        
         
       <label><h2>Athlete</h2></label>
                            <?php


           $q1 = $d->select("allocation_master","trainer_id=29");
           while ( $result1 = mysqli_fetch_array($q1)){

          $q = $d->select("user_master","role_id=9 AND user_master.u_id='$result1[u_id]'");
          $i = 0;
          while($result = mysqli_fetch_array($q)){
            $i++;
            $img = "profilepics/".$result['img_url'];
        ?> <div class="row" >
        <div class="col-md-12" >
          <div class="tile">
            <div class="tile-body">
            
           <table>
                 <tr>
          <td><img  class="rounded-circle" src="../manager/template/docs/<?php echo $img;?>" height=120 width=120 ></td>
          <td style="padding-left:25px;"><h5><a href="view_athlete1.php?id=<?php echo $result['u_id'];?>" style="text-decoration: none;" ><?php echo $result['u_fname'];?></a></h5></td>
        </tr>
      
        </table>

            </div>
          </div>

      </div>
      </div>
          <?php
      }}
      ?>
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


