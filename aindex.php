<?

require '_bdd.php';
require '_identification.php';
require 'lignechat.php';


// récupère le nom a qui on doit suprimé l affichage en index

$nom=$_GET['pseudo_envoi'];

if ($nom !="") {

$query = "UPDATE user SET photo='0' WHERE pseudo='$nom'";
	// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, ");

}

// affichage des femme et homme de la page
$query = "SELECT * FROM user WHERE sexe='Femme'AND photo='1' ORDER BY id DESC LIMIT 0, 5"; 
	
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
for($i=0;$i < 5;$i++) {
	
if (mysql_data_seek($r, $i))  {
	
$row = mysql_fetch_row($r);
$pseudo[$i] = $row[1];
$departement[$i] = $row[17];
$age[$i] = $row[5];
//recupere la photo
$query_photo = "SELECT afficher FROM photo WHERE pseudo='$pseudo[$i]'"; 
$r_photo = mysql_query($query_photo) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$row_photo = mysql_fetch_row($r_photo);
$photo[$i] = $row_photo[0];
if ($photo[$i]=="") { $photo[$i]="img/20000503113333_54143.jpg"; }
else {
$photo2[$i]=$photo[$i];
$photo[$i] = "./photos/".$pseudo[$i]."/".$photo2[$i];
}
}
}
$query = "SELECT * FROM user WHERE sexe='Homme' AND photo='1' ORDER BY  id DESC LIMIT 0, 5"; 
	
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
for($i=0;$i < 5;$i++) {
	
if (mysql_data_seek($r, $i))  {
	
$row = mysql_fetch_row($r);
$pseudo_h[$i] = $row[1];
$departement_h[$i] = $row[17];
$age_h[$i] = $row[5];

//recupere la photo
$query_photo = "SELECT afficher FROM photo WHERE pseudo='$pseudo_h[$i]'"; 
$r_photo = mysql_query($query_photo) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$row_photo = mysql_fetch_row($r_photo);
$photo_h[$i] = $row_photo[0];
if (!$photo_h[$i]) { $photo_h[$i]="img/20000503113333_54143.jpg"; }
else {
$photo2_h[$i]=$photo_h[$i];
$photo_h[$i] = "./photos/".$pseudo_h[$i]."/".$photo2_h[$i];
}
}
}	
	
	
?>


<meta name="verify-v1" content="6smf/kDkvptevVkao0kZ4L2f+H1r025m0+8HFPMB1N0=" />


<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<title>handicaperencontre.fr rencontre pour pour les personnes handicapés ou malades etc avec chat forum, profil v&eacute;rifi&eacute; avec chat forum, profil v&eacute;rifi&eacute;</title>
<meta name="description" content="ce site internet est fait pour aider les malades et leurs proches a se parler, a se connaitre,se rencontrer  et a trouver des solutions, surtout ne restez pas isolé, avc, traumatisme cranien">
<meta name="keywords" content="rencontre, traumatisme cranien, rencontre, traumatisme cranien, aidetraumatisme cranien, aide AVC Accident Vasculaire Cerebral, Attaque Cérébrale, AIT, Accident Ischémique Transitoire, Hémorragie Cérébrale, rencontre et aide, sida,cancer, maladie grave, anévrisme,aide rencontre, cancer, curie,institut curie,donateurs, sein, prostate, oeil,rencontre et aide profession maladie, avtivite professionnelle, symptome sclérose, symptome sclérose en plaque, traitement sclérose en plaque, 
 , sarcome, metastase,  biologie, immunotherapie,, angiogenese, pharmacochimie, physique, genotoxicologie, bio-informatique, rencontre, aide, sclerose en plaques symptomes, maladie longue duree, scleroses en plaques, sclérose, malades sep, 
