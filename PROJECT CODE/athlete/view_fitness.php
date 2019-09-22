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
          $q = $d->select("fitness_master","u_id='$id'");
          while ($result = mysqli_fetch_array($q))

{

        $q1 = $d->select("user_master","u_id='$result[u_id]'");
            while($result1 = mysqli_fetch_array($q1))
            {

         ?>
      
       
            <h3>Fitness Profile </h3>
           <table class="table">
            
            </tr>
          <tr>
          <td><b>Athlete-Name: </b><?php echo $result1['u_fname']?></td>
          </tr>
          <br>
          <tr>
          <td><b>BMR: </b><?php echo $result['bmr']?></td>
          </tr>
             <tr>
          <td><b>BMI: </b><?php echo $result['bmi']?></td>
          </tr>
             <tr>
          <td><b>Height: </b> <?php echo $result['height']." ft";?></td>
          </tr>
               <tr>
          <td><b>Weight: </b><?php echo $result['weight']." kg";?></td>
          </tr>
          <tr>
          <td><b>Chest: </b><?php echo $result['chest']." Inch"?></td>
          </tr>
          <tr>
          <td><b>Waist: </b><?php echo $result['waist']?></td>
          </tr>
          <tr>
          <td><b>Protein: </b><?php echo $result['protein']?></td>
          </tr>
          <tr>
          <td><b>Fat: </b><?php echo $result['fat']."%"?></td>
          </tr>
          <tr>
          <td><b>Water: </b><?php echo $result['water'] ."%";?></td>
          </tr>
           <tr>
          <td><b>Biceps: </b><?php echo $result['biceps']." Inch"?></td>
          </tr>

          <tr>
          <td><b>Mesurement Date: </b><?php echo $result['mes_date']?></td>
          </tr>



            
       
        </table>
           
<?php
}}
?>
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


