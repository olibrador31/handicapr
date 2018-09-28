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


<META http-equiv="Content-Type"
content="text/html; charset=iso-8859-1">
<META http-equiv="Pragma" CONTENT="no-cache">
<html>
<head>
<title>rencontre gratuite en France avec chat  profil !</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META lang=fr-ca 
content="site de rencontre entièrement gratuit avec des hommes et femmes de France ou plus pour trouver des ami(es) ou l'amour , avec chat " 
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
<META content="handicaperencontre.fr site de rencontre gratuit  pour pour les personnes handicapés et valides avec chat forum, profil vérifié avec chat forum, profil vérifié " name=title>
<meta property="og:title" content=" site de rencontre  pour handicapés malades valides leurs amis proches pour se parler, a se connaitre,se rencontrer et a trouver des solutions, surtout ne restez pas isolé"/>
<meta property="og:description" content="site de rencontre et réseau social avec profil vérifié mur photo et jeux pour handicapés malades valides leurs amis proches pour se parler, a se connaitre,se rencontrer et a trouver des solutions, surtout ne restez pas isolé"/>
<meta property="og:image" content="http://www.handicaperencontre.fr/logo/logo.jpg"/>
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
.Style40 {
	color: #0099CC;
	font-weight: bold;
}
.style41 {
	color: #FF0000;
	font-size: 14px;
}
-->
</style>
</head>

<body>


