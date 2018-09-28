<?

// initialization

$host = "mysql5-17.60gp"; 
$user = "handicapf"; 
$passc = "2j3ANWuP"; 
$db = "handicapfspeed"; 
	
// Ouvre la connexion
	$connection = mysql_connect($host, $user, $passc) or die ("Unable to connect!"); 

// Selectionne la base
mysql_select_db($db) or die ("Unable to select database!"); 
?>