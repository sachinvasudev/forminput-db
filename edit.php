<?php

if(file_exists("functions.inc"))
require_once("functions.inc");

else
	{
		echo "<div style='text-align:center;color:red;font-size:24px'>Fatal Error. Contact Webmaster</div>";
		die();
	}
session_start();
if(isLoggedIn("admin"));


if(isset($_POST['edit']))
{
	$employees = count($_POST['name']);
	$query="";
	if(isset($_POST['delete']))
		$delete = $_POST['delete'];
	else 
		$delete = array();

	$con = dbConnect();
	
	
	for($i=0;$i<$employees;$i++)
	{
	 $username= addslashes(htmlspecialchars($_POST['username'][$i]));
	 $name= addslashes(htmlspecialchars($_POST['name'][$i]));
	 $age = addslashes(htmlspecialchars($_POST['age'][$i]));
	 $occupation = addslashes(htmlspecialchars($_POST['occupation'][$i]));
	 $address = addslashes(htmlspecialchars($_POST['address'][$i]));
	 $status = addslashes(htmlspecialchars($_POST['status'][$i]));
	

	
		
	 $query= "UPDATE sachin_employee SET
	 	     name =  '$name',
			 age =  '$age',
			 occupation =  '$occupation',
			 address =  '$address',
			 status =  '$status'
			 WHERE  username = '$username'";
			 
			 mysql_query($query,$con) or die ("Could not run query ");
			 
	}
	
	
	
	 
    
	
	$query2="";
	
	foreach($delete as $val)
	{
		$query2.="DELETE FROM sachin_employee where username = '$val';";
		mysql_query($query2,$con) or die ("Could not run query ".mysql_error($con));
	}
	

	
	mysql_close($con);
	header("Location:view.php");
	exit();
	
	
	
	
}


?>

<html>
	<head>
		<title> Edit Employee Details </title>
		<link type="text/css" rel="stylesheet" href="reg.css"/>
	</head>
	<body class="page2">
		
		<h1> Edit Employee Details</h1>
		<br/>
	 <form method="post" name="myform" onsubmit="return validate()" >
		<table class="page2" border="1" cellpadding="0" >
			
			<tr>
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
				
				<th>
					Delete
				</th>
			</tr>

<?php

$occupations = array("Doctor","Engineer","Teacher","Lawyer");
$statuss = array("Active","Inactive");

$con = dbConnect();

$result = getEmployees($con);
$employees = mysql_num_rows($result);

for($i=0;$i<$employees;$i++)
{

$employee = mysql_fetch_assoc($result);
	

			
			if($employee['status']=="Active")
				echo '<tr class="active hv">';
			else 
				echo '<tr class="inactive hv">';
?>
			
			
				<td>
				    <input type="text" readonly="readonly" size ="15" name="username[]" value="<?php echo $employee['username'];?>"/>	
				</td>
				
				<td>
					<input type="text" size ="15" name="name[]" value="<?php echo $employee['name'];?>"/>				
				</td>
				
				<td>
					<input type="text" size="2" class="num" name="age[]" value="<?php echo $employee['age'];?>"/>
				</td>
				
				<td>
			
				<?php
				if($employee['status']=="Active")
				echo '<select class="active" name="occupation[]">';
			else 
				echo '<select class="inactive" name="occupation[]">';
				
				foreach($occupations as $val)
				{
					
					if($val==$employee['occupation'])
					echo '<option value="',$val,'" selected="selected">',$val,'</option>';
					else
					echo '<option value="',$val,'">',$val,'</option>';
				}
				?>
			</select>
				</td>
				
				<td>
					<input type="text" size ="15" name="address[]" value="<?php echo $employee['address'];?>"/>
				</td>
				
				<td>
			
				<?php
				
				if($employee['status']=="Active")
				echo '<select class="active" name="status[]">';
			else 
				echo '<select class="inactive" name="status[]">';
				foreach($statuss as $val)
				{
					
					if($val==$employee['status'])
					echo '<option value="',$val,'" selected="selected">',$val,'</option>';
					else
					echo '<option value="',$val,'">',$val,'</option>';
				}
				?>
			</select>
				</td>
				
				<td style="text-align: center">
					<input type="checkbox" name="delete[]" value="<?php echo $employee['username'];?>"/>
				</td>
			</tr>
			
<?php
}
mysql_close($con);
?>

			
		</table>
		<a href="view.php">
		<button type="button">Back</button>
	</a>
			<input type="hidden"  name="rows" value="<?php echo $employees;?>"/>	
		<input type="submit" name="edit" value="Submit" />
		
			</form>

	</body>
	
	<script type="text/javascript" src="edit.js"></script>
	
</html>