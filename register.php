<?php

	session_start();
	session_destroy();
	session_start();
 
 
if($_GET["regname"] && $_GET["regmail"] && $_GET["regpass1"] && $_GET["regpass2"] )
{    

	if($_GET["regpass1"]==$_GET["regpass2"])
	{
		$servername="localhost";
    	$username="root";
    	$conn=  mysql_connect($servername,$username)or die(mysql_error());
		
    	mysql_select_db("test",$conn);
		
		
    	$sql="insert into users (name,email,password)values('$_GET[regname]','$_GET[regmail]','$_GET[regpass1]')";
    	$result=mysql_query($sql,$conn) or die(mysql_error());		
    	print "<h1>Registration sucessfull</h1>";
   
    	print "<a href='page1.php'>HERE is login page</a>";
	}
	
		else print "INCORRECT PASSWORD";
}
else print"Invalid Input Data";

?>
