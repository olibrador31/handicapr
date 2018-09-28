<?
require '_bdd.php';
require '_identification.php';
require '_restriction.php';
require 'lignechat.php';require 'stat_message.php';


//affichage du message --------------------------------

$message_heure = $_GET['message_heure'];
$objet = $_GET['objet'];

// message lu dans base even
// update la base even pour les com du mur soit a 1 aaa

$even="message".$message_heure;
$query = "UPDATE even SET vu='1' WHERE des='$pseudo_ident'AND (even='$even') "; 

	
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris11 ");
	

if ($_GET['action'] != "env") {
$query = "SELECT * FROM message WHERE destinataire='$pseudo_ident' AND objet='$objet' AND heure='$message_heure'"; 

// passer lu à oui
$query2 = "UPDATE message SET lu='o' WHERE destinataire='$pseudo_ident' AND objet='$objet' AND heure='$message_heure'";
$rd = mysql_query($query2) or die ("Pas pris ");
} else {
$query = "SELECT * FROM envoyer WHERE expediteur='$pseudo_ident' AND objet='$objet' AND heure='$message_heure'"; 

}



// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$row = mysql_fetch_row($r);
$message = $row[4];
$expediteur = $row[1];
$datee = $row[5];
$id = $row[0];
$idmessage = $row[0];
$message = str_replace("§§","'",$message);
$objet_envoi=$objet;
$objet = str_replace("§§","'",$objet);


$message = eregi_replace("(http://[a-z0-9-]+(\.[a-z0-9-]+)+)",
                       "<A HREF=\"\\1\" target=\"_blank\">\\1</A>", $message);
	   $message = eregi_replace("([_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+)",
                       "____", $message);

// traite les smiley dans le message

	$message = str_replace("[sy","<img src='http://www.handicaperencontre.fr/smiley/sy",$message);

	$message = str_replace(".gif]",".gif' width='20' height='20' />",$message);
