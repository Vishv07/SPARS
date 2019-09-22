<!DOCTYPE html>
<html lang="en">
   <head>
    <title>Coach</title>

 <!--    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"> -->

<?php
  require 'lib/dao.php';
  $d = new dao();
include 'header.php';

?>

<body style="background-color: #E5E5E5;">
      <main class="app-content"  style="width:500px;">
        
         
       <label><h2>Coach</h2></label>
                            <?php
          $q = $d->select("user_master","role_id=12");
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
          <td><img  class="rounded-circle" src="<?php echo $img;?>" height=120 width=120 ></td>
          <td style="padding-left:25px;"><h5><a href="view_coach1.php?id=<?php echo $result['u_id'];?>" style="text-decoration: none;" ><?php echo $result['u_fname'];?></a></h5></td>
        </tr>
      
        </table>

            </div>
          </div>

      </div>
      </div>
          <?php
      }
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


<!-- 
           


      <thead>
                  <tr>
                    <th>No</th>
                    <th>First-Name:</th>
                    <th>Last-Name:</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Gender</th>
                    <th>Birthdate</th>
                    <th>Email</th>
                    <th>Contact</th>
                    <th>Authority</th>
                    <th>Sport</th>
                    <th>Role</th>
                    <th>Category</th>
                    <th>Action</th>
                
                  </tr>
                </thead>
                <tbody>
                  <?php
                          $q = $d->select("user_master,city_master",
                            "city_master.city_id= user_master.city_id AND user_master.role_id=8"
                            ,"");
                          $q1 = $d->select("user_master,state_master",
                            "state_master.state_id=user_master.state_id AND user_master.role_id=8"
                            );
                          $q2 = $d->select("user_master,authority_master",
                            "authority_master.ar_id= user_master.ar_id  AND user_master.role_id=8"
                            ,"");
                          $q3 = $d->select("user_master,sport_master",
                            " sport_master.s_id= user_master.s_id  AND user_master.role_id=8"
                            ,"");
                          $q4 = $d->select("user_master,role_master",
                            " role_master.role_id= user_master.role_id  AND user_master.role_id=8"
                            ,"");
                           $q5 = $d->select("user_master,sport_category",
                           "sport_category.sc_id= user_master.sc_id  AND user_master.role_id=8"
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
                          // print_r($data);
                          // exit();
                        ?>
                 <tr>
                          <td><?php echo $i;?></td>
                          <td><?php echo $result['u_fname'];?></td>
                          <td><?php echo $result['u_lname'];?></td>
                          <td><?php echo $result['city_name'];?></td>
                          <td><?php echo $result1['state_name'];?></td>
                          <td><?php echo $result['u_gender'];?></td>
                          <td><?php echo $result['u_bdate'];?></td>
                          <td><?php echo $result['u_email'];?></td>
                          <td><?php echo $result['u_contactno'];?></td>
                          <td><?php echo $result2['ar_name'];?></td>
                          <td><?php echo $result3['s_name'];?></td>
                          <td><?php echo $result4['role_name'];?></td>
                          <td><?php echo $result5['cat_name'];?></td>
                       
                          
                          <td><a href="edit_sport_manager.php?id=<?php echo $result['u_id'];?>">Edit</a>
                              <a href="lib/controller_reg.php?id=<?php echo $result['u_id'];?>" onclick="return confirm('Are you sure?')">Delete</a></td>
                        </tr>
                          <?php
                      }
                      ?>
                </tbody> -->
              