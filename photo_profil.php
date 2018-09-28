<?
require '_bdd.php';
require '_identification.php';
require '_restriction.php';
require 'lignechat.php';$moi=$pseudo_ident;

$resultat_ajouter="";
$aff_modifier = "";
// update la base even pour les com des photos soit a 1 aaa

$query = "UPDATE even SET vu='1' WHERE des='$pseudo_ident'AND (even='photo0') "; 

	
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris11 ");
	$query = "UPDATE even SET vu='1' WHERE des='$pseudo_ident'AND (even='photo1') "; 
		// Execute la requete
	$r = mysql_query($query) or die ("Pas pris11 ");
	
	
	$query = "UPDATE even SET vu='1' WHERE des='$pseudo_ident'AND (even='photo2') "; 

	
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris11 ");
	$query = "UPDATE even SET vu='1' WHERE des='$pseudo_ident'AND (even='photo3') "; 

	
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris11 ");
	$query = "UPDATE even SET vu='1' WHERE des='$pseudo_ident'AND (even='photo4') "; 

	
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris11 ");
		$query = "UPDATE even SET vu='1' WHERE des='$pseudo_ident'AND (even='photo5') "; 
	
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris11 ");
	
// pour suprimer un com
$idsupr = $_GET['idd'];
 $query = "DELETE FROM comphoto WHERE id=$idsupr";    
	// Execute la requete
	if(!empty($idsupr)) $r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	

$pseudo_ident = $_GET['pseudo_envoi'];


// récupère les coms des photos

$com_photo0 = $_POST['photo0'];
$com_photo1 = $_POST['photo1'];
$com_photo2 = $_POST['photo2'];
$com_photo3 = $_POST['photo3'];
$com_photo4 = $_POST['photo4'];
$com_photo5 = $_POST['photo5'];

$achercher="www";