?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>lire un message de votre messagerie rencontre gratuit pour handicapés valides victimes d'avc, ou malades et leurs familles</title>
<META NAME="Author" CONTENT="Olivier RIMBERT">
<META NAME="Category" CONTENT="rencontre,handicap,handicapé,forum,discution">
<META NAME="Copyright" CONTENT="RIMBERT Olivier">
<META http-equiv=content-language content=fr-ca>
<META NAME="Description" CONTENT="lire vos messages de la boite de reception de rencontres gratuites pour handicapés et valides en france pour les célibataires qui désirent trouver l'amour, l'âme soeur, créer de nouvelles amitiés avec chat et forum pour aider les malades et leurs proches a se parler, a se connaitre,se rencontrer  et a trouver des solutions, surtout ne restez pas isolé, avc, traumatisme cranien, discutions et échange entre handicapés et valides  malades handicapés discutions sur rééducation et travail. réseau social sur le handicap et la rencontre en france. Rejoignez notre communauté de malades valides et handicapés pour des échanges de plus en plus nombreux et entièrement gratuit en france avec chat et forum sur le handicap bienvenu sur l accueil du site de handicaperencontre.fr site de rencontre gratuit">
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
	background-color: #FBE9F9;
}
-->
</style>
<style type="text/css">
<!--
.Style10 {color: #FFFFFF}
-->
</style>
<link href="vbbcv_message.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Style15 {color: #000000}
.Style11 {color: #000000;
	font-weight: bold;
}
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
      <tr bgcolor="#96ACC2"><td colspan="5" bgcolor="#FBE7F3"><div align="center" class="Style12">
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
      <tr bgcolor="#567596">
        <td colspan="5" background="" bgcolor="#FFF0FF"><div align="left"><strong>&nbsp;<strong>
          <? if($erreur_ident=="") { echo $message_acceuil; } else { echo $erreur_ident; } ?>
        </strong>
          <input type="text" name="q" size="31" />
          <input type="submit" name="sa" value="Rechercher" />
        </strong><strong><? if($pass_reel==$pass_ident and !empty($pass_ident) ) echo"<a href='inscription2.php'>modifier Votre profil---</a><a href='supr.php'>supprimer votre profil</a>";?>
        <a href="chat.php" class="Style17"></a>
        <input type="hidden" name="cx" value="partner-pub-1493739445870732:m7rsan-oi99" />
        <input type="hidden" name="ie" value="ISO-8859-1" />
        <div align="left"></div>
        </strong></div></td></tr>
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
        <td width="5" bgcolor="#FFDFFF">&nbsp;</td>
        <td colspan="2" valign="top" bgcolor="#FFFFFF"><br />
          <table width="650"  border="0" cellspacing="13" cellpadding="0">
            <tr>
              <td bgcolor="#FFDFFF"><div align="center"><span class="Style11">::. <? echo $objet; ?> .:: </span></div></td>
            </tr>
            <tr bgcolor="#96ACC2">
              <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                  <tr bgcolor="#AFBFCF">
                    <td bgcolor="#567596"><table width="100%" border="0" cellpadding="0" cellspacing="1">
                        <tr>
                          <td bgcolor="#FFE8FB"><table width="234" height="5" border="1" cellpadding="0" cellspacing="0">
                              <tr>
                                <td width="71"><div align="center">
                                    <input name="Submit" type="submit" onclick="MM_goToURL('parent','message_ecrire.php?<? echo "action=post&destinataire=$expediteur&objet=$objet_envoi"; ?>');return document.MM_returnValue" value="R&eacute;pondre" />
                                </div></td>
                                <td width="69"><div align="center">
                                    <input name="Submit4" type="submit" onclick="MM_goToURL('parent','message_recu.php?action=supr&amp;id=<? echo $id; ?>');return document.MM_returnValue" value="Supprimer" />
                                </div></td>
                                <td width="86"><div align="center">
                                    <input name="Submit2" type="submit" onclick="MM_goToURL('parent','profil.php?pseudo_envoi=<? echo $expediteur; ?>');return document.MM_returnValue" value="Voir le profil" />
                                </div></td>
                              </tr>
                          </table>                            </td>
                        </tr>
                        <tr>
                          <td bgcolor="#FFFFFF"><table width="100%" border="0" cellpadding="1" cellspacing="1">
                              <tr>
                                <td bgcolor="#FFE8FB">&nbsp;</td>
                                <td bgcolor="#FFE8FB">&nbsp;</td>
                              </tr>
                              <tr>
                                <td width="15%" bgcolor="#FFE8FB"><span class="Style10 Style15"><strong>Message de : </strong></span></td>
                                <td width="85%" bgcolor="#FFE8FB"><a href="profil.php?pseudo_envoi=<? echo $expediteur; ?>"><strong><? echo $expediteur; ?> </strong></a></td>
                              </tr>
                              <tr>
                                <td bgcolor="#FFE8FB"><span class="Style15"><strong>Objet : </strong></span></td>
                                <td bgcolor="#FFE8FB"><span class="Style15"><strong><? echo $objet; ?></strong></span></td>
                              </tr>
                              <tr>
                                <td bgcolor="#FFE8FB"><span class="Style15"><strong>Envoy&eacute; le : </strong></span></td>
                                <td bgcolor="#FFE8FB"><strong><? echo $datee; ?> &agrave; <? echo $message_heure; ?> </strong></td>
                              </tr>
                              <tr>
                                <td bgcolor="#FFE8FB">&nbsp;</td>
                                <td bgcolor="#FFE8FB"><input name="Submit223" type="button" onClick="MM_goToURL('parent','verifier.php?id=<? echo $idmessage; ?>&action=message');return document.MM_returnValue" value="signaler ce message" /></td>
                              </tr>
                          </table></td>
                        </tr>
                        <tr>
                          <td bgcolor="#D8DFE7"><table width="100%" border="0" cellpadding="7">
                              <tr>
                                <td bgcolor="#FFFFFF"><? echo $message; ?></td>
                              </tr>
                          </table></td>
                        </tr>

                    </table></td>
                  </tr>
              </table></td>
            </tr>
          </table></td>
      </tr>
      <tr bgcolor="#96ACC2">
        <td colspan="5" bgcolor="#FFF0FF"><div align="center"><img src="img/bas.jpg" width="800" height="53" /></div></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
