<?


require '_bdd.php';
$id_regenerate = session_regenerate_id();
session_start();

if(htmlspecialchars($_GET['id']) != 1) {




	// vérifie que les champs sont rempli
	$erreur ="";
	if (!htmlspecialchars($_POST[pseudo])) $erreur="Vous devez entrer un pseudonyme <br>";
	if (!htmlspecialchars($_POST[pass])) $erreur=$erreur."Vous devez entrer un mot de pass<br>";
	if (!htmlspecialchars($_POST[mail])) $erreur=$erreur."Vous devez entrer une adresse mail<br>";
	if ($_POST[maj]!=1) $erreur=$erreur."Vous devez etre majeur<br>";
	if (substr_count($_POST[mail],"@")!=1) $erreur=$erreur."Adresse mail non valide<br>";
	if (substr_count($_POST[pseudo]," ")) $erreur=$erreur."Le pseudo ne doit pas contenir d espace ni caractère spéciaux !<br>";


	//vérifie si le pseudo est pas déja pris


	// Construit la requete
	$pseudo=htmlspecialchars($_POST[pseudo]);
	$pseudo = str_replace("'"," ",$pseudo);


	$query = "SELECT * FROM user WHERE pseudo='$pseudo'"; 

	// Execute la requete
	$r = mysql_query($query) or die ("votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");

	$i = mysql_num_rows($r);

	if (mysql_num_rows($r) != 0) { 
		$erreur = $erreur."Le pseudonyme existe déja, choisissez en un autre <br>";
	}

	// vérifie que le pass correspond a la confirmation

	if($_POST['pass'] != $_POST['confirm']) { $erreur =$erreur."Le mot de pass ne correspond pas à la confirmation <br>"; }

	// si pas d erreur on enregistre et on continu sinon en reviens a la page et on affiche les erreur

	if ($erreur == "") {
		$session=session_id();
		$pseudo=htmlspecialchars($_POST['pseudo']);
		$pass=htmlspecialchars($_POST['pass']);
		$mail=htmlspecialchars($_POST['mail']);
 //Variables :



  $headers ='From:   handicaperencontre.fr/"'."\n";
     $headers .='Content-Type: text/html; charset="iso-8859-1"'."\n";
     $headers .='Content-Transfer-Encoding: 8bit';

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
                        <p align='center' class='Style13'>Merci pour votre inscription, l'équipe de <a href='http://www.handicaperencontre.fr'>handicaperencontre.fr</a>  vous souhaite de faire de nombreuses rencontres, <b>votre login :  ".$pseudo."    </b><b>votre mot de passe :  ".$pass."</b> ; pour toute question contactez-moi par mail : icedenice@live.fr pour toute aide et information. A bientot sur <a href='http://www.handicaperencontre.fr'>handicaperencontre.fr</a><br><br> Pour modifier votre profil identifiez vous et clickez sur ce lien vous allez pouvoir ajouter ou modifier vos photos et informations complémentaires ainsi que votre annonce

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

$sujet = "bienvenue sur http://www.handicaperencontre.fr/  ".$pseudo;
$to=$mail; $from="De:icedenice@live.fr\r\n";   //appel de la fonction mail (envoi):
 mail($to,$sujet,$message,$headers ); 




		$PWD_Hash = md5(stripslashes($pass));
		
	
		$sql = "INSERT INTO user (id,pseudo,pass,session,mail) ";
		$sql =$sql."VALUES ('','$pseudo','$pass','$session','$mail')";
		$result = mysql_query($sql) or die ("Error in query: $query. " . mysql_error()); 
		// préparation table photo
			$sql__ = "INSERT INTO photo (id,pseudo) ";
		$sql__ =$sql__."VALUES ('','$pseudo')";
		$result__ = mysql_query($sql__) or die ("Error in query: $query. " . mysql_error()); 
		$req = "'inscription2.php'";
		// création du répertoire
		$rrr= "./photos/".$pseudo;
		mkdir ($rrr, 0777);

		echo "<script type='text/javascript'>	document.location.replace($req); </script> ";
$message= "rappel de vos identifiants : login :".$pseudo ." votre mot de passe :". $$pass. " bonnes rencontres à tous" ;



	}
	else {

	$message = $erreur;
	}

}
?>




