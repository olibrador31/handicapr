<?

require '_bdd.php';

require '_identification.php';
require '_restriction.php';
require 'lignechat.php';

//récupère le pseudo du profil a afficher + donnée
$pseudo_envoi = $_GET['pseudo_envoi'];
	$query = "SELECT * FROM user WHERE pseudo='$pseudo_envoi'"; ;
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	$row = mysql_fetch_array($r);



	$pseudo = $pseudo_envoi;
	$age = $row['5'];
	$idpseudo = $row['0'];
	$sexe = $row['6'];
	$taille = $row['7'];
	$poids = $row['8'];
	$style = $row['9'];
	$silouhaite = $row['10'];
	$yeux = $row['11'];
	$cheveux = $row['12'];
	$prenom = $row['13'];
	$situation = $row['14'];
	$fumeur = $row['15'];
	$esprit = $row[16];
	$departement = $row['17'];
	
	// compte nb ligne si le pseudo existe pas redirige vers page user suprimé
$req="profilsupr.php";

if ($departement=="") {

$req = "'profilsupr.php'";
		echo $req;
		echo "<script type='text/javascript'>	document.location.replace($req); </script> ";
		
		}

	$ville = $row['18'];
	$profession = $row['19'];
	$description = $row['20'];
	$aime = $row['21'];
	$deteste = $row['22'];
	$citation = $row['23'];
	$recherche = $row['24'];
	$note = $row['25'];
	$physique = $note;
	$annonce = $row['30'];
	$click = $row['31'];
	$mental = $row['32'];
	$mental_2=$mental;
	$click=$click+1;
	$query_c = "UPDATE user SET click='$click' WHERE pseudo='$pseudo_envoi'"; 
	$r_ = mysql_query($query_c) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	//recupere la photo
		$query__ = "SELECT afficher FROM photo WHERE pseudo='$pseudo_envoi'";
	// Execute la requete
	$r__ = mysql_query($query__) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	$row__ = mysql_fetch_array($r__);
	$photo = $row__[0];
if ($photo == "") { $photo="img/20000503113333_54143.jpg"; }
else {
$photo2=$photo;
$photo = "./photos/".$pseudo."/".$photo2;
}

	// Execute la requete
	$r_c = mysql_query($query_c) or die ("Pas pris ");
	
	if ($age =="") { $age=" Mystère"; } else { $age=$age." ans"; }
	if ($taille =="") { $taille=" Mystère"; } else { $taille=($taille/100)." m"; }
	if ($poids =="") { $poids=" Mystère"; } else { $poids=$poids." kg"; }
	if ($prenom =="") { $prenom=" Mystère"; }
	if ($ville =="") { $ville=" Mystère"; }
	if ($description =="") { $description=" Mystère"; } else { $description=str_replace("§§","'",$description); }
	if ($recherche =="") { $recherche=" Mystère"; } else { $recherche=str_replace("§§","'",$recherche); }
	if ($aime =="") { $aime=" Mystère"; } else { $aime=str_replace("§§","'",$aime); }
	if ($deteste =="") { $deteste=" Mystère"; } else { $deteste=str_replace("§§","'",$deteste); }
	if ($citation =="") { $citation=" Mystère"; } else { $citation=str_replace("§§","'",$citation); }
	if ($annonce =="") { $annonce=" Mystère"; } else { $annonce=str_replace("§§","'",$annonce); }

//la note
if ($_GET['action']=="note") {
	$physique_post=$_POST['notee'];
	$mental_post=$_POST['mental'];
	if ($physique_post>$physique) { 	$note = $physique + ($physique_post / 100); } else {	$note = $physique - ((20-$mental_post)/100); } 
	if ($mental_post>$mental) { 	$mental_2 = $mental + ($mental_post / 100); } else {	$mental_2 = $mental - ((20-$mental_post)/100); } 
	$query = "UPDATE user SET note='$note',mental='$mental_2' WHERE pseudo='$pseudo_envoi'"; 
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");

}
//Note global
$note_global = ($mental_2 + $note)/2;
//en %
$note_global = $note_global * 5;
$note = $note * 5;
$mental_2 = $mental_2 * 5;
					
					?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>rencontre gratuite en France avec chat  profil !</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META lang=fr-ca 
