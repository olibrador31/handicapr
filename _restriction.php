<?

// vérifie si la session est enregistré

	$sess =session_id();
	$query = "SELECT session FROM user WHERE session='$sess'"; 
	
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	
	// si il est enregistré
	if ($row = mysql_num_rows($r)) {
		$row = mysql_fetch_row($r);
		$sess = $row[0];
		}
		else {
		$req = "'restriction.php'";
		echo $req;
		echo "<script type='text/javascript'>	document.location.replace($req); </script> ";
	}
	?>