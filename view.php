<?php




$con = mysql_connect("localhost","root","") or die('Could not connect to db');
$db = mysql_select_db("form") or die('Could not select databse');

$query = "SELECT * 
FROM employee
ORDER BY id DESC 
LIMIT 1";

$result = mysql_query($query) or die("Error running query");
$row =mysql_fetch_assoc($result);




				
?>

<html>
	<head>
		<title> Employee Details </title>
		<link type="text/css" rel="stylesheet" href="reg.css"/>
	</head>
	<body class="page2">
		
		<h1> Employee Details</h1>
		<br/>
		<table border="1">
			<tr>
				<th>
					ID
				</th>
				
				<td>
					<?php echo $row['id']?>
				</td>
				
			</tr>
			
			<tr>
				<th>
					Name
				</th>
				
				<td>
					<?php echo $row['name']?>
				</td>
				
			</tr>
			
			<tr>
				<th>
					Age
				</th>
				
				<td>
					<?php echo $row['age']?>
				</td>
				
			</tr>
			
			<tr>
				<th>
					Occupation
				</th>
				
				<td>
					<?php echo $row['occupation']?>
				</td>
				
			</tr>
			
			<tr>
				<th>
					Address
				</th>
				
				<td>
					<?php echo $row['address']?>
				</td>
				
			</tr>
			
			<tr>
				<th>
					Status
				</th>
				
				<td>
					<?php echo $row['status']?>
				</td>
				
			</tr>
		</table>
		
		<br/>
		

		
		<table border="1">
			
			<tr>
				<th>
					ID
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
		
$query = "SELECT * 
FROM employee
order by id
";

$result = mysql_query($query) or die("Error running query");
while($row =mysql_fetch_assoc($result))
{		
		
?>
			
			<tr>
				<td>
					<?php echo $row['id']?>
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
		<button type="button">Edit</button>
	</a>
	
	


	</body>
	

</html>