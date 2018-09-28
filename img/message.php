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
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$row = mysql_fetch_row($r);
$pseudo_expediteur = $row[0];
//cherche le nb de message
$query = "SELECT id FROM message WHERE expediteur='$pseudo_expediteur'"; 
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$nb_message_total = mysql_num_rows($r);
$query = "SELECT id FROM envoyer WHERE expediteur='$pseudo_expediteur'"; 
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");

$nb_message_total = $nb_message_total + mysql_num_rows($r) + 2;
$barre = $nb_message_total/2;
$nb_message_total = 200 - $nb_message_total;

// FIN Compte et affiche les stat de la boite mail -----------


// enregistrement d'un message -----------------------
if (!empty($_POST['envoi'])) {
	//si il y a asez de place dans la boite mail
	if($nb_message_total > 0) {
	$pseudo_destinataire = $_POST['destinataire'];
	//recherche du destinataire
	$query = "SELECT pseudo,pass,mail FROM user WHERE pseudo='$pseudo_destinataire'"; 
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	
	if(mysql_num_rows($r)) {
		$row = mysql_fetch_row($r);
$pseudo = $row[1];
$pass = $row[2];
$mail_des = $row[2];




		$objet = $_POST['objet'];
		$message = $_POST['message'];
		
		//cherche du pseudo de l expéditeur
		$session_exp = session_id();
		$query = "SELECT pseudo,pass FROM user WHERE session='$session_exp'"; 
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
		$row = mysql_fetch_row($r);
		$pseudo_expediteur = $row[0];

		//taitement + enregistrement du message
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
		$datee= $jour . '-' . $mois . '-' . $annee;
		$sql = "INSERT INTO message (id,expediteur,destinataire,objet,message,date,heure,lu) ";
		$sql =$sql."VALUES ('','$pseudo_expediteur','$pseudo_destinataire','$objet','$message','$datee','$heuree','n')";
		$result = mysql_query($sql) or die ("Error in query: $query. " . mysql_error()); 
				$sql = "INSERT INTO envoyer (id,expediteur,destinataire,objet,message,date,heure) ";
		$sql =$sql."VALUES ('','$pseudo_expediteur','$pseudo_destinataire','$objet','$message','$datee','$heuree')";
		$result = mysql_query($sql) or die ("Error in query: $query. " . mysql_error()); 
		
		$resultat = "Votre message à bien été envoyé à ".$pseudo_destinataire;

 //Variables :


  $headers ='From: "www.handicaperencontre.fr/"'."\n";
     $headers .='Reply-To: rimbert.olivier@yahoo.fr'."\n";
     $headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
     $headers .='Content-Transfer-Encoding: 8bit';


$message = "vous avez reçu un mail sur http://www.handicaperencontre.fr/  votre login_____ :".$pseudo_destinataire ."___pour toutes question contactez moi par mail  rimbert.olivier@yahoo.fr  à bientot http://www.handicaperencontre.fr/  votre message : ".$message;
$sujet = "vous avez reçu un mail sur http://www.handicaperencontre.fr/  ::".	$objet;
$to=$mail; $from="rimbert.olivier@yahoo.fr\r\n";   //appel de la fonction mail (envoi):
 mail($mail_des,$sujet,$message,$headers); 
		}
		else {
		$erreur = "Le destinataire n'existe pas, vérifiez que vous avez saisiez le bon pseudonime";
		}
	}
	else {
	$erreur = "Votre boite message Meet me contient trop de message, veuillez en suprimer avent d'envoyer d'autre messages";
	}
}

// FIN enregistrement d'un message -----------------------

// recherche des nouveau message  -----------------------

$query = "SELECT * FROM message WHERE lu='n' AND destinataire='$pseudo_ident'"; 
	
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$nb_recu = mysql_num_rows($r);





// FIN recherche des nouveau  message -----------------------


