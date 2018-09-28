<? 
	$mail = $_POST['mail'];

require '_bdd.php';
require 'stat_message.php';
echo"
<form id='form1' name='form1' method='post' action='mdp.php'>
  <p
  

    <input type='submit' name='Submit' value='Envoyer' />
    <input name='mail' type='text' value='votre mail' />
  </p>
</form>";
$query = "SELECT * FROM user WHERE mail='$mail'"; 
if ($mail!="")  {
$compt=0;
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$i=0;

	
	if (mysql_data_seek($r, $i))  {
	
	$row = mysql_fetch_row($r);
	$pseudo = $row[1];

	$pass = $row[2];





}

if ($mail !="") {

$headers ='From:   handicaperencontre.fr/"'."\n";
     $headers .='Reply-To: icedenice@live.fr'."\n";
     $headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
     $headers .='Content-Transfer-Encoding: 8bit';


$message = " http://www.handicaperencontre.fr/  votre login_____ :".$pseudo ."___pour toutes question contactez moi par mail indiqué sur le site   à bientot http://www.handicaperencontre.fr/   "." votre mot de pass :".$pass.":___   :".$message;
$sujet = " rappel des identifiants http://www.handicaperencontre.fr/  ::";
$to=$mail; $from="icedenice@live.fr\r\n";   //appel de la fonction mail (envoi):


 mail($mail,$sujet,$message,$headers); 


 }}





	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>mot de pass perdu sur le site de rencontre pour handicapé handicaperencontre.fr</title>
<META NAME="Author" CONTENT="Olivier RIMBERT">
<META NAME="Category" CONTENT="rencontre,handicap,handicapé,forum,discution">
<META NAME="Copyright" CONTENT="RIMBERT Olivier">
<META http-equiv=content-language content=fr-ca>
<META NAME="Description" CONTENT=" mot de pass perdu sur le site handicaperencontre.fr rencontres gratuites pour handicapés et valides en france pour les célibataires qui désirent trouver l'amour, l'âme soeur, créer de nouvelles amitiés avec chat et forum pour aider les malades et leurs proches a se parler, a se connaitre,se rencontrer  et a trouver des solutions, surtout ne restez pas isolé, avc, traumatisme cranien, discutions et échange entre handicapés et valides  malades handicapés discutions sur rééducation et travail. réseau social sur le handicap et la rencontre en france. Rejoignez notre communauté de malades valides et handicapés pour des échanges de plus en plus nombreux et entièrement gratuit en france avec chat et forum sur le handicap bienvenu sur l accueil du site de handicaperencontre.fr site de rencontre gratuit">
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

<script type="text/JavaScript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
<style type="text/css">
<!--
.Style1 {
	font-size: 18px;
	font-weight: bold;
	color: #3300FF;
}
-->
</style>
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
</script><form action="http://www.google.fr/cse" id="cse-search-box">
  <div>
    <input type="hidden" name="cx" value="partner-pub-1493739445870732:m7rsan-oi99" />
    <input type="hidden" name="ie" value="ISO-8859-1" />
    <input type="text" name="q" size="31" />
    <input type="submit" name="sa" value="Recherche Google" />
  </div>
</form>
<p>
  <script type="text/javascript" src="http://www.google.fr/cse/brand?form=cse-search-box&amp;lang=fr"></script>
</p>
<p>&nbsp;</p>
<p class="Style1">Entrez votre adresse mail pour re&ccedil;evoir votre mot de pass :  
<form id='form1' name='form1' method='post' action='mdp.php'>

  

    <input type='submit' name='Submit' value='Envoyer' />
    <input name='mail' type='text' value='votre mail' />
  </p>
</form></p>
</body>
</html>
