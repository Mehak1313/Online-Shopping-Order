<html>
<head>
<title>login page</title>
</head>

<body> 
<h1> Welcome to the Login Page...</h1>


<?php
session_start(); 
if( $_SESSION["logging"]&& $_SESSION["logged"])
{
     print_secure_content();
}
else {
    if(!$_SESSION["logging"])
    {  
    $_SESSION["logging"]=true;
    loginform();
    }
       else if($_SESSION["logging"])
       {
         $number_of_rows=checkpass();
         if($number_of_rows==1)
            {	
	         $_SESSION[user]=$_GET[userlogin];
	         $_SESSION[logged]=true;
	         print"<h1>you have loged in successfully</h1>";
			 
			 
			 setcookie('userlogin', $_POST['userlogin'],time()+3600);
			 setcookie('password', $_POST['password'],time()+3600);
			 
			 
	         print_secure_content();
            }
            else{
               	print "wrong pawssword or username, please try again";	
                loginform();
            }
        }
     }
     
function loginform()
{
	print "Please enter your information to proceed...";
	print ("<td>username</td><td><input type='text' name='userlogin' size'20'></td></tr><tr><td>password</td><td><input	type='password' 		name='password' size'20'></td></tr></table>");
	print "<input type='submit' >";	
}

function checkpass()
{
	$servername="localhost";
	$username="root";
	$conn=  mysql_connect($servername,$username)or die(mysql_error());
	mysql_select_db("test",$conn);
	$sql="select * from users where name='$_GET[userlogin]' and password='$_GET[password]'";
	$result=mysql_query($sql,$conn) or die(mysql_error());
	return  mysql_num_rows($result);
}

function print_secure_content()
{
	print("<b><h1>hi mr.$_SESSION[user]</h1>");
    print "<br><h2>Logged in</h2>";	
	
}
?>

</form>
</body>
</html>
