<?php
if(file_exists("functions.inc"))
require_once("functions.inc");

else
	{
		echo "<div style='text-align:center;color:red;font-size:24px'>Fatal Error. Contact Webmaster</div>";
		die();
	}

session_start();
isLoggedIn("employee");


	$username= $_SESSION['username'];
	$con = dbConnect();
	
	$employee= mysql_fetch_assoc(getEmployee($username,$con));
	
	



?>

<html>
	<head>
		
		<title> Employee Login </title>
		<link type="text/css" rel="stylesheet" href="reg.css"/>
	</head>
	<body class="page2">
		
		<h1> Employee Home</h1>
		<br/><br/>
		
		
	<h2 class="empl">Welcome, <?php echo $employee['name'];?></h3>
	<h3 class="empl">Your last login was on <?php echo $employee['history']; ?></h3>
	<h3 class="empl">Your details are as follows</h3>
	
	<table border="1" cellpadding="5" class="page2">
			
			<tr >
				
				<th>
					Username
				</th>
				
				<th>
					Name
				</th>
				
				<th>
					Age
				</th>
				
				<th>
					Occupation
				</th>
				
				<th>
					Address
				</th>
				
				<th>
					Status
				</th>
			</tr>
			
			
		

			<?php
			if($employee['status']=="Active")
				echo '<tr class="active hv">';
			else 
				echo '<tr class="inactive hv">';
			
			
			?>
			
				
				<td>
					<?php echo $employee['username']?>
				</td>
				
				<td>
					<?php echo $employee['name']?>
				</td>
				
				<td>
					<?php echo $employee['age']?>
				</td>
				
				<td>
					<?php echo $employee['occupation']?>
				</td>
				
				<td>
					<?php echo $employee['address']?>
				</td>
				
				<td>
					<?php echo $employee['status']?>
				</td>
			</tr>
			
			

			
	</table>
	
	<a href="logout.php">
						<button>Logout</button>
					</a>
	
	</body>
	
</html>