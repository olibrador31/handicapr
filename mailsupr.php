<?

require '_bdd.php';
require '_identification.php';
require '_restriction.php';
require 'lignechat.php';$mail= $_POST['mailsupr'];
 $query = "DELETE FROM user WHERE mail='$mail'";  
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	
	if ($r) { 

		echo "compte suprim� ";
	}
	else {
		echo "erreur ";
		}

?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>rencontre gratuit pour handicap�s valides victimes d'avc, ou malades et leurs familles</title>
<META NAME="Author" CONTENT="Olivier RIMBERT">
<META NAME="Category" CONTENT="rencontre,handicap,handicap�,forum,discution">
<META NAME="Copyright" CONTENT="RIMBERT Olivier">
<META http-equiv=content-language content=fr-ca>
<META NAME="Description" CONTENT=" rencontres gratuites pour handicap�s et valides en france pour les c�libataires qui d�sirent trouver l'amour, l'�me soeur, cr�er de nouvelles amiti�s avec chat et forum pour aider les malades et leurs proches a se parler, a se connaitre,se rencontrer  et a trouver des solutions, surtout ne restez pas isol�, avc, traumatisme cranien, discutions et �change entre handicap�s et valides  malades handicap�s discutions sur r��ducation et travail. r�seau social sur le handicap et la rencontre en france. Rejoignez notre communaut� de malades valides et handicap�s pour des �changes de plus en plus nombreux et enti�rement gratuit en france avec chat et forum sur le handicap bienvenu sur l accueil du site de handicaperencontre.fr site de rencontre gratuit">
<META NAME="Identifier-URL" CONTENT="http://www.handicaperencontre.fr/">
<META NAME="Keywords" CONTENT="rencontre, rencontres, rencontre handicap�s valides, rencontre handicap� valide, rencontre gratuite handicap�s, handicaps,handicap,rencontres, handicap�s, rencontre handicap�s, rencontre handicap�, traumatisme cranien, rencontre, traumatisme cranien, aidetraumatisme cranien, aide AVC Accident Vasculaire Cerebral, Attaque C�r�brale, AIT, Accident Isch�mique Transitoire, H�morragie C�r�brale, rencontre et aide, sida,cancer, maladie grave, an�vrisme,aide rencontre, cancer, curie,institut curie,donateurs, sein, prostate, oeil,rencontre et aide profession maladie, avtivite professionnelle, symptome scl�rose, symptome scl�rose en plaque, traitement scl�rose en plaque, 
 , sarcome, metastase,  biologie, immunotherapie,, angiogenese, pharmacochimie, physique, genotoxicologie, bio-informatique, rencontre, aide, sclerose en plaques symptomes, maladie longue duree, scleroses en plaques, scl�rose, malades sep, 
cacer, amitie, isole, contact, contacts humain, solidarite,syndrome, ald,  solidaire, solitaire, hopitaux, cliniques, reconfort,AVC , AIT, attaque, accident, congestion cerebral, association , aide, france,victime, patient, vacsculaire, cerebrale, temoignage, liens, trouble, vaisseaux sanguins, cerveau, accident vasculaire c&eacute;r&eacute;braux, accident isch&eacute;mique transitoire, devouement, copain, copine, pere, mere, frere, soeur,dialoguer, discuter, rire, affinite, enfants fils filles">
<META NAME="Publisher" CONTENT="RIMBERT Olivier">
<META NAME="Revisit-After" CONTENT="30 days">
<META NAME="Robots" CONTENT="all">
<META NAME="GOOGLEBOT" CONTENT="NOARCHIVE">
<META http-equiv="Content-Type"
content="text/html; charset=iso-8859-1">
<META http-equiv="Pragma" CONTENT="no-cache">
<META content="handicaperencontre.fr rencontre pour pour les personnes handicap�s et valides victimes avc ou malades etc avec chat forum, profil v�rifi� avec chat forum, profil v�rifi� " name=title>
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

<body>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<style type="text/css">
@import url(http://www.google.com/cse/api/branding.css);
</style>

 

<form name="form1" method="post" action="mailsupr.php">
  <table width="800"  border="0" align="left" cellpadding="1" cellspacing="0" bgcolor="#000000">
    <tr>
      <td><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
         <tr bgcolor="#96ACC2"><td colspan="5" bgcolor="#FBE7F3"><div align="center"><img src="img/logo.jpg" width="800" height="116" border="0"></td></tr>
          <tr bgcolor="#567596">
            <td height="65" colspan="4" background="" bgcolor="#FFF0FF"><div align="left"><strong><br />
                      <br />
              .:: <br />
              <br />
              <br />
              <br />
            </strong></div></td>
          </tr>
          <tr bgcolor="#96ACC2">
            <td width="143" align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="7" bgcolor="#FFDFFF">&nbsp;</td>
            <td width="650" colspan="2" valign="top" bgcolor="#FFFFFF"><p><br />
            Mail a suprimer
                <input name="mailsupr" type="text" id="mailsupr">
                <input type="submit" name="Submit" value="supr mail">
            </p>
              <p>&nbsp; </p></td>
          </tr>
          <tr bgcolor="#96ACC2">
            <td colspan="4" bgcolor="#FFF0FF"><div align="center"><img src="img/bas.jpg" width="800" height="53" /></div></td>
          </tr>
      </table></td>
    </tr>
  </table>
</form>
</body>
</html>
