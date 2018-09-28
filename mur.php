<?
require '_bdd.php';
require '_identification.php';
require '_restriction.php';
require 'stat_message.php';


$resultat_ajouter="";
$aff_modifier = "";

// update la base even pour les com du mur soit a 1 aaa

$query = "UPDATE even SET vu='1' WHERE des='$pseudo_envoi'AND (even='mur') "; 

	
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris11 ");

// update la base even pour les com du mur soit a 1 aaa

$query = "UPDATE even SET vu='1' WHERE des='$pseudo_ident'AND (even='mur') "; 

	
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris11 ");




$message = htmlspecialchars($_POST['message']);
	$message = str_replace("'","§§",$message);

// recherche si site web dans com
// eviter com sans nom spam  MAIL ET SITE WEB

$spam='0';

if (substr_count($message,"@")==1) $spam=1;
if (substr_count($message,"www")==1) $spam=1;
if (substr_count($message,".fr")==1) $spam=1;
if (substr_count($message,".com")==1) $spam=1;
if (substr_count($message,"arobase")==1) $spam=1;
if (substr_count($message,"http")==1) $spam=1;

// suprimer le mec qui SPAM  MAIL ET SITE WEB

if ($spam==1) {  $query = "DELETE FROM user WHERE pseudo='$moi'";  
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");


$moi="";
}
$achercher="www"; 

$verifmur= strpos ($message,$achercher);


$post = htmlspecialchars($_POST['post']);
// pour suprimer un com
$idd = $_GET['idd'];
 $query = "DELETE FROM mur WHERE id='$idd'";    
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	
	


$pseudo_envoi = htmlspecialchars($_GET['pseudo_envoi']);



