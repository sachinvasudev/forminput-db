<?php

function dbConnect()
{
		
	$db = mysql_connect("localhost","root","") or die('Could not connect to db');
	mysql_select_db("form") or die('Could not select databse');
	return $db;


}

function dbConnectI()
{
	$db = mysqli_connect("localhost","root","") or die('Could not connect to db');
	mysqli_select_db($db,"form") or die('Could not select databse');
	return $db;
}

function idExists($uname,$conn)
{
	$query = "select count(*) from employee 
	 where username='$uname'";
	 
	 $result =mysql_query($query,$conn) or die("Could not run query");
	$count = mysql_result($result,0,0);
	if($count==1)
		return true;
	else
		return false;
				
	
}

function getEmployees($conn)
{
	$query = "SELECT * 
FROM employee
ORDER BY name DESC 
LIMIT 1";

$result = mysql_query($query,$conn) or die("Error running query");
return $result;
}

function addEmployees($empArray,$conn)
{
	
	
}

?>