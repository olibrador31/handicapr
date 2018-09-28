<?
require '_bdd.php';
require '_identification.php';
require '_restriction.php';
require 'lignechat.php';require 'stat_message.php';
$pseudo_envoi=$_GET['pseudo_envoi'];
$ami=$_GET['ami'];
// formate heure 
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
							$sess=session_id();


//Lecture des messages reçu
if ($_GET['action']=="ami") {
	
	require '_restriction.php';
require 'lignechat.php';$sess=session_id();

			$query = "SELECT * FROM ami WHERE pseudodemande='$pseudo_envoi' AND pseudo='$moi'"; 
	// Execute la requete
	$r = mysql_query($query) or die ("votre message/sujet/pseudo ne doit pas contenir d'apostrephe1 !!!");
	if (mysql_num_rows($r) != 0) { 
		$erreur = $erreur."Le pseudonyme existe déja<br>";
		echo "ici";
	}
	else {
	
	
		$sql = "INSERT INTO ami (id,val,pseudo,pseudodemande) ";
		$sql =$sql."VALUES ('','0','$pseudo_envoi','$moi')";
		$result = mysql_query($sql) or die ("Error in query: $query. " . mysql_error()); 
		
		
		// placer dans bdd des evenements si action = ami
$sqleven = "INSERT INTO even(id,des,exp,even,date,heure,vu) ";
		$sqleven =$sqleven."VALUES ('','$pseudo_envoi','$moi','ami','$datee','$heuree','0')";
		$resulteven = mysql_query($sqleven) or die ("Error in query: $query. " . mysql_error());
	
// envoi de lemail annonce demande en ami

//recherche du mail destinataire
	$query = "SELECT mail FROM user WHERE pseudo='$pseudo_envoi'"; 
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");

		$row = mysql_fetch_row($r);

$mail_des = $row[0];

//Variables :
  $headers ='From: " handicaperencontre.fr/"'."\n";
     $headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
     $headers .='Content-Transfer-Encoding: 8bit';

$message = $moi." veut devenir votre ami sur le site  votre login_____ :".$pseudo_envoi ."___pour toutes question contactez moi par mail indiqué sur le site   à bientot http://www.handicaperencontre.fr/   ";
$sujet = $moi." veut devenir votre ami sur le site "."http://www.handicaperencontre.fr/  ";
$to=$mail; $from="icedenice@live.fr\r\n";   //appel de la fonction mail (envoi):

$message = eregi_replace("([_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+)",
                       "____", $message);
$message = str_replace("§§","'",$message);

$sujet = str_replace("§§","'",$sujet);

if ($moi !="") {mail($mail_des,$sujet,$message,$headers);} 
 
		
		
		
		}
}		


			

// validation d un ami

if ($_GET['action']=="val") {
// update la base ami pour que val soit a 122

$query = "UPDATE ami SET val='1' WHERE pseudo='$pseudo_envoi'AND (pseudodemande='$ami') "; 

	
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris1122222 ");
	
	
	
	
		
		// update la base even pour que les validé soit a 1ici

$queryupeven = "UPDATE even SET vu='1' WHERE des='$moi' "; 

	
	// Execute la requete
	$rupeven = mysql_query($queryupeven) or die ("Pas pris1122222 ");
	
	

	// placer dans bdd des evenements que la demande a ete accepté
$sqleven = "INSERT INTO even(id,des,exp,even,date,heure,vu) ";
		$sqleven =$sqleven."VALUES ('','$ami','$moi','amiok','$datee','$heuree','0')";
		$result = mysql_query($sqleven) or die ("Error in query: $query. " . mysql_error()); 
	
	// faire le miroir pour l autre ami
$sql = "INSERT INTO ami (id,val,pseudo,pseudodemande) ";
		$sql =$sql."VALUES ('','1','$ami','$moi')";
		$result = mysql_query($sql) or die ("Error in query: $query. " . mysql_error()); 
		echo "et non la";

// envoi de lemail  demande en ami accepté

//recherche du mail destinataire
	$query = "SELECT mail FROM user WHERE pseudo='$ami'"; 
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");

		$row = mysql_fetch_row($r);

$mail_des = $row[0];


//Variables :
  $headers ='From: " handicaperencontre.fr/"'."\n";
     $headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
     $headers .='Content-Transfer-Encoding: 8bit';

$message = $moi." a accepté de devenir votre ami sur le site  votre login_____ :".$ami ."___pour toutes question contactez moi par mail indiqué sur le site   à bientot http://www.handicaperencontre.fr/   ";
$sujet = $pseudo_envoi." a accepté de devenir votre ami sur le site "."http://www.handicaperencontre.fr/  ";
$to=$mail; $from="icedenice@live.fr\r\n";   //appel de la fonction mail (envoi):

$message = eregi_replace("([_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+)",
                       "____", $message);
$message = str_replace("§§","'",$message);

$sujet = str_replace("§§","'",$sujet);

 mail($mail_des,$sujet,$message,$headers); 



	
}




