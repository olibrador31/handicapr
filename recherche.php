<?


require '_bdd.php';
require '_identification.php';
require '_restriction.php';
require 'lignechat.php';?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Votre recherche sur rencontre gratuit pour handicapés valides victimes d'avc, ou malades et leurs familles</title>
<META NAME="Author" CONTENT="Olivier RIMBERT">
<META NAME="Category" CONTENT="rencontre,handicap,handicapé,forum,discution">
<META NAME="Copyright" CONTENT="RIMBERT Olivier">
<META http-equiv=content-language content=fr-ca>
<META NAME="Description" CONTENT="votre recherche rencontres gratuites pour handicapés et valides en france pour les célibataires qui désirent trouver l'amour, l'âme soeur, créer de nouvelles amitiés avec chat et forum pour aider les malades et leurs proches a se parler, a se connaitre,se rencontrer  et a trouver des solutions, surtout ne restez pas isolé, avc, traumatisme cranien, discutions et échange entre handicapés et valides  malades handicapés discutions sur rééducation et travail. réseau social sur le handicap et la rencontre en france. Rejoignez notre communauté de malades valides et handicapés pour des échanges de plus en plus nombreux et entièrement gratuit en france avec chat et forum sur le handicap bienvenu sur l accueil du site de handicaperencontre.fr site de rencontre gratuit">
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
	background-color: #FFF6FF;
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

  <table width="800"  border="0" align="left" cellpadding="1" cellspacing="0" bgcolor="#000000">
    <tr>
      <td><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#96ACC2">
            <td colspan="5" bgcolor="#FBE7F3"><div align="center"><a href="http://www.handicaperencontre.fr/"><a href="http://www.handicaperencontre.fr/indexiden.php"><img src="img/logo.jpg" width="800" height="116" border="0">
          </tr>
          <tr bgcolor="#567596">
            <td colspan="5" background="" bgcolor="#FFF0FF"><div align="left"><strong>
          &nbsp;&nbsp;<img src="img/B_USRLIST.PNG" width="16" height="16">&nbsp;::.
          <? if($erreur_ident=="") { echo $message_acceuil; } else { echo $erreur_ident; } ?>
          .:: <br>
          <br>
          <br>
        </strong></div></td>
          </tr>
          <tr bgcolor="#96ACC2">
            
            <td width="143" align="left" valign="top" bgcolor="#FFFFFF"><form action="index.php" method="post" name="form">
          '<table width="100%"  border="1" cellpadding="1" cellspacing="0">
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
            <td colspan="2" valign="top" bgcolor="#FFFFFF"><table width="629"  border="0" cellspacing="13" cellpadding="1">
              <tr>
                <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFDFFF"><div align="center">
                          <p><span class="Style11">::. Recherche sur handicaperencontre.fr rencontre pour pour les personnes handicap&eacute;es .:: </span><br />
                          </p>
                      </div></td>
                    </tr>
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFFFFF">Recherchez des contacts sur handicaperencontre.fr rencontre pour pour les personnes handicap&eacute;es, faites des connaissence et plus si affinit&eacute; :) &nbsp;&nbsp;&nbsp;<br>
                        <strong>Si vous ne trouvez aucune r&eacute;ponse &agrave; votre demande, &eacute;largissez votre champs de recherche ! </strong><br />
                      <br /></td>
                    </tr>
                </table></td>
              </tr>
              <tr align="center" bgcolor="#96ACC2">
                <td bgcolor="#FFFFFF">&nbsp;</td>
              </tr>
              <tr align="center" bgcolor="#96ACC2">
                <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                  <tr bgcolor="#AFBFCF">
                    <td bgcolor="#FFDFFF"><div align="center">
                        <p><span class="Style11">::. Votre recherche .::</span><br />
                        </p>
                    </div></td>
                  </tr>
                  <tr bgcolor="#AFBFCF">
                    <td width="500" align="center" bgcolor="#FFFFFF"><div align="left">
                      <form name="form1" method="post" action="recherche_res.php">
                        <table width="100%"  border="0" cellspacing="7" cellpadding="0">
                          <tr>
                            <td colspan="2" bgcolor="#FFE8FB"><div align="left"><strong>A quoi il/elle ressemble</strong></div></td>
                          </tr>
                          <tr>
                            <td width="50%"><div align="right">Age&nbsp;: </div></td>
                            <td><div align="left">
                                <select name="age" id="age">
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
                                                                                                                                </select>
                                <input name="ins" type="hidden" id="ins" value="oui" />
                            </div></td>
                          </tr>
                          <tr>
                            <td><div align="right">Sexe :</div></td>
                            <td><div align="left">
                                <select name="sexe" id="select">
                                  <option value="Femme" selected="selected">Femme</option>
                                  <option value="Homme">Homme</option>
                                  <option value="Couple">Couple</option>
                                </select>
                            </div></td>
                          </tr>
                          <tr>
                            <td><div align="right">Couleur des yeux&nbsp;:</div></td>
                            <td><div align="left">
                                <SELECT 
                          name=yeux id="yeux">
                                  <option value="x">Peu importe</option>
                                  <option value="Bleus">Bleus</option>
                                  <option value="Gris">Gris</option>
                                  <option value="Marrons">Marrons</option>
                                  <option value="Noirs">Noirs</option>
                                  <option value="Pers">Pers</option>
                                  <option value="Verts">Verts</option>
                                  <option value="Autre">Autre</option>
                                                                                                </SELECT>
                            </div></td>
                          </tr>
                          <tr>
                            <td><div align="right">Couleur des cheveux : </div></td>
                            <td><div align="left">
                                <SELECT 
                          name=cheveux id="cheveux">
                                  <option value="x" selected>Peu importe</option>
                                  <option value="Auburn">Auburn</option>
                                  <option value="Blancs">Blancs</option>
                                  <option value="Blonds">Blonds</option>
                                  <option value="Bruns">Bruns</option>
                                  <option value="Ch&acirc;tains">Ch&acirc;tains</option>
                                  <option value="Poivre et sel">Poivre et sel</option>
                                  <option value="Noirs">Noirs</option>
                                  <option value="Roux">Roux</option>
                                  <option value="Sans">Sans</option>
                                  <option value="Autre">Autre</option>
                                                                                                                                </SELECT>
                            </div></td>
                          </tr>
                          <tr>
                            <td><div align="right">Style&nbsp;:</div></td>
                            <td><div align="left">
                                <select name="style" id="select4">
                                  <option value="x">Peu importe</option>
                                  <option value="BCBG">BCBG</option>
                                  <option value="Classique">Classique</option>
                                  <option value="D&eacute;contract&eacute;">D&eacute;contract&eacute;</option>
                                  <option value="Habill&eacute;">Habill&eacute;</option>
                                  <option value="Sport">Sport</option>
                                    </select>
                            </div></td>
                          </tr>
                          
                          <tr>
                            <td><div align="right">Silouhaite&nbsp;:</div></td>
                            <td><div align="left">
                                <select name="silouhaite" id="select5">
                                  <option value="x" selected>Peu importe</option>
                                  <option value="Fine">Fine</option>
                                  <option value="Ronde">Ronde</option>
                                  <option value="Normal">Normal</option>
                                  <option value="Sportive">Sportive</option>
                                  <option value="Tr&egrave;s fine">Tr&egrave;s fine</option>
                                  <option value="Tr&egrave;s ronde">Tr&egrave;s ronde</option>
                                    </select>
                            </div></td>
                          </tr>
                          <tr>
                            <td colspan="2">&nbsp;</td>
                          </tr>
                          <tr>
                            <td colspan="2" bgcolor="#FFE8FB"><div align="left"><strong>Un peu plus sur Il/elle </strong></div></td>
                          </tr>
                          <tr>
                            <td><div align="right">D&eacute;partement&nbsp;:</div></td>
                            <td><div align="left">
                                <select name="departement" id="departement">
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
                                                                </select>
                            </div></td>
                          </tr>
                          <tr>
                            <td><div align="right">Profession&nbsp;:</div></td>
                            <td><div align="left">
                              <SELECT 
                        name=profession id="profession">
                                <option value="x" selected>Peu importe</option>
                                <option value="Agent de ma&icirc;trise">Agent de ma&icirc;trise</option>
                                <option value="Agriculteur">Agriculteur</option>
                                <option value="Artisan">Artisan</option>
                                <option value="Cadre administratif">Cadre administratif</option>
                                <option value="Cadre Technique">Cadre Technique</option>
                                <option value="Commer&ccedil;ant">Commer&ccedil;ant</option>
                                <option value="Commercial">Commercial</option>
                                <option value="Dirigeant, cadre">Dirigeant, cadre</option>
                                <option value="Employ&eacute;">Employ&eacute;</option>
                                <option value="Enseignant">Enseignant</option>
                                <option value="Etudiant">Etudiant</option>
                                <option value="Fonctionnaire">Fonctionnaire</option>
                                <option value="Ing&eacute;nieur">Ing&eacute;nieur</option>
                                <option value="Journaliste">Journaliste</option>
                                <option value="Ouvrier">Ouvrier</option>
                                <option value="Arts et spectacles">Arts et spectacles</option>
                                <option value="Lib&eacute;rale">Lib&eacute;rale</option>
                                <option value="M&eacute;dicale">M&eacute;dicale</option>
                                <option value="Param&eacute;dicale">Param&eacute;dicale</option>
                                <option value="Retrait&eacute;">Retrait&eacute;</option>
                                <option value="Technicien">Technicien</option>
                                <option value="Autres">Autres</option>
                                                                                                                        </SELECT>
                            </div></td>
                          </tr>
                          <tr>
                            <td><div align="right">Fumeur&nbsp;:</div></td>
                            <td><div align="left">
                                <select name="fumeur" id="select8">
                                  <option value="x" selected>Peu importe</option>
                                  <option value="Oui,souvent">Oui,souvent</option>
                                  <option value="Oui,a l occasion">Oui,a l'occasion</option>
                                  <option value="Oui,rarement">Oui,rarement</option>
                                  <option value="Non,jamais">Non,jamais</option>
                                  <option value="Non,&ccedil;a me d&eacute;renge">Non,&ccedil;a me d&eacute;renge</option>
                                                                </select>
                            </div></td>
                          </tr>
                          <tr>
                            <td><div align="right">But recherch&eacute;  &nbsp;:</div></td>
                            <td><div align="left">
                              <select name="esprit" id="select7">
                                <option value="x" selected>Peu importe</option>
                                <option value="Amitier">Amitier</option>
                                <option value="Relation s&eacute;rieuse">Relation s&eacute;rieuse</option>
                                <option value="Sortie">Sortie</option>
                                <option value="Discution">Discution</option>
                                <option value="rencontre">rencontre</option>
                                <option value="Sexe">Sexe</option>
                                                                                                                        </select>
                            </div></td>
                          </tr>
                          <tr>
                            <td colspan="2"><div align="center"></div></td>
                          </tr>
                          <tr>
                            <td colspan="2"><div align="center">
                                <input type="submit" name="Submit2" value="Rechercher" />
                            </div></td>
                          </tr>
                        </table>
                          </form>
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
  </table>

<p>&nbsp;</p>
</body>
</html>