$verif0= strpos ($com_photo0,$achercher);
$verif1= strpos ($com_photo1,$achercher);
$verif2= strpos ($com_photo2,$achercher);
$verif3= strpos ($com_photo3,$achercher);
$verif4= strpos ($com_photo4,$achercher);
$verif5= strpos ($com_photo5,$achercher);

	if(!empty($com_photo0)AND $verif0 ===FALSE) { 

//traite les caractère pourri

	$com_photo0 = str_replace("'","§§",$com_photo0);
		$com_photo1 = str_replace("'","§§",$com_photo1);
			$com_photo2 = str_replace("'","§§",$com_photo2);
				$com_photo3 = str_replace("'","§§",$com_photo3);
					$com_photo4 = str_replace("'","§§",$com_photo4);
						$com_photo5 = str_replace("'","§§",$com_photo5);
						
//Variables :


 $headers ='From:   handicaperencontre.fr/"'."\n";
     $headers .='Content-Type: text/html; charset="iso-8859-1"'."\n";
     $headers .='Content-Transfer-Encoding: 8bit';


//recherche du mail destinataire
	$query = "SELECT mail FROM user WHERE pseudo='$pseudo_ident'"; 
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");


	
		$row = mysql_fetch_row($r);


$mail_des = $row[0];



// enregistrer les com
								
								$message = str_replace("'","§§",$message);
		$objet = str_replace("'","§§",$objet);
		// intialisation
		$date = date("Y-m-j"); 
		// Heure
		$today = getdate();
		$heuree = $today['hours']."h".$today['minutes']."m".$today['seconds']."s";
		// découpage
		$annee = substr($date, 0, 4);
		$mois = substr($date, 5, 2);
		$jour = substr($date, 8, 2); 
		// affichage
		
		//A faire pour chaque photo si variable pas vide  identifier par raport au pseudo destinataire et num photo
		$datee= $jour . '-' . $mois . '-';
		// Pour chaque photo on test et si pas vide on enregistre
		
		
		
// Envoi du mail
$message ="<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'
'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<head>
<title>mail handicaperencontre</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<style type='text/css'>
<!--
body {
	background-color: #F9E3F0;
}
-->
</style>
<link href='vbbcv.css' rel='stylesheet' type='text/css'>
<style type='text/css'>
<!--
.Style13 {color: #000000; font-weight: bold; }
-->
</style>

  <table width='800'  border='0' align='left' cellpadding='1' cellspacing='0' bgcolor='#000000'>
    <tr>
      <td><table width='100%' height='100%'  border='0' align='center' cellpadding='0' cellspacing='0'>
          
                <table width='100%'  border='0' cellspacing='0' cellpadding='3'>
                  <tr bgcolor='#AFBFCF'>
                    <td bgcolor='#FFDFFF'><div align='center'>
                        <p><span class='Style13'>::. Vous avez reçu un commentaire sur votre mur  handicaperencontre.fr.:: </span></p>
                    </div></td>
                  </tr>
                  <tr bgcolor='#AFBFCF'>
                    <td bgcolor='#FFFFFF'>&nbsp;&nbsp;&nbsp;
                        <p align='center' class='Style13'>vous avez reçu un commentaire sur votre photo 1 de $moi   votre login__ :".$pseudo_envoi."<br><br>pour voir le commentaire clickez sur le lien  et identifiez vous sur le site  :<br><br> <a href='http://www.handicaperencontre.fr/mur.php?pseudo_envoi=$pseudo_envoi'><a href='http://www.handicaperencontre.fr/photo_profil.php?pseudo_envoi=$pseudo_envoi '>voir le commentaire  sur votre photo 1 du site handicaperencontre.fr</a>

                  </tr>
                </table>
                <strong><br />
                </strong></div>            
              <div align='center'></div></td></tr>
          
      </table></td>
    </tr>
  </table>
</body>
</html>";

$sujet = "vous avez reçu un commentaire de $moi sur votre photo 1 sur handicaperencontre";
$to=$mail; $from="icedenice@live.fr\r\n";   //appel de la fonction mail (envoi):

$message = eregi_replace("([_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+)",
                       "____", $message);
$message = str_replace("§§","'",$message);


// eviter com sans nom spam  MAIL ET SITE WEB

$spam=0;

if (substr_count($message,"@")==1) $spam=1;
if (substr_count($message,"www")==1) $spam=1;
if (substr_count($message,".fr")==1) $spam=1;
if (substr_count($message,".com")==1) $spam=1;
if (substr_count($message,"arobase")==1) $spam=1;
if (substr_count($message,"http")==1) $spam=1;

if (substr_count($message,"href")==1) $spam=1;
if (substr_count($message,"//")==1) $spam=1;


if (substr_count($message,"skype")==1) $spam=1;

if (substr_count($message,"facebook")==1) $spam=1;

// suprimer le mec qui SPAM  MAIL ET SITE WEB

if ($spam==1) {  $query = "DELETE FROM user WHERE pseudo='$moi'";  
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");


$moi="";
$com_photo0="";
}


if ($spam==0) {
 mail($mail_des,$sujet,$message,$headers);

		$sql = "INSERT INTO comphoto (id,destinateur,numphoto,message,date,heure,exp) ";
		$sql =$sql."VALUES ('','$pseudo_ident','0','$com_photo0','$datee','$heuree','$moi')";
$result = mysql_query($sql) or die ("Error in query: $query. " . mysql_error());
// placer dans bdd des evenements
$sqleven = "INSERT INTO even(id,des,exp,even,date,heure) ";
		$sqleven =$sqleven."VALUES ('','$pseudo_ident','$moi','photo0','$datee','$heuree')";
		$result = mysql_query($sqleven) or die ("Error in query: $query. " . mysql_error()); 
		

 }} if(!empty($com_photo1)AND $verif1 ===FALSE AND $spam==0 AND !empty($moi)) { 
// Envoi du mail
// Envoi du mail
$message ="<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'
'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<head>
<title>mail handicaperencontre</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<style type='text/css'>
<!--
body {
	background-color: #F9E3F0;
}
-->
</style>
<link href='vbbcv.css' rel='stylesheet' type='text/css'>
<style type='text/css'>
<!--
.Style13 {color: #000000; font-weight: bold; }
-->
</style>

  <table width='800'  border='0' align='left' cellpadding='1' cellspacing='0' bgcolor='#000000'>
    <tr>
      <td><table width='100%' height='100%'  border='0' align='center' cellpadding='0' cellspacing='0'>
          
                <table width='100%'  border='0' cellspacing='0' cellpadding='3'>
                  <tr bgcolor='#AFBFCF'>
                    <td bgcolor='#FFDFFF'><div align='center'>
                        <p><span class='Style13'>::. Vous avez reçu un commentaire sur votre mur  handicaperencontre.fr.:: </span></p>
                    </div></td>
                  </tr>
                  <tr bgcolor='#AFBFCF'>
                    <td bgcolor='#FFFFFF'>&nbsp;&nbsp;&nbsp;
                        <p align='center' class='Style13'>vous avez reçu un commentaire sur votre photo 2 de $moi   votre login__ :".$pseudo_envoi."<br><br>pour voir le commentaire clickez sur le lien  et identifiez vous sur le site  :<br><br> <a href='http://www.handicaperencontre.fr/mur.php?pseudo_envoi=$pseudo_envoi'><a href='http://www.handicaperencontre.fr/photo_profil.php?pseudo_envoi=$pseudo_envoi '>voir le commentaire  sur votre photo 2 du site handicaperencontre.fr</a>

                  </tr>
                </table>
                <strong><br />
                </strong></div>            
              <div align='center'></div></td></tr>
          
      </table></td>
    </tr>
  </table>
</body>
</html>";

$sujet = "vous avez reçu un commentaire sur votre photo 2 http://www.handicaperencontre.fr/  ::";
$to=$mail; $from="icedenice@live.fr\r\n";   //appel de la fonction mail (envoi):

$message = eregi_replace("([_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+)",
                       "____", $message);
$message = str_replace("§§","'",$message);


 mail($mail_des,$sujet,$message,$headers);

		$sql = "INSERT INTO comphoto (id,destinateur,numphoto,message,date,heure,exp) ";
		$sql =$sql."VALUES ('','$pseudo_ident','1','$com_photo1','$datee','$heuree','$moi')";
		$result = mysql_query($sql) or die ("Error in query: $query. " . mysql_error());
// placer dans bdd des evenements
$sqleven = "INSERT INTO even(id,des,exp,even,date,heure) ";
		$sqleven =$sqleven."VALUES ('','$pseudo_ident','$moi','photo1','$datee','$heuree')";
		$result = mysql_query($sqleven) or die ("Error in query: $query. " . mysql_error()); 
 }
 if(!empty($com_photo2)AND $verif2 ===FALSE AND $spam==0 AND !empty($moi)) { 
// Envoi du mail
// Envoi du mail
$message ="<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'
'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<head>
<title>mail handicaperencontre</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<style type='text/css'>
<!--
body {
	background-color: #F9E3F0;
}
-->
</style>
<link href='vbbcv.css' rel='stylesheet' type='text/css'>
<style type='text/css'>
<!--
.Style13 {color: #000000; font-weight: bold; }
-->
</style>

  <table width='800'  border='0' align='left' cellpadding='1' cellspacing='0' bgcolor='#000000'>
    <tr>
      <td><table width='100%' height='100%'  border='0' align='center' cellpadding='0' cellspacing='0'>
          
                <table width='100%'  border='0' cellspacing='0' cellpadding='3'>
                  <tr bgcolor='#AFBFCF'>
                    <td bgcolor='#FFDFFF'><div align='center'>
                        <p><span class='Style13'>::. Vous avez reçu un commentaire sur votre mur  handicaperencontre.fr.:: </span></p>
                    </div></td>
                  </tr>
                  <tr bgcolor='#AFBFCF'>
                    <td bgcolor='#FFFFFF'>&nbsp;&nbsp;&nbsp;
                        <p align='center' class='Style13'>vous avez reçu un commentaire sur votre photo 3 de $moi   votre login__ :".$pseudo_envoi."<br><br>pour voir le commentaire clickez sur le lien  et identifiez vous sur le site  :<br><br> <a href='http://www.handicaperencontre.fr/mur.php?pseudo_envoi=$pseudo_envoi'><a href='http://www.handicaperencontre.fr/photo_profil.php?pseudo_envoi=$pseudo_envoi '>voir le commentaire  sur votre photo 3 du site handicaperencontre.fr</a>

                  </tr>
                </table>
                <strong><br />
                </strong></div>            
              <div align='center'></div></td></tr>
          
      </table></td>
    </tr>
  </table>
</body>
</html>";

$to=$mail; $from="icedenice@live.fr\r\n";   //appel de la fonction mail (envoi):

$message = eregi_replace("([_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+)",
                       "____", $message);
$message = str_replace("§§","'",$message);

$sujet = "vous avez reçu un commentaire sur votre photo 3 http://www.handicaperencontre.fr/  ::";


 mail($mail_des,$sujet,$message,$headers);

		$sql = "INSERT INTO comphoto (id,destinateur,numphoto,message,date,heure,exp) ";
		$sql =$sql."VALUES ('','$pseudo_ident','2','$com_photo2','$datee','$heuree','$moi')";
		$result = mysql_query($sql) or die ("Error in query: $query. " . mysql_error());
$sqleven = "INSERT INTO even(id,des,exp,even,date,heure) ";
		$sqleven =$sqleven."VALUES ('','$pseudo_ident','$moi','photo2','$datee','$heuree')";
		$result = mysql_query($sqleven) or die ("Error in query: $query. " . mysql_error()); 
 }
 if(!empty($com_photo3)AND $verif3 ===FALSE AND $spam==0 AND !empty($moi)) { 
// Envoi du mail
// Envoi du mail
$message ="<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'
'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<head>
<title>mail handicaperencontre</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<style type='text/css'>
<!--
body {
	background-color: #F9E3F0;
}
-->
</style>
<link href='vbbcv.css' rel='stylesheet' type='text/css'>
<style type='text/css'>
<!--
.Style13 {color: #000000; font-weight: bold; }
-->
</style>

  <table width='800'  border='0' align='left' cellpadding='1' cellspacing='0' bgcolor='#000000'>
    <tr>
      <td><table width='100%' height='100%'  border='0' align='center' cellpadding='0' cellspacing='0'>
          
                <table width='100%'  border='0' cellspacing='0' cellpadding='3'>
                  <tr bgcolor='#AFBFCF'>
                    <td bgcolor='#FFDFFF'><div align='center'>
                        <p><span class='Style13'>::. Vous avez reçu un commentaire sur votre mur  handicaperencontre.fr.:: </span></p>
                    </div></td>
                  </tr>
                  <tr bgcolor='#AFBFCF'>
                    <td bgcolor='#FFFFFF'>&nbsp;&nbsp;&nbsp;
                        <p align='center' class='Style13'>vous avez reçu un commentaire sur votre photo 4 de $moi   votre login__ :".$pseudo_envoi."<br><br>pour voir le commentaire clickez sur le lien  et identifiez vous sur le site  :<br><br> <a href='http://www.handicaperencontre.fr/mur.php?pseudo_envoi=$pseudo_envoi'><a href='http://www.handicaperencontre.fr/photo_profil.php?pseudo_envoi=$pseudo_envoi '>voir le commentaire  sur votre photo 4 du site handicaperencontre.fr</a>

                  </tr>
                </table>
                <strong><br />
                </strong></div>            
              <div align='center'></div></td></tr>
          
      </table></td>
    </tr>
  </table>
</body>
</html>";

$to=$mail; $from="icedenice@live.fr\r\n";   //appel de la fonction mail (envoi):

$message = eregi_replace("([_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+)",
                       "____", $message);
$message = str_replace("§§","'",$message);

$sujet = "vous avez reçu un commentaire sur votre photo 4 http://www.handicaperencontre.fr/  ::";

 mail($mail_des,$sujet,$message,$headers);

		$sql = "INSERT INTO comphoto (id,destinateur,numphoto,message,date,heure,exp) ";
		$sql =$sql."VALUES ('','$pseudo_ident','3','$com_photo3','$datee','$heuree','$moi')";
		$result = mysql_query($sql) or die ("Error in query: $query. " . mysql_error());
$sqleven = "INSERT INTO even(id,des,exp,even,date,heure) ";
		$sqleven =$sqleven."VALUES ('','$pseudo_ident','$moi','photo3','$datee','$heuree')";
		$result = mysql_query($sqleven) or die ("Error in query: $query. " . mysql_error()); 
 }
 if(!empty($com_photo4)AND $verif4 ===FALSE AND $spam==0 AND !empty($moi)) { 
// Envoi du mail
// Envoi du mail
$message ="<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'
'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<head>
<title>mail handicaperencontre</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<style type='text/css'>
<!--
body {
	background-color: #F9E3F0;
}
-->
</style>
<link href='vbbcv.css' rel='stylesheet' type='text/css'>
<style type='text/css'>
<!--
.Style13 {color: #000000; font-weight: bold; }
-->
</style>

  <table width='800'  border='0' align='left' cellpadding='1' cellspacing='0' bgcolor='#000000'>
    <tr>
      <td><table width='100%' height='100%'  border='0' align='center' cellpadding='0' cellspacing='0'>
          
                <table width='100%'  border='0' cellspacing='0' cellpadding='3'>
                  <tr bgcolor='#AFBFCF'>
                    <td bgcolor='#FFDFFF'><div align='center'>
                        <p><span class='Style13'>::. Vous avez reçu un commentaire sur votre mur  handicaperencontre.fr.:: </span></p>
                    </div></td>
                  </tr>
                  <tr bgcolor='#AFBFCF'>
                    <td bgcolor='#FFFFFF'>&nbsp;&nbsp;&nbsp;
                        <p align='center' class='Style13'>vous avez reçu un commentaire sur votre photo 5 de $moi   votre login__ :".$pseudo_envoi."<br><br>pour voir le commentaire clickez sur le lien  et identifiez vous sur le site  :<br><br> <a href='http://www.handicaperencontre.fr/mur.php?pseudo_envoi=$pseudo_envoi'><a href='http://www.handicaperencontre.fr/photo_profil.php?pseudo_envoi=$pseudo_envoi '>voir le commentaire  sur votre photo 5 du site handicaperencontre.fr</a>

                  </tr>
                </table>
                <strong><br />
                </strong></div>            
              <div align='center'></div></td></tr>
          
      </table></td>
    </tr>
  </table>
</body>
</html>";

$to=$mail; $from="icedenice@live.fr\r\n";   //appel de la fonction mail (envoi):

$message = eregi_replace("([_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+)",
                       "____", $message);
$message = str_replace("§§","'",$message);

$sujet = "vous avez reçu un commentaire sur votre photo 5 http://www.handicaperencontre.fr/  ::";


 mail($mail_des,$sujet,$message,$headers);

		$sql = "INSERT INTO comphoto (id,destinateur,numphoto,message,date,heure,exp) ";
		$sql =$sql."VALUES ('','$pseudo_ident','4','$com_photo4','$datee','$heuree','$moi')";
		$result = mysql_query($sql) or die ("Error in query: $query. " . mysql_error());
$sqleven = "INSERT INTO even(id,des,exp,even,date,heure) ";
		$sqleven =$sqleven."VALUES ('','$pseudo_ident','$moi','photo4','$datee','$heuree')";
		$result = mysql_query($sqleven) or die ("Error in query: $query. " . mysql_error()); 
 }
 if(!empty($com_photo5)AND $verif6 ===FALSE AND $spam==0 AND !empty($moi)) { 
// Envoi du mail
// Envoi du mail
$message ="<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'
'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<head>
<title>mail handicaperencontre</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<style type='text/css'>
<!--
body {
	background-color: #F9E3F0;
}
-->
</style>
<link href='vbbcv.css' rel='stylesheet' type='text/css'>
<style type='text/css'>
<!--
.Style13 {color: #000000; font-weight: bold; }
-->
</style>

  <table width='800'  border='0' align='left' cellpadding='1' cellspacing='0' bgcolor='#000000'>
    <tr>
      <td><table width='100%' height='100%'  border='0' align='center' cellpadding='0' cellspacing='0'>
          
                <table width='100%'  border='0' cellspacing='0' cellpadding='3'>
                  <tr bgcolor='#AFBFCF'>
                    <td bgcolor='#FFDFFF'><div align='center'>
                        <p><span class='Style13'>::. Vous avez reçu un commentaire sur votre mur  handicaperencontre.fr.:: </span></p>
                    </div></td>
                  </tr>
                  <tr bgcolor='#AFBFCF'>
                    <td bgcolor='#FFFFFF'>&nbsp;&nbsp;&nbsp;
                        <p align='center' class='Style13'>vous avez reçu un commentaire sur votre photo 6 de $moi   votre login__ :".$pseudo_envoi."<br><br>pour voir le commentaire clickez sur le lien  et identifiez vous sur le site  :<br><br> <a href='http://www.handicaperencontre.fr/mur.php?pseudo_envoi=$pseudo_envoi'><a href='http://www.handicaperencontre.fr/photo_profil.php?pseudo_envoi=$pseudo_envoi '>voir le commentaire  sur votre photo 6 du site handicaperencontre.fr</a>

                  </tr>
                </table>
                <strong><br />
                </strong></div>            
              <div align='center'></div></td></tr>
          
      </table></td>
    </tr>
  </table>
</body>
</html>";

$to=$mail; $from="icedenice@live.fr\r\n";   //appel de la fonction mail (envoi):

$message = eregi_replace("([_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+)",
                       "____", $message);
$message = str_replace("§§","'",$message);

$sujet = "vous avez reçu un commentaire sur votre photo 6 http://www.handicaperencontre.fr/  ::";


 mail($mail_des,$sujet,$message,$headers);
		$sql = "INSERT INTO comphoto (id,destinateur,numphoto,message,date,heure,exp) ";
		$sql =$sql."VALUES ('','$pseudo_ident','5','$com_photo5','$datee','$heuree','$moi')";
		$result = mysql_query($sql) or die ("Error in query: $query. " . mysql_error());
$sqleven = "INSERT INTO even(id,des,exp,even,date,heure) ";
		$sqleven =$sqleven."VALUES ('','$pseudo_ident','$moi','photo5','$datee','$heuree')";
		$result = mysql_query($sqleven) or die ("Error in query: $query. " . mysql_error()); 
 }


$pseudo_ident = $_GET['pseudo_envoi'];



// affichage des photo


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Les photos du profil handicaperencontre rencontre gratuit pour handicapés valides victimes d'avc, ou malades et leurs familles</title>
<META NAME="Author" CONTENT="Olivier RIMBERT">
<META NAME="Category" CONTENT="rencontre,handicap,handicapé,forum,discution">
<META NAME="Copyright" CONTENT="RIMBERT Olivier">
<META http-equiv=content-language content=fr-ca>
<META NAME="Description" CONTENT="les photos du profil de rencontres gratuites pour handicapés et valides en france pour les célibataires qui désirent trouver l'amour, l'âme soeur, créer de nouvelles amitiés avec chat et forum pour aider les malades et leurs proches a se parler, a se connaitre,se rencontrer  et a trouver des solutions, surtout ne restez pas isolé, avc, traumatisme cranien, discutions et échange entre handicapés et valides  malades handicapés discutions sur rééducation et travail. réseau social sur le handicap et la rencontre en france. Rejoignez notre communauté de malades valides et handicapés pour des échanges de plus en plus nombreux et entièrement gratuit en france avec chat et forum sur le handicap bienvenu sur l accueil du site de handicaperencontre.fr site de rencontre gratuit">
<META NAME="Identifier-URL" CONTENT="http://www.handicaperencontre.fr/">
<META NAME="Keywords" CONTENT="rencontre, rencontres, rencontre handicapés valides, rencontre handicapé valide, rencontre gratuite handicapés, handicaps,handicap,rencontres, handicapés, rencontre handicapés, rencontre handicapé, traumatisme cranien, rencontre, traumatisme cranien, aidetraumatisme cranien, aide AVC Accident Vasculaire Cerebral, Attaque Cérébrale, AIT, Accident Ischémique Transitoire, Hémorragie Cérébrale, rencontre et aide, sida,cancer, maladie grave, anévrisme,aide rencontre, cancer, curie,institut curie,donateurs, sein, prostate, oeil,rencontre et aide profession maladie, avtivite professionnelle, symptome sclérose, symptome sclérose en plaque, traitement sclérose en plaque, 
 , sarcome, metastase,  biologie, immunotherapie,, angiogenese, pharmacochimie, physique, genotoxicologie, bio-informatique, rencontre, aide, sclerose en plaques symptomes, maladie longue duree, scleroses en plaques, sclérose, malades sep, 
cacer, amitie, isole, contact, contacts humain, solidarite,syndrome, ald,  solidaire, solitaire, hopitaux, cliniques, reconfort,AVC , AIT, attaque, accident, congestion cerebral, association , aide, france,victime, patient, vacsculaire, cerebrale, temoignage, liens, trouble, vaisseaux sanguins, cerveau, accident vasculaire c&eacute;r&eacute;braux, accident isch&eacute;mique transitoire, devouement, copain, copine, pere, mere, frere, soeur,dialoguer, discuter, rire, affinite, enfants fils filles">
<META NAME="Publisher" CONTENT="RIMBERT Olivier">
<META NAME="Revisit-After" CONTENT="30 days">
<META NAME="Robots" CONTENT="all">
<META NAME="GOOGLEBOT" CONTENT="NOARCHIVE">
<META http-equiv="Content-Type"
content="text/html; charset=iso-8859-1">
<META http-equiv="Pragma" CONTENT="no-cache">

<style type="text/css">
<!--
body {
	background-color: #FFF2FF;
}
-->
</style>
<link href="vbbcv.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Style11 {
	color: #000000;
	font-weight: bold;
}
.Style18 {color: #CCCCCC; font-weight: bold; }
.Style22 {font-size: 16px}
.Style23 {
	font-size: 13px;
	font-weight: bold;
}
.Style24 {
	color: #0000FF;
	font-weight: bold;
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 14px;
}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}
//-->
</script>
<script type="text/JavaScript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
</head>

<body><script type="text/javascript"><!--
google_ad_client = "pub-1493739445870732";
/* baniere11 */
google_ad_slot = "3572161003";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><script type="text/javascript"><!--
google_ad_client = "pub-1493739445870732";
/* 728x90 banière1 */
google_ad_slot = "7527634302";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
</div>
</div>
 
<script type="text/javascript" src="http://www.google.fr/cse/brand?form=cse-search-box&amp;lang=fr"></script> 

<table width="800"  border="0" align="left" cellpadding="1" cellspacing="0" bgcolor="#000000">
  <tr>
    <td><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
      <tr bgcolor="#567596">
        <td colspan="5" bgcolor="#FBE7F3"><div align="center" class="Style12">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="8"><a href="indexiden.php"><img src="logo/logo.jpg" alt="logo" width="906" height="112" border="0"></a></td>
            </tr>
            <tr>
              <td><a href="indexiden.php"><img src="logo/acceuil.jpg" alt="Accueil" width="344" height="29" border="0"></a></td>
              <td><a href="jeux.php"><img src="logo/jeux.jpg" alt="jeux" width="76" height="29" border="0"></a></td>
              <td><a href="forum_sujet.php"><img src="logo/forum.jpg" alt="forum" width="76" height="29" border="0"></a></td>
              <td><a href="mur.php?pseudo_envoi=<? echo $moi;?>"><img src="logo/mur.jpg" alt="mur" width="97" height="29" border="0"></a></td>
              <td><a href="photo.php"><img src="logo/photo.jpg" alt="photo" width="120" height="29" border="0"></a></td>
              <td><a href="recherche.php"><img src="logo/recherche.jpg" alt="recherche" width="112" height="29" border="0"></a></td>
              <td><a href="message.php"><img src="logo/message.jpg" alt="message" width="98" height="29" border="0"></a></td>
              <td><a href="chat.php"><img src="logo/chat.jpg" alt="chat" width="163" height="28" border="0"></a></td>
            </tr>
          </table>
          <a href="http://www.handicaperencontre.fr/">
          <br>
        </div></td>
        </tr>
      <tr bgcolor="#96ACC2">
        <td width="143" align="left" valign="top" bgcolor="#FFFFFF"><form action="index.php" method="post" name="form">
          '<table width="100%"  border="1" cellpadding="1" cellspacing="0">
            <tr>
              <td bgcolor="#FFFFFF"><div align="center"></div></td>
            </tr>
            <tr>
              <td bgcolor="#FFDFFF" class="Style17"><p><img src="logo/inscription.png" width="145" height="21"></p>                </td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><div align="center" class="Style17">
                  <input name="pseudo_ident" type="text" id="pseudo_ident" value="pseudonyme" size="20" maxlength="20">
              </div></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><div align="center" class="Style17">
                  <input name="pass_ident" type="password" id="pass_ident" value="password" size="20" maxlength="20">
              </div></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><div align="center" class="Style17">
                  <input type="submit" name="Submit" value="Connection">
                  <br>
                  <input name="ident" type="hidden" id="ident" value="oui">
              </div></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><span class="Style17">
                <input name="chat_bouton23" type="submit" id="chat_bouton23" onClick="MM_goToURL('parent','deco.php');return document.MM_returnValue" value="DECONNECTION">
              </span></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="mdp.php"></a><a href="chat.php" class="Style12">
                <input name="chat_bouton32" type="submit" id="chat_bouton32" onClick="MM_goToURL('parent','mdp.php');return document.MM_returnValue" value="Mot de pass oubli&eacute;">
              </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="plan.php"><strong>Plan</strong></a></td>
            </tr>
            <tr>
              <td bgcolor="#FFDFFF" class="Style17"><img src="img/MINIMEMBRE.GIF" width="16" height="12"> Votre Espace </td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="photo.php" class="Style17">- </a><a href="chat.php" class="Style12">
                <input name="chat_bouton242" type="submit" id="chat_bouton242" onClick="MM_goToURL('parent','photo.php');return document.MM_returnValue" value="Gerer vos photos">
              </a><a href="photo.php" class="Style17"> </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="chat.php" class="Style12">
                <input name="chat_bouton2422" type="submit" id="chat_bouton2422" onClick="MM_goToURL('parent','annonce_mod.php');return document.MM_returnValue" value="Modifier votre annonce">
              </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="chat.php" class="Style12">
                <input name="chat_bouton2423" type="submit" id="chat_bouton2423" onClick="MM_goToURL('parent','annonce_mod.php');return document.MM_returnValue" value="Modifier vos preferences">
                <input name="chat_bouton24" type="submit" id="chat_bouton24" onClick="MM_goToURL('parent','contact.php');return document.MM_returnValue" value="Gerer vos amis">
              </a></td>
            </tr>
            
            <tr>
              <td bgcolor="#FFDFFF" class="Style17"><img src="img/B_TBLOPS.PNG" alt="Sommaire" width="16" height="12"> Jeux </td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="top_femme.php" class="Style17"><strong>
                <input name="submit2" type="submit" onClick="MM_goToURL('parent','phpmine.php');return document.MM_returnValue" value="D&eacute;mineur" la="la" partie="partie" />
              </strong></a></td>
            </tr>
            <tr>
              <td bgcolor="#FFDFFF" class="Style17"><img src="img/MAIL.GIF" alt="Votre parole" width="14" height="11"> Votre parole </td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="sugestion.php" class="Style18">- Suggestion </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="contacts.php" class="Style18">- Contact </a></td>
            </tr>
          </table>
        </form></td>
        <td width="5" bgcolor="#FFDFFF">&nbsp;</td>
        <td colspan="2" valign="top" bgcolor="#FFFFFF"><table width="650"  border="0" cellspacing="13" cellpadding="1">
          <tr>
            <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                <tr bgcolor="#AFBFCF">
                  <td bgcolor="#FFDFFF"><div align="center">
                      <p class="Style11">::. Vos actions sur l'album photo handicaperencontre.fr rencontre pour pour les personnes handicap&eacute;es .:: <br />
                          </p>
                  </div></td>
                </tr>
                <tr bgcolor="#AFBFCF"> </tr>
            </table></td>
          </tr>
          <tr align="center" bgcolor="#96ACC2">
            <td bgcolor="#567596"><form id='form1' name='form1' method='post' action='photo_profil.php?pseudo_envoi=<?echo $pseudo_ident;?>'><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                <tr bgcolor="#AFBFCF">
                  <td bgcolor="#FFDFFF"><div align="center">
                      <p class="Style11">::. Album photo de <? echo $pseudo_ident; ?>.::<br />
                      </p>
                  </div></td>
                </tr>
                <tr bgcolor="#AFBFCF">
                  <td bgcolor="#FFFFFF"><div align="left">
                      <table width="100%"  border="0" cellspacing="7" cellpadding="0">
                        <tr>
                          <td colspan="2" bgcolor="#FEECFC"><div align="left"><strong>Album photo sur handicaperencontre.fr site de rencontres pour les personnes handicap&eacute;es </strong></div></td>
                        </tr>
                        <tr>
                          <? 
							  
							  //r&eacute;cup&eacute;ration des donn&eacute;es
							  
							   $query = "SELECT * FROM photo WHERE pseudo='$pseudo_ident'"; 
$compt=0;
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	$row = mysql_fetch_row($r);
	
for($i=0;$i < 6;$i++) {
$aaaa="photo$compt"; //créer le nom des photos

	$image = $row[2+$i];
	$description = $row[8+$i];
	$description = str_replace("&sect;&sect;","'",$description);
$description = str_replace("§§","'",$description);
	$image2=$image;
$image = "./photos/".$pseudo_ident."/".$image2;
	if ($image2!="") {
			$compt++;	
		// place du texte
		echo "	  <tr><td rowspan='2' valign='top'><table width='120' border='1' cellspacing='0' cellpadding='0'>
                                  <tr>
                                    <td><a href='photo_profil.php?pseudo_envoi=$pseudo_ident'><img src='$image' width='120' height='120' onclick=\"MM_openBrWindow('$image','$pseudo_ident','scrollbars=yes,width=800,height=600')\"></a></td>
                                  </tr>
                                </table></td>
                                <td width='78%' height='' valign='top' bgcolor='#D8D8D8'><div align='left'><strong><span class='Style12'>DESCRIPTION :</span><p class='Style24'>photo$compt</p>
                                $description </strong></div></td>

                              </tr><td width='78%' height='' valign='top' bgcolor='#D8D8D8'><div align='left'><strong><span Comentaire:</span><br> 
                                  <br>
                                <textarea name=$aaaa cols='50' rows='5'></textarea>
 
          <br />
          <input name='photo1bouton' type='submit' id='photocom' value='Poster le comentaire' /> </strong><br><br>";
$query_com = "SELECT * FROM comphoto WHERE destinateur='$pseudo_envoi' AND numphoto= '$i' ORDER BY date DESC
 LIMIT 0, 10"; 
	
// Execute la requete
$r_com = mysql_query($query_com) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe1111111 !!!");
 for($icom=0;$icom < 10;$icom++) {

	if (mysql_num_rows($r_com)!=0) { 



$rowcom = mysql_fetch_row($r_com);

$pseudo_exp = $rowcom[6];

$message = $rowcom[3];
$date = $rowcom[4];
$heure = $rowcom[5];
$idcom = $rowcom[0];
	$message = str_replace("§§","'",$message);
// traite les smiley dans le message

	$message = str_replace("[sy","<img src='http://www.handicaperencontre.fr/smiley/sy",$message);

	$message = str_replace(".gif]",".gif' width='20' height='20' />",$message);

//ne plus afficher les erreur !!!!!!

error_reporting(0);

// traite le tableau de mess


if ($message!="") {

echo " <table width='100%' border='1' cellspacing='0' cellpadding='0'>
  <tr>
    <td><a href='profil.php?pseudo_envoi=$pseudo_exp'>$pseudo_exp</a>&nbsp;<strong>le:$date<strong>&agrave;:</strong>$heure </td>
  </tr>
  <tr>
    <td>$message </td>
  </tr>
  <tr>
    <td>";if($pseudo_exp==$moi OR $pseudo_envoi==$moi ) echo"<a href='photo_profil.php?pseudo_envoi=$pseudo_envoi&idd=$idcom'>supprimer</a> </td>
  </tr>
</table>";


}}} echo"</div></form></td>
                              </tr>
                              <tr>
                                <td height='10'><table width='100%' border='1' cellspacing='0' cellpadding='0'>
                                 
                                </table></td></tr>";

			  }
			
			  }
			

						 
					
                         
						 
							  
                                
                              
							  
							  ?>
                          <td colspan="2"><div align="center"></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><span class="Style23"><a href="profil.php?pseudo_envoi=<? echo $pseudo_ident; ?>">Accedez &agrave; son profil </a></span></div></td>
                        </tr>
                      </table>
                  </div></td>
                </tr>
            </table>
          
          <tr bgcolor="#96ACC2">
            <td></td>
          </tr>
        </table></td>
      </tr>
      <tr bgcolor="#96ACC2">
        <td colspan="4" bgcolor="#FFF0FF"><div align="center"><img src="img/bas.jpg" width="800" height="53" /></div></td>
      </tr>
    </table></td>
  </tr>
</table>

</body>
</html>
