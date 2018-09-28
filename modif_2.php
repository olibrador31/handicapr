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
	$description=$_POST['description'];
	$aime=$_POST['aime'];
	$deteste=$_POST['deteste'];
	$cherche=$_POST['recherche'];
	$citation=$_POST['citation'];
	
	$citation = str_replace("'","§§",$citation);
	$aime = str_replace("'","§§",$aime);
	$deteste = str_replace("'","§§",$deteste);
	$description = str_replace("'","§§",$description);
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
	
	$req = "'votre_profil.php'";
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
<title>rencontre gratuit pour handicapés valides victimes d'avc, ou malades et leurs familles</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	background-color: #EEDEE9;
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
<form name="form1" method="post" action="modif_2.php">
  <table width="800"  border="0" align="left" cellpadding="1" cellspacing="0" bgcolor="#000000">
    <tr>
      <td><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
         <tr bgcolor="#96ACC2"><td colspan="5" bgcolor="#FBE7F3"><div align="center"><img src="img/logo.jpg" width="800" height="116" border="0"></td></tr>
          <tr bgcolor="#567596">
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
            <td width="143" align="left" valign="top" bgcolor="#FFFFFF">'<table width="100%"  border="1" cellpadding="1" cellspacing="0">
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
          </table></td>
            <td width="5" bgcolor="#FFDFFF">&nbsp;</td>
            <td colspan="2" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="13" cellpadding="1">
              <tr align="center" bgcolor="#96ACC2">
                <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFDFFF"><div align="center">
                          <p><span class="Style11">::. Vos centres d'int&eacute;r&ecirc;t.::</span><br />
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
                                  <input type="submit" name="Submit2" value="Valider" />
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
</form>
<p>&nbsp;</p>
</body>
</html>
