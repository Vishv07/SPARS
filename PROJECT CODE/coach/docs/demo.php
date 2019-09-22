<!DOCTYPE html>
<html lang="en">
   <head>
    <title>Physio</title>
<?php
  require 'lib/dao.php';
  $d = new dao();
include 'header.php';

?>


      <main class="app-content"  style="width: 1600px;">
        
         
      <div class="row" >
       
                  <?php
          $q = $d->select("user_master","u_id=12"
            ,"");
         
            
          //$data = mysqli_query($con,$q);
          $i = 0; 
          while($result = mysqli_fetch_array($q)){
            
            $i++;
          // print_r($data);
          // exit();
        ?>
                 <tr>
          <?php echo $i;?>
       
          <?php echo $result['u_fname'];?>
          <br>
          <img src="profilepics/<?php echo $result['img_url']; ?>">
       
          
          <a href="edit_sport_manager.php?id=<?php echo $result['u_id'];?>">Edit</a>
              <a href="lib/controller_reg.php?id=<?php echo $result['u_id'];?>" onclick="return confirm('Are you sure?')">Delete</a>
                  <?php
      }
      ?>
            
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