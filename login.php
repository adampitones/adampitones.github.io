<?php 

define('DB_HOST', 'database-new.cse.tamu.edu'); 
define('DB_NAME', 'kai3092-db1'); 
define('DB_USER','kai3092'); 
define('DB_PASSWORD','Iamkingoftheworld!'); 
$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error()); 
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());



function SignIn() { 

session_start(); //starting the session for user profile page



	if(!empty($_POST['user'])) //checking the 'user' name which is from index.html, is it empty or have some text 
	{ 
	 
		$query = mysql_query("SELECT * FROM UserName where userName = '$_POST[user]' AND pass = '$_POST[pass]'") or die(mysql_error()); 
		$row = mysql_fetch_array($query); 
		


		if(!empty($row['userName']) AND !empty($row['pass'])) 
		{ 
			$_SESSION['logged_in'] = true;
			$_SESSION['userName'] = $row['userName'];
			//$_SESSION['userName'] = $row['pass'];

			header("Location: course_page.php"); /* Redirect browser */
			//echo "SUCCESSFULLY LOGIN TO USER PROFILE PAGE..."; 
		} 
		else 
		{ 	
			$_SESSION['logged_in'] = false;	
			header ("refresh:1;url=index.html" ); /* Redirect browser */
			echo "SORRY... YOU ENTERD WRONG ID AND PASSWORD... PLEASE RETRY...";			
		} 

	}  
} 

if(isset($_POST['submit'])) 
{ 

	SignIn(); 

} 

?>
