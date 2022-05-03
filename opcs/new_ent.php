<?php
	define("SITE_ADDR", "http://localhost:8080/Crime-Reporting-System/");
	include("./include.php");
	$site_title = 'Online-Crime-Reporting';
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		
		<title><?php echo $site_title; ?></title>
		
		<!-- link to the stylesheets -->
		<link rel="stylesheet" type="text/css" href="./main.css"></link>
	</head>
	
	<body>
		
		<div id="wrapper">
			
				
			<div id="top_header">
				<div id="nav">
					<!-- <a href="<?php echo SITE_ADDR;?>/new_entry.php">New Entry</a> -->
				</div>

				<div id="logo">
					<h1><a href="<?php echo SITE_ADDR;?>">simple search engine</a></h1>
				</div>
			</div>


			<div id="main" class="shadow-box"><div id="content">
				
				<?php

					// check to see if the form was submitted
					if (isset($_POST['addBtn'])){
						// get all the form data
						$name = isset($_POST['name']) ? htmlspecialchars($_POST['name']) : "";
						$description = isset($_POST['description']) ? htmlspecialchars($_POST['description']) : "";
						$injail = isset($_POST['injail']) ? htmlspecialchars($_POST['injail']) : "";
						$aliases = isset($_POST['aliases']) ? htmlspecialchars($_POST['aliases']) : "";

						// make sure all the form data was submitted
						if ($name && $description && $injail & $aliases){
							// setup some vars
							$id = '';
							// CONNECT TO THE DB
							$conn = mysqli_connect("localhost:8111","root","","crime_portal");

							mysqli_query($conn, "INSERT INTO criminal_name VALUES ('$id', '$name', '$description', '$injail', '$aliases')");
							
							// make sure entry was created
							if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM criminal_name WHERE name='{$name}' AND injail='{$injail}'"))){
								echo 'New entry was added';

								$name = '';
								$injail = '';
								$aliases = '';
								$description = '';
							}
							else
								echo 'An error occured. No new entry was added.';
						}
						else
							echo 'Please provided all data. The entire form is required.';

					}
				?>

				<form action="" method="POST" name="">
					<table>
						<tr>
							<td>Name:</td>
							<td><input type="text" name="name" value="<?php echo isset($name) ? $name : ""; ?>" /></td>
						</tr>
						<tr>
							<td>Injail:</td>
							<td><input type="text" name="injail" value="<?php echo isset($injail) ? $injail : ""; ?>" /></td>
						</tr>
						<tr>
							<td>Description:</td>
							<td><textarea name="description" value="<?php echo isset($description) ? $description : ""; ?>"></textarea></td>
						</tr>
						<tr>
							<td>Aliases:</td>
							<td><textarea name="aliases" value="<?php echo isset($aliases) ? $aliases : ""; ?>"></textarea></td>
						</tr>
						<tr>
							<td></td>
							<td><input type="submit" name="addBtn" value="Add Entry" /></td>
						</tr>
					</table>
				</form>

			</div></div>

			<div id="footer">
				<div class="left">
					<!-- <a href="https://www.heytuts.com" target="_blank">HeyTuts.com</a> -->
				</div>
				<div class="right">
					<!-- <a target="_blank" href="https://www.heytuts.com/web-dev/php/simple-search-engine-in-php">read the article</a> |  -->
					<!-- <a target="_blank" href="https://www.heytuts.com/video/simple-search-engine-in-php">watch the video</a> -->
				</div>
				<div class="clear"></div>
			</div>

		</div>

	</body>
</html>