<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>inscription sur rencontre gratuit pour handicapés valides victimes d'avc, ou malades et leurs familles</title>
<META NAME="Author" CONTENT="Olivier RIMBERT">
<META NAME="Category" CONTENT="rencontre,handicap,handicapé,forum,discution">
<META NAME="Copyright" CONTENT="RIMBERT Olivier">
<META http-equiv=content-language content=fr-ca>
<META NAME="Description" CONTENT="inscription sur rencontres gratuites pour handicapés et valides en france pour les célibataires qui désirent trouver l'amour, l'âme soeur, créer de nouvelles amitiés avec chat et forum pour aider les malades et leurs proches a se parler, a se connaitre,se rencontrer  et a trouver des solutions, surtout ne restez pas isolé, avc, traumatisme cranien, discutions et échange entre handicapés et valides  malades handicapés discutions sur rééducation et travail. réseau social sur le handicap et la rencontre en france. Rejoignez notre communauté de malades valides et handicapés pour des échanges de plus en plus nombreux et entièrement gratuit en france avec chat et forum sur le handicap bienvenu sur l accueil du site de handicaperencontre.fr site de rencontre gratuit">
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
	background-color: #FBE9F7;
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
.Style12 {
	color: #993300;
	font-weight: bold;
}
.Style22 {font-size: 16px}
.Style18 {color: #CCCCCC; font-weight: bold; }
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
Le but de ce site est de pouvoir &eacute;changer des conseils et donner les bonnes adresses et &eacute;viter les pires. 
<form name="form1" method="post" action="inscription1.php">
  <table width="800"  border="0" align="left" cellpadding="1" cellspacing="0" bgcolor="#000000">
    <tr>
      <td><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#96ACC2">
            <td colspan="4" bgcolor="#FBE7F3"><div align="center" class="Style22"><a href="http://www.handicaperencontre.fr"><img src="img/logo.jpg" width="800" height="116" border="0"></a></div></td>
          </tr>
          <tr bgcolor="#567596">
            <td height="65" colspan="4" background="" bgcolor="#FFF0FF"></td>
          </tr>
          <tr bgcolor="#96ACC2">
            <td width="143" align="left" valign="top" bgcolor="#FFFFFF">
          <table width="156"  border="1" cellpadding="1" cellspacing="0">
            <tr>
              <td width="150" bgcolor="#FFFFFF"><a href="inscription1.php?id=1" class="Style17">Cr&eacute;er un compte</a> </td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="plan.php"><strong>Plan</strong></a></td>
            </tr>
            <tr>
              <td bgcolor="#FFDFFF"><span class="Style17"><img src="img/MINIMEMBRE.GIF" width="16" height="12"> Votre Espace </span></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="votre_profil.php?pseudo_envoi=<? echo $pseudo_ident; ?>" class="Style17"> - Votre profil </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="recherche.php?start=0" class="Style17">- Votre recherche </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="message.php" class="Style17">- Vos messages </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="photo.php" class="Style17">- Vos photos </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="contact.php" class="Style17">- Vos ami(e)s</a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="annonce_mod.php" class="Style17">- Votre annonce </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
              <td bgcolor="#FFDFFF"><span class="Style17"><img src="img/B_TBLOPS.PNG" alt="Sommaire" width="16" height="12"> Sommaire</span></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="inscription1.php?id=1" class="Style17">- Cr&eacute;er un compte </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="recherche.php" class="Style17">- Recherche</a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="forum_sujet.php" class="Style17">- Forum </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="top_homme.php" class="Style17">- Top 10 Hommes</a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="top_femme.php" class="Style17">- Top 10 Femmes </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="chat.php" class="Style17">- Chat </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF">&nbsp;</td>
            </tr>
            <tr>
              <td bgcolor="#FFDFFF"><span class="Style17"><img src="img/MAIL.GIF" alt="Votre parole" width="14" height="11"> Votre parole </span></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="sugestion.php" class="Style18">- Suggestions </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="contacts.php" class="Style18">- Contact </a></td>
            </tr>
          </table>      </td>
            <td width="5" bgcolor="#FFDFFF">&nbsp;</td>
            <td colspan="2" valign="top" bgcolor="#FFFFFF"><table width="585"  border="0" align="center" cellpadding="1" cellspacing="13">
              <tr>
                <td colspan="3" bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFDFFF"><div align="center">
                          <p><span class="Style11">::. Cr&eacute;er un compte sur handicaperencontre.fr - rencontre pour les personnes handicap&eacute;es .:: </span><br />
                          </p>
                      </div></td>
                    </tr>
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFFFFF"><span class="Style23">handicaperencontre.fr - rencontre pour les personnes handicap&eacute;es est enti&egrave;rement gratuit</span>, ils ne vous sera <span class="Style23">JAMAIS demand&eacute; de payer !</span><br>
                        Pour vous inscrire, remplissez tous les champs pour donner le plus de renseignements possible aux autres membres. Merci &agrave; vous et bonnes rencontres :) </td>
                    </tr>
                </table></td>
              </tr>
              <tr align="center" bgcolor="#96ACC2">
                <td colspan="3" bgcolor="#FFFFFF"><span class="Style12"><? echo $message; ?></span></td>
              </tr>
              <tr align="center" bgcolor="#96ACC2">
                <td bgcolor="#567596"><table width="100%"  border="0" cellpadding="3" cellspacing="0">
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFDFFF"><div align="center">
                          <p><span class="Style11">::. Etape 1 - Param&egrave;tre de connection .::</span><br />
                          </p>
                      </div></td>
                    </tr>
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFFFFF"><div align="left">
                          <table width="100%"  border="0" cellspacing="7" cellpadding="0">
                            <tr>
                              <td><div align="center">Pseudonyme*&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;
                                      <input name="pseudo" type="text" id="pseudo" size="20" maxlength="20" />
                                      <input name="ins" type="hidden" id="ins" value="oui" />
                              </div></td>
                            </tr>
                            <tr>
                              <td><div align="center">Mot de passe* &nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;
                                      <input name="pass" type="password" id="pass" size="20" maxlength="20" />
                              </div></td>
                            </tr>
                            <tr>
                              <td><div align="center">Confirmez le mot de passe*&nbsp;:
                                  <input name="confirm" type="password" id="confirm" size="20" maxlength="20" />
                              </div></td>
                            </tr>
                            <tr>
                              <td><div align="center">Adresse Mail*&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp;&nbsp;
                                      <input name="mail" type="text" id="mail" size="20" maxlength="70" />
                              </div></td>
                            </tr>
                            <tr>
                              <td><div align="left"><strong>Je d&eacute;clare sur l'honneur &eacute;tre majeur* : 
                                </strong>
                                  <input name="maj" type="checkbox" id="maj" value="1">
                              </div></td>
                            </tr>
                            <tr>
                              <td><div align="center">
                                  <input type="submit" name="Submit2" value="Passez &agrave; l'&eacute;tape 2" />
                              </div></td>
                            </tr>
                          </table>
                      </div></td>
                    </tr>
                </table></td>
                <td width="167" colspan="2" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFE8FB">&nbsp;&nbsp;&nbsp;<strong>Le pseudo ne doit pas contenir d'espace, ni caract&egrave;res sp&eacute;ciaux.</strong><br>
                        <br>                        
                        Les champs marqu&eacute;s d'une &eacute;toile sont les champs obligatoires pour la cr&eacute;ation du compte.<br />
                          <br />
                        &nbsp;&nbsp;&nbsp;S'il y a une erreur, la description de l'erreur se marque au-dessous du texte d'ent&ecirc;te de la page. </td>
                    </tr>
                </table></td>
              </tr>

            </table></td>
          </tr>
          <tr bgcolor="#96ACC2">
            <td colspan="4" bgcolor="#FFF0FF"><div align="center"><img src="img/bas.jpg" width="800" height="53"></div></td>
          </tr>
      </table></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
