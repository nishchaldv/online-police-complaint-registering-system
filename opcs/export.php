<?php  
//export.php  
session_start();
$connect = mysqli_connect("localhost:8111", "root", "", "crime_portal");
if(!isset($_SESSION['x']))
        header("location:userlogin.php");
    
    $c_id=$_SESSION['cid'];
//     $u_id=$_SESSION['u_id'];
    
$output = '';
if(isset($_POST["export"]))
{
 $query = "select c_id,d_o_u,case_update from update_case where c_id='$c_id'";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>c_id</th>  
                         <th>date_of_update</th>  
                         <th>case_update</th>  
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["c_id"].'</td>  
                         <td>'.$row["d_o_u"].'</td>  
                         <td>'.$row["case_update"].'</td>  
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>