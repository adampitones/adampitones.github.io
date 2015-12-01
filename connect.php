<?php
//connect.php
$server = 'database-new.cse.tamu.edu';
$username   = 'kai3092';
$password   = 'Iamkingoftheworld!';
$database   = 'kai3092-db1';
 
if(!mysql_connect($server, $username,  $password))
{
    exit('Error: could not establish database connection');
}
if(!mysql_select_db($database)
{
    exit('Error: could not select the database');
}
?>