<?php
session_start(); 
if(session_destroy())
{
	print"<h2>LOGGED OUT successfully</h2>";
	print "<h3><a href='index.php'>Return to the login page</a></h3>";
}
?>