if($post==1 AND $verifmur ===FALSE AND $pseudo_ident!="") { 


//taitement + enregistrement du message
		$message = htmlspecialchars(str_replace("'","§§",$message));
		$objet = htmlspecialchars(str_replace("'","§§",$objet));
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
		$datee= $jour . '-' . $mois . '-';
		$sql = "INSERT INTO mur (id,destinataire,expediteur,message,date,heure) ";
		$sql =$sql."VALUES ('','$pseudo_envoi','$pseudo_ident','$message','$datee','$heuree')";
		$result = mysql_query($sql) or die ("Error in query: $query. " . mysql_error()); 
		

//recherche du mail destinataire
	$query = "SELECT pass,mail FROM user WHERE pseudo='$pseudo_envoi'"; 
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");


	
		$row = mysql_fetch_row($r);

$pass = $row[0];
$mail_des = $row[1];

//Variables :


$headers ='From:   handicaperencontre.fr/"'."\n";
     $headers .='Content-Type: text/html; charset="iso-8859-1"'."\n";
     $headers .='Content-Transfer-Encoding: 8bit';




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
                        <p align='center' class='Style13'>vous avez reçu un commentaire de $moi  sur votre mur  votre login_____ :".$pseudo_envoi ."<br><br>pour voir le commentaire clickez sur le lien  et identifiez vous sur le site  :<br><br> <a href='http://www.handicaperencontre.fr/mur.php?pseudo_envoi=$pseudo_envoi'><a href='http://www.handicaperencontre.fr/mur.php?pseudo_envoi=$pseudo_envoi'>lire le commentaire  sur le mur du site handicaperencontre.fr</a>

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
$sujet = "vous avez reçu un commentaire sur votre mur handicaperencontre  de: ".	$moi;
$to=$mail; $from="icedenice@live.fr\r\n";   //appel de la fonction mail (envoi):

$message = eregi_replace("([_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+)",
                       "____", $message);
$message = str_replace("§§","'",$message);

$sujet = str_replace("§§","'",$sujet);


 mail($mail_des,$sujet,$message,$headers); 


// placer dans bdd des evenements
$sqleven = "INSERT INTO even(id,des,exp,even,date,heure) ";
		$sqleven =$sqleven."VALUES ('','$pseudo_envoi','$pseudo_ident','mur','$datee','$heuree')";
		$result = mysql_query($sqleven) or die ("Error in query: $query. " . mysql_error()); 
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>voir et poster des comentaires sur le mur rencontre gratuit pour handicapés valides victimes d'avc, ou malades et leurs familles</title>
<META NAME="Author" CONTENT="Olivier RIMBERT">
<META NAME="Category" CONTENT="rencontre,handicap,handicapé,forum,discution">
<META NAME="Copyright" CONTENT="RIMBERT Olivier">
<META http-equiv=content-language content=fr-ca>
<META NAME="Description" CONTENT="voir et poster des comentaires sur le mur du profil rencontres gratuites pour handicapés et valides en france pour les célibataires qui désirent trouver l'amour, l'âme soeur, créer de nouvelles amitiés avec chat et forum pour aider les malades et leurs proches a se parler, a se connaitre,se rencontrer  et a trouver des solutions, surtout ne restez pas isolé, avc, traumatisme cranien, discutions et échange entre handicapés et valides  malades handicapés discutions sur rééducation et travail. réseau social sur le handicap et la rencontre en france. Rejoignez notre communauté de malades valides et handicapés pour des échanges de plus en plus nombreux et entièrement gratuit en france avec chat et forum sur le handicap bienvenu sur l accueil du site de handicaperencontre.fr site de rencontre gratuit">
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
	font-size: 14px;
	font-weight: bold;
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
google_ad_client = "ca-pub-1493739445870732";
/* baniere 11 rose */
google_ad_slot = "7443439510";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<style type="text/css">
@import url(http://www.google.com/cse/api/branding.css);
</style>

 
<script type="text/javascript" src="http://www.google.fr/cse/brand?form=cse-search-box&amp;lang=fr"></script> 
<table width="800"  border="0" align="left" cellpadding="1" cellspacing="0" bgcolor="#000000">
  <tr>
    <td><table width="100%"  border="1" cellpadding="0" cellspacing="1">
            
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
              <td bgcolor="#FFFFFF"><a href="votre_profil.php?pseudo_envoi=<? echo $pseudo_ident; ?>" class="Style17"> - Votre profil </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFDFFF" class="Style17"><img src="img/B_TBLOPS.PNG" alt="Sommaire" width="16" height="12"> Sommaire</td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><div align="center"><a href="chat.php" class="Style12">
                <input name="chat_bouton2422" type="submit" id="chat_bouton2422" onClick="MM_goToURL('parent','annonce_mod.php');return document.MM_returnValue" value="Modifier votre annonce">
              </a></div></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><div align="center"><a href="chat.php" class="Style12">
                <input name="chat_bouton2423" type="submit" id="chat_bouton2423" onClick="MM_goToURL('parent','inscription3.php');return document.MM_returnValue" value="Modifier Vos centres d'int&eacute;r&ecirc;t">
              </a></div></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><div align="center"><a href="chat.php" class="Style12">
                <input name="chat_bouton24232" type="submit" id="chat_bouton24232" onClick="MM_goToURL('parent','inscription2.php');return document.MM_returnValue" value="Modifier Votre description">
              </a></div></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><input name="chat_bouton242" type="submit" id="chat_bouton242" onClick="MM_goToURL('parent','inscription5.php');return document.MM_returnValue" value="Gerer vos photos"></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><input name="chat_bouton24" type="submit" id="chat_bouton24" onClick="MM_goToURL('parent','contact.php');return document.MM_returnValue" value="Gerer vos amis"></td>
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
          <tr align="center" bgcolor="#96ACC2">
            <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
			<tr bgcolor="#96ACC2"><td colspan="5" bgcolor="#FBE7F3"><div align="center"><img src="img/logo.jpg" width="800" height="116" border="0"></td></tr>
          <tr bgcolor="#567596">
            <td colspan="5" bgcolor="#FBE7F3"><div align="center" class="Style12">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
 
            <tr>
              <td><a href="indexiden.php"><img src="logo/acceuil.jpg" width="344" height="29" border="0"></a></td>
              <td><a href="jeux.php"><img src="logo/jeux.jpg" width="76" height="29" border="0"></a></td>
              <td><a href="forum_sujet.php"><img src="logo/forum.jpg" width="76" height="29" border="0"></a></td>
              <td><a href="mur.php?pseudo_envoi=<? echo $moi;?>"><img src="logo/mur.jpg" width="97" height="29" border="0"></a></td>
              <td><a href="photo.php"><img src="logo/photo.jpg" width="120" height="29" border="0"></a></td>
              <td><a href="recherche.php"><img src="logo/recherche.jpg" width="112" height="29" border="0"></a></td>
              <td><a href="message.php"><img src="logo/message.jpg" width="98" height="29" border="0"></a></td>
              <td><a href="chat.php"><img src="logo/chat.jpg" width="163" height="28" border="0"></a></td>
            </tr>
          </table>
          <a href="http://www.handicaperencontre.fr/">
          <br>
        </div></td>
        </tr>
     
                <tr bgcolor="#AFBFCF">
                  <td bgcolor="#FFDFFF"><div align="center">
                      <p><span class="Style11">::. Mur de <a href="profil.php?pseudo_envoi=<? echo $pseudo_envoi; ?>"> <? echo $pseudo_envoi; ?> </a><br /><br>
					  <? if($pass_reel==$pass_ident and !empty($pass_ident) ) echo"<a href='inscription2.php'>modifier Votre profil---</a><a href='supr.php'>supprimer votre profil</a>";?>
            <a href="chat.php" class="Style17"></a><img src="img/B_USRLIST.PNG" width="16" height="16">
            <? if($erreur_ident=="") { echo $message_acceuil; } else { echo $erreur_ident; } ?>
                      </span></p>
                  </div></td>
                </tr>
				
                <tr bgcolor="#AFBFCF">
                  <td bgcolor="#FFFFFF"><div align="left">
                      <table width="100%"  border="0" cellspacing="7" cellpadding="0">
                        <tr>
                          <td><div align="center"></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><span class="Style23"><a href="profil.php?pseudo_envoi=<? echo $pseudo_envoi; ?>"></a></span>
                            <form name="form1" method="post" action="mur.php?pseudo_envoi=<? echo $pseudo_envoi; ?>">
                              <textarea name="message" cols="40" rows="4" id="message"></textarea> <? require 'smi.php'; ?><input type="submit" name="Submit2" value="publier le commentaire">

							                                                            <input type="submit" name="Submit2" value="publier le commentaire">

<input name="post" type="hidden" id="post" value="1" />

                                            </tr>
                                            <tr>
                                              <td valign="top" bgcolor="#FFFFFF"><div align="center"><?

$pseudo_envoi = $_GET['pseudo_envoi'];

$query = "SELECT * FROM mur WHERE destinataire='$pseudo_envoi' ORDER BY date DESC
 LIMIT 0, 10"; 
	
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
// for($i=1;$i < 10;$i++) {

	if (mysql_num_rows($r)!=0) { 
while  (mysql_data_seek($r, $i))  {


$row = mysql_fetch_row($r);

$pseudo_exp[$i] = $row[2];
$message[$i] = $row[3];
$date[$i] = $row[4];
$heure[$i] = $row[5];
$id[$i] = $row[0];
	$message = str_replace("§§","'",$message);
// traite les smiley dans le message

	$message = str_replace("[sy","<img src='http://www.handicaperencontre.fr/smiley/sy",$message);

	$message = str_replace(".gif]",".gif' width='20' height='20' />",$message);

//ne plus afficher les erreur !!!!!!

error_reporting(0);
if(mysql_num_rows($r)!=0){
//tableau de mess
echo"
<table width='200' border='1'>
  <tr>
    <td> <a href='profil.php?pseudo_envoi=$pseudo_exp[$i]'>$pseudo_exp[$i]</a> <strong>le:</strong> $date[$i] <strong>&agrave;:</strong> $heure[$i]</td>
  </tr>
  <tr>
    <td>$message[$i]</td>
  </tr>
      ";if($pseudo_envoi==$pseudo_ident OR $pseudo_exp[$i]==$pseudo_ident ) echo"<td><a href='mur.php?pseudo_envoi=$pseudo_envoi&idd=$id[$i]'>supprimer
</a></td>";echo"
<td><a href='mur.php?pseudo_envoi=$pseudo_exp[$i]'>mur à mur
</a></td>

  <tr>
    
</table>";

	$i=$i+1;
	
}}}

?>
                                              </div>
                            </form>
                            </div></td>
                        </tr>
                        <tr>
                          <td>&nbsp;</td>
                        </tr>
                      </table>
                  </div></td>
                </tr>
            </table></td>
          </tr>
          <tr bgcolor="#96ACC2">
            <td></td>
          </tr>
        </table>
		
          </td>
      </tr>
      <tr bgcolor="#96ACC2">
        <td colspan="4" bgcolor="#FFF0FF"><div align="center"><img src="img/bas.jpg" width="800" height="53" /></div></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
