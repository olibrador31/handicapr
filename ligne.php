// intialisation
$date = date("Y-m-j"); 
	
// Heure
$today = getdate();
$heure_l = $today['hours']."-".$today['minutes']."-".$today['seconds'];
		
// découpage
$annee = substr($date, 0, 4);
$mois = substr($date, 5, 2);
$ ur = substr($date, 8, 2); 
// affichage
$date_l= $jour . '-' . $mois . '-' . $annee;

$datee=$date_l;
$heuree=$heure_l;