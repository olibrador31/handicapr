<?

require '_bdd.php';
require '_identification.php';
require '_restriction.php';
require 'lignechat.php';require 'stat_message.php';


$erreur = "";
$resultat = "";

// Compte et affiche les stat de la boite mail -----------
//cherche du pseudo de l expéditeur
$session_exp = session_id();
$query = "SELECT pseudo FROM user WHERE session='$session_exp'"; 
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe1 !!!");
$row = mysql_fetch_row($r);
$pseudo_expediteur = $row[0];
//cherche le nb de message
$query = "SELECT id FROM message WHERE expediteur='$pseudo_expediteur'"; 
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe2 !!!");
$nb_message_total = mysql_num_rows($r);
$query = "SELECT id FROM envoyer WHERE expediteur='$pseudo_expediteur'"; 
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe3 !!!");

$nb_message_total = $nb_message_total + mysql_num_rows($r) + 2;
$barre = $nb_message_total/2;
$nb_message_total = 200 - $nb_message_total;

// FIN Compte et affiche les stat de la boite mail -----------

	

// enregistrement d'un message -----------------------
	//si il y a asez de place dans la boite mail
	if($nb_message_total > 0) {
	$pseudo_destinataire = $_GET['destinataire'];
	//recherche du destinataire
	$query = "SELECT pseudo,pass,mail FROM user WHERE pseudo='$pseudo_destinataire'"; 
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe4 !!!");
	
	if(mysql_num_rows($r)) {
		$row = mysql_fetch_row($r);
$pseudo = $row[1];
$pass = $row[2];
$mail_des = $row[2];




		$objet ="$moi vous envoi le bonjour et aimerait faire votre connaissance sur handicaperencontre.fr";
		$message = $_GET['message'];
		
		//cherche du pseudo de l expéditeur
		$session_exp = session_id();
		$query = "SELECT pseudo,pass,val FROM user WHERE session='$session_exp'"; 
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe5 !!!");
		$row = mysql_fetch_row($r);
		$pseudo_expediteur = $row[0];
	$val_expediteur = $row[2];
if (	$val_expediteur==1) {


	

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

  <table width='800'  border='0' align='left' cellpadding='1' cellspacing='0' bgcolor='#FFFFFF'>
    <tr>
      <td><table width='100%' height='100%'  border='0' align='center' cellpadding='0' cellspacing='0'>
          
                <table width='100%'  border='0' cellspacing='0' cellpadding='3'>
                  <tr bgcolor='#AFBFCF'>
                    <td bgcolor='#FFDFFF'><div align='center'>
                        <p><span class='Style13'>  $moi vous envoie le bonjour et aimerait faire votre connaissance sur handicaperencontre.fr </span></p>
                    </div></td>
                  </tr>
                  <tr bgcolor='#AFBFCF'>
                    <td bgcolor='#FFFFFF'>&nbsp;&nbsp;&nbsp;
                        <p align='center' class='Style13'> $moi vous envoie le bonjour et aimerait faire votre connaissance sur handicaperencontre.fr  votre login__ :  ".$pseudo_destinataire ." <br><br>pour lui envoyer un message identifiez vous sur le site et clickez sur le lien : <a href='http://www.handicaperencontre.fr/message_ecrire.php?action=post&destinataire=$moi'>le contacter sur le site handicaperencontre.fr

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
$sujet = "$moi vous envoie le bonjour et aimerait faire votre connaissance sur handicaperencontre.fr";
$to=$mail; $from="icedenice@live.fr\r\n";   //appel de la fonction mail (envoi):

$message = eregi_replace("([_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+)",
                       "____", $message);
$message = str_replace("§§","'",$message);

$sujet = str_replace("§§","'",$sujet);


 mail($mail_des,$sujet,$message,$headers); 
		}
		else {
		$erreur = " <SCRIPT LANGUAGE = 'JavaScript'>
<!--
alert ('Votre profil doit etre valide par le webmaster avent tout envoi de message (1 a 2 jours) ')
-->
</SCRIPT>  ";
		}
	}
	else {
	$erreur = "Votre boite message Meet me contient trop de message, veuillez en suprimer avent d'envoyer d'autre messages";
	}

}



