<!DOCTYPE html>
<html lang="en">
   <head>
    <title>Athlete</title>
 

</head>

<?php
 include 'athleteloginvalidation.php';
  require 'lib/dao.php';
  $d = new dao();
include 'header.php';
extract($_GET);

?>

<body style="background-color: #E5E5E5;">
      <main class="app-content"  style="width:=900px; ">
        <div class="container">
       
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
         
        <div class="bs-component" >
          <label><h2><?php echo $result['u_fname']?></h2></label>
              <div class="btn-group btn-group-toggle"  style="margin-left:30px;">
                <label class="btn btn-primary ">
                  <a href="crew.php?id=<?php echo $id;?>" style="color: white; text-decoration: none;"> Alloted Crew</a>
                </label>
               
                <label class="btn btn-primary">
             <a href="view_cmp.php?id=<?php echo $id;?>" style="color: white; text-decoration: none;"> Competition Records</a>
                </label>
                   <label class="btn btn-primary">
                  <a href="crew.php?" style="color: white; text-decoration: none;"> Tarining schedule</a>
                </label>
                 </label>
                 
                <label class="btn btn-primary">
                  <a href="view_diet.php?id=<?php echo $id;?>" style="color: white; text-decoration: none;">Diet-Plan</a>
                </label>

              </div>
            </div>
       
            
           <table class="table">
            <tr>
              <td rowspan ="12"> <img  class="rounded-circle" src="../manager/template/docs/<?php echo $img;?>" height=160 width=160 style="margin-left:100px;" >

              <br>
              <br>
              <br>
                <a href="view_fitness.php?id=<?php echo $id;?>"  class="btn btn-primary btn-md"  style="margin-left: 122px;"> Fitness Profile</a>
                <br>
                <br>
                 <a href="view_medical.php?id=<?php echo $id;?>" class="btn btn-primary btn-md"  style="margin-left: 122px;"> Medical Profile</a>
                  <br>
                <br>
                 <a href="view_injuries.php?id=<?php echo $id;?>" class="btn btn-primary btn-md"  style="margin-left: 122px;"> Injuries Details</a>
              </td>
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


