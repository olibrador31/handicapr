<?
$message = "";

session_start();
$id_regenerate = session_regenerate_id();

if($_GET['id'] != 1) {

	$host = "localhost"; 
	$user = "root"; 
	$passc = ""; 
	$db = "meet"; 
	
	// Ouvre la connexion
	$connection = mysql_connect($host, $user, $passc) or die ("Unable to connect!"); 


	// vérifie que les champs sont rempli
	$erreur ="";
	if (!$_POST[pseudo]) $erreur="Vous devez entrer un pseudonyme <br>";
	if (!$_POST[pass]) $erreur=$erreur."Vous devez entrer un mot de pass<br>";
	if (!$_POST[mail]) $erreur=$erreur."Vous devez entrer une adresse mail<br>";

	//vérifie si le pseudo est pas déja pris
	// Selectionne la base
	mysql_select_db($db) or die ("Unable to select database!"); 

	// Construit la requete
	$pseudo=$_POST[pseudo];
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
		$pseudo=$_POST['pseudo'];
		$pass=$_POST['pass'];
		$mail=$_POST['mail'];
	
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
<title>handicaperencontre.fr rencontre pour pour les personnes handicapés et valides victimes avc ou malades etc avec chat forum, profil vérifié avec chat forum, profil vérifié </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
</script><form name="form1" method="post" action="inscription1.php">
  <table width="800"  border="0" align="left" cellpadding="1" cellspacing="0" bgcolor="#000000">
    <tr>
      <td><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#96ACC2">
            <td colspan="4" bgcolor="#FBE7F3"><div align="center" class="Style22"><a href="http://www.handicaperencontre.fr"><img src="img/logo.jpg" width="800" height="116" border="0"></a></div></td>
          </tr>
          <tr bgcolor="#567596">
            <td height="65" colspan="4" background="" bgcolor="#FFF0FF"><div align="left"><strong><br>
                      <br>
                <br>
                <br>
              <br>
              <br>
            </strong></div></td>
          </tr>
          <tr bgcolor="#96ACC2">
            <td width="143" align="left" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="1" cellpadding="2" cellspacing="0" bordercolor="#FFE8FB">
                <tr>
                  <td bgcolor="#FFFFFF"><div align="center"></div></td>
                </tr>
                <tr>
                  <td bgcolor="#FFDFFF"><span class="Style11">Identification</span></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><div align="center" class="Style11">
                      <input name="pseudo_ident" type="text" id="pseudo_ident" value="pseudonyme" size="20" maxlength="20">
                  </div></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><div align="center" class="Style11">
                      <input name="pass_ident" type="password" id="pass_ident" value="password" size="20" maxlength="20">
                  </div></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><div align="center" class="Style11">
                      <input type="submit" name="Submit" value="Connection">
                      <input name="ident" type="hidden" id="ident" value="oui">
                  </div></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><a href="chat_afficher.php" class="Style11">Mot de pass perdu ?</a> </td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><a href="inscription1.php?id=1" class="Style11">Cr&eacute;e un compte</a> </td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td bgcolor="#FFDFFF"><span class="Style11">Votre Espace </span></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><a href="profil.php?pseudo_envoi=<? echo $pseudo_ident; ?>" class="Style11">- Votre profil </a></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><a href="xcvcx" class="Style11">- Votre recherche </a></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><a href="message.php" class="Style11">- Vos messages </a></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><a href="photo.php" class="Style11">- Vos photos </a></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><a href="contact.php" class="Style11">- Vos ami(e)s</a></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><a href="annonce_mod.php" class="Style11">- Votre annonce </a></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td bgcolor="#FFDFFF"><span class="Style11">Sommaire</span></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><a href="inscription1.php?id=1" class="Style11">- Cr&eacute;e un compte </a></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><a href="cxvcx" class="Style11">- Recherche</a></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><a href="forum_sujet.php" class="Style11">- Forum </a></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><a href="top_homme.php" class="Style11">- Top 10 Hommes</a></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><a href="top_femme.php" class="Style11">- Top 10 Femmes </a></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><a href="liste.php?start=0" class="Style11">- Chat </a></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td bgcolor="#FFDFFF"><span class="Style11">Votre parole </span></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><a href="sugestion.html" class="Style18">- Suggestion </a></td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><a href="contacts.html" class="Style18">- Contact </a></td>
                </tr>
            </table></td>
            <td width="5" bgcolor="#FFDFFF">&nbsp;</td>
            <td colspan="2" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
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
