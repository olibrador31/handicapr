<?
require '_bdd.php';
require '_identification.php';

if($_GET['id'] != 3) {
	


// vérifie si la session est enregistré

	$sess =session_id();
	$query = "SELECT session FROM user WHERE session='$sess'"; 
	
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	
	// si il est enregistré
	if ($row = mysql_num_rows($r)) {
		$row = mysql_fetch_row($r);
		$sess = $row[1];
		
if ($_POST['ins']=="oui") {
	//traitement des donnée de la page 2
	$description=htmlspecialchars($_POST['description']);
	$aime=htmlspecialchars($_POST['aime']);
	$deteste=htmlspecialchars($_POST['deteste']);
	$cherche=htmlspecialchars($_POST['recherche']);
	$citation=htmlspecialchars($_POST['citation']);
	
	$citation = str_replace("'","§§",$citation);
	$aime = str_replace("'","§§",$aime);
	$deteste = str_replace("'","§§",$deteste);
	$description = htmlspecialchars(str_replace("'","§§",$description));
	$cherche = str_replace("'","§§",$cherche);
	// intialisation

$date = date("Y-m-j"); 
	
// Heure
$today = getdate();
$heure_l = $today['hours']."-".$today['minutes']."-".$today['seconds'];
		
// découpage
$annee = substr($date, 0, 4);
$mois = substr($date, 5, 2);
$jour = substr($date, 8, 2); 
// affichage
$date_l= $jour . '-' . $mois . '-' . $annee;

	
	$sess = session_id();
	$query = "UPDATE user SET description='$description',aime='$aime',deteste='$deteste',recherche='$cherche',citation='$citation',date_l='$date_l',heure_l='$heure_l',date_i='$date_l',heure_i='$heure_l' WHERE session='$sess'"; 

	
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris ");
	
	$req = "'inscription4.php?id=4'";
		echo $req;
		echo "<script type='text/javascript'>	document.location.replace($req); </script> ";
	}
}
		else {
		$req = "'restriction.php'";
		echo $req;
		echo "<script type='text/javascript'>	document.location.replace($req); </script> ";
	}
	
}
	?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>inscription vos centres d'interet rencontre gratuit pour handicapés valides victimes d'avc, ou malades et leurs familles</title>
<META NAME="Author" CONTENT="Olivier RIMBERT">
<META NAME="Category" CONTENT="rencontre,handicap,handicapé,forum,discution">
<META NAME="Copyright" CONTENT="RIMBERT Olivier">
<META http-equiv=content-language content=fr-ca>
<META NAME="Description" CONTENT=" inscription vos centres d interet rencontres gratuites pour handicapés et valides en france pour les célibataires qui désirent trouver l'amour, l'âme soeur, créer de nouvelles amitiés avec chat et forum pour aider les malades et leurs proches a se parler, a se connaitre,se rencontrer  et a trouver des solutions, surtout ne restez pas isolé, avc, traumatisme cranien, discutions et échange entre handicapés et valides  malades handicapés discutions sur rééducation et travail. réseau social sur le handicap et la rencontre en france. Rejoignez notre communauté de malades valides et handicapés pour des échanges de plus en plus nombreux et entièrement gratuit en france avec chat et forum sur le handicap bienvenu sur l accueil du site de handicaperencontre.fr site de rencontre gratuit">
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
	background-color: #FFF9FF;
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
<form name="form1" method="post" action="inscription3.php">
  <table width="800"  border="0" align="left" cellpadding="1" cellspacing="0" bgcolor="#000000">
    <tr>
      <td><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
         <tr bgcolor="#96ACC2"><td colspan="4" bgcolor="#FBE7F3"><div align="center"><img src="img/logo.jpg" width="800" height="116" border="0"></td></tr>
          <tr bgcolor="#96ACC2">

            <td valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="13" cellpadding="1">
              <tr>
                <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFDFFF"><div align="center">
                          <p><span class="Style11">::. Cr&eacute;er un compte sur handicaperencontre.fr - rencontre pour les personnes handicap&eacute;es .:: </span><br />
                          </p>
                      </div></td>
                    </tr>
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFFFFF">&nbsp;&nbsp;Ces champs sont l&agrave; pour que les membres sachent ce que vous aimez et detestez, soyez pr&eacute;cis et une pointe d'humour n'a jamais fait de mal ! </td>
                    </tr>
                </table></td>
              </tr>
              <tr align="center" bgcolor="#96ACC2">
                <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFDFFF"><div align="center">
                          <p><span class="Style11">::. Etape 3  - Vos centres d'int&eacute;r&ecirc;t.::</span><br />
                          </p>
                      </div></td>
                    </tr>
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFFFFF"><div align="left">
                          <table width="100%"  border="0" cellspacing="7" cellpadding="0">
                            <tr>
                              <td colspan="2" bgcolor="#FFE8FB"><div align="left"><strong>Quelques pr&eacute;cisions ? </strong></div></td>
                            </tr>
                            <tr>
                              <td valign="top">&nbsp;</td>
                              <td><input name="ins" type="hidden" id="ins" value="oui" /></td>
                            </tr>
                            <tr>
                              <td valign="top"><div align="right">Petite description&nbsp;: </div></td>
                              <td width="74%"><div align="left">
                                  <textarea name="description" cols="70" rows="8" id="description"></textarea>
                              </div></td>
                            </tr>
                            <tr>
                              <td valign="top">&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td valign="top"><div align="right">Vous aimez :</div></td>
                              <td><div align="left">
                                  <textarea name="aime" cols="70" rows="4" id="aime"></textarea>
                              </div></td>
                            </tr>
                            <tr>
                              <td valign="top">&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td width="26%" valign="top"><div align="right">Vous d&eacute;testez :</div></td>
                              <td><div align="left">
                                  <textarea name="deteste" cols="70" rows="4" id="deteste"></textarea>
                              </div></td>
                            </tr>
                            <tr>
                              <td valign="top">&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td valign="top"><div align="right">Citation pr&eacute;f&eacute;r&eacute;e : </div></td>
                              <td><div align="left">
                                  <textarea name="citation" cols="70" rows="3" id="citation"></textarea>
                              </div></td>
                            </tr>
                            <tr>
                              <td valign="top">&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td valign="top"><div align="right">Vous recherchez &nbsp;:</div></td>
                              <td><div align="left">
                                  <textarea name="recherche" cols="70" rows="3" id="recherche"></textarea>
                              </div></td>
                            </tr>
                            <tr>
                              <td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="2"><div align="center"></div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><div align="center">
                                  <input type="submit" name="Submit2" value="Passez &agrave; l'&eacute;tape 4" />
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
            <td colspan="3" bgcolor="#FFF0FF"><div align="center"><img src="img/bas.jpg" width="800" height="53" /></div></td>
          </tr>
      </table></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
