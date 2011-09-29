<?php
if(file_exists("functions.inc"))
require_once("functions.inc");

else
	{
		echo "<div style='text-align:center;color:red;font-size:24px'>Fatal Error. Contact Webmaster</div>";
		die();
	}



$con = dbConnect();





				
?>

<html>
	<head>
		<title> Employee Details </title>
		<link type="text/css" rel="stylesheet" href="reg.css"/>
	</head>
	<body class="page2">
		
		<h1> Employee Details</h1>
		<br/>
	    <form method="post">
	    	<input type="text" name="query" />
	    	<input type="submit" name="search" value="Search" />
	    	
	    </form>

		
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

if(isset($_POST['search']))
{
	$searchString = $_POST['query'];
	$query = "SELECT *
from employee
where name like '%$searchString%'
or address like '%$searchString%'
ORDER BY name
";
	
}
else		
$query = "SELECT * 
FROM employee
order by name
";

$result = mysql_query($query) or die("Error running query");
while($row =mysql_fetch_assoc($result))
{		
		
?>
			<?php
			if($row['status']=="Active")
				echo '<tr class="active hv">';
			else 
				echo '<tr class="inactive hv">';
			
			
			?>
			
				
				<td>
					<?php echo $row['username']?>
				</td>
				
				<td>
					<?php echo $row['name']?>
				</td>
				
				<td>
					<?php echo $row['age']?>
				</td>
				
				<td>
					<?php echo $row['occupation']?>
				</td>
				
				<td>
					<?php echo $row['address']?>
				</td>
				
				<td>
					<?php echo $row['status']?>
				</td>
			</tr>
			<?php
}
mysql_close($con);
?>
			
		</table>
		
	<br/>
	
	<a href="index.php">
		<button type="button">Home</button>
	</a>
	<a href="edit.php">
		<button type="button">Edit Employees</button>
	</a>
	<a href="add.php">
		<button type="button">Add Employees</button>
	</a>
	
	
	


	</body>
	

</html>