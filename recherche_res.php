<?


require '_bdd.php';
require '_identification.php';
require '_restriction.php';
require 'lignechat.php';?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>résultat de votre recherche rencontre gratuit pour handicapés valides victimes d'avc, ou malades et leurs familles</title>
<META NAME="Author" CONTENT="Olivier RIMBERT">
<META NAME="Category" CONTENT="rencontre,handicap,handicapé,forum,discution">
<META NAME="Copyright" CONTENT="RIMBERT Olivier">
<META http-equiv=content-language content=fr-ca>
<META NAME="Description" CONTENT=" résultat de votre recherche rencontres gratuites pour handicapés et valides en france pour les célibataires qui désirent trouver l'amour, l'âme soeur, créer de nouvelles amitiés avec chat et forum pour aider les malades et leurs proches a se parler, a se connaitre,se rencontrer  et a trouver des solutions, surtout ne restez pas isolé, avc, traumatisme cranien, discutions et échange entre handicapés et valides  malades handicapés discutions sur rééducation et travail. réseau social sur le handicap et la rencontre en france. Rejoignez notre communauté de malades valides et handicapés pour des échanges de plus en plus nombreux et entièrement gratuit en france avec chat et forum sur le handicap bienvenu sur l accueil du site de handicaperencontre.fr site de rencontre gratuit">
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
         <tr bgcolor="#96ACC2"><td colspan="5" bgcolor="#FBE7F3"><div align="center"><img src="img/logo.jpg" width="800" height="116" border="0"></td></tr>
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
              <tr align="center" bgcolor="#96ACC2">
                <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                  <tr bgcolor="#AFBFCF">
                    <td bgcolor="#FFDFFF"><div align="center">
                        <p><span class="Style11">::. Votre recherche .::</span><br />
                        </p>
                    </div></td>
                  </tr>
                  <tr bgcolor="#AFBFCF">
                    <td width="500" align="center" bgcolor="#FFFFFF">
					<table width="577" cellpadding="1" cellspacing="15">




<?
$start=$_GET['start'];




// -------------------- traitement des données et formulation de la requete
if (!empty($_POST['age'])) { $age=$_POST['age']; } else { $age=$_GET['age']; }
if (!empty($_POST['sexe'])) { $sexe=$_POST['sexe']; } else { $sexe=$_GET['sexe']; }
if (!empty($_POST['taille1'])) { $taille1=$_POST['taille1']; } else { $taille1=$_GET['taille1']; }
if (!empty($_POST['taille2'])) { $taille2=$_POST['taille2']; } else { $taille2=$_GET['taille2']; }
if (!empty($_POST['poids1'])) { $poids1=$_POST['poids1']; } else { $poids1=$_GET['poids1']; }
if (!empty($_POST['poids2'])) { $poids2=$_POST['poids2']; } else { $poids2=$_GET['poids2']; }
if (!empty($_POST['yeux'])) { $yeux=$_POST['yeux']; } else { $yeux=$_GET['yeux']; }
if (!empty($_POST['cheveux'])) { $cheveux=$_POST['cheveux']; } else { $cheveux=$_GET['cheveux']; }
if (!empty($_POST['style'])) { $style=$_POST['style']; } else { $style=$_GET['style']; }
if (!empty($_POST['silouhaite'])) { $silouhaite=$_POST['silouhaite']; } else { $silouhaite=$_GET['silouhaite']; }
if (!empty($_POST['departement'])) { $departement=$_POST['departement']; } else { $departement=$_GET['departement']; }
if (!empty($_POST['fumeur'])) { $fumeur=$_POST['fumeur']; } else { $fumeur=$_GET['fumeur']; }
if (!empty($_POST['profession'])) { $profession=$_POST['profession']; } else { $profession=$_GET['profession']; }
if (!empty($_POST['esprit'])) { $esprit=$_POST['esprit']; } else { $esprit=$_GET['esprit']; }

echo $poids1;
echo "<BR>";
echo $poids2;
/*

 $age=$_POST['age'];
$sexe=$_POST['sexe'];
$taille1=$_POST['taille1'];
$taille2=$_POST['taille2'];
$poids1=$_POST['poids1'];
$poids2=$_POST['poids2'];
$yeux=$_POST['yeux'];
$cheveux=$_POST['cheveux'];
$style=$_POST['style'];
$silouhaite=$_POST['silouhaite'];
$departement=$_POST['departement'];
$fumeur=$_POST['fumeur'];
$profession=$_POST['profession'];
$esprit=$_POST['esprit'];

*/

