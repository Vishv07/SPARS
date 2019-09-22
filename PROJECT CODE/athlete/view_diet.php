
<!DOCTYPE html>
<html lang="en">
   <head>
    <title>Athlete -Performance</title>
<style type="text/css">
  body {font-family: Arial, Helvetica, sans-serif;}

#myImg {
  border-radius: 5px;
  cursor: pointer;
  transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
}

/* Caption of Modal Image */
#caption {
  margin: auto;
  display: block;
  width: 80%;
  max-width: 700px;
  text-align: center;
  color: #ccc;
  padding: 10px 0;
  height: 150px;
}

/* Add Animation */
.modal-content, #caption {  
  -webkit-animation-name: zoom;
  -webkit-animation-duration: 0.6s;
  animation-name: zoom;
  animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
  from {-webkit-transform:scale(0)} 
  to {-webkit-transform:scale(1)}
}

@keyframes zoom {
  from {transform:scale(0)} 
  to {transform:scale(1)}
}

/* The Close Button */
.close {
  position: absolute;
  top: 15px;
  right: 35px;
  color: #f1f1f1;
  font-size: 40px;
  font-weight: bold;
  transition: 0.3s;
}

.close:hover,
.close:focus {
  color: #bbb;
  text-decoration: none;
  cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
  .modal-content {
    width: 100%;
  }
}
</style>
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
         
       <label><h2>Diet-chart</h2></label>
       <?php


                                                                 
         $q = $d->select("diet_master","u_id='$id'");
          while( $result1 = mysqli_fetch_array($q))

        
{
        $q1 = $d->select("user_master","u_id='$result1[nr_id]'");
             $result2 = mysqli_fetch_array($q1);


        ?> <div class="row w-100 p-3"  style="background-color: #ffffff" >
        <div class="col" >
         
         
           <table class>
            
          <tr>
             <td>
              <b>Provided By:</b>
            </td>
            <td>
              <?php echo $result2['u_fname']."  ".$result2['u_lname']  ; ?>
            </td>
         </tr>
<tr>
  <td>

  </td>
  <td> 

  </td>
</tr>
<tr>
  <td>
    
  </td>
  <td> 

  </td>
</tr>

          <tr>
            <td>
              <b>From date:</b>
            </td>
            <td>
              <?php echo $result1['from_date']; ?>
            </td>
         </tr>

         <tr>
  <td>

  </td>
  <td> 

  </td>
</tr>
<tr>
  <td>
    
  </td>
  <td> 

  </td>
</tr>
          <tr>
            <td>
              <b>To date:</b>
            </td>
            <td>
              <?php echo $result1['to_date']; ?>
            </td>
         </tr>
          


            
       
        </table>
   
      </div>
      <?php
 $img = "../manager/template/docs/Dietchart/".$result1['diet_plan'];
      ?>
      
  <div class="col" style="padding: 0px;">
           
   <img id="myImg" src="<?php echo $img;?>" alt="Snow" style="width:100%;max-width:300px">
 </video> 

            </div>
   

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>
          <div >
            <p style="background-color: #E5E5E5">
              <br>
            </p>
            </div>

          <?php
      }
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


// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
  modal.style.display = "none";
}


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




