<?
require '_bdd.php';
require '_identification.php';
require '_restriction.php';
require 'lignechat.php';

$sujet = htmlspecialchars($_GET['sujet']);

// pour suprimer unmessage du forum
$idd = htmlspecialchars($_GET['idd']);
 $query = "DELETE FROM forum WHERE id='$idd'";    
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");


$rep="Tout le monde";

if (htmlspecialchars($_GET['action'])=="repondre") {
	$pseudo_rep = htmlspecialchars($_GET['pseudo_rep']);
	$rep = $pseudo_rep;
}


//ajouter au ami
if (htmlspecialchars($_GET['action'])=="ami") {
	$pseudo_ami=htmlspecialchars($_GET['pseudo_envoi']);
	require '_restriction.php';
require 'lignechat.php';$sess=session_id();
			$query = "SELECT * FROM ami WHERE ami='$pseudo_ami'"; 
	// Execute la requete
	$r = mysql_query($query) or die ("votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	if (mysql_num_rows($r)) { 
		$erreur = $erreur."Le pseudonyme existe déja, choisissez en un autre <br>";
	}
	else {
		$sql = "INSERT INTO ami (id,pseudo,ami,session) ";
		$sql =$sql."VALUES ('','$pseudo_ident','$pseudo_ami','$sess')";
		$result = mysql_query($sql) or die ("Error in query: $query. " . mysql_error()); 
		}
}					
//ajouter un message
if (htmlspecialchars($_GET['action'])=="ajouter") {
	require '_restriction.php';
require 'lignechat.php';$destinataire = htmlspecialchars($_POST['destinataire']);
	$message = htmlspecialchars($_POST['message']);

	if ($destinataire != "Tout le monde") {
	$query = "SELECT pseudo FROM user WHERE pseudo='$destinataire'"; 
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	$rrrr = mysql_num_rows($r);
	}
	else {
	$rrrr = 1;
	}

	if($rrrr && $destinataire != ""  && $message != "") {
	$date = date("Y-m-j"); 
	// Heure
	$today = getdate();
	$heuree = $today['hours']."h".$today['minutes'];
	// découpage
	$annee = substr($date, 0, 4);
	$mois = substr($date, 5, 2);
	$jour = substr($date, 8, 2); 
	// affichage
	$datee= $jour . '/' . $mois . '/' . $annee;
	$message = str_replace("'","azq",$message);
if ($pseudo_ident!="") {
	
	$sql = "INSERT INTO forum (id,sujet,expediteur,destinataire,message,date_m,heure_m) ";
	$sql =$sql."VALUES ('','$sujet','$pseudo_ident','$destinataire','$message','$datee','$heuree')";
	$result = mysql_query($sql) or die ("Error in query: $sql. " . mysql_error()); 
	
	// envoi d'un mail et notification au destinataire pour lui dire reponce sur le forum
	//recherche du mail destinataire
	$query = "SELECT pass,mail FROM user WHERE pseudo='$destinataire'"; 
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");


	
		$row = mysql_fetch_row($r);

$mail_des = $row[1];

//Variables :
$objet="vous avez reçu une reponse sur le forum de handicaperencontre.fr";

  $headers ='From: " handicaperencontre.fr/"'."\n";
     $headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
     $headers .='Content-Transfer-Encoding: 8bit';


$message = "vous avez reçu une reponce au sujet :".$sujet  . "http://www.handicaperencontre.fr/  votre login_____ :".$destinataire ."___pour toutes question contactez moi par mail indiqué sur le site   à bientot http://www.handicaperencontre.fr/  le commentaire : ".$message;
$sujet = "vous avez reçu un commentaire sur votre mur http://www.handicaperencontre.fr/  ::".	$objet;
$to=$mail; $from="icedenice@live.fr\r\n";   //appel de la fonction mail (envoi):

$message = eregi_replace("([_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+)",
                       "____", $message);
$message = str_replace("az","'",$message);

$sujet = str_replace("az","'",$sujet);


 mail($mail_des,$objet,$message,$headers); 


// placer dans bdd des evenements
$sqleven = "INSERT INTO even(id,des,exp,even,date,heure) ";
		$sqleven =$sqleven."VALUES ('','$destinataire','$pseudo_ident','forum','$datee','$heuree')";
		$result = mysql_query($sqleven) or die ("Error in query: $query. " . mysql_error()); 

	
	
	}}
}

