<?php
require 'vendor/autoload.php'; 

 if(isset($_POST['submit'])) 
 {
  echo "Your review has been submitted!";

  $Review = $_POST['Review'];

// Creating Connection  
$con = new MongoDB\Client("mongodb://localhost:27017");  
// Creating Database  
$db = $con->review;  
// Creating Document  
$collection = $db->reviews;  
// Insering Record  
    $insertOneResult = $collection->insertOne([
       'username' => $_POST['Username'],
       'rating' => $_POST['Rating'],
       'review' => $_POST['Review'],
   ]);

}

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
</head>

<body>
	<nav  class="navbar navbar-default navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="home.php"><b>Home</b></a>
    </div>
    <div id="navbar" class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li ><a href="userlogin.php">User Login</a></li>
        <li class=""><a href="complainer_page.php">User Home</a></li>
       <li class="active"><a href="review.php">Feedback</a></li>

      </ul>
     
      <ul class="nav navbar-nav navbar-right">
	<li class=""><a href="criminal.php">Search</a></li>
        <li class=""><a href="complainer_page.php">Log New Complain</a></li>
        <li><a href="complainer_complain_history.php">Complaint History</a></li>
        <li><a href="logout.php">Logout &nbsp <i class="fa fa-sign-out" aria-hidden="true"></i></a></li>
      </ul>
    </div>
  </div>
 </nav>


	<div style="align-self: center; margin-left: 500px; margin-top: 200px;">

    <form action="review.php" method="POST"> 

    <textarea name="Username" class="Input" style="width: 300px;" placeholder="Username" required></textarea>
    <br><br>
    <select name="Rating" class="Input" style="width: 300px; height: 35px;" required>
      <option value = "1">1</option>
      <option value = "2">2</option>
      <option value = "3">3</option>
      <option value = "4">4</option>
      <option value = "5">5</option>
    </select>
    <br><br>
    <textarea name="Review" class="Input" style="width: 300px" placeholder="Review" required></textarea>
    <br><br>
    <input type="submit" name="submit" value="Submit" class="Submit">

	</form>	

    </div>
</body>

<style>

.input
{
  color: black;
}
    body {
    background-size: cover;
    background-image: url(search1.jpeg);
    background-position: center; 
}

</style>

</html>