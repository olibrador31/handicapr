<?

	
// Heure
$today = getdate();
$heurec = ($today['hours']*60+$today['minutes'])*60+$today['seconds'];
$date = date("Y-m-j"); 	
// découpage
$annee = substr($date, 0, 4);
$mois = substr($date, 5, 2);
$jour = substr($date, 8, 2); 
// affichage
$datec= $jour . '-' . $mois . '-' . $annee;

//recherche si pseudo existe 

$query = "SELECT pseudo FROM enligne WHERE pseudo='$moi'"; 

	// Execute la requete
	$r = mysql_query($query) or die ("votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");

	$i = mysql_num_rows($r);
	if ($i==0 ) { 
// si existe pas on le crée
$sql = "INSERT INTO enligne (id,pseudo,date,heure) ";
		$sql =$sql."VALUES ('','$moi','$datec','$heurec')";
		$result = mysql_query($sql) or die ("Error in query: $query. " . mysql_error()); 
}
else{
// si pseudo existe on update l heure


$query = "UPDATE enligne SET date='$datec',heure='$heurec' WHERE pseudo='$moi'"; 
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris ");
}

//Nombre de personne en ligne
$ppp=$heurec-60;
$query_ligne = "SELECT * FROM enligne WHERE date='$datec' AND heure>'$ppp' "; 

	// Execute la requete
	$l = mysql_query($query_ligne) or die ("votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
//nombre personne en ligne 60 sec
	$pligne = mysql_num_rows($l);

// heure et date pour toutes les pages

$datee=$datec;
$heuree=$heurec;

?>