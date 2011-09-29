<?php

if(file_exists("functions.inc"))
require_once("functions.inc");

else
	{
		echo "<div style='text-align:center;color:red;font-size:24px'>Fatal Error. Contact Webmaster</div>";
		die();
	}
session_start();	
isLoggedIn("admin");

if(isset($_POST['adde']))
{
	$employees = count($_POST['name']);
	$query="";
	

	
	
	for($i=0;$i<$employees;$i++)
	{
	 $name= addslashes(htmlspecialchars($_POST['name'][$i]));
	 $age = addslashes(htmlspecialchars($_POST['age'][$i]));
	 $occupation = addslashes(htmlspecialchars($_POST['occupation'][$i]));
	 $address = addslashes(htmlspecialchars($_POST['address'][$i]));
	 $status = addslashes(htmlspecialchars($_POST['status'][$i]));
	

	
						
	
		
	 $query.= "INSERT into employee (name,age,occupation,address,status)
	 		 VALUES
	 		 (
	 	    '$name',
			'$age',
		    '$occupation',
	        '$address',
			'$status')
			 ;";
			 
			 
	}
	
	$con = mysqli_connect("localhost","root","") or die('Could not connect to db');
	$db = mysqli_select_db($con,"form") or die('Could not select databse');
	
	 mysqli_multi_query($con,$query) or die ("Could not run query");
    
	mysqli_close($con);
	
	header("Location:view.php");
	exit();
	
	
	
	
}


?>

<html>
	<head>
		<title>Add Employees</title>
		<link type="text/css" rel="stylesheet" href="reg.css"/>
	</head>
	<body class="page2">
		
		<h1>Add Employees</h1>
		<br/>
		
		<form method="post" onsubmit="return validate2()">
			How many?
			<input type="text" id="num" name="num" />
			<a href="view.php">
		<button type="button">Back</button>
	</a>
			<input type="submit" value="Generate" name="generate"/>
			
		</form>
	<?php
	if(isset($_POST['generate']))
	{
	?>
		
	 <form method="post" name="myform" onsubmit="return validate()" >
		<table class="page2" border="1" cellpadding="0" >
			
			<tr>
				
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

$num = $_POST['num'];






for($i=0;$i<$num;$i++)
{


	

?>
			
			<tr>
				
				<td>
					<input type="text" size ="15" name="name[]"/>				
				</td>
				
				<td>
					<input type="text" size="2" class="num" name="age[]"/>
				</td>
				
				<td>
			<select  name="occupation[]">
				<option value="">-Select-</option>
				<option value="Doctor">Doctor</option>
				<option value="Engineer">Engineer</option>
				<option value="Teacher">Teacher</option>
				<option value="Lawyer">Lawyer</option>
			</select>
				</td>
				
				<td>
					<input type="text" size ="15" name="address[]"/>
				</td>
				
				<td>
				<select name="status[]">
					<option value="">-Select-</option>
					<option value="1">Active</option>
					<option value="2">Inactive</option>
				</select>
				</td>
				
				
			</tr>
			
<?php
}


?>

			
		</table>
		
			<input type="hidden"  name="rows" value="<?php echo $num;?>"/>	
		<input type="submit" name="adde" value="Submit" />
			</form>
			<?php }?>

	</body>
	
	<script type="text/javascript" src="add.js"></script>
	
</html>