?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>vos nouveaux messages sur rencontre gratuit pour handicapés valides victimes d'avc, ou malades et leurs familles</title>
<META NAME="Author" CONTENT="Olivier RIMBERT">
<META NAME="Category" CONTENT="rencontre,handicap,handicapé,forum,discution">
<META NAME="Copyright" CONTENT="RIMBERT Olivier">
<META http-equiv=content-language content=fr-ca>
<META NAME="Description" CONTENT=" gerer vos nouveaux messages sur le site de rencontres gratuites pour handicapés et valides en france pour les célibataires qui désirent trouver l'amour, l'âme soeur, créer de nouvelles amitiés avec chat et forum pour aider les malades et leurs proches a se parler, a se connaitre,se rencontrer  et a trouver des solutions, surtout ne restez pas isolé, avc, traumatisme cranien, discutions et échange entre handicapés et valides  malades handicapés discutions sur rééducation et travail. réseau social sur le handicap et la rencontre en france. Rejoignez notre communauté de malades valides et handicapés pour des échanges de plus en plus nombreux et entièrement gratuit en france avec chat et forum sur le handicap bienvenu sur l accueil du site de handicaperencontre.fr site de rencontre gratuit">
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
	background-color: #F9EFF7;
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
.Style12 {color: #990000}
.Style22 {font-size: 16px}
.Style15 {color: #000000}
.Style23 {
	color: #0000FF;
	font-weight: bold;
}
.Style24 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
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
<form name="form1" method="post" action="message.php">
    <table   border="0" align="left" cellpadding="1" cellspacing="0" bgcolor="#000000">
   ></tr>
          <tr bgcolor="#567596">
          </tr>
          <tr bgcolor="#96ACC2">
            
            <td width="143" align="left" valign="top" bgcolor="#FFFFFF"><table width="160"  border="1" cellpadding="2" cellspacing="0" bordercolor="#FFF2FF">
              <tr>
                <td bgcolor="#FFFFFF"><div align="center"></div></td>
              </tr>
              <tr>
                <td bgcolor="#FFDFFF"><div align="left"><span class="Style11">Vos messages </span></div></td>
              </tr>
              <tr>
                <td valign="top" bgcolor="#FFFFFF"><img src="img/open.gif" width="18" height="15" /> <a href="message_recu.php">Messages re&ccedil;us (<? echo $nb_recu; ?>) </a></td>
              </tr>
              <tr>
                <td valign="top" bgcolor="#FFFFFF"><img src="img/open.gif" width="18" height="15" /> <a href="message_envoyer.php">Messages envoy&eacute;s (<? echo $nb_envoyer; ?>) </a></td>
              </tr>
              <tr>
                <td valign="top" bgcolor="#FFFFFF"><img src="img/actionEdit.gif" width="18" height="15" /> <a href="message_ecrire.php">Ecrire un message</a> </td>
              </tr>
              <tr>
                <td valign="top" bgcolor="#FFFFFF"><img src="img/b_usrlist.png" width="18" height="15" /> <a href="contact.php">Vos contacts </a></td>
              </tr>
              <tr>
                <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr>
                <td bgcolor="#FFDFFF"><span class="Style11">Votre Espace </span></td>
              </tr>
              <tr bordercolor="#FFE8FB">
                <td bgcolor="#FFFFFF"><a href="profil.php?pseudo_envoi=<? echo $pseudo_ident; ?>" class="Style11">- Votre profil </a></td>
              </tr>
              <tr bordercolor="#FFE8FB">
                <td bgcolor="#FFFFFF"><a href="recherche.php?start=0" class="Style11">- Votre recherche </a></td>
              </tr>
              <tr bordercolor="#FFE8FB">
                <td bgcolor="#FFFFFF"><a href="message.php" class="Style11">- Vos messages </a></td>
              </tr>
              <tr bordercolor="#FFE8FB">
                <td bgcolor="#FFFFFF"><a href="photo.php" class="Style11">- Vos photos </a></td>
              </tr>
              <tr bordercolor="#FFE8FB">
                <td bgcolor="#FFFFFF"><a href="contact.php" class="Style11">- Vos ami(e)s</a></td>
              </tr>
              <tr bordercolor="#FFE8FB">
                <td bgcolor="#FFFFFF"><a href="annonce_mod.php" class="Style11">- Votre annonce </a></td>
              </tr>
              <tr>
                <td bgcolor="#FFE8FB">&nbsp;</td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF"><a href="index.php"><strong>- Retour Accueil</strong></a> </td>
              </tr>
            </table></td>
         
            <td width="650" colspan="2" valign="top" bgcolor="#FFFFFF"><br />
              <table width="650"  border="0" cellspacing="13" cellpadding="1">
                <tr>
                  <td colspan="3" bgcolor="#567596"><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td colspan="8" bgcolor="#FFFFCC"><a href="indexiden.php"><img src="logo/logo.jpg" width="906" height="112" border="0"></a></td>
                    </tr>
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
                  </table></td>
                </tr>

                <tr align="center" bgcolor="#96ACC2">
                  <td width="406" bgcolor="#FFFFFF"><table width="400"  border="0" cellspacing="0" cellpadding="3">
                      <tr bgcolor="#AFBFCF">
                        <td bgcolor="#FFDFFF"><div align="center">
                            <p class="Style15">::. <strong>Etat de votre boite Messages handicaperencontre.fr rencontre pour les personnes handicap&eacute;es </strong> .::<br />
                            </p>
                        </div></td>
                      </tr>
                      <tr bgcolor='#AFBFCF'>
                        <td bgcolor='#FFFFFF'><div align='left'>
                            <table width='400'  border='0' cellspacing='7' cellpadding='0'>
                              <tr>
                                <td bgcolor='#FFE8FB'><div align='left'><strong><span class='Style12'>-</span> Message(s) de vos ami(es)</strong></div></td>
                              </tr>
                             
							 
<?

//provenence des message

for($i=0;$i < $nb_recu;$i++) {
	
	if (mysql_data_seek($r, $i))  {
	
	$row = mysql_fetch_row($r);
	$expediteur = $row[1];							 
	$objet = $row[3];	
	$message_heure = $row[6];		
	//recherche si viens ami					 
	$query_ami = "SELECT * FROM ami WHERE pseudodemande='$expediteur' AND pseudo='$pseudo_ident'"; 
	$r_ami = mysql_query($query_ami) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe99 !!!");
	if(mysql_num_rows($r_ami)) {			 
		//limitation de la taille de l objet
		$t=0;
		$objet_reduit = "";
		for($t;($t < 30 && $t<strlen($objet));$t++) {
		$objet_reduit = $objet_reduit . $objet[$t];
		}
		$objet_reduit = 	$objet_reduit." ...";
$objet_reduit = str_replace("§§","'",$objet_reduit);
		
			echo 			"<tr>
                                <td><table width='380' height='12' border='0' cellpadding='1' cellspacing='0' bgcolor='#FFFFFF'>
                                    <tr>
                                      <td width='119' height='12'><a href='profil.php?pseudo_envoi=$expediteur'>$expediteur</a></td>
                                      <td width='253'><a href='message_lire.php?objet=$objet&message_heure=$message_heure'>$objet_reduit </a></td>
                                    </tr>
                                </table></td>
                              </tr>
                             
                              ";
							
		}
	}
}
                             
							 
					?>		 
							 
							 
							    <td bgcolor="#FFE8FB"><div align="left"><strong><span class="Style12">-</span> Messages de la communaut&eacute;</strong></div></td>
                              </tr>
							  
							  
							  
							  
<?

//message de la communote

for($i=0;$i < $nb_recu;$i++) {
	
	if (mysql_data_seek($r, $i))  {
	
	$row = mysql_fetch_row($r);
	$expediteur = $row[1];							 
	$objet = $row[3];		
	$message_heure = $row[6];		
	//recherche si viens ami					 
	$query_ami = "SELECT * FROM ami WHERE pseudodemande='$expediteur' AND pseudo='$pseudo_ident'"; 
	$r_ami = mysql_query($query_ami) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	if(!mysql_num_rows($r_ami)) {			 
		//limitation de la taille de l objet

$objet_reduit = str_replace("§§","'",$objet_reduit);

		$t=0;
		$objet_reduit = "";
		for($t;($t < 30 && $t<strlen($objet));$t++) {
		$objet_reduit = $objet_reduit . $objet[$t];
		}
		$objet_reduit = 	$objet_reduit." ...";
$objet_reduit = str_replace("§§","'",$objet_reduit);
		
			echo 			"<tr>
                                <td><table width='380' height='12' border='0' cellpadding='1' cellspacing='0' bgcolor='#FFFFFF'>
                                    <tr>
                                      <td width='119' height='12'><a href='profil.php?pseudo_envoi=$expediteur'>$expediteur</a></td>
                                      <td width='253'><a href='message_lire.php?objet=$objet&message_heure=$message_heure'>$objet_reduit </a></td>
                                    </tr>
                                </table></td>
                              </tr>
                             
                              ";
							
		}
	}
}
                             
							 
					?>		
					
                         
                              <tr>
                                <td bgcolor="#FFE8FB"><div align="center"><strong>Il vous reste actuellement <span class="Style12"><? echo $nb_message_total; ?></span> place pour les messages <br />
                                          <br />
                                    </strong><strong> <? echo $barre; ?> % d'occup&eacute; </strong>
                                    <table width="100" height="10" border="1">
                                      <tr>
                                        <td><div align="left"><img src="img/barre.gif" width="<? echo $barre; ?>" height="10" /></div></td>
                                      </tr>
                                    </table>
                                  <strong><br />
                                    <br />
                                </strong></div></td>
                              </tr>
                            </table>
                        </div></td>
                      </tr>
                  </table></td>
                  <td width="201" colspan="2" valign="top" bgcolor="#FFFFFF"><table width="201"  border="0" cellspacing="0" cellpadding="3">
                      <tr bgcolor="#AFBFCF">
                        <td bgcolor="#FFE8FB"><p><strong>
                          <? if ($erreur!="") { echo "<span class='Style12'><strong>R&eacute;sultat de l'envoi :<br></strong></span><BR>".$erreur; } else { echo "<span class='Style12'><strong>R&eacute;sultat de l'envoi :<br></strong></span><BR>".$resultat; } ?>
                          </strong><br />
                          </p>
                          <p><span class="Style24">Les adresses Mail ou MSN ne sont pas envoy&eacute;es </span><br />
                          </p></td>
                      </tr>
                  </table></td>
                </tr>
              </table></td>
          </tr>
          <tr bgcolor="#96ACC2">
            <td colspan="5" bgcolor="#FFF0FF"><div align="center"><img src="img/bas.jpg" width="800" height="53" /></div></td>
          </tr>
      </table>
  </td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
