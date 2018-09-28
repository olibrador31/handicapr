<?
//pour envoyer
$query = "SELECT * FROM envoyer WHERE expediteur='$pseudo_ident'"; 
	
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$nb_envoyer = mysql_num_rows($r);


//pour reçu
$query = "SELECT * FROM message WHERE lu='n' AND destinataire='$pseudo_ident'"; 
	
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$nb_recu = mysql_num_rows($r);





?>