//milieu recupère + traitement + affichage des message
// nb de page
?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>messages du Forum rencontre gratuit pour handicapés valides victimes d'avc, ou malades et leurs familles</title>
<META NAME="Author" CONTENT="Olivier RIMBERT">
<META NAME="Category" CONTENT="rencontre,handicap,handicapé,forum,discution">
<META NAME="Copyright" CONTENT="RIMBERT Olivier">
<META http-equiv=content-language content=fr-ca>
<META NAME="Description" CONTENT=" messages du forum handicaperencontre.fr rencontres gratuites pour handicapés et valides en france pour les célibataires qui désirent trouver l'amour, l'âme soeur, créer de nouvelles amitiés avec chat et forum pour aider les malades et leurs proches a se parler, a se connaitre,se rencontrer  et a trouver des solutions, surtout ne restez pas isolé, avc, traumatisme cranien, discutions et échange entre handicapés et valides  malades handicapés discutions sur rééducation et travail. réseau social sur le handicap et la rencontre en france. Rejoignez notre communauté de malades valides et handicapés pour des échanges de plus en plus nombreux et entièrement gratuit en france avec chat et forum sur le handicap bienvenu sur l accueil du site de handicaperencontre.fr site de rencontre gratuit">
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
	background-color: #F8E6F6;
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
.Style23 {font-size: 16px}
.Style24 {color: #000000}
.Style26 {color: #8080C0}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
}

function MM_callJS(jsStr) { //v2.0
  return eval(jsStr)
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
      <td><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
          
          <tr bgcolor="#567596">
            <td colspan="5" bgcolor="#FBE7F3"><div align="center" class="Style12">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="8"><a href="indexiden.php"><img src="logo/logo.jpg" width="906" height="112" border="0"></a><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 728x90 banière1 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-1493739445870732"
     data-ad-slot="7527634302"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script></td>
              </tr>
            <tr>
              <td><a href="indexiden.php"><img src="logo/acceuil.jpg" width="220" height="29" border="0"></a></td>
              <td><a href="jeux.php"><img src="logo/jeux.jpg" width="76" height="29" border="0"></a></td>
              <td><a href="forum_sujet.php"><img src="logo/forum.jpg" width="76" height="29" border="0"></a></td>
              <td><a href="mur.php?pseudo_envoi=<? echo $moi;?>"><img src="logo/mur.jpg" width="97" height="29" border="0"></a></td>
              <td><a href="photo.php"><img src="logo/photo.jpg" width="120" height="29" border="0"></a></td>
              <td><a href="recherche.php"><img src="logo/recherche.jpg" width="112" height="29" border="0"></a></td>
              <td><a href="message.php"><img src="logo/message.jpg" width="98" height="29" border="0"></a></td>
               <td><a href="chat.php?pseudo_envoi=<? echo $moi;?>"><img src="logo/chat.jpg" width="99" height="28" border="0"></a></td>
            </tr>
          </table>
          <a href="http://www.handicaperencontre.fr/">
          <br>
        </div></td>
        </tr>
      <tr bgcolor="#96ACC2">
        <td colspan="5" bgcolor="#FBE7F3"><form action="http://www.google.fr/cse" id="cse-search-box">
            <input type="hidden" name="ie" value="ISO-8859-1" />
            <input type="hidden" name="cx" value="partner-pub-1493739445870732:m7rsan-oi99" />
            <input type="text" name="q" size="31" />
            <input type="submit" name="sa" value="Rechercher" />
            <? if($pass_reel==$pass_ident and !empty($pass_ident) ) echo"<a href='inscription2.php'>modifier Votre profil---</a><a href='supr.php'>supprimer votre profil</a>";?>
            <a href="chat.php" class="Style17"></a><img src="img/B_USRLIST.PNG" width="16" height="16">
            <? if($erreur_ident=="") { echo $message_acceuil; } else { echo $erreur_ident; } ?>
        </form>
        </strong></div></td>
          </tr>
          <tr bgcolor="#96ACC2">
            <td width="143" align="left" valign="top" bgcolor="#FFFFFF"><form action="index.php" method="post" name="form">
          <table width="100%"  border="1" cellpadding="1" cellspacing="0">
            <tr>
              <td class="style40 Style12 Style28"><strong>ENLIGNE en ce moment :</strong> <span class="Style17">
                <?
//affiche nombre personne en ligne
//                   echo $pligne;
	
	// affiche les pseudo 			   
				   $fin = $pligne;
$i=0;
for($i;$i < $fin;$i++) {

	
if($i<$row = mysql_num_rows($l)) {
	
	if (mysql_data_seek($l, $i))  {
	
	$row = mysql_fetch_row($l);
	$pseudoligne = $row[1];
	
	echo "<a href='profil.php?pseudo_envoi=$pseudoligne'>$pseudoligne</a>"." <br> "; 
	
	
	}
	}
	}
				   ?>
              </span></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
              <td bgcolor="#CCCCFF" class="Style17"><img src="img/MINIMEMBRE.GIF" width="16" height="12"> <strong>Votre Espace </strong></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="photo.php" class="Style17"></a><a href="chat.php" class="Style12">
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
                <input name="chat_bouton2422" type="submit" id="chat_bouton2422" onClick="MM_goToURL('parent','modif_2.php');return document.MM_returnValue" value="Modifier Vos centre d'int&eacute;r&ecirc;t">
              </a></td>
            </tr>
            
            <tr>
              <td bgcolor="#FFFFFF"><a href="chat.php" class="Style12">
                <input name="chat_bouton2423" type="submit" id="chat_bouton2423" onClick="MM_goToURL('parent','modif_1.php');return document.MM_returnValue" value="Modifier votre description">
              </a></td>
            </tr>
            
            <tr>
              <td bgcolor="#FFFFFF"><a href="chat.php" class="Style12">
                <input name="chat_bouton24" type="submit" id="chat_bouton24" onClick="MM_goToURL('parent','contact.php');return document.MM_returnValue" value="Gerer vos amis">
              </a></td>
            </tr>
            <tr>
              <td bgcolor="#CCCCFF" class="Style17"><img src="img/B_TBLOPS.PNG" alt="Sommaire" width="16" height="12"> <strong>Jeux </strong></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="top_femme.php" class="Style17"><strong>
                <input name="submit2" type="submit" onClick="MM_goToURL('parent','phpmine.php');return document.MM_returnValue" value="D&eacute;mineur" la="la" partie="partie" />
                <input name="submit2222" type="submit" onClick="MM_goToURL('parent','morpion/index.php');return document.MM_returnValue" value="jouer Morpion" la="la" partie="partie" />
              </strong></a></td>
            </tr>
            <tr>
              <td bgcolor="#CCCCFF" class="Style17"><img src="img/MAIL.GIF" alt="Votre parole" width="14" height="11"> Votre parole </td>
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
            <td colspan="2" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="13" cellpadding="1">
              <tr>
                <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFDFFF"><div align="center">
                          <p class="Style11">::. Forum, sujet : <?  $sujet_post=htmlspecialchars($_GET['sujet']); $sujet= str_replace("azq","'",$sujet_post);echo $sujet; $sujet= str_replace("'","'azq",$sujet_post); ?> .::<br />
                          </p>
                      </div></td>
                    </tr>
                </table></td>
              </tr>
              <tr align="center" bgcolor="#96ACC2">
                <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFDFFF"><div align="center">
                          <p><span class="Style11">::. Message .::</span><br />
                          </p>
                      </div></td>
                    </tr>
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFFFFF"><div align="left">
                          <table width="100%"  border="0" cellspacing="7" cellpadding="0">
                            <tr>
                              <td width="100%"><div align="center">
                                  <form name="form1" method="post" action="forum_message.php?sujet=<? echo $sujet; ?>&action=ajouter">
                                    <table width="100%"  border="0" cellspacing="10" cellpadding="1">
                                      <?

$start = htmlspecialchars($_GET['start']);	  
$query = "SELECT * FROM forum WHERE sujet='$sujet' ORDER BY  'id' desc"; 
	
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$fin = $start+10;
$i=$start;
for($i;$i < $fin;$i++) {

if($i<$row = mysql_num_rows($r)) {
	
	if (mysql_data_seek($r, $i))  {
	
	$row = mysql_fetch_row($r);
	$expediteur = $row[2];
	$destinataire = $row[3];
	$message = $row[4];
	$datee = $row[5];
		$id = $row[0];
	$heuree = $row[6];
	$message = str_replace("azq","'",$message);
	// traite les smiley dans le message



$message = eregi_replace("(http://[a-z0-9-]+(\.[a-z0-9-]+)+)",
                       "<A HREF=\"\\1\" target=\"_blank\">\\1</A>", $message);
	   $message = eregi_replace("([_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+)",
                       "mail bloqué", $message);

// traite les smiley dans le message

	$message = str_replace("[sy","<img src='http://www.handicaperencontre.fr/smiley/sy",$message);

	$message = str_replace(".gif]",".gif' width='20' height='20' />",$message);



	//recupere la photo
	$query_photo = "SELECT afficher FROM photo WHERE pseudo='$expediteur'"; 
	$r_photo = mysql_query($query_photo) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	$row_photo = mysql_fetch_row($r_photo);
	$photo = $row_photo[0];
	$photo2=$photo;
if (!$photo) { $photo="img/20000503113333_54143.jpg"; }
else {
$photo2=$photo;
$photo = "./photos/".$expediteur."/".$photo2;
}
	if ($row = mysql_num_rows($r) && $expediteur != "") {
		if ($destinataire == "Tout le monde") { $destinataire_aff = "Tout le monde"; } else { $destinataire_aff = "<a href='profil.php?pseudo_envoi=$destinataire'> $destinataire</a>"; }
		// place du texte

		echo "<tr>
                                      <td width='76%'><table width='100%' border='1' cellspacing='0' cellpadding='2'>
                                        <tr>
                                          <td width='22%' valign='top' bgcolor='#A3A3D1'><div align='center'><a href='forum_sujet.php'><strong>Retour</strong></a></div></td>
                                          <td colspan='3' bgcolor='#A3A3D1'><strong><a href='profil.php?pseudo_envoi=$expediteur'> $expediteur</a> pour $destinataire_aff : le $datee &agrave; $heuree </strong>";if($expediteur==$pseudo_ident) echo"<a href='forum_message.php?idd=$id'>supprimer</a>";if($pseudo_ident==$destinataire) echo"<a href='forum_message.php?idd=$id'>supprimer</a>";echo"
</a></td>
                                        </tr>
                                        <tr>
                                          <td width='22%' valign='top' bgcolor='#FFDFFF'><a href='forum_message.php?sujet=$sujet'><img src='$photo' width='120' height='120' onclick=\"MM_openBrWindow('$photo','$pseudo_ident','scrollbars=yes,width=800,height=600')\"></a></td>
                                          <td   align='left' valign='top' colspan='3' bgcolor='#FFDFFF'>$message </td>
                                        </tr>
                                        <tr>
                                          <td width='22%' bgcolor='#A3A3D1'><div align='center'><a href='forum_message.php?sujet=$sujet&pseudo_rep=$expediteur&action=repondre#rep'><strong>R&eacute;pondre</strong></a></div></td>
                                          <td width='29%' bgcolor='#A3A3D1'><div align='center'><a href='forum_message.php?sujet=$sujet&action=ami&pseudo_envoi=$expediteur'><strong>Ajouter &agrave; vos ami(e)s </strong</a></div></td>
                                          <td width='26%' bgcolor='#A3A3D1'><div align='center'><a href='message_ecrire.php?action=post&destinataire=htmlspecialchars($expediteur)'><strong>Envoyer un message </strong></a></div></td>
                                          <td width='23%' bgcolor='#A3A3D1'><div align='center'><a href='forum_sujet.php'><strong>Retour aux sujets </strong></a></div></td>
                                        </tr>
                                      </table></td>
                                    </tr>";
		
			  }
			
			  }
			 
			  
			  

	}
	
}

			  
?>
                                      <tr>
                                        <td bgcolor="#FFF7FF"><div align="center"><strong>Page :
                                          <? 
// cr&eacute;ation des n&deg; de page 
$query = "SELECT id FROM forum WHERE sujet='$sujet' ORDER BY  'id' desc"; 
	
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$i=0;
$page = 1;
$nb_ligne = mysql_num_rows($r);
				
				echo "[ - ";
				while ($i< $nb_ligne) {
				echo "<a href='forum_message.php?sujet=$sujet&start=$i'>$page</a> ";
				echo " - ";
				$page=$page+1;
				$i=$i+10;
				}
	echo "]";
?>
                                        </strong> </div></td>
                                      </tr>
                                      <tr>
                                        <td>&nbsp;</td>
                                      </tr>
                                      <tr>
                                        <td><table width="100%" border="1" cellspacing="0" cellpadding="2">
                                            <tr>
                                              <td width="100%" valign="top" bgcolor="#FFDFFF"><div align="center" class="Style24"><strong>::. Ecrire un message .::</strong> <a name="rep" id="rep"></a></div></td>
                                            </tr>
                                            <tr>
                                              <td bgcolor="#FFF7FF"><strong>Destinataire :</strong>
                                                  <input name="destinataire" type="text" id="destinataire" value="<?echo $rep; ?>" size="20" maxlength="20" />
</td>
                                            </tr>
                                            <tr>
                                              <tdvalign="top" bgcolor="#FFFFFF"><div align="center">
                                                  <textarea name="message" cols="90" rows="10" id="message\">
                                    </textarea>
                                              </div></td>
                                            </tr>
                                            <? require 'smi.php'; ?>
                                            <tr>
                                              <td valign="top" bgcolor="#FFFFFF"><div align="center">
                                                  <input type="submit" name="Submit2" value="Envoyer le message" />
                                              </div></td>
                                            </tr>
                                        </table></td>
                                      </tr>
                                    </table>
                                </form>
                                  </div></td>
                            </tr>
                          </table>
                      </div></td>
                    </tr>
                </table></td>
              </tr>
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

  <span class="Style26"></span>
</body>
</html>
