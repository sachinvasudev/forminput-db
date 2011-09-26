<?php
if(isset($_POST['edit']))
{
	$rows = count($_POST['name']);
	$query="";
	if(isset($_POST['delete']))
		$delete = $_POST['delete'];
	else 
		$delete = array();

	
	
	for($i=0;$i<$rows;$i++)
	{
	 $name= $_POST['name'][$i];
	 $age = $_POST['age'][$i];
	 $occupation = $_POST['occupation'][$i];
	 $address = $_POST['address'][$i];
	 $status = $_POST['status'][$i];
	 $id = $_POST['id'][$i];

	
	
		
	 $query.= "UPDATE employee SET
	 	     name =  '$name',
			 age =  '$age',
			 occupation =  '$occupation',
			 address =  '$address',
			 status =  '$status'
			 WHERE  id = '$id';";
			 
			 
	}
	
	$con = mysqli_connect("localhost","root","") or die('Could not connect to db');
	$db = mysqli_select_db($con,"form") or die('Could not select databse');
	
	 mysqli_multi_query($con,$query) or die ("Could not run query");
     while(mysqli_next_result($con)){}
	
	$query2="";
	
	foreach($delete as $val)
	{
		$query2.="DELETE FROM employee where id = '$val';";
	}
	echo $query2.'<br/>';
	if($query2!="")
	mysqli_multi_query($con,$query2) or die ("Could not run query ".mysqli_error($con));
	mysqli_close($con);
	header("Location:view.php");
	
	
	
	
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
	 <form method="post" >
		<table border="">
			
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
				
				<th>
					Delete
				</th>
			</tr>

<?php

$occupations = array("Doctor","Engineer","Teacher","Lawyer");
$statuss = array("Active","Inactive");

$con = mysql_connect("localhost","root","") or die('Could not connect to db');
$db = mysql_select_db("form") or die('Could not select databse');
$query = "SELECT * 
FROM employee";

$result = mysql_query($query) or die("Error running query");
$rows = mysql_num_rows($result);

for($i=0;$i<$rows;$i++)
{

$row = mysql_fetch_assoc($result);
	

?>
			
			<tr>
				<td>
				    <input type="text" readonly="readonly" size ="15" name="id[]" value="<?php echo $row['id'];?>"/>	
				</td>
				
				<td>
					<input type="text" size ="15" name="name[]" value="<?php echo $row['name'];?>"/>				
				</td>
				
				<td>
					<input type="text" size="2" name="age[]" value="<?php echo $row['age'];?>"/>
				</td>
				
				<td>
			<select name="occupation[]">
				<?php
				foreach($occupations as $val)
				{
					
					if($val==$row['occupation'])
					echo '<option value="',$val,'" selected="selected">',$val,'</option>';
					else
					echo '<option value="',$val,'">',$val,'</option>';
				}
				?>
			</select>
				</td>
				
				<td>
					<input type="text" size ="15" name="address[]" value="<?php echo $row['address'];?>"/>	
				</td>
				
				<td>
			<select name="status[]">
				<?php
				foreach($statuss as $val)
				{
					
					if($val==$row['status'])
					echo '<option value="',$val,'" selected="selected">',$val,'</option>';
					else
					echo '<option value="',$val,'">',$val,'</option>';
				}
				?>
			</select>
				</td>
				
				<td>
					<input type="checkbox" name="delete[]" value="<?php echo $row['id'];?>"/>
				</td>
			</tr>
			
<?php
}
mysql_close($con);
?>

			
		</table>
			<input type="hidden"  name="rows" value="<?php echo $rows;?>"/>	
		<input type="submit" name="edit" />
			</form>

	</body>
	
</html>