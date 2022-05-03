<?php
session_start();
$connect = mysqli_connect("localhost:8111", "root", "", "crime_portal");
if(!isset($_SESSION['x']))
        header("location:userlogin.php");
    
    
    $u_id=$_SESSION['u_id'];
    $c_id=$_SESSION['c_id'];
$sql = "select c_id, d_o_u,case_update from update_case where c_id='$c_id'";  
$result = mysqli_query($connect, $sql);
?>
<html>  
 <head>  
  <title>Export MySQL data to Excel in PHP</title>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
 </head>  
 <body>  
  <div class="container">  
   <br />  
   <br />  
   <br />  
   <div class="table-responsive">  
    <h2 align="center">Export MySQL data to Excel in PHP</h2><br /> 
    <table class="table table-bordered">
     <tr>  
                         <th>c_id</th>  
                         <th>date_of_update</th>  
                         <th>case_update</th>  
                    </tr>
     <?php
     while($row = mysqli_fetch_array($result))  
     {  
        echo '  
       <tr>  
         <td>'.$row["c_id"].'</td>  
         <td>'.$row["d_o_u"].'</td>  
         <td>'.$row["case_update"].'</td>  
       </tr>  
        ';  
     }
     ?>
    </table>
    <br />
    <form method="post" action="export.php">
     <input type="submit" name="export" class="btn btn-success" value="Export" />
    </form>
   </div>  
  </div>  
 </body>  
</html>
