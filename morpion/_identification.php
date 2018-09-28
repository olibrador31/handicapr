<?
// script d'identification ---------------------------------------------------------------------------------------------
$erreur_ident = "";
$message_acceuil = "";

session_start();
$session_d = session_id();
//si il est pas encore identifier
$query = "SELECT pseudo,session FROM user WHERE session='$session_d'"; 
	
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	
if(mysql_num_rows($r)) {
	// il s'est identifié au paravent
	// récupération des donné
	$row = mysql_fetch_row($r);
	$pseudo_ident = $row[0];
$moi=$pseudo_ident;
	//pour reçu
	$query = "SELECT * FROM message WHERE lu='n' AND destinataire='$pseudo_ident'"; 
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");							
	$nb_recu = mysql_num_rows($r);
	$message_acceuil = "<a href='profil.php?pseudo_envoi=$pseudo_ident'>$pseudo_ident</a>, vous avez <a href='message.php'>$nb_recu message(s)</a> non lu(s)";
	}
	else {
	$message_acceuil = "Bienvenu(e) Visiteur, <a href='inscription1.php'>identifiez vous sur handicaperencontre</a>";
	}

//si il s'identifie
if ($_POST['ident']=="oui") {
	
	$pseudo_ident = $_POST['pseudo_ident'];
	$pass_ident = $_POST['pass_ident'];
	$query = "SELECT pseudo,pass,session FROM user WHERE pseudo='$pseudo_ident'"; 
	
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	
	if(mysql_num_rows($r)) {
		$row = mysql_fetch_row($r);
		$pass_reel = $row[1];
		
		if ($pass_reel == $pass_ident) {
			// récupération de la session
			$session = $row[2];
			session_destroy();
			session_id($session);
			session_start();
			
			//pour reçu
			$query = "SELECT * FROM message WHERE lu='n' AND destinataire='$pseudo_ident'"; 
			$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
			$nb_recu = mysql_num_rows($r);
			$message_acceuil = "Bienvenu(e) <a href='profil.php?pseudo_envoi=$pseudo_ident'>$pseudo_ident</a>, vous avez <a href='message.php'>$nb_recu message(s)</a> non lu(s)";
		}
		else {
			$erreur_ident = "Erreur : Pseudonime / Mot de pass Incorect";
		}
	}
	else {
		$erreur_ident = "Erreur : Pseudonime / Mot de pass Incorect";

	}
}

// FIN script d'identification -----------------------------------------------------------------------------------------


// FIN script d'identification -----------------------------------------------------------------------------------------

?>