content="rencontre entièrement gratuite avec des hommes et femmes de toutes les régions de France, avec chat gratuit, coquine ou amicale
" 
name=description>
<META lang=fr-ca 
content=" rencontres sur internet, rencontre gratuite, site de rencontre gratuit, rencontres gratuites, gratuite, gratuit, sexe, chat, célibataire, cherche homme, cherche femme, amour, amitié, caline, coquine, amicale, amant, flirt, matrimonial, internet, discutions, partenaire, france, région, region" 
name=keywords>
<META http-equiv=content-language content=fr-ca>
<META http-equiv=content-style-Type content=text/css>
<META lang=fr-ca content="rencontre gratuite par Olivier RIMBERT" 
name=Author>
<META http-equiv=Content-Language content=fr-ca>
<META content="7 days" name=revisit-after>
<META content=never name=expires>
<META content=all name=audience>
<META 
content="rencontre, gratuit, chat, homme, femme, sexe" 
name=classification>
<META lang=fr-ca content="rencontre gratuite" name=subject>
<META content=fr-ca name=language>
<META content="handicaperencontre.fr rencontre pour pour les personnes handicapés et valides victimes avc ou malades etc avec chat forum, profil vérifié avec chat forum, profil vérifié " name=title>
<style type="text/css">
<!--
body {
	background-color: #FFF3FF;
}
-->
</style>
<style type="text/css">
<!--
.Style10 {color: #FFFFFF}
.Style12 {
	font-weight: bold;
	color: #FFFFFF;
}
.Style13 {color: #000000}
-->
</style>
<style type="text/css">
<!--
.Style26 {color: #0066CC; font-weight: bold; }
.style32 {	font-size: 36px;
	font-weight: bold;
	color: #0000CC;
}
.Style38 {font-size: 14px}
.Style39 {color: #990000}
.Style17 {color: #000000; font-weight: bold; }
-->
</style><script type="text/JavaScript">
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
<link href="vbbcv.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Style44 {font-size: 13px}
-->
</style>
</head>

<body>
<code><script type="text/javascript" src="chat/js/jquery.js"></script>
<script type="text/javascript" src="chat/js/chat.js"></script>
</code>
<link type="text/css" rel="stylesheet" media="all" href="chat/css/chat.css" />
<link type="text/css" rel="stylesheet" media="all" href="chat/css/screen.css" />

<!--[if lte IE 7]>
<link type="text/css" rel="stylesheet" media="all" href="chat/css/screen_ie.css" />
<![endif]-->
<script type="text/javascript"><!--
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
<br>

<style type="text/css">
@import url(http://www.google.com/cse/api/branding.css);
</style>
<div class="cse-branding-right" style="background-color:#FFFFFF;color:#000000">
  <div class="cse-branding-form">
    <form action="http://www.google.fr/cse" id="cse-search-box">
      <div>
        <input type="hidden" name="cx" value="partner-pub-1493739445870732:q47chy1zh60" />
        <input type="hidden" name="ie" value="ISO-8859-1" />
        <input type="text" name="q" size="31" />
        <input type="submit" name="sa" value="Rechercher" />
      </div>
    </form>
  </div>
  <div class="cse-branding-logo">
    <img src="http://www.google.com/images/poweredby_transparent/poweredby_FFFFFF.gif" alt="Google" />  </div>
  <div class="cse-branding-text">
    Recherche personnalis&#233;e  </div>
</div>
 
<script type="text/javascript" src="http://www.google.fr/cse/brand?form=cse-search-box&amp;lang=fr"></script> 

<table width="800"  border="0" align="left" cellpadding="1" cellspacing="0" bgcolor="#000000">
  <tr>
    <td class="Style38"><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#96ACC2">
            <td colspan="5" bgcolor="#FBE7F3"><div align="center"><a href="http://www.handicaperencontre.fr/"><a href="http://www.handicaperencontre.fr/indexiden.php"><img src="img/logo.jpg" width="800" height="116" border="0"><br>
              </a><?
			  for($compt=0;($compt < $pligne);$compt++) {
			  if (mysql_data_seek($l, $compt))  {
	
	$row = mysql_fetch_row($l);
	$pseudo1 = $row[1]; 
echo" <input name='var1' type='hidden' value='$pseudo1' />";
	

	?> 
	<code>
	document.var1.value='olive';
	add 'javascript:chatWith('document.var1.value')</code>
	<?
	echo"$pseudo1";
	
	}}
	?>
        
               -<br>
          </div></td>
          </tr>
          
          <tr bgcolor="#96ACC2">
            <td width="143" align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="143" align="left" valign="top" bgcolor="#FFF0FF"><form action="index.php" method="post" name="form">
          <table width="100%"  border="1" cellpadding="1" cellspacing="0">
            <tr>
              <td bgcolor="#FFFFFF"><div align="center"></div></td>
            </tr>
            <tr>
              <td bgcolor="#FFDFFF" class="Style17"> Identification  </td>
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
              <td bgcolor="#FFDFFF" class="Style17"><img src="img/B_TBLOPS.PNG" alt="Sommaire" width="16" height="12"> Sommaire</td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="inscription1.php?id=1" class="Style17">- Cr&eacute;er un compte </a></td>
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
              <td bgcolor="#FFFFFF"><a href="top_femme.php" class="Style17"><strong>
                <input name="submit222" type="submit" onclick="MM_goToURL('parent','phpmine.php');return document.MM_returnValue" value="jouer au D&eacute;mineur" la="la" partie="partie" />
              </strong></a></td>
            </tr>
            <tr>
              <td bgcolor="#FFDFFF" class="Style17"><img src="img/MAIL.GIF" alt="Votre parole" width="14" height="11"> Votre parole </td>
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
            <td width="5" bgcolor="#FFDFFF">&nbsp;</td>
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
                      <td width="28%" rowspan="2" bgcolor="#FFFFFF"><strong>
                        <input name="submit22" type="submit" onClick="MM_goToURL('parent','phpmine.php');return document.MM_returnValue" value="jouer au D&eacute;mineur" la="la" partie="partie" />
                      </strong></td>
                      <td width="72%" bgcolor="#FCECF7"><div align="center"><br />
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
                      <td bgcolor="#FFDFFF"><div align="center">
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
                                    <td bgcolor="#FFE8FB"><div align="left"><strong>Sa  photo </strong></div></td>
                                  </tr>
                                  <tr>
                                    <td><div align="left"><a href='photo_profil.php?pseudo_envoi=<? echo $pseudo_envoi; ?>'><img src="<? echo $photo; ?>" width="190" height="230" /></a></div></td>
                                  </tr>
                              </table></td>
                              <td width="65%" valign="top"><table width="100%"  border="0" cellspacing="7" cellpadding="0">
                                  <tr>
                                    <td bgcolor="#FFE8FB" class="Style12"><div align="left" class="Style13">Son annonce </div></td>
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
                      <td bgcolor="#FFDFFF"><div align="center">
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
                                    <td colspan="2" bgcolor="#FFE8FB"><div align="left"><strong>A quoi il/elle ressemble ? </strong></div></td>
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
                                    <td colspan="2" bgcolor="#FFE8FB" class="Style12"><div align="left" class="Style13">Un peu plus sur lui/elle </div></td>
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
                                      <td colspan="2" bgcolor="#FFE8FB"><div align="left"><strong>Quelques pr&eacute;cisions ? </strong></div></td>
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
            <td colspan="5" bgcolor="#FFF0FF"><img src="img/bas.jpg" width="800" height="53" /></td>
          </tr>
          <tr bgcolor="#96ACC2">
            <td colspan="5" bgcolor="#FFF0FF"><div align="center"></div></td>
          </tr>
    </table></td>
  </tr>
 </table>
  <br>
</div>
<h1><!- -google_ad_section_start- -> site de rencontre pour handicap&eacute;s, victimes d'AVC, ou malades, traumatismes craniens et leurs familles ou leurs proches</h1>
</body>
</html>
