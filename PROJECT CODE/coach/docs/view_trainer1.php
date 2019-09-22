<!DOCTYPE html>
<html lang="en">
   <head>
    <title>Trainer</title>

 <!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->

<?php
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
         $q = $d->select("user_master,city_master",
            "city_master.city_id= user_master.city_id  AND u_id='$id'");
          $q1 = $d->select("user_master,state_master",
            "state_master.state_id=user_master.state_id AND u_id='$id'"
            ,"");
          $q2 = $d->select("user_master,authority_master",
            "authority_master.ar_id= user_master.ar_id AND u_id='$id'"
            ,"");
          $q3 = $d->select("user_master,sport_master",
            " sport_master.s_id= user_master.s_id AND u_id='$id'"
            ,"");
          $q4 = $d->select("user_master,role_master",
            " role_master.role_id= user_master.role_id AND u_id='$id'"
            ,"");
           $q5 = $d->select("user_master,sport_category",
           "sport_category.sc_id= user_master.sc_id AND u_id='$id'"
            ,"");
          //$data = mysqli_query($con,$q);
          $i = 0; 
          while($result = mysqli_fetch_array($q)){
            $result1 = mysqli_fetch_array($q1);
            $result2 = mysqli_fetch_array($q2);
            $result3 = mysqli_fetch_array($q3);
            $result4 = mysqli_fetch_array($q4);
            $result5 = mysqli_fetch_array($q5);
            $i++;
            $img = "profilepics/".$result['img_url'];

        ?> 
         <label><h2><?php echo $result['u_fname']?></h2></label>
       
            
           <table class="table">
            <tr>
              <td rowspan ="12"> <img  class="rounded-circle" src="<?php echo $img;?>" height=160 width=160 style="margin-left:100px;" ></td>
            </tr>
          <tr>
          <td><b>First-Name: </b><?php echo $result['u_fname']?></td>
          </tr>
          <br>
          <tr>
          <td><b>Last-Name: </b><?php echo $result['u_lname']?></td>
          </tr>
             <tr>
          <td><b>State: </b><?php echo $result1['state_name']?></td>
          </tr>
             <tr>
          <td><b>City: </b> <?php echo $result['city_name']?></td>
          </tr>
               <tr>
          <td><b>Gender: </b><?php echo $result['u_gender']?></td>
          </tr>
          <tr>
          <td><b>Birthdate: </b><?php echo $result['u_bdate']?></td>
          </tr>
          <tr>
          <td><b>Email: </b><?php echo $result['u_email']?></td>
          </tr>
          <tr>
          <td><b>Contact: </b><?php echo $result['u_contactno']?></td>
          </tr>
          <tr>
          <td><b>Authority: </b><?php echo $result2['ar_name']?></td>
          </tr>
          <tr>
          <td><b>Sport: </b><?php echo $result3['s_name']?></td>
          </tr>
          <tr>
          <td><b>Category: </b><?php echo $result5['cat_name']?></td>
          </tr>


            
       
        </table>
             <?php
      }
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


