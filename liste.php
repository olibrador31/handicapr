<?

session_start();

$host = "localhost"; 
$user = "root"; 
$passc = ""; 
$db = "meet"; 
	
// Ouvre la connexion
	$connection = mysql_connect($host, $user, $passc) or die ("Unable to connect!"); 

// Selectionne la base
mysql_select_db($db) or die ("Unable to select database!"); 

require '_identification.php';

if ($_GET['action']=="ami") {
	$pseudo_ami=$_GET['pseudo_envoi'];
	require '_restriction.php';
require 'lignechat.php';$sess=session_id();
			$query = "SELECT * FROM ami WHERE ami='$pseudo_ami'"; 
	// Execute la requete
	$r = mysql_query($query) or die ("votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	if (mysql_num_rows($r) != 0) { 
		$erreur = $erreur."Le pseudonyme existe déja, choisissez en un autre <br>";
	}
	else {
		$sql = "INSERT INTO ami (id,pseudo,ami,session) ";
		$sql =$sql."VALUES ('','$pseudo_ident','$pseudo_ami','$sess')";
		$result = mysql_query($sql) or die ("Error in query: $query. " . mysql_error()); 
		}
}					
					?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Document sans nom</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	background-color: #567596;
}
-->
</style>
<link href="vbbcv.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Style10 {color: #FFFFFF}
.Style11 {
	color: #000000;
	font-weight: bold;
}
.Style13 {color: #000000}
.Style19 {font-weight: bold}
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
      <td><table width="100%"  border="0" align="center" cellpadding="1" cellspacing="0">
          <tr bgcolor="#96ACC2">
            <td colspan="2" bgcolor="#96ACC2"><img src="img/logo.gif" width="150" height="55"></td>
            <td width="490" class="Style2">&nbsp;</td>
            <td width="155">&nbsp;</td>
          </tr>
          <tr bgcolor="#567596">
            <td colspan="4"><table width="796"  border="0" cellspacing="1" cellpadding="2">
                <tr bgcolor="#AFBFCF">
                  <td width="185" bgcolor="#AFBFCF"><div align="center"><span class="Style10">::. 1258 visiteurs en ligne .:: </span></div></td>
                  <td width="440">
                    <div align="center"><span class="Style4">::. Bienvenu(e) <a href="fcvxcvc">Ice_de_nice</a>, vous avez <a href="sdfds">12 message(s)</a> non lu(s) .:: </span></div></td>
                  <td width="155"><div align="center"><span class="Style4"><a href="fds">::. Aide .:: </a></span></div></td>
                </tr>
            </table></td>
          </tr>
          <tr bgcolor="#96ACC2">
            <td width="143" align="left" valign="top"><table width="100%"  border="0" cellspacing="0" cellpadding="2">
                <tr>
                  <td bgcolor="#96ACC2"><div align="center"></div></td>
                </tr>
                <tr>
                  <td bgcolor="#567596"><span class="Style10">Identification</span></td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF"><div align="center">
                      <input name="textfield" type="text" value="pseudonyme" size="20" maxlength="20">
                  </div></td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF"><div align="center">
                      <input name="textfield2" type="password" value="Password" size="20" maxlength="20">
                  </div></td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF"><div align="center">
                      <input type="submit" name="Submit" value="Connection">
                  </div></td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF"><a href="dsfsd">Mot de pass perdu ?</a> </td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF"><a href="dfsf">Cr&eacute;e un compte</a> </td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF">&nbsp;</td>
                </tr>
                <tr>
                  <td bgcolor="#567596"><span class="Style10">Votre Espace </span></td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF"><a href="cxvcx">- Votre profil </a></td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF"><a href="xcvcx">- Votre recherche </a></td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF"><a href="xcvcx">- Vos messages </a></td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF"><a href="cxvcx">- Vos photos </a></td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF"><a href="contact.php">- Vos ami(e)s</a></td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF"><a href="xcvcx">- Votre journal intime </a></td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF">&nbsp;</td>
                </tr>
                <tr>
                  <td bgcolor="#567596"><span class="Style10">Sommaire</span></td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF"><a href="xcvcx">- Cr&eacute;e un compte </a></td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF"><a href="cxvcx">- Recherche</a></td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF"><a href="cxvx">- Forum </a></td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF"><a href="xcvcx">- Top 10 Hommes</a></td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF"><a href="xcvc">- Top 10 Femmes </a></td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF"><a href="cxv">- Top 10 Journaux</a></td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF"><a href="cxvcx">- Liste des inscri(e)s </a></td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF">&nbsp;</td>
                </tr>
                <tr>
                  <td bgcolor="#567596"><span class="Style10">Votre parole </span></td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF"><a href="xcvcx">- Suggestion </a></td>
                </tr>
                <tr>
                  <td bgcolor="#AFBFCF"><a href="cxvcx">- Contact </a></td>
                </tr>
            </table></td>
            <td width="5">&nbsp;</td>
            <td colspan="2" valign="top"><table width="100%"  border="0" cellspacing="13" cellpadding="1">
                <tr>
                  <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                      <tr bgcolor="#AFBFCF">
                        <td bgcolor="#96ACC2"><div align="center">
                            <p><span class="Style10">::. Information sur le profil de rencontre .:: </span><br>
                            </p>
                        </div></td>
                      </tr>
                      <tr bgcolor="#AFBFCF">
                        <td bgcolor="#AFBFCF">&nbsp;&nbsp;&nbsp;Votre profil sert aux visiteurs inscri(e)s et souhaitant faire des rencontres &agrave; savoir qui vous &eacute;te et ce que vous aimez. Vous pouvez &agrave; pr&eacute;sent g&eacute;rer votre annonce, votre album photo et vous faire connaitre aupr&egrave;s des autres visiteurs. Tout au long de votre visite sur handicaperencontre.fr site de rencontres pour les personnes handicap&eacute;es, vous pourrez &eacute;changer, communiquer et discuter librement et gratuitement. </td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#96ACC2"><div align="center">
                          <p><span class="Style10">::.  <span class="Style11">Liste des inscris </span>.::</span><br>
                          </p>
                      </div></td>
                    </tr>

                  </table></td>
                </tr>
                <tr align="center" bgcolor="#96ACC2">
                  <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                      <tr bgcolor="#AFBFCF">
                        <td bgcolor="#96ACC2"><div align="center">
                            <p><span class="Style10">::. <span class="Style13">Liste des utilisateurs de handicaperencontre.fr site de rencontres pour les personnes handicap&eacute;es  </span>.::</span><br>
                            </p>
                        </div></td>
                      </tr>
                      <tr bgcolor="#AFBFCF">
                        <td bgcolor="#AFBFCF">
                          <div align="left">
                            <table width="100%"  border="0" cellspacing="7" cellpadding="0">
                              <tr>
                    <td width="100%"><div align="center">
                                  <table width="100%"  border="0" cellspacing="10" cellpadding="1">
                           
<?
// couleur du premier
$couleur = "#A4B7CA";
// variable de début et fin


$start = $_GET['start'];	  
$query = "SELECT * FROM user ORDER BY  'pseudo' desc"; 
	
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$fin = $start+10;
$i=$start;
for($i;$i < $fin;$i++) {

	
if($i<$row = mysql_num_rows($r)) {
	
	if (mysql_data_seek($r, $i))  {
	
	$row = mysql_fetch_row($r);
	$pseudo = $row[1];
	$ville = $row[18];
	$departement = $row[17];
	$age = $row[5];
	$annonce = $row[30];
	$annonce = str_replace("$$","'",$annonce);
	//recupere la photo
	$query_photo = "SELECT afficher FROM photo WHERE pseudo='$pseudo'"; 
	$r_photo = mysql_query($query_photo) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	$row_photo = mysql_fetch_row($r_photo);
	$photo = $row_photo[0];
	$photo2=$photo;
	$photo = "./photos/".$pseudo."/".$photo2;
	
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
	
		echo "<tr>
                                      <td bgcolor='#567596'><div align='left'>
                                          <table width='577' height='108' cellpadding='2' cellspacing='1'>
                                            <tr>
                                              <td width='80' rowspan='3' bgcolor='#96ACC2'><a href='liste.php'><img src='$photo' width='90' height='90' onclick=\"MM_openBrWindow('$photo','$pseudo','scrollbars=yes,width=800,height=600')\"></a></td>
                                              <td width='484' height='10' bgcolor='#89ACB6'><strong><a href='profil.php?pseudo_envoi=$pseudo'>$pseudo</a> de <span class='Style10'>$ville </span>dans le <span class='Style10'>$departement <span class='Style13'>, age</span> $age</span></strong></td>
                                            </tr>
                                            <tr>
                                              <td height='69' bgcolor='$couleur'>$annonce_reduit </td>
                                            </tr>
                                            <tr>
                                              <td height='10' bgcolor='#CCCCCC'><div align='center'><span class='Style19'><a href='profil.php?pseudo_envoi=$pseudo'>Voir son profil</a> - <a href='message_ecrire.php?action=post&destinataire=$pseudo'>Ecrire un message</a> - <a href='liste.php?action=ami&pseudo_envoi=$pseudo'>Ajouter aux ami(e)s</a> - <a href='sdfds'>Voir annonce</a> </span></div></td>
                                            </tr>
                                          </table>
                                      </div></td>
                                    </tr>";
		
			  }
			
			  }
			 
			  
			  

	}
	
}

			  
?>
                                    <tr>
                                      <td width="76%"><div align="center">Page : <? 
// création des n° de page 
$query = "SELECT * FROM user ORDER BY  'pseudo' desc"; 
	
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$i=0;
$page = 1;
$nb_ligne = mysql_num_rows($r);
				
				echo "[ - ";
				while ($i< $nb_ligne) {
				echo "<a href='liste.php?start=$i'>$page</a> ";
				echo " - ";
				$page=$page+1;
				$i=$i+10;
				}
	echo "]";
?>				</div></td>
                                    </tr>
                                  </table>
                                </div></td>
                              </tr>
                            </table>
                        </div></td>
                      </tr>
                  </table></td>
                </tr>
                <tr bgcolor="#96ACC2">
                  <td></td>
                </tr>
            </table></td>
          </tr>
          <tr bgcolor="#96ACC2">
            <td colspan="2">&nbsp;</td>
            <td bgcolor="#96ACC2"><div align="center">handicaperencontre.fr rencontre pour pour les personnes handicap&eacute;es - rencontre - Contact : <a href="mailto:ice_de_nice_31@hotmail.fr">icedenice@live.fr </a></div></td>
            <td>&nbsp;</td>
          </tr>
      </table></td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
</body>
</html>