if ($age != "x") { $age_f= $age+5; $q_age = "AND age >= '$age' AND age <= '$age_f' "; } else { $q_age = ""; }
if ($taille1 != ""  and $taille2 != "") { $q_taille = "AND taille >= '$taille1' AND taille <= $taille2 "; } else { $q_taille = ""; }
if ($poids1 != ""  and $poids2 != "") { $q_poids = "AND poid >= $poids1 AND poid <= $poids2 "; } else { $q_poids = ""; }
if ($yeux != "x") { $q_yeux = "AND yeux = '$yeux' "; } else { $q_yeux = ""; }
if ($cheveux != "x") { $q_cheveux = "AND cheveux = '$cheveux' "; } else { $q_cheveux = ""; }
if ($style != "x") { $q_style = "AND style = '$style' "; } else { $q_style = ""; }
if ($silouhaite != "x") { $q_silouhaite = "AND silouhaite = '$silouhaite' "; } else { $q_silouhaite = "";}
if ($departement != "x") { $q_departement = "AND departement = '$departement' "; } else { $q_departement = ""; }
if ($fumeur != "x") { $q_fumeur = "AND fumeur = '$fumeur' "; } else { $q_fumeur = ""; }
if ($profession != "x") { $q_profession = "AND profession = '$profession' "; } else { $q_profession = ""; }
if ($esprit != "x") { $q_esprit = "AND esprit = '$esprit' "; } else { $q_esprit = ""; }
$q_sexe = "AND sexe = '$sexe' ";
// requette
$query = "SELECT * FROM user WHERE id!='' $q_sexe $q_age $q_taille $q_poids $q_yeux $q_cheveux $q_style $q_silouhaite $q_departement $q_fumeur $q_profession $q_esprit ORDER BY  'pseudo' asc"; 

$r = mysql_query($query) or die ("Veuillez entrer des valeurs corrects");

$row = mysql_num_rows($r);



// -------------------- Fin traitement des données

if ($row != 0) {
// couleur du premier
$couleur = "#A4B7CA";

$fin = $start+10;
$i=$start;
for($i;$i < $fin;$i++) {
if($i<$row = mysql_num_rows($r)) {
	
	if (mysql_data_seek($r, $i))  {
	
	$row = mysql_fetch_row($r);
	$pseudo = $row[1];
	$ville = $row[18];
	$departement_aff = $row[17];
	$age_aff = $row[5];
	$annonce = $row[30];
	$annonce = str_replace("$$","'",$annonce);
//recupere la photo
$query_photo = "SELECT afficher FROM photo WHERE pseudo='$pseudo'"; 
$r_photo = mysql_query($query_photo) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$row_photo = mysql_fetch_row($r_photo);
$photo = $row_photo[0];
if (!$photo) { $photo="img/20000503113333_54143.jpg"; }
else {
$photo2=$photo;
$photo = "./photos/".$pseudo."/".$photo2;
}
	
	if ($row = mysql_num_rows($r)) {
		
		//def couleur
		if (is_integer($i/2)) { $couleur = "#DDE4EC"; } else { $couleur = "#C2D0DC"; }
		
		// place du texte
		//limitation de la taille de l annonce
	$t=0;
	$annonce_reduit = "";
	for($t;($t < 300 && $t<strlen($annonce));$t++) {
	$annonce_reduit = $annonce_reduit . $annonce[$t];
	}
	$annonce_reduit = 	$annonce_reduit." ...";
$annonce_reduit = str_replace("§§","'",$annonce_reduit);




echo "                       <tr>
                                      <td width='589' bgcolor='#567596'><div align='left'>
                                        <table width='577' height='108' cellpadding='2' cellspacing='1'>
                                          <tr>
                                            <td width='80' rowspan='3' bgcolor='#FFDFFF'><a href='photo_profil.php?pseudo_envoi=$pseudo'><img src='$photo' width='80' height='100'></a></td>
                                            <td width='484' height='10' bgcolor='#FFDFFF'><strong><a href='profil.php?pseudo_envoi=$pseudo'>$pseudo</a> de <span class='Style10'>$ville </span>dans le <span class='Style24'>$departement_aff </span><span class='Style13'>, age</span><span class='Style24'> $age_aff</span> ans</span></strong></td>
                                          </tr>
                                          <tr>
                                            <td height='69' bgcolor='#FFFFFF'>$annonce_reduit </td>
                                          </tr>
                                          <tr>
                                           <td height='10' bgcolor='#FF9FFF'><B><div align='center'><span class='Style19'><a href='profil.php?pseudo_envoi=$pseudo'>Voir son profil</a> - <a href='message_ecrire.php?action=post&destinataire=$pseudo'>Ecrire un message</a> - <a href='photo_profil.php?pseudo_envoi=$pseudo'>Ses photos</a> </span></div></B></td>
                                          </tr>
                                        </table>
                                        
                              </div></td>
                            </tr>";
							
}
}
}
}
}
else {
	echo "<br>
                            <br><strong>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aucune personne ne corespond &agrave; votre recherche, &eacute;largissez votre recherche pour avoir de plus ample r&eacute;sultats</strong>  ";
}


?>
                        <tr>
                           <td width="76%"><div align="center">
						   
<? 
if ($row != 0) {

echo "Page :"; 
// création des n° de page 

$i=0;
$page = 1;
$nb_ligne = mysql_num_rows($r);
				
				echo "[ - ";
				while ($i< $nb_ligne) {
				echo "<a href='recherche_res.php?start=$i&age=$age&sexe=$sexe&taille1=$taille1&taille2=$taille2&poids1=$poids&poids2=$poids2&yeux=$yeux&cheveux=$cheveux&style=$style&silouhaite=$silouhaite&departement=$departement&fumeur=$fumeur&profession=$profession&esprit=$esprit'>$page</a> ";
				echo " - ";
				$page=$page+1;
				$i=$i+10;
				}
	echo "]";
}
?>				</div></td>
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