if ($_GET['action']=="supr") {
	$id=$_GET['id'];
	$query = "DELETE FROM ami WHERE pseudo='$pseudo_envoi'AND (pseudodemande='$ami')"; 
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe2 !!!");
	// update la base even pour que les suprimé soit a 1ici

$queryupeven = "UPDATE even SET vu='1' WHERE des='$pseudo_envoi' "; 

	
	// Execute la requete
	$rupeven = mysql_query($queryupeven) or die ("Pas pris1122222 ");
}
// update base even pour que amiok=1

$queryupevenok = "UPDATE even SET vu='1' WHERE des='$moi' AND even='amiok' "; 

	
	// Execute la requete
	$rupevenok = mysql_query($queryupevenok ) or die ("Pas pris1122222 ");



$etat_check = "";

if ($_GET['action']=="suprimer") {
		if(!empty($box19)) {
		$query = "DELETE FROM ami WHERE id=$box19"; 
		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
		}
	
}
?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>vos amis et contacts handicaperencontre rencontre gratuit pour handicapés valides victimes d'avc, ou malades et leurs familles</title>
<META NAME="Author" CONTENT="Olivier RIMBERT">
<META NAME="Category" CONTENT="rencontre,handicap,handicapé,forum,discution">
<META NAME="Copyright" CONTENT="RIMBERT Olivier">
<META http-equiv=content-language content=fr-ca>
<META NAME="Description" CONTENT=" vos amis et contacts rencontres gratuites pour handicapés et valides en france pour les célibataires qui désirent trouver l'amour, l'âme soeur, créer de nouvelles amitiés avec chat et forum pour aider les malades et leurs proches a se parler, a se connaitre,se rencontrer  et a trouver des solutions, surtout ne restez pas isolé, avc, traumatisme cranien, discutions et échange entre handicapés et valides  malades handicapés discutions sur rééducation et travail. réseau social sur le handicap et la rencontre en france. Rejoignez notre communauté de malades valides et handicapés pour des échanges de plus en plus nombreux et entièrement gratuit en france avec chat et forum sur le handicap bienvenu sur l accueil du site de handicaperencontre.fr site de rencontre gratuit">
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
<META content="handicaperencontre.fr rencontre pour pour les personnes handicapés et valides victimes avc ou malades etc avec chat forum, profil vérifié avec chat forum, profil vérifié " name=title>
<style type="text/css">
<!--
body {
	background-color: #FFF4FF;
}
-->
</style>
<link href="vbbcv_message.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Style16 {font-size: 10; }
.Style11 {color: #000000;
	font-weight: bold;
}
.Style18 {color: #CCCCCC; font-weight: bold; }
.Style22 {font-size: 16px}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script></head>

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
          <tr bgcolor="#96ACC2">
            <td colspan="5" bgcolor="#FBE7F3"><div align="center" class="Style12"><a href="http://www.handicaperencontre.fr/indexiden.php"><img src="img/logo.jpg" width="800" height="116" border="0">
 
<style type="text/css">
@import url(http://www.google.fr/cse/api/branding.css);
</style>
<div class="cse-branding-right" style="background-color:#999999;color:#000000">
  <div class="cse-branding-form">
    <form action="http://www.google.fr/cse" id="cse-search-box">
      <div>
        <input type="hidden" name="cx" value="partner-pub-1493739445870732:b4nkapquf0j" />
        <input type="hidden" name="ie" value="ISO-8859-1" />
        <input type="text" name="q" size="31" />
        <input type="submit" name="sa" value="Rechercher" />
      </div>
    </form>
  </div>
  <div class="cse-branding-logo">
    <img src="http://www.google.com/images/poweredby_transparent/poweredby_999999.gif" alt="Google" />
  </div>
  <div class="cse-branding-text">
    Recherche personnalis&#233;e
  </div>
</div>
 
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
              <td bgcolor="#FFFFFF"> <a href="mdp.php"></a><a href="chat.php" class="Style12">
                <input name="chat_bouton32" type="submit" id="chat_bouton32" onClick="MM_goToURL('parent','mdp.php');return document.MM_returnValue" value="Mot de pass oubli&eacute;">
              </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="inscription1.php?id=1" class="Style17">Cr&eacute;z un compte</a> </td>
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
              <td bgcolor="#FFFFFF"><a href="message.php" class="Style17">- Vos messages </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="photo.php" class="Style17">- </a><a href="chat.php" class="Style12">
                <input name="chat_bouton24" type="submit" id="chat_bouton24" onClick="MM_goToURL('parent','photo.php');return document.MM_returnValue" value="Gerer vos photos">
              </a><a href="photo.php" class="Style17"> </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><input name="chat_bouton24" type="submit" id="chat_bouton24" onClick="MM_goToURL('parent','contact.php');return document.MM_returnValue" value="Gerer vos amis"></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="annonce_mod.php" class="Style17">- Votre annonce </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
              <td bgcolor="#FFDFFF" class="Style17"><img src="img/B_TBLOPS.PNG" alt="Sommaire" width="16" height="12"> Sommaire</td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="inscription1.php?id=1" class="Style17">- Crez un compte </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="recherche.php" class="Style17">- Recherche</a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="chat.php" class="Style12">
                <input name="chat_bouton33" type="submit" id="chat_bouton33" onClick="MM_goToURL('parent','forum_sujet.php');return document.MM_returnValue" value="Entrer sur le Forum">
              </a><a href="forum_sujet.php" class="Style17"></a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="top_homme.php" class="Style17"></a><a href="chat.php" class="Style12">
                <input name="chat_bouton332" type="submit" id="chat_bouton332" onClick="MM_goToURL('parent','chat.php');return document.MM_returnValue" value="Entrer sur le Chat">
              </a></td>
            </tr>
            <tr>
              
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
            <td colspan="2" valign="top" bgcolor="#FFFFFF">
              <table width="650"  border="0" cellspacing="13" cellpadding="0">
                <tr>
                  <td bgcolor="#FFDFFF"><div align="center"><span class="Style11">::. Vos handicaperencontre.fr rencontre pour pour les personnes handicap&eacute;es Contacts  .:: </span></div></td>
                </tr>
                <tr bgcolor="#96ACC2">
                  <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                      <tr bgcolor="#AFBFCF">
                        <td bgcolor="#C4CEDB"><table width="100%" border="0" cellpadding="0" cellspacing="1">
                            <tr>
                              <td bgcolor="#F8E6F6"><table width="73" height="5" border="1" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="69"><div align="center">
                                        <input name="Submit2" type="submit" value="Suprimer" />
                                    </div></td>
                                  </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td bgcolor="#CCCCCC"><table width="100%" height="4" border="0" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="4%"><div align="left"></div></td>
                                    <td width="4%"><div align="left"></div></td>
                                    <td width="22%"><div align="center" class="Style16">
                                        <div align="left">Contact : </div>
                                    </div></td>
                                    <td width="63%"><div align="center" class="Style16">
                                        <div align="left">Information : </div>
                                    </div></td>
                                    <td width="7%"><div align="left"> </div></td>
                                  </tr>
                              </table></td>
                            </tr>
                            <?

						 
//lie et affiche les messages
// couleur du premier
$couleur = "#A4B7CA";
// variable de d&eacute;but et fin


if(empty($_GET['start'])) {
	$start = 0;
	}
	else {
	$start = $_GET['start'];
}
	  
$query = "SELECT * FROM ami WHERE pseudo='$moi' ORDER BY  'pseudo' asc"; 
$compt=0;
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$fin = $start+20;
$i=$start;
for($i;$i < $fin;$i++) {

	
if($i<$row = mysql_num_rows($r)) {
	
	if (mysql_data_seek($r, $i))  {
	
	$row = mysql_fetch_row($r);
	$ami = $row[3];
	$id = $row[0];
	$val = $row[1];
	$query_ami = "SELECT * FROM user WHERE pseudo='$ami'"; 
	// Execute la requete
	$r_ami = mysql_query($query_ami) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	$row_ami = mysql_fetch_row($r_ami);
	$age = $row_ami['5'];
	$departement = $row_ami['17'];
	$ville = $row_ami['18'];
	$note_m = $row_ami['25'];
	$note = $note_m;	
	
		$image="<img src='img/b_usrlist.png' width='18' height='15'>";
	
	if ($row = mysql_num_rows($r)) {
		
		//def couleur
		if (is_integer($i/2)) { $couleur = "#DDE4EC"; } else { $couleur = "#D1DAE4"; }
		
		// place du texte
		echo "	  <tr>
                            <td bgcolor='$couleur'><table width='619' height='26' border='0'>
                              <tr>
                                <td width='20' height='14'><a href='contact.php?pseudo_envoi=$moi&ami=$ami&action=supr'><img src='img/bouton_annuler.gif
' width='100' height='15' border='0' longdesc='suprimer' /></a></td>
                                <td width='20'>$image</td>
                                <td width='132'><a href='profil.php?pseudo_envoi=$ami'>$ami  </a>";  if ($val==0)  {echo" <a href='contact.php?pseudo_envoi=$moi&ami=$ami&action=val'><img src='img/bouton_valider.gif' width='61' height='15' border='0' longdesc='valider' /></a><a href='contact.php?pseudo_envoi=$moi&ami=$ami&action=supr'><img src='img/bouton_annuler.gif
' width='100' height='15' border='0' longdesc='suprimer' /></a>";} echo"</td>
                                <td width='345'>ag&eacute;(e) de $age ans, $ville dans le $departement </td>
                                <td width='110'><div align='center'> </div></td>
                              </tr>
                            </table></td>
                          </tr>";
		
			  }
			
			  }
			 
			  
			  

	}

	$compt++;
}
						 

						 
					
                         
						 
						 
?>
                            <tr>
                              <td bgcolor="#D8DFE7"><div align="center"><strong>
                                  <? if (mysql_num_rows($r)==0) { echo "<BR><BR>Pas de contact enregistr&eacute;(e) ...<BR><BR><BR>"; } ?>
                              </strong></div></td>
                            </tr>
                            <tr>
                              <td bgcolor="#F8E6F6">&nbsp;</td>
                            </tr>
                            <tr>
                              <td bgcolor="#F8E6F6"><div align="center"><strong>Page :
                                <? 
// cr&eacute;ation des n&deg; de page 
$query = "SELECT * FROM ami WHERE pseudo='$moi' ORDER BY  'ami' asc"; 
	
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$i=0;
$page = 1;
$nb_ligne = mysql_num_rows($r);
				
				echo "[ - ";
				while ($i< $nb_ligne) {
				echo "<a href='message_recu.php?start=$i'>$page</a> ";
				echo " - ";
				$page=$page+1;
				$i=$i+20;
				}
	echo "]";
?>
                              </strong></div></td>
                            </tr>
                        </table></td>
                      </tr>
                  </table></td>
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