?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Site de rencontre 100% gratuit pour rencontres sérieuses près de chez vous rejoignez des milliers de célibataires hommes femmes
</title>
<META NAME="Author" CONTENT="Olivier RIMBERT">
<META NAME="Category" CONTENT="rencontre,chat,amour,réseau social">
<META NAME="Copyright" CONTENT="RIMBERT Olivier">
<META http-equiv=content-language content=fr-ca>
<META NAME="Description" CONTENT=" Site de rencontre 100% gratuit et sérieux, rencontre amoureuse de célibataires en france, consultez des annonces de rencontres sérieuses et gratuites profils controlés de célibataires sérieux et motivés hommes femmes de france près de chez vous, trouvez l'amour ou l'ame soeur">
<META NAME="Identifier-URL" CONTENT="http://www.handicaperencontre.fr/">
<META NAME="Keywords" CONTENT="handicaperencontre site de rencontre sur internet, chat, chat gratuit, chat rencontre, 100% gratuit, site de rencontre, rencontre gratuite, gratuit,rencontres, rencontre sérieuse, site de rencontre gratuit, sérieux, célibataire, trouver l'amour, hommes, femmes, annonce rencontre, 100, qualité, trouver l'amour, ame soeur, rencontres amoureuses, profils vérifiés, profils sérieux, site de rencontre gratuit, site de rencontre en france, réseau social de l'amour, amour, amitier, rencontre, durable, sérieux, sérieuses, couple, internet, chat, chat rencontre, profils sérieux, rencontre en france, relation durable, rencontres pour relations durables, heureux, heureuse, histoire amour, rencontrer homme, rencontrer femme,rencontrer hommes, rencontrer femmes, rencontrer ame soeur, trouver l'aamour, près de chez vous, pres de chez vous, en france, france, photos, photo, photos femmes, photos hommes, profils sérieux, profils vérifiés, rencontrer, trouver, trouver l'amour, trouver des amis">
<META NAME="Publisher" CONTENT="RIMBERT Olivier">
<META NAME="Revisit-After" CONTENT="30 days">
<META NAME="Robots" CONTENT="all">
<META NAME="GOOGLEBOT" CONTENT="NOARCHIVE">
<meta charset="utf-8">
<META http-equiv="Pragma" CONTENT="no-cache">
<META content="handicaperencontre.fr Site de rencontre 100% gratuit pour rencontres sérieuses près de chez vous rejoignez des milliers de célibataires hommes femmes
" name=title>
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

<body>


