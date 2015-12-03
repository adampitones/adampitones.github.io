<?php
include 'connect.php';
session_start();
unset ($_SESSION['logged_in']);
session_destroy();
header ("refresh:1;url=index.html" );
echo 'Logged out successfully.';
mysql_close($con);
exit ();
?>