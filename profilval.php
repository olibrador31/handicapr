<?

require '_bdd.php';

require '_identification.php';

// suprime la fiche
$action = $_GET['action'];
if ($_GET['action']=="supr") {

$id = $_GET['id'];
$query = "DELETE FROM user WHERE id=$id"; 
		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");


		}
		
		//valide la fiche
		if ($_GET['action']=="val") {

	$query = "UPDATE user SET val='1' WHERE id=$id";

	// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte1, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");



$query = "SELECT mail,pseudo,pass FROM user WHERE id=$id"; 
	
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte2, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");

$r = mysql_fetch_row($r);
$mail = $r[0];
$pseudo = $r[1];
$pass = $r[2];


$message = "<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Transitional//EN'
'http://www.w3.org/TR/html4/loose.dtd'>
<html>
<head>
<title>mail handicaperencontre</title>
<meta http-equiv='Content-Type' content='text/html; charset=iso-8859-1'>
<style type='text/css'>
<!--
body {
	background-color: #F9E3F0;
}
-->
</style>
<link href='vbbcv.css' rel='stylesheet' type='text/css'>
<style type='text/css'>
<!--
.Style13 {color: #000000; font-weight: bold; }
-->
</style>

  <table width='800'  border='0' align='left' cellpadding='1' cellspacing='0' bgcolor='#000000'>
    <tr>
      <td><table width='100%' height='100%'  border='0' align='center' cellpadding='0' cellspacing='0'>
          
                <table width='100%'  border='0' cellspacing='0' cellpadding='3'>
                  <tr bgcolor='#AFBFCF'>
                    <td bgcolor='#FFDFFF'><div align='center'>
                    </div></td>
                  </tr>
                  <tr bgcolor='#AFBFCF'>
                    <td bgcolor='#FFFFFF'>&nbsp;&nbsp;&nbsp;
                        <p align='center' class='Style13'>votre compte a été validé   <FONT color='red'>votre login  :".$pseudo ." </FONT> , pour toutes question contactez moi par mail indiqué sur le site   à bientot   "." <FONT color='red'>votre mot de pass : ".$pass. "</FONT> , l'équipe de  <a href='http://www.handicaperencontre.fr'> handicaperencontre.fr</a>  vous souhaite de faire de nombreuses rencontres, <b> pour toute question contactez-moi par mail : icedenice@live.fr pour toute aide et information. A bientot sur <a href='http://www.handicaperencontre.fr'>handicaperencontre.fr</a><br><br> Pour modifier votre profil identifiez vous et clickez sur ce lien vous allez pouvoir ajouter ou modifier vos photos et informations complémentaires ainsi que votre annonce

                  </tr>
                </table>
                <strong><br />
                </strong></div>            
              <div align='center'></div></td></tr>
          
      </table></td>
    </tr>
  </table>
</body>
</html>";
//Variables :


 $headers ='From:   handicaperencontre.fr/"'."\n";
     $headers .='Content-Type: text/html; charset="iso-8859-1"'."\n";
     $headers .='Content-Transfer-Encoding: 8bit';

$sujet = "bienvenue sur http://www.handicaperencontre.fr/  ".$pseudo;
$to=$mail; $from="De:icedenice@live.fr\r\n";   //appel de la fonction mail (envoi)

$sujet = "votre compte a été validé sur http://www.handicaperencontre.fr/  ::";
$to=$mail; $from="icedenice@live.fr\r\n";   //appel de la fonction mail (envoi):
 mail($to,$sujet,$message,$headers ); 

		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
		}

	

		
//récupère le pseudo du profil a afficher + donnée
$pseudo_envoi = $_GET['pseudo_envoi'];
	$query = "SELECT * FROM user WHERE pseudo='$pseudo_envoi'"; ;
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	$row = mysql_fetch_array($r);

	$pseudo = $pseudo_envoi;
	$age = $row['5'];
	$sexe = $row['6'];
	$taille = $row['7'];
	$poids = $row['8'];
	$style = $row['9'];
	$silouhaite = $row['10'];
	$yeux = $row['11'];
	$cheveux = $row['12'];
	$id = $row['0'];
	$prenom = $row['13'];
	$situation = $row['14'];
	$fumeur = $row['15'];
	$esprit = $row[16];
	$departement = $row['17'];
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
<title>handicaperencontre.fr rencontre pour pour les personnes handicapés et valides victimes avc ou malades etc avec chat forum, profil vérifié avec chat forum, profil vérifié page du profil </title>
<META NAME="Author" CONTENT="Olivier RIMBERT">
<META NAME="Category" CONTENT="rencontre,handicap,handicapé,forum,discution">
<META NAME="Copyright" CONTENT="RIMBERT Olivier">
<META http-equiv=content-language content=fr-ca>
<META NAME="Description" CONTENT=" rencontres gratuites pour handicapés et valides en france pour les célibataires qui désirent trouver l'amour, l'âme soeur, créer de nouvelles amitiés avec chat et forum pour aider les malades et leurs proches a se parler, a se connaitre,se rencontrer  et a trouver des solutions, surtout ne restez pas isolé, avc, traumatisme cranien, discutions et échange entre handicapés et valides  malades handicapés discutions sur rééducation et travail. réseau social sur le handicap et la rencontre en france. Rejoignez notre communauté de malades valides et handicapés pour des échanges de plus en plus nombreux et entièrement gratuit en france avec chat et forum sur le handicap bienvenu sur l accueil du site de handicaperencontre.fr site de rencontre gratuit">
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
.Style14 {
	font-size: 14px;
	font-weight: bold;
}
.Style16 {color: #0000FF}
-->
</style>
<link href="vbbcv_profil.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Style26 {color: #0066CC; font-weight: bold; }
.Style28 {color: #FF0000}
.style32 {	font-size: 36px;
	font-weight: bold;
	color: #0000CC;
}
.Style37 {font-size: 14px; font-weight: bold; color: #0000CC; }
.Style38 {font-size: 14px}
.Style39 {color: #990000}
.Style40 {font-size: 10px}
.Style17 {color: #000000; font-weight: bold; }
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
</script><script type="text/javascript"><!--
google_ad_client = "ca-pub-1493739445870732";
/* baniere 1 rose */
google_ad_slot = "3439886067";
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
    <td class="Style38"><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#96ACC2">
            <td colspan="4" bgcolor="#FBE7F3"><div align="center"><a href="http://www.handicaperencontre.fr/"><a href="http://www.handicaperencontre.fr/indexiden.php"><img src="img/logo.jpg" width="800" height="116" border="0"><br>
          <br>
        
              <br>
          </a></div></td>
          </tr>
          <tr bgcolor="#567596">
            <td colspan="5" bgcolor="#FBE7F3"><div align="center" class="Style12">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="8"><a href="indexiden.php"><img src="logo/logo.jpg" width="906" height="112" border="0"></a></td>
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
          <tr bgcolor="#96ACC2">
            <td width="143" align="left" valign="top" bgcolor="#FFFFFF"><form action="index.php" method="post" name="form">
          <table width="100%"  border="1" cellpadding="1" cellspacing="0">
            <tr>
              <td bgcolor="#FFFFFF"><div align="center"></div></td>
            </tr>
            <tr>
              <td bgcolor="#FFDFFF"><span class="Style39"> Identification</span></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><div align="center" class="Style39">
                <input name="pseudo_ident" type="text" id="pseudo_ident" value="pseudonyme" size="20" maxlength="20">
              </div></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><div align="center" class="Style39">
                <input name="pass_ident" type="password" id="pass_ident" value="password" size="20" maxlength="20">
              </div></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><div align="center" class="Style39">
                <input type="submit" name="Submit" value="Connection">
                <input name="ident" type="hidden" id="ident" value="oui">
              </div></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF">&nbsp; </td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="inscription1.php?id=1" class="Style39">Cr&eacute;e un compte</a> </td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="plan.php"><strong>Plan</strong></a></td>
            </tr>
            <tr>
              <td bgcolor="#FFDFFF"><span class="Style39"><img src="img/MINIMEMBRE.GIF" width="16" height="12"> Votre Espace </span></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="votre_profil.php?pseudo_envoi=<? echo $pseudo_ident; ?>" class="Style39"> - Votre profil </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="recherche.php?start=0" class="Style39">- Votre recherche </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="message.php" class="Style39">- Vos messages </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="photo.php" class="Style39">- Vos photos </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="contact.php" class="Style39">- Vos ami(e)s</a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="annonce_mod.php" class="Style39">- Votre annonce </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
              <td bgcolor="#FFDFFF"><span class="Style39"><img src="img/B_TBLOPS.PNG" alt="Sommaire" width="16" height="12"> Sommaire</span></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="inscription1.php?id=1" class="Style39">- Cr&eacute;e un compte </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="recherche.php" class="Style39">- Recherche</a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="forum_sujet.php" class="Style39">- Forum </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="top_homme.php" class="Style39">- Top 10 Hommes</a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="top_femme.php" class="Style39">- Top 10 Femmes </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="chat_afficher.php" class="Style39">- Chat </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
              <td bgcolor="#FFDFFF"><span class="Style39"><img src="img/MAIL.GIF" alt="Votre parole" width="14" height="11"> Votre parole </span></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="sugestion.php"><strong>- Suggestion </strong></a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="contacts.php"><strong>- Contact </strong></a></td>
            </tr>
          </table>
        </form>            </td>
            <td width="5" bgcolor="#FFDFFF">&nbsp;</td>
            <td colspan="2" valign="top" bgcolor="#FFFFFF"><table width="650"  border="0" cellspacing="13" cellpadding="1">
              <tr>
                <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFDFFF"><div align="center">
                          <p class="Style13"><strong>::. Information sur le profil de rencontre .:: </strong></p>
                          <form name="form2" method="post" action="profilval.php?id=<? echo"$id&action=supr";?>">
                            <label>
                            <input type="submit" name="Submit2" value="suprimer">
                            </label>
                            <a href="a.php">administration</a>
                          </form>
                          <form name="form2" method="post" action="profilval.php?id=<? echo"$id&action=val";?>">
                            <label>
                            <input type="submit" name="Submit23" value="valider">
                            </label>
                            <a href="a.php"></a>
                                                    </form>
                          <p>&nbsp;</p>
                          <p class="Style13"><strong><br />
                          </strong></p>
                      </div></td>
                    </tr>
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFFFFF">&nbsp;&nbsp;&nbsp;Voici votre profil, c'est la page que vont voir les membres de handicaperencontre.fr rencontre pour pour les personnes handicap&eacute;es pour avoir des informations sur vous. Vous pouvez compl&eacute;ter ou modifier votre profil quand vous le souhaitez. </td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                    <tr bgcolor="#AFBFCF">
                      <td colspan="2" bgcolor="#FFDFFF"><div align="center">
                          <p class="Style13"><strong>::. Action sur le profil de <? echo $pseudo; ?> .:: <br />
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
                          </p>
                          <p>                            <br>
                            <input name="Submit2232" type="submit" onclick="MM_goToURL('parent','mur.php?pseudo_envoi=<? echo $pseudo; ?>');return document.MM_returnValue" value=" Poster et Voir son Mur " />
                          </p>
                        </div></td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFDFFF"><div align="center">
                          <p class="Style13"><strong>::. Profil de <? echo $pseudo; ?> .::<br />
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
                          <p class="Style13"><strong>::. Profil de <? echo $pseudo; ?> .::<br />
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
                                    <td><div align="left" class="Style10 Style13"><strong>Silouhaite&nbsp;:</strong></div></td>
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
                                      <td valign="top"><div align="right" class="Style13"><strong>Citation pr&eacute;f&eacute;r&eacute; : </strong></div></td>
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
            <td colspan="4" bgcolor="#FFF0FF"><div align="center"><img src="img/bas.jpg" width="800" height="53" /></div></td>
          </tr>
    </table></td>
  </tr>
</table>

<p class="Style37">handicaperencontre.fr rencontre pour pour les personnes handicap&eacute;es !! </p>

<p class="Style38"><strong>Attention des filles g&eacute;n&eacute;ralement donnent leur adresse MSN sur le site cela est g&eacute;n&eacute;ralement des tentatives de piratages ne les ajoutez pas Merci </strong></p>
<p class="Style38">&nbsp;</p>
<p class="Style38">&nbsp;</p>
<p class="Style14">Attention : tout(e) utilisateur(trice) dont les textes sont &agrave; caract&egrave;re raciste ou offensant, ainsi que pr&eacute;sentant une annonce v&eacute;nale (prostitution) verra son compte supprim&eacute; et son adresse IP mise sur liste noire: il sera alors d&eacute;finitivement impossible de se r&eacute;inscire sur le site. Si vous rencontrez une annonce ou  un(e) utilisateur(trice)  incorrect(e), vous pouvez pr&eacute;venir le webmaster &agrave; l'adresse suivante: <a href="mailto:icedenice@live.fr">icedenice@live.fr</a></p>
<span class="Style38"><br>
</span></body>
</html>