<style type="text/css">
@import url(http://www.google.com/cse/api/branding.css);
</style>
<div class="cse-branding-bottom" style="background-color:#FFFFFF;color:#000000">
  <div class="cse-branding-form">
    <form action="http://www.google.fr" id="cse-search-box" target="_blank">
      <div>
        <input type="hidden" name="cx" value="partner-pub-1493739445870732:8700158208" />
        <input type="hidden" name="ie" value="UTF-8" />
        <input type="text" name="q" size="55" />
        <input type="submit" name="sa" value="Rechercher" />
      </div>
    </form>
  </div>
  <div class="cse-branding-logo">
    <img src="http://www.google.com/images/poweredby_transparent/poweredby_FFFFFF.gif" alt="Google" />
  </div>
  <div class="cse-branding-text">
    Recherche personnalisée
  </div>
</div>


<form name="form1" method="post" action="message.php">
  <table width="800"  border="0" align="left" cellpadding="1" cellspacing="0" bgcolor="#000000">
    <tr>
      <td><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
    <td class="Style38"><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#96ACC2">
            <td colspan="5" bgcolor="#FBE7F3"><div align="center"><a href="http://www.handicaperencontre.fr/"><a href="http://www.handicaperencontre.fr/indexiden.php"><img src="img/logo.jpg" width="800" height="116" border="0"><br>
          <br>
        
              <br>
          </a></div></td>
          </tr>
          
          <tr bgcolor="#96ACC2">
            <td width="143" align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="143" align="left" valign="top" bgcolor="#FFF0FF"><form action="index.php" method="post" name="form">
          <table width="100%"  border="1" cellpadding="1" cellspacing="0">
            <tr>
              <td bgcolor="#FFFFFF"><div align="center"></div></td>
            </tr>
            <tr>
              <td bgcolor="#CCCCFF" class="Style17"> Identification</td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><div align="center" class="Style17">
                <input name="pseudo_ident" type="text" id="pseudo_ident" value="Pseudonyme" size="20" maxlength="20">
              </div></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><div align="center" class="Style17">
                <input name="pass_ident" type="password" id="pass_ident" value="password" size="20" maxlength="20">
              </div></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><div align="center" class="Style17">
                <input type="submit" name="Submit" value="Connexion">
                <br>
                <input name="ident" type="hidden" id="ident" value="oui">
              </div></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><span class="Style17">
                <input name="chat_bouton23" type="submit" id="chat_bouton23" onClick="MM_goToURL('parent','deco.php');return document.MM_returnValue" value="DECONNEXION">
              </span></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"> <a href="mdp.php"></a><a href="chat.php" class="Style12">
                <input name="chat_bouton32" type="submit" id="chat_bouton32" onClick="MM_goToURL('parent','mdp.php');return document.MM_returnValue" value="Mot de passe oubli&eacute;">
              </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="inscription1.php?id=1" class="Style17">
                <input name="chat_bouton243" type="submit" id="chat_bouton243" onClick="MM_goToURL('parent','recherche.php');return document.MM_returnValue" value="Rechercher des amis">
              </a> </td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="plan.php"><strong>Plan</strong></a></td>
            </tr>
            <tr>
              <td bgcolor="#CCCCFF" class="Style17"><img src="img/MINIMEMBRE.GIF" width="16" height="12"> Votre Espace </td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="votre_profil.php?pseudo_envoi=<? echo $pseudo_ident; ?>" class="Style17"> - Votre profil </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="message.php" class="Style17">- Vos messages </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="photo.php" class="Style17">- </a><a href="chat.php" class="Style12">
                <input name="chat_bouton24" type="submit" id="chat_bouton24" onClick="MM_goToURL('parent','photo.php');return document.MM_returnValue" value="G&eacute;rer vos photos">
              </a><a href="photo.php" class="Style17"> </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><input name="chat_bouton24" type="submit" id="chat_bouton24" onClick="MM_goToURL('parent','contact.php');return document.MM_returnValue" value="G&eacute;rer vos amis"></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="annonce_mod.php" class="Style17">- Votre annonce </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
              <td bgcolor="#CCCCFF" class="Style17"><img src="img/B_TBLOPS.PNG" alt="Sommaire" width="16" height="12"> Sommaire</td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="inscription1.php?id=1" class="Style17">- Cr&eacute;er un compte </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="recherche.php" class="Style17">- Recherche</a></td>
            </tr>
            <tr>
              
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="top_homme.php" class="Style17"></a><a href="chat.php" class="Style12">
                <input name="chat_bouton332" type="submit" id="chat_bouton332" onClick="MM_goToURL('parent','chat.php');return document.MM_returnValue" value="Entrer sur le Chat">
              </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="top_femme.php" class="Style17">- Top 10 Femmes </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="top_homme.php" class="Style17">- Top 10 Hommes</a><a href="forum_sujet.php" class="Style17"></a></td>
            </tr>
            <tr>
              <td bgcolor="#CCCCFF" class="Style17"><img src="img/MAIL.GIF" alt="Votre parole" width="14" height="11"> Votre parole </td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="sugestion.php" class="Style18">- Suggestions </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="contacts.php" class="Style18">- Contact </a></td>
            </tr>
          </table>
          <p><a href="http://www.compare-le-net.com/index.php" target="_blank" title="Annuaire gratuit de liens en dur Compare le Net - accueil du site"></a>
        </form></td>
            <td width="5" bgcolor="#CCCCFF">&nbsp;</td>
            <td colspan="2" valign="top" bgcolor="#FFFFFF"><table width="650"  border="0" cellspacing="13" cellpadding="1">
              <tr>
                <? if ($pseudo_ident==$pseudo_envoi) { 
		require 'cadreeven.php';
	}
	else {
		require 'cadrenotif.php';
		} ?>
              </tr>
              <tr>
                <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                    <tr bgcolor="#AFBFCF">
                      <td colspan="2" bgcolor="#CCCCFF"><div align="center">
                          <strong> <span class="Style44">profil de <? echo $pseudo; ?></span> <a href="inscription1.php?id=1" class="Style17">
                              <input name="chat_bouton2432" type="submit" id="chat_bouton2432" onClick="MM_goToURL('parent','recherche.php');return document.MM_returnValue" value="Rechercher des amis">
                          </a>
                          <!-- Place this tag where you want the +1 button to render. -->
                          <input name="submit2" type="submit" onclick="MM_goToURL('parent','phpmine.php');return document.MM_returnValue" value="D&eacute;mineur" la="la" partie="partie" />
                          <div class="g-plusone" data-annotation="inline" data-width="300"></div>

<!-- Place this tag after the last +1 button tag. -->
<script type="text/javascript">
  window.___gcfg = {lang: 'fr'};

  (function() {
    var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
    po.src = 'https://apis.google.com/js/plusone.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
  })();
</script><br />
                          </strong></p>
                      </div></td>
                    </tr>
                    <tr bgcolor="#AFBFCF">
                      <td width="28%" rowspan="2" bgcolor="#FFFFFF"><form name="form1" method="post" action="profil.php?action=note&pseudo_envoi=<? echo $pseudo_envoi; ?>">
                        <table width="100%" height="100%" border="0" cellpadding="5" cellspacing="0">
                          <tr>
                            <td colspan="2" bgcolor="#FEF1FB"><div align="center"><strong>Note pour <? echo $pseudo; ?> </strong></div></td>
                          </tr>
                          <tr>
                            <td width="69%"><div align="center"><strong>Physique : </strong></div></td>
                            <td width="31%"><select name="notee" id="notee">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10" selected="selected">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                            </select></td>
                          </tr>
                          <tr>
                            <td><div align="center"><strong>Mental : </strong></div></td>
                            <td><select name="mental" id="mental">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10" selected="selected">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                            </select></td>
                          </tr>
                          <tr>
                            <td colspan="2"><div align="center">
                                <input name="Submit22" type="submit"  value="Envoyer" />
                            </div></td>
                          </tr>
                        </table>
                                            </form>
                      <div align="right"></div></td>
                      <td width="72%" bgcolor="#FCECF7"><div align="center">
                        <table width="442" border="0" cellspacing="0" cellpadding="2">
                            <tr>
                              <td width="239"><div align="right"><strong><span class="Style10">---&gt;</span> Popularit&eacute; total est de :</strong></div></td>
                              <td width="195"><div align="left"><strong><img src="img/bar5.gif" width="<? echo $note_global; ?>" height="11"> <span class="Style28"><? echo $note_global; ?> % </span></strong></div></td>
                            </tr>
                            <tr>
                              <td><div align="right"><strong>Note Mental : </strong></div></td>
                              <td><div align="left"><strong><img src="img/bar2.gif" width="<? echo $mental_2; ?>" height="11"><span class="Style16"> <? echo $mental_2; ?> % </span></strong></div></td>
                            </tr>
                            <tr>
                              <td><div align="right"><strong>Note Physique : </strong></div></td>
                              <td><div align="left" class="Style16"><img src="img/bar2.gif" width="<? echo $note; ?>" height="11"> <strong><? echo $note; ?> % </strong></div></td>
                            </tr>
                          </table>
                          <br />
                          <strong>Profil vu <span class="Style39"><? echo $click; ?></span> fois</strong></div></td>
                    </tr>
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFFFFF">
                        <div align="center">
                          <p>
                            <input name="Submit222" type="submit" onclick="MM_goToURL('parent','message_ecrire.php?action=post&amp;destinataire=<? echo $pseudo; ?>');return document.MM_returnValue" value="Ecrire un message" />
                            <input name="Submit223" type="submit" onclick="MM_goToURL('parent','photo_profil.php?pseudo_envoi=<? echo $pseudo; ?>');return document.MM_returnValue" value="Voir ses photos" />
                            <input name="Submit2233" type="submit" onclick="MM_goToURL('parent','contact.php?action=ami&pseudo_envoi=<? echo $pseudo; ?>');return document.MM_returnValue" value="Ajouter aux ami(e)s" />
                          </p>
                          <p>                            <br>
                            <input name="Submit2232" type="submit" onclick="MM_goToURL('parent','mur.php?pseudo_envoi=<? echo $pseudo; ?>');return document.MM_returnValue" value=" Poster et Voir son Mur " />
                          <input name="chat_bouton" type="submit" id="chat_bouton" onClick="MM_goToURL('parent','chat.php');return document.MM_returnValue" value="ENTRER SUR LE CHAT !!"></p>
                        </div></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#CCCCFF"><div align="center">
                          <p class="Style13"><strong>::. Profil de <? echo $pseudo; ?> .::<input name="Submit223" type="submit" onclick="MM_goToURL('parent','verifier.php?id=<? echo $idpseudo; ?>&action=profil');return document.MM_returnValue" value="signaler cette personne" /> 
                              <a href="inscription1.php?id=1" class="Style17">
                              <input name="chat_bouton2433" type="submit" id="chat_bouton2433" onClick="MM_goToURL('parent','recherche.php');return document.MM_returnValue" value="Rechercher des amis">
                              </a><br />
                                                    </strong></p>
                      </div></td>
                    </tr>
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFFFFF"><div align="left">
                          <table width="100%"  border="0" cellspacing="7" cellpadding="0">
                            <tr>
                              <td width="35%"><table width="69%"  border="0" cellspacing="7" cellpadding="0">
                                  <tr>
                                    <td bgcolor="#CCCCFF"><div align="left"><strong>Sa  photo </strong></div></td>
                                  </tr>
                                  <tr>
                                    <td><div align="left"><a href='photo_profil.php?pseudo_envoi=<? echo $pseudo_envoi; ?>'><img src="<? echo $photo; ?>" width="190" height="230" /></a></div></td>
                                  </tr>
                              </table></td>
                              <td width="65%" valign="top"><table width="100%"  border="0" cellspacing="7" cellpadding="0">
                                  <tr>
                                    <td bgcolor="#CCCCFF" class="Style12"><div align="left" class="Style13">Son annonce </div></td>
                                  </tr>
                                  <tr>
                                    <td><div align="left" class="Style13"><strong><? echo $annonce; ?></div></td>
                                  </tr>
                              </table></td>
                            </tr>
                          </table>
                      </div></td>
                    </tr>
                </table></td>
              </tr>
              <tr align="center" bgcolor="#96ACC2">
                <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#CCCCFF"><div align="center">
                          <p class="Style13"><strong>::. Profil de <? echo $pseudo; ?> .:: <input name="Submit223" type="submit" onclick="MM_goToURL('parent','verifier.php?id=<? echo $idpseudo; ?>&action=profil');return document.MM_returnValue" value="signaler cette personne" /><br />
                                                    </strong></p>
                      </div></td>
                    </tr>
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFFFFF"><div align="left">
                          <table width="100%"  border="0" cellspacing="7" cellpadding="0">
                            <tr>
                              <td width="50%"><table width="100%"  border="0" cellspacing="4" cellpadding="0">
                                  <tr>
                                    <td colspan="2" bgcolor="#CCCCFF"><div align="left"><strong>A quoi il/elle ressemble ? </strong></div></td>
                                  </tr>
                                  <tr>
                                    <td><div align="left" class="Style10 Style13"><strong>Age&nbsp;: </strong></div></td>
                                    <td width="63%"><div align="left" class="Style26"><? echo $age; ?></div></td>
                                  </tr>
                                  <tr>
                                    <td><div align="left" class="Style10 Style13"><strong>Sexe :</strong></div></td>
                                    <td><div align="left" class="Style26"><? echo $sexe; ?> </div></td>
                                  </tr>
                                  <tr>
                                    <td width="37%"><div align="left" class="Style10 Style13"><strong>Taille  :</strong></div></td>
                                    <td><div align="left" class="Style26"><? echo $taille; ?> </div></td>
                                  </tr>
                                  <tr>
                                    <td><div align="left" class="Style10 Style13"><strong>Poids&nbsp; : </strong></div></td>
                                    <td><div align="left" class="Style26"><? echo $poids; ?> </div></td>
                                  </tr>
                                  <tr>
                                    <td><div align="left" class="Style10 Style13"><strong>Yeux&nbsp;:</strong></div></td>
                                    <td><div align="left" class="Style26"><? echo $yeux; ?> </div></td>
                                  </tr>
                                  <tr>
                                    <td><div align="left" class="Style10 Style13"><strong>Cheveux : </strong></div></td>
                                    <td><div align="left" class="Style26"><? echo $cheveux; ?> </div></td>
                                  </tr>
                                  <tr>
                                    <td><div align="left" class="Style10 Style13"><strong>Style&nbsp;:</strong></div></td>
                                    <td><div align="left" class="Style26"><? echo $style; ?> </div></td>
                                  </tr>
                                  <tr>
                                    <td><div align="left" class="Style10 Style13"><strong>Silhouette&nbsp;:</strong></div></td>
                                    <td><div align="left" class="Style26"><? echo $silouhaite; ?> </div></td>
                                  </tr>
                              </table></td>
                              <td width="50%" valign="top"><table width="100%"  border="0" cellspacing="5" cellpadding="0">
                                  <tr>
                                    <td colspan="2" bgcolor="#CCCCFF" class="Style12"><div align="left" class="Style13">Un peu plus sur lui/elle </div></td>
                                  </tr>
                                  <tr>
                                    <td width="50%" bgcolor="#FFFFFF"><div align="left" class="Style13"><strong>D&eacute;partement&nbsp;:</strong></div></td>
                                    <td><div align="left" class="Style26"><? echo $departement; ?> </div></td>
                                  </tr>
                                  <tr>
                                    <td bgcolor="#FFFFFF"><div align="left" class="Style13"><strong>Ville&nbsp;:</strong></div></td>
                                    <td><div align="left" class="Style26"><? echo $ville; ?> </div></td>
                                  </tr>
                                  <tr>
                                    <td bgcolor="#FFFFFF"><div align="left" class="Style13"><strong>Profession&nbsp;:</strong></div></td>
                                    <td><div align="left" class="Style26"><? echo $profession; ?></div></td>
                                  </tr>
                                  <tr>
                                    <td bgcolor="#FFFFFF"><div align="left" class="Style13"><strong>Pr&eacute;nom&nbsp;:</strong></div></td>
                                    <td><div align="left" class="Style26"><? echo $prenom; ?> </div></td>
                                  </tr>
                                  <tr>
                                    <td bgcolor="#FFFFFF"><div align="left" class="Style13"><strong>Situation&nbsp;:</strong></div></td>
                                    <td><div align="left" class="Style26"><? echo $situation; ?> </div></td>
                                  </tr>
                                  <tr>
                                    <td bgcolor="#FFFFFF"><div align="left" class="Style13"><strong>Fumeur&nbsp;:</strong></div></td>
                                    <td><div align="left" class="Style26"><? echo $fumeur; ?> </div></td>
                                  </tr>
                                  <tr>
                                    <td bgcolor="#FFFFFF"><div align="left" class="Style13"><strong>But recherch&eacute; &nbsp;:</strong></div></td>
                                    <td><div align="left" class="Style26"><? echo $esprit; ?> </div></td>
                                  </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td colspan="2"><div align="center">
                                  <table width="100%"  border="0" cellspacing="5" cellpadding="0">
                                    <tr>
                                      <td colspan="2" bgcolor="#CCCCFF"><div align="left"><strong>Quelques pr&eacute;cisions ? </strong></div></td>
                                    </tr>
                                    <tr>
                                      <td valign="top"><div align="right" class="Style13"><strong>Description&nbsp;: </strong></div></td>
                                      <td width="76%"><div align="left" class="Style26"><? echo $description; ?> </div></td>
                                    </tr>
                                    <tr>
                                      <td valign="top"><div align="right" class="Style13"><strong>Aime :</strong></div></td>
                                      <td><div align="left" class="Style26"><? echo $aime; ?></div></td>
                                    </tr>
                                    <tr>
                                      <td width="24%" valign="top"><div align="right" class="Style13"><strong>D&eacute;teste :</strong></div></td>
                                      <td><div align="left" class="Style26"><? echo $deteste; ?> </div></td>
                                    </tr>
                                    <tr>
                                      <td valign="top"><div align="right" class="Style13"><strong>Citation pr&eacute;f&eacute;r&eacute;e : </strong></div></td>
                                      <td><div align="left" class="Style26"><? echo $citation; ?> </div></td>
                                    </tr>
                                    <tr>
                                      <td valign="top"><div align="right" class="Style13"><strong>Recherche&nbsp;:</strong></div></td>
                                      <td><div align="left" class="Style26"><? echo $recherche; ?> </div></td>
                                    </tr>
                                  </table>
                              </div></td>
                            </tr>
                          </table>
                      </div></td>
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
          <tr bgcolor="#567596">
            <td colspan="5" background="#CCCCFF" bgcolor="#FFF0FF"><div align="left"><strong>
           
           <? if($erreur_ident=="") { echo $message_acceuil; } else { echo $erreur_ident; } ?>
           <span class="Style12"><strong>
           <input name="Submit4" type="button" class="Style30" onClick="MM_goToURL('parent','profil.php?pseudo_envoi=<?echo"$moi";?>');return document.MM_returnValue" value="<? 
		   
		   // recherche le nb de nouveaux comentaires
$query = "SELECT * FROM even WHERE des='$moi' AND vu='0' "; 
	
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe iciiii!!!");


$ncom=mysql_num_rows($r);

echo"$ncom";?> évenement(s) non vu">
           </strong></span> 
           <? if($pass_reel==$pass_ident and !empty($pass_ident) ) echo"<a href='inscription2.php'>modifier Votre profil---</a><a href='supr.php'>supprimer votre profil</a>";?><br>
          <br>
        </strong></div></td>
          </tr>
          <tr bgcolor="#96ACC2">
            <td width="143" align="left" valign="top" bgcolor="#FFFFFF"><table width="160"  border="1" cellpadding="2" cellspacing="0" bordercolor="#FFF2FF">
              <tr>
                <td bgcolor="#FFFFFF"><div align="center"></div></td>
              </tr>
              <tr>
                <td bgcolor="#CCCCFF"><div align="left"><span class="Style11">Vos message </span></div></td>
              </tr>
              <tr>
                <td valign="top" bgcolor="#FFFFFF"><img src="img/open.gif" width="18" height="15" /> <a href="message_recu.php">Message re&ccedil;u (<? echo $nb_recu; ?>) </a></td>
              </tr>
              <tr>
                <td valign="top" bgcolor="#FFFFFF"><img src="img/open.gif" width="18" height="15" /> <a href="message_envoyer.php">Message envoy&eacute; (<? echo $nb_envoyer; ?>) </a></td>
              </tr>
              <tr>
                <td valign="top" bgcolor="#FFFFFF"><img src="img/actionEdit.gif" width="18" height="15" /> <a href="message_ecrire.php">Ecrire un message</a> </td>
              </tr>
              <tr>
                <td valign="top" bgcolor="#FFFFFF"><img src="img/b_usrlist.png" width="18" height="15" /> <a href="contact.php">Vos contact </a></td>
              </tr>
              <tr>
                <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr>
                <td bgcolor="#CCCCFF"><span class="Style11">Votre Espace </span></td>
              </tr>
              <tr bordercolor="#CCCCFF">
                <td bgcolor="#FFFFFF"><a href="profil.php?pseudo_envoi=<? echo $pseudo_ident; ?>" class="Style11">- Votre profil </a></td>
              </tr>
              <tr bordercolor="#CCCCFF">
                <td bgcolor="#FFFFFF"><a href="recherche.php?start=0" class="Style11">- Votre recherche </a></td>
              </tr>
              <tr bordercolor="#CCCCFF">
                <td bgcolor="#FFFFFF"><a href="message.php" class="Style11">- Vos messages </a></td>
              </tr>
              <tr bordercolor="#CCCCFF">
                <td bgcolor="#FFFFFF"><a href="photo.php" class="Style11">- Vos photos </a></td>
              </tr>
              <tr bordercolor="#CCCCFF">
                <td bgcolor="#FFFFFF"><a href="contact.php" class="Style11">- Vos ami(e)s</a></td>
              </tr>
              <tr bordercolor="#CCCCFF">
                <td bgcolor="#FFFFFF"><a href="annonce_mod.php" class="Style11">- Votre annonce </a></td>
              </tr>
              <tr>
                <td bgcolor="#CCCCFF">&nbsp;</td>
              </tr>
              <tr>
                <td bgcolor="#FFFFFF"><a href="index.php"><strong>- Retour Acceuil</strong></a> </td>
              </tr>
            </table></td>
            <td width="7" bgcolor="#CCCCFF">&nbsp;</td>
            <td width="650" colspan="2" valign="top" bgcolor="#FFFFFF"><br />
              <table width="650"  border="0" cellspacing="13" cellpadding="1">
                <tr>
                  <td colspan="3" bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                      <tr bgcolor="#AFBFCF">
                        <td bgcolor="#CCCCFF"><div align="center">
                            <p class="Style11">::. Les handicaperencontre.fr rencontre entre hommes et femme qui cherchent l amour l amiti&eacute;  Messages .:: <br />
                                                        </p>
                        </div></td>
                      </tr>
                      <tr bgcolor="#AFBFCF">
                        <td bgcolor="#FFFFFF"><span class="Style23">&nbsp;&nbsp;&nbsp;
                          Bienvenu dans votre boite Mail handicaperencontre.fr rencontre entre hommes et femme qui cherchent l amour l amiti&eacute;  ! <br>
                        </span>Ecrivez, envoyez et recevez des messages de toutes la communaut&eacute; handicaperencontre.fr rencontre entre hommes et femme qui cherchent l amour l amiti&eacute;  ! <br />
                      <br />                        </td>
                      </tr>
                  </table></td>
                </tr>

                <tr align="center" bgcolor="#96ACC2">
                  <td width="406" bgcolor="#FFFFFF"><table width="400"  border="0" cellspacing="0" cellpadding="3">
                      <tr bgcolor="#AFBFCF">
                        <td bgcolor="#CCCCFF"><div align="center">
                            <p class="Style15">::. <strong>Etat de votre boite Messages handicaperencontre.fr rencontre entre hommes et femme qui cherchent l amour l amiti&eacute;  </strong> .::<br />
                            </p>
                        </div></td>
                      </tr>
                      <tr bgcolor='#AFBFCF'>
                        <td bgcolor='#FFFFFF'><div align='left'>
                            <table width='400'  border='0' cellspacing='7' cellpadding='0'>
                              <tr>
                                <td bgcolor='#CCCCFF'><div align='left'><strong><span class='Style12'>-</span> Message(s) de vos ami(es)</strong></div></td>
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
	$query_ami = "SELECT ami FROM ami WHERE ami='$expediteur' AND pseudo='$pseudo_ident'"; 
	$r_ami = mysql_query($query_ami) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	if(mysql_num_rows($r_ami)) {			 
		//limitation de la taille de l objet
		$t=0;
		$objet_reduit = "";
		for($t;($t < 30 && $t<strlen($objet));$t++) {
		$objet_reduit = $objet_reduit . $objet[$t];
		}
		$objet_reduit = 	$objet_reduit." ...";
		
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
							 
							 
							    <td bgcolor="#CCCCFF"><div align="left"><strong><span class="Style12">-</span> Messages de la comunaut&eacute;(s) </strong></div></td>
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
	$query_ami = "SELECT ami FROM ami WHERE ami='$expediteur' AND pseudo='$pseudo_ident'"; 
	$r_ami = mysql_query($query_ami) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	if(!mysql_num_rows($r_ami)) {			 
		//limitation de la taille de l objet
		$t=0;
		$objet_reduit = "";
		for($t;($t < 30 && $t<strlen($objet));$t++) {
		$objet_reduit = $objet_reduit . $objet[$t];
		}
		$objet_reduit = 	$objet_reduit." ...";
		
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
                                <td bgcolor="#CCCCFF"><div align="center"><strong>Il vous reste actuellement <span class="Style12"><? echo $nb_message_total; ?></span> place pour les messages <br />
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
                        <td bgcolor="#CCCCFF"><strong>
                          <? if ($erreur!="") { echo "<span class='Style12'><strong>R&eacute;sultat de l'envoi :<br></strong></span><BR>".$erreur; } else { echo "<span class='Style12'><strong>R&eacute;sultat de l'envoi :<br></strong></span><BR>".$resultat; } ?>
                          </strong><br />
                          <br />
                          <br />
                          Votre boite de message peut recevoir plein de truc super chouette !!&nbsp;&nbsp;Votre boite de message peut recevoir plein de truc super chouette !!&nbsp;&nbsp;Votre boite de message peut recevoir plein de truc super chouette !!</td>
                      </tr>
                  </table></td>
                </tr>
              </table></td>
          </tr>
          <tr bgcolor="#96ACC2">
            <td colspan="4" bgcolor="#FFF0FF"><div align="center"><img src="img/bas.jpg" width="800" height="53" /></div></td>
          </tr>
      </table></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