cacer, amitie, isole, contact, contacts humain, solidarite,syndrome, ald,  solidaire, solitaire, hopitaux, cliniques, reconfort,AVC , AIT, attaque, accident, congestion c&eacute;r&eacute;brale, association , aide, soutien, prendre en charge, france, explication, infarctus, prevention, victime, patient, vacsculaire, cerebrale, temoignage, liens, trouble, vaisseaux sanguins, cerveau, accident vasculaire c&eacute;r&eacute;braux, accident isch&eacute;mique transitoire, devouement, copain, copine, pere, mere, frere, soeur,dialoguer, discuter, rire, affinite, enfants fils filles  
<meta name="robots" content="index,follow">
<meta http-equiv="content-style-type" content="text/css2">
<meta name="identifier-url" content="http://www.handirencontre.tk/
<meta name="copyright" content="olivier rimbert">
<meta name="verify-v1" content="6smf/kDkvptevVkao0kZ4L2f+H1r025m0+8HFPMB1N0=" />
<meta property="og:title" content=" site de rencontre  pour handicapés malades valides leurs amis proches pour se parler, a se connaitre,se rencontrer et a trouver des solutions, surtout ne restez pas isolé"/>
<meta property="og:description" content="site de rencontre et réseau social avec profil vérifié mur photo et jeux pour handicapés malades valides leurs amis proches pour se parler, a se connaitre,se rencontrer et a trouver des solutions, surtout ne restez pas isolé"/>
<meta property="og:image" content="http://www.handicaperencontre.fr/logo/logo.jpg"/>
<style type="text/css">
<!--
body {
	background-color: #FFF0FF;
}
-->
</style>
<link href="vbbcv.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Style12 {font-size: 16px}
#Layer1 {
	position:absolute;
	left:38px;
	top:493px;
	width:49px;
	height:25px;
	z-index:1;
}
.Style17 {color: #000000; font-weight: bold; }
.Style18 {color: #CCCCCC; font-weight: bold; }
#Layer2 {
	position:absolute;
	left:234px;
	top:154px;
	width:469px;
	height:20px;
	z-index:2;
}
.Style27 {font-size: 9px}
.Style29 {font-size: 16px; color: #0000FF; }
.style32 {
	font-size: 36px;
	font-weight: bold;
	color: #0000CC;
}
.Style33 {
	font-size: 14;
	font-weight: bold;
}
.Style34 {font-size: 14px; font-weight: bold; color: #0000CC; }
.style35 {
	color: #0000FF;
	font-weight: bold;
	font-size: 16px;
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
<meta name="verify-v1" content="6smf/kDkvptevVkao0kZ4L2f+H1r025m0+8HFPMB1N0=" />


<body><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-17606813-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

<script type="text/javascript"><!--
google_ad_client = "ca-pub-1493739445870732";
/* baniere 11 rose */
google_ad_slot = "7443439510";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>

<table width="800"  border="0" align="center" cellpadding="1" cellspacing="0" bgcolor="#000000">
  <tr>
    <td><table width="100%" height="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
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
        <td colspan="5" bgcolor="#FBE7F3"><div align="center"><a href="chat.php" class="Style17"></a>
          <? if($pass_reel==$pass_ident and !empty($pass_ident) ) echo"<a href='inscription2.php'>modifier Votre profil---</a><a href='supr.php'>supprimer votre profil</a>";?>
          <img src="img/B_USRLIST.PNG" width="16" height="16">
              <? if($erreur_ident=="") { echo $message_acceuil; } else { echo $erreur_ident; } ?>
              </strong>
            </div>
          </div></td>
      </tr>
      <tr bgcolor="#567596">
      <tr bgcolor="#96ACC2">
        
        <td width="143" align="left" valign="top" bgcolor="#FFF0FF"><form action="index.php" method="post" name="form">
          <table width="100%"  border="1" cellpadding="1" cellspacing="0">
            <tr>
              <td bgcolor="#FFFFFF"><div align="center"><a name="button_count"></a>
<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script></div></td>
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
          <p><a href="http://www.compare-le-net.com/index.php" target="_blank" title="Annuaire gratuit de liens en dur Compare le Net - accueil du site"></a>
        </form></td>
        <td width="5" bgcolor="#FFDFFF">&nbsp;</td>
        <td colspan="2" valign="top" bgcolor="#FFFFFF"><form name="form1" method="post" action="recherche_res.php">
          <table width="100%" height="100%"  border="0" cellpadding="1" cellspacing="1">
            <tr>
              <td width="57%" bgcolor="#FFFFFF"><table width="100%" height="107%"  border="0" cellpadding="1" cellspacing="0">
                <tr>
                  <td bgcolor="#FFEFFF">&nbsp;&nbsp;
                      <p class="style35">Les jeux gratuit du site</p>
                    <p> &nbsp;<strong>
                        <input name="submit22" type="submit" onClick="MM_goToURL('parent','phpmine.php');return document.MM_returnValue" value="jouer au D&eacute;mineur" la="la" partie="partie" />
                        </strong><strong>
                        <input name="submit222" type="submit" onClick="MM_goToURL('parent','morpion/index.php');return document.MM_returnValue" value="jouer au Morpion" la="la" partie="partie" />
                      </strong> </p>
                    <p align="center">&nbsp;</p></td>
                </tr>
                  
              </table></td>
              <td width="43%" bgcolor="#FFFFFF"><table width="100%" height="100"  border="1" cellpadding="1" cellspacing="0">
                  <tr bgcolor="#AFBFCF">
                    <td width="244" height="21" bgcolor="#FFDFFF"><div align="center"><span class="Style34">::. Recherche rapide .::</span></div></td>
                  </tr>
                  <tr bgcolor="#AFBFCF">
                    <td height="149" bgcolor="#FFFFFF"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="4">
                        <tr>
                          <td><strong>Je cherche </strong></td>
                          <td><select name="sexe" id="select">
                            <option value="Femme" selected="selected">Femme</option>
                            <option value="Homme">Homme</option>
                            <option value="Couple">Couple</option>
                          </select></td>
                        </tr>
                        <tr>
                          <td><strong>Ag&eacute;(e)</strong></td>
                          <td><select name="age" id="age">
                            <option value="x">Peu importe</option>
                            <option value="15">18 - 20 ans</option>
                            <option value="20">20 - 25 ans</option>
                            <option value="25">25 - 30 ans</option>
                            <option value="30">30 - 35 ans</option>
                            <option value="35">35 - 40 ans</option>
                            <option value="40">40 - 45 ans</option>
                            <option value="45">45 - 50 ans</option>
                            <option value="50">50 - 55 ans</option>
                            <option value="55">55 - 60 ans</option>
                            <option value="60">60 - 65 ans</option>
                            <option value="65">65 - 70 ans</option>
                            <option value="70">70 - 75 ans</option>
                            <option value="75">75 - 80 ans</option>
                          </select></td>
                        </tr>
                        <tr>
                          <td><strong>Dans le </strong></td>
                          <td><select name="departement" id="departement">
                            <option value="x" selected>Peu importe</option>
                            <option value="Suisse">Suisse</option>
                            <option value="Belgique">Belgique</option>
                            <option value="Ain">Ain</option>
                            <option value="Aisne">Aisne</option>
                            <option value="Allier">Allier</option>
                            <option value="Alpes-de-Hte-Prov">Alpes-de-Hte-Prov.</option>
                            <option value="Alpes-Maritimes">Alpes-Maritimes</option>
                            <option value="Ard&egrave;che">Ard&egrave;che</option>
                            <option value="Ardennes">Ardennes</option>
                            <option value="Arri&egrave;ge">Arri&egrave;ge</option>
                            <option value="Aube">Aube</option>
                            <option value="Aude">Aude</option>
                            <option value="Aveyron">Aveyron</option>
                            <option value="Bas-Rhin">Bas-Rhin</option>
                            <option value="Bouches-du-Rh&ocirc;ne">Bouches-du-Rh&ocirc;ne</option>
                            <option value="Calvados">Calvados</option>
                            <option value="Canada">Canada</option>
                            <option value="Cantal">Cantal</option>
                            <option value="Charente">Charente</option>
                            <option value="Charente-Maritime">Charente-Maritime</option>
                            <option value="Cher">Cher</option>
                            <option value="Corr&egrave;ze">Corr&egrave;ze</option>
                            <option value="Corse">Corse</option>
                            <option value="Cotes-d'Armor">Cotes-d'Armor</option>
                            <option value="Creuse">Creuse</option>
                            <option value="Deux-S&egrave;vres">Deux-S&egrave;vres</option>
                            <option value="Dordogne">Dordogne</option>
                            <option value="Doubs">Doubs</option>
                            <option value="Dom-Tom">Dom-Tom</option>
                            <option value="Dr&ocirc;me">Dr&ocirc;me</option>
                            <option value="Essonne">Essonne</option>
                            <option value="Eure">Eure</option>
                            <option value="Eure-et-Loir">Eure-et-Loir</option>
                            <option value="Finist&egrave;re">Finist&egrave;re</option>
                            <option value="Gard">Gard</option>
                            <option value="Gers">Gers</option>
                            <option value="Gironde">Gironde</option>
                            <option value="Haute-Garonne">Haute-Garonne</option>
                            <option value="Haute-Loire">Haute-Loire</option>
                            <option value="Haute-Marne">Haute-Marne</option>
                            <option value="Hautes-Alpes">Hautes-Alpes</option>
                            <option value="Haute-Saone">Haute-Saone</option>
                            <option value="Haute-Savoie">Haute-Savoie</option>
                            <option value="Hautes-Pyr&eacute;n&eacute;es">Hautes-Pyr&eacute;n&eacute;es</option>
                            <option value="Haute-Vienne">Haute-Vienne</option>
                            <option value="Haut-Rhin">Haut-Rhin</option>
                            <option value="Hauts-de-Seine">Hauts-de-Seine</option>
                            <option value="H&eacute;rault">H&eacute;rault</option>
                            <option value="Ille-et-Vilaine">Ille-et-Vilaine</option>
                            <option value="Indre">Indre</option>
                            <option value="Indre-et-Loire">Indre-et-Loire</option>
                            <option value="Is&egrave;re">Is&egrave;re</option>
                            <option value="Jura">Jura</option>
                            <option value="Landes">Landes</option>
                            <option value="Loire">Loire</option>
                            <option value="Loire-Atlantique">Loire-Atlantique</option>
                            <option value="Loiret">Loiret</option>
                            <option value="Loir-et-Cher">Loir-et-Cher</option>
                            <option value="Lot">Lot</option>
                            <option value="Lot-et-Garonne">Lot-et-Garonne</option>
                            <option value="Loz&egrave;re">Loz&egrave;re</option>
                            <option value="Maine-et-Loire">Maine-et-Loire</option>
                            <option value="Manche">Manche</option>
                            <option value="Marne">Marne</option>
                            <option value="Mayenne">Mayenne</option>
                            <option value="Meurthe-et-Moselle">Meurthe-et-Moselle</option>
                            <option value="Meuse">Meuse</option>
                            <option value="Monaco">Monaco</option>
                            <option value="Morbihan">Morbihan</option>
                            <option value="Moselle">Moselle</option>
                            <option value="Ni&egrave;vre">Ni&egrave;vre</option>
                            <option value="Nord">Nord</option>
                            <option value="Oise">Oise</option>
                            <option value="Orne">Orne</option>
                            <option value="Paris">Paris</option>
                            <option value="Pas-de-Calais">Pas-de-Calais</option>
                            <option value="Puy-de-D&ocirc;me">Puy-de-D&ocirc;me</option>
                            <option value="Pyr&eacute;n&eacute;es-Atlantiques">Pyr&eacute;n&eacute;es-Atlantiques</option>
                            <option value="Pyr&eacute;n&eacute;es-Orientales">Pyr&eacute;n&eacute;es-Orientales</option>
                            <option value="Rhones">Rhones</option>
                            <option value="Saone-et-Loire">Saone-et-Loire</option>
                            <option value="Sarthes">Sarthes</option>
                            <option value="Savoie">Savoie</option>
                            <option value="Seine-et-Marne">Seine-et-Marne</option>
                            <option value="Seine-Maritime">Seine-Maritime</option>
                            <option value="Seine-Saint-Denis">Seine-Saint-Denis</option>
                            <option value="Somme">Somme</option>
                            <option value="Tarn">Tarn</option>
                            <option value="Tarn-et-Garonne">Tarn-et-Garonne</option>
                            <option value="Territoire-de-Belfort">Territoire-de-Belfort</option>
                            <option value="Val-de-Marne">Val-de-Marne</option>
                            <option value="Val-d'OIse">Val-d'OIse</option>
                            <option value="Var">Var</option>
                            <option value="Vaucluse">Vaucluse</option>
                            <option value="Vend&eacute;e">Vend&eacute;e</option>
                            <option value="Vienne">Vienne</option>
                            <option value="Vosges">Vosges</option>
                            <option value="Yonne">Yonne</option>
                            <option value="Yvelines">Yvelines</option>
                            <option value="Autre">Autre</option>
                          </select></td>
                        </tr>
                        <tr>
                          <td colspan="2"><div align="center">
                              <input type="submit" name="Submit2" value="Rechercher">
                          </div></td>
                        </tr>
                    </table></td>
                  </tr>
              </table></td>
            </tr>
            <tr bgcolor="#567596">
              <td colspan="2" bgcolor="#FFF0FF"><table width="100%" height="100%"  border="1" cellpadding="1" cellspacing="0">
                  <tr bgcolor="#AFBFCF">
                    <td height="1" colspan="5" bgcolor="#FFDFFF"><div align="center"><span class="Style34">Elles nous ont rejoins</span></div></td>
                  </tr>
                  <tr bgcolor="#AFBFCF">
                    <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="1">
                        <tr>
                          <td><div align="center"><img src="<? echo $photo[0]; ?>" width="90" height="120"></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><a href="sindex.php?pseudo_envoi=<? echo $pseudo[0]; ?>"><strong><? echo $pseudo[0]; ?></strong></a></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><? echo $age[0]; ?> ans </div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><? echo $departement[0]; ?></div></td>
                        </tr>
                    </table></td>
                    <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="1">
                        <tr>
                          <td><div align="center"><img src="<? echo $photo[1]; ?>" width="90" height="120"></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><a href="sindex.php?pseudo_envoi=<? echo $pseudo[1]; ?>"><strong><? echo $pseudo[1]; ?></strong></a></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><? echo $age[1]; ?> ans </div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><? echo $departement[1]; ?></div></td>
                        </tr>
                    </table></td>
                    <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="1">
                        <tr>
                          <td><div align="center"><img src="<? echo $photo[2]; ?>" width="90" height="120"></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><a href="sindex.php?pseudo_envoi=<? echo $pseudo[2]; ?>"><strong><? echo $pseudo[2]; ?></strong></a></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><? echo $age[2]; ?> ans </div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><? echo $departement[2]; ?></div></td>
                        </tr>
                    </table></td>
                    <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="1">
                        <tr>
                          <td><div align="center"><img src="<? echo $photo[3]; ?>" width="90" height="120"></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><a href="sindex.php?pseudo_envoi=<? echo $pseudo[3]; ?>"><strong><? echo $pseudo[3]; ?></strong></a></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><? echo $age[3]; ?> ans </div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><? echo $departement[3]; ?></div></td>
                        </tr>
                    </table></td>
                    <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="1">
                        <tr>
                          <td><div align="center"><img src="<? echo $photo[4]; ?>" width="90" height="120"></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><a href="sindex.php?pseudo_envoi=<? echo $pseudo[4]; ?>"><strong><? echo $pseudo[4]; ?></strong></a></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><? echo $age[4]; ?> ans </div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><? echo $departement[4]; ?></div></td>
                        </tr>
                    </table></td>
                  </tr>
              </table></td>
            </tr>
            <tr bgcolor="#567596">
              <td colspan="2" bgcolor="#FFFFFF"><table width="100%" height="100%"  border="1" cellpadding="1" cellspacing="0">
                  <tr bgcolor="#AFBFCF">
                    <td colspan="5" bgcolor="#FFDFFF"><div align="center"><span class="Style34">Ils nous ont rejoins</span></div></td>
                  </tr>
                  <tr bgcolor="#AFBFCF">
                    <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="1">
                        <tr>
                          <td><div align="center"><img src="<? echo $photo_h[0]; ?>" width="90" height="120"></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><a href="sindex.php?pseudo_envoi=<? echo $pseudo_h[0]; ?>"><strong><? echo $pseudo_h[0]; ?></strong></a></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><? echo $age_h[0]; ?> ans </div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><? echo $departement_h[0]; ?></div></td>
                        </tr>
                    </table></td>
                    <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="1">
                        <tr>
                          <td><div align="center"><img src="<? echo $photo_h[1]; ?>" width="90" height="120"></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><a href="sindex.php?pseudo_envoi=<? echo $pseudo_h[1]; ?>"><strong><? echo $pseudo_h[1]; ?></strong></a></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><? echo $age_h[1]; ?> ans </div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><? echo $departement_h[1]; ?></div></td>
                        </tr>
                    </table></td>
                    <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="1">
                        <tr>
                          <td><div align="center"><img src="<? echo $photo_h[2]; ?>" width="90" height="120"></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><a href="sindex.php?pseudo_envoi=<? echo $pseudo_h[2]; ?>"><strong><? echo $pseudo_h[2]; ?></strong></a></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><? echo $age_h[2]; ?> ans </div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><? echo $departement_h[2]; ?></div></td>
                        </tr>
                    </table></td>
                    <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="1">
                        <tr>
                          <td><div align="center"><img src="<? echo $photo_h[3]; ?>" width="90" height="120"></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><a href="sindex.php?pseudo_envoi=<? echo $pseudo_h[3]; ?>"><strong><? echo $pseudo_h[3]; ?></strong></a></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><? echo $age_h[3]; ?> ans </div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><? echo $departement_h[3]; ?></div></td>
                        </tr>
                    </table></td>
                    <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="1">
                        <tr>
                          <td><div align="center"><img src="<? echo $photo_h[4]; ?>" width="90" height="120"></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><a href="sindex.php?pseudo_envoi=<? echo $pseudo_h[4]; ?>"><strong><? echo $pseudo_h[4]; ?></strong></a></div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><? echo $age_h[4]; ?> ans </div></td>
                        </tr>
                        <tr>
                          <td><div align="center"><? echo $departement_h[4]; ?></div></td>
                        </tr>
                    </table></td>
                  </tr>
              </table></td>
            </tr>
            <tr>
              <td><input name="yeux" type="hidden" id="yeux" value="x">
                <input name="cheveux" type="hidden" id="cheveux" value="x">
                <input name="style" type="hidden" id="style" value="x">
                <input name="silouhaite" type="hidden" id="silouhaite" value="x">
                <input name="profession" type="hidden" id="profession" value="x">
                <input name="fumeur" type="hidden" id="fumeur" value="x">
                <input name="esprit" type="hidden" id="esprit" value="x"></td>
              <td>&nbsp;</td>
            </tr>
          </table>
                </form>        </td>
      </tr>
      <tr bgcolor="#96ACC2">
        <td colspan="5" bgcolor="#FFF0FF"><div align="center"><img src="img/bas.jpg" width="800" height="53"></div></td>
        </tr>
    </table></td>
  </tr>
</table>

<h2>aider les malades et leurs proches a se parler, a se connaitre,se   rencontrer  et a trouver des solutions, surtout ne restez pas isol&eacute;</h2>
<h1>site de rencontre pour handicap&eacute;s, victimes d'avc, ou malades, traumatisme cranien et leurs familles ou leurs proche</h1><iframe src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2F%3Fsk%3Dmessages%26tid%3D1364246000791%23%21%2Fpages%2Fsolidarite-handicap-avc%2F140227456836&amp;width=292&amp;colorscheme=light&amp;connections=10&amp;stream=true&amp;header=true&amp;height=587" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:587px;" allowTransparency="true"></iframe>
<h2>aider les malades et leurs proches a se parler, a se connaitre,se rencontrer  et a trouver des solutions, surtout ne restez pas isol&eacute;</h2>
<h3>rencontres gratuites site de rencontre entierement gratuit  au service des gens, inscrivez vous vite et ne soyez plus jamais seul ! </h3>
<h4>aide service et rencontre entre personnes handicap&eacute;es tc ou avc ou valide</h4>
<h5>site pour rencontrer l'&acirc;me soeur ou l'amour avec un handicap  </h5>
<h6>le r&eacute;seau social de la rencontre entre handicap&eacute;es et valides </h6>
<!-- DEBUT LOGO PAGE 1 -->
<!-- FIN LOGO PAGE 1 -->
<p class="style32"> handicaperencontre.fr</p>
<p>&nbsp;</p>
<p><span class="Style12"><strong>rencontres gratuites</strong> </span><span class="Style27"><span class="Style12"><strong>site de rencontre  gratuit entre handicap&eacute;es et valides </strong></span></span></p>
<p class="Style12"><strong>Attention des filles g&eacute;n&eacute;ralement donnent leur adresse MSN sur le site cela est g&eacute;n&eacute;ralement des tentatives de piratages ne les ajoutez pas Merci </strong></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p class="Style33">Attention : tout(e) utilisateur(trice) dont les textes sont &agrave; caract&egrave;re raciste ou offensant, ainsi que pr&eacute;sentant une annonce v&eacute;nale (prostitution) verra son compte supprim&eacute; et son adresse IP mise sur liste noire: il sera alors d&eacute;finitivement impossible de se r&eacute;inscire sur le site. Si vous rencontrez une annonce ou  un(e) utilisateur(trice)  incorrect(e), vous pouvez pr&eacute;venir le webmaster &agrave; l'adresse suivante: <a href="mailto:icedenice@live.fr">icedenice@live.fr</a><br>
</p>
<p></p>
</body>
<p>&nbsp;</p>
<a href="http://www.xiti.com/xiti.asp?s=419176" title="WebAnalytics" target="_top">
<script type="text/javascript">
<!--
Xt_param = 's=419176&p=http://www.handicaperencontre.fr/';
try {Xt_r = top.document.referrer;}
catch(e) {Xt_r = document.referrer; }
Xt_h = new Date();
Xt_i = '<img width="39" height="25" border="0" alt="" ';
Xt_i += 'src="http://logv10.xiti.com/hit.xiti?'+Xt_param;
Xt_i += '&hl='+Xt_h.getHours()+'x'+Xt_h.getMinutes()+'x'+Xt_h.getSeconds();
if(parseFloat(navigator.appVersion)>=4)
{Xt_s=screen;Xt_i+='&r='+Xt_s.width+'x'+Xt_s.height+'x'+Xt_s.pixelDepth+'x'+Xt_s.colorDepth;}
document.write(Xt_i+'&ref='+Xt_r.replace(/[<>"]/g, '').replace(/&/g, '$')+'" title="Internet Audience">');
//-->
</script>
<noscript><img width="39" height="25" src="http://logv10.xiti.com/hit.xiti?s=419176&p=http://www.handicaperencontre.fr/" alt="WebAnalytics" />
</noscript>
</a><script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-8923834-1");
pageTracker._trackPageview();
} catch(err) {}</script>

</html>