<style type="text/css">
@import url(http://www.google.com/cse/api/branding.css);
</style>
<div class="cse-branding-right" style="background-color:#FFFFFF;color:#000000">
  <div class="cse-branding-form"></div>
</div>
 
<script type="text/javascript" src="http://www.google.fr/cse/brand?form=cse-search-box&amp;lang=fr"></script> 

<table width="800"  border="0" align="left" cellpadding="1" cellspacing="0" bgcolor="#000000">
  <tr>
    <td class="Style38"><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#96ACC2">
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
            <div align="center">
              <input type="hidden" name="ie" value="ISO-8859-1" />
              <input type="hidden" name="cx" value="partner-pub-1493739445870732:m7rsan-oi99" />
              <input type="text" name="q" size="31" />
              <input type="submit" name="sa" value="Rechercher" />
              <strong>Profil de <? echo $pseudo; ?></strong>
                ,<span class="Style40"> derni&egrave;re connection   le <? // recupère heure derniere connection
				$query = "SELECT date FROM enligne where pseudo ='$pseudo_envoi' "; 
	
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");


//lol @ pour enlever les erreur   doit prendre date inscription si pas de conexion dernièreement


@mysql_data_seek($r, 0);
if($row = mysql_fetch_row($r)){
$date = $row[0];
$nbj=$date;
echo"$nbj";
}
else {


}

?>
                </span></div>
        </form>
        </strong></div></td>
          </tr>
          
          <tr bgcolor="#96ACC2">
            <td width="143" align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="143" align="left" valign="top" bgcolor="#FFF0FF"><form action="index.php" method="post" name="form">
          <table width="100%"  border="1" cellpadding="1" cellspacing="0">
            <tr>
              <td class="style40 Style12 Style28"><span class="style41">ENLIGNE en ce moment :</span> <span class="Style17">
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
              <td bgcolor="#FFDFFF" class="Style17"><img src="img/MINIMEMBRE.GIF" width="16" height="12"> Votre Espace </td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="photo.php" class="Style17">- </a><a href="chat.php" class="Style12">
                <input name="chat_bouton2422" type="submit" id="chat_bouton2422" onClick="MM_goToURL('parent','photo.php');return document.MM_returnValue" value="Gerer vos photos">
              </a><a href="photo.php" class="Style17"> </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="chat.php" class="Style12">
                <input name="chat_bouton2422" type="submit" id="chat_bouton24223" onClick="MM_goToURL('parent','modif_2.php');return document.MM_returnValue" value="Modifier Vos centre d'int&eacute;r&ecirc;t">
              </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="chat.php" class="Style12">
                <input name="chat_bouton2423" type="submit" id="chat_bouton2423" onClick="MM_goToURL('parent','modif_1.php');return document.MM_returnValue" value="Modifier votre description">
              </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="chat.php" class="Style12">
                <input name="chat_bouton2422" type="submit" id="chat_bouton24223" onClick="MM_goToURL('parent','annonce_mod.php');return document.MM_returnValue" value="Modifier votre annonce">
              </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="chat.php" class="Style12">
                <input name="chat_bouton24" type="submit" id="chat_bouton24" onClick="MM_goToURL('parent','contact.php');return document.MM_returnValue" value="Gerer vos amis">
              </a></td>
            </tr>
            
            <tr>
              <td bgcolor="#FFDFFF" class="Style17"><img src="img/B_TBLOPS.PNG" alt="Sommaire" width="16" height="12"> <strong>Jeux </strong></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="top_femme.php" class="Style17"><strong>
                <input name="submit2" type="submit" onClick="MM_goToURL('parent','phpmine.php');return document.MM_returnValue" value="D&eacute;mineur" la="la" partie="partie" />
                <input name="submit2222" type="submit" onClick="MM_goToURL('parent','morpion/index.php');return document.MM_returnValue" value="jouer Morpion" la="la" partie="partie" />
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
          <p><a href="http://www.compare-le-net.com/index.php" target="_blank" title="Annuaire gratuit de liens en dur Compare le Net - accueil du site"></a>
        </form></td>
            <td width="5" bgcolor="#FFDFFF">&nbsp;</td>
            <td colspan="2" valign="top" bgcolor="#FFFFFF"><table width="650"  border="0" cellspacing="4" cellpadding="1">
              <tr>
                
              </tr>
              <tr>
                <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFFFFF">
                        <div align="center">
                          <p>
                            <input name="Submit222" type="submit" onClick="MM_goToURL('parent','message_ecrire.php?action=post&amp;destinataire=<? echo $pseudo; ?>');return document.MM_returnValue" value="Ecrire un message" />
                            <input name="Submit2222" type="submit" onclick="MM_goToURL('parent','bonjour.php?action=post&amp;destinataire=<? echo $pseudo; ?>');return document.MM_returnValue" value="Envoyer le bonjour" /> 
                             <input name="Submit223" type="submit" onclick="MM_goToURL('parent','photo_profil.php?pseudo_envoi=<? echo $pseudo; ?>');return document.MM_returnValue" value="Voir ses photos" />
                             <input name="Submit2233" type="submit" onclick="MM_goToURL('parent','contact.php?action=ami&pseudo_envoi=<? echo $pseudo; ?>');return document.MM_returnValue" value="Ajouter aux ami(e)s" />
                            <input name="Submit2232" type="submit" onclick="MM_goToURL('parent','mur.php?pseudo_envoi=<? echo $pseudo; ?>');return document.MM_returnValue" value=" Poster et Voir son Mur " /><div><a name= "fb_share" type= "button">Partager</a>
<script src= "http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script></div><a name="button_count"></a>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script></p>
                      </div></td>
                    </tr>
                    
                </table></td>
              </tr>
              <tr>
                <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFDFFF"><div align="center">
                        <p align="left" class="Style13"><strong> Profil de <? echo $pseudo; ?> Profil vu <span class="Style39"><? echo $click; ?></span> fois
                            <input name="Submit223" type="submit" onclick="MM_goToURL('parent','verifier.php?id=<? echo $idpseudo; ?>&action=profil');return document.MM_returnValue" value="signaler cette personne" /> 
                              <a href="inscription1.php?id=1" class="Style17"></a><br />
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
<h1><!- -google_ad_section_start- -> site de rencontre gratuit pour handicapées valides , pour discuter se rencontrer trouver l'amour ou une belle amitié</h1>

</body>
</html>
