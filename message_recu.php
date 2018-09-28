<?
require '_bdd.php';
require '_identification.php';
require '_restriction.php';
require 'lignechat.php';require 'stat_message.php';

//Lecture des messages reçu


if ($_GET['action']=="supr") {
	$id=$_GET['id'];
	$query = "DELETE FROM message WHERE id=$id"; 
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
}

if ($_GET['action']=="vider") {
	$query = "DELETE FROM message WHERE destinataire='$pseudo_ident'"; 
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
}

if ($_GET['action']=="masquer") {
	$query = "UPDATE message SET lu='o' WHERE destinataire='$pseudo_ident'"; 
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
}

$etat_check = "";
if ($_GET['action']=="cocher") {
	$etat_check = "checked";
}

if ($_GET['action']=="suprimer") {
$box0 = $_POST['box0'];
$box1 = $_POST['box1'];
$box2 = $_POST['box2'];
$box3 = $_POST['box3'];
$box4 = $_POST['box4'];
$box5 = $_POST['box5'];
$box6 = $_POST['box6'];
$box7 = $_POST['box7'];
$box8 = $_POST['box8'];
$box9 = $_POST['box9'];
$box10 = $_POST['box10'];
$box11 = $_POST['box11'];
$box12 = $_POST['box12'];
$box13 = $_POST['box13'];
$box14 = $_POST['box14'];
$box15 = $_POST['box15'];
$box16 = $_POST['box16'];
$box17 = $_POST['box17'];
$box18 = $_POST['box18'];
$box19 = $_POST['box19'];


		if(!empty($box0)) {
		$query = "DELETE FROM message WHERE id=$box0"; 
		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
		}
		if(!empty($box1)) {
		$query = "DELETE FROM message WHERE id=$box1"; 
		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
		}
		if(!empty($box2)) {
		$query = "DELETE FROM message WHERE id=$box2"; 
		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
		}
		if(!empty($box3)) {
		$query = "DELETE FROM message WHERE id=$box3"; 
		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
		}
		if(!empty($box4)) {
		$query = "DELETE FROM message WHERE id=$box4"; 
		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
		}
		if(!empty($box5)) {
		$query = "DELETE FROM message WHERE id=$box5"; 
		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
		}
		if(!empty($box6)) {
		$query = "DELETE FROM message WHERE id=$box6"; 
		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
		}
		if(!empty($box7)) {
		$query = "DELETE FROM message WHERE id=$box7"; 
		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
		}
		if(!empty($box8)) {
		$query = "DELETE FROM message WHERE id=$box8"; 
		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
		}
		if(!empty($box9)) {
		$query = "DELETE FROM message WHERE id=$box9"; 
		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
		}
		
		
		
		
		
		
		if(!empty($box10)) {
		$query = "DELETE FROM message WHERE id=$box10"; 
		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
		}
		if(!empty($box11)) {
		$query = "DELETE FROM message WHERE id=$box11"; 
		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
		}
		if(!empty($box12)) {
		$query = "DELETE FROM message WHERE id=$box12"; 
		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
		}
		if(!empty($box13)) {
		$query = "DELETE FROM message WHERE id=$box13"; 
		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
		}
		if(!empty($box14)) {
		$query = "DELETE FROM message WHERE id=$box14"; 
		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
		}
		if(!empty($box15)) {
		$query = "DELETE FROM message WHERE id=$box15"; 
		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
		}
		if(!empty($box16)) {
		$query = "DELETE FROM message WHERE id=$box16"; 
		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
		}
		if(!empty($box17)) {
		$query = "DELETE FROM message WHERE id=$box17"; 
		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
		}
		if(!empty($box18)) {
		$query = "DELETE FROM message WHERE id=$box18"; 
		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
		}
		if(!empty($box19)) {
		$query = "DELETE FROM message WHERE id=$box19"; 
		// Execute la requete
		$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
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
	background-color: #FFE8FB;
}
-->
</style>
<link href="vbbcv_message.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Style16 {font-size: 10; }
.Style11 {color: #000000;
	font-weight: bold;
}
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

<form name="form1" method="post" action="message_recu.php?action=suprimer">
  <table width="800"  border="0" align="left" cellpadding="1" cellspacing="0" bgcolor="#000000">
    <tr>
      <td><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#96ACC2">
            <td colspan="5" bgcolor="#FBE7F3"><div align="center" class="Style22"><img src="img/logo.jpg" width="800" height="116" /></div></td>
          </tr>
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
            <td width="160" align="left" valign="top" bgcolor="#FFFFFF"></td>
            <td width="160" align="left" valign="top" bgcolor="#FFFFFF"><table width="160"  border="1" cellpadding="2" cellspacing="0" bordercolor="#FFF2FF">
                <tr>
                  <td bgcolor="#FFFFFF"><div align="center"></div></td>
                </tr>
                <tr>
                  <td bgcolor="#FFDFFF"><div align="left"><span class="Style11">Vos messages </span></div></td>
                </tr>
                <tr>
                  <td valign="top" bgcolor="#FFFFFF"><img src="img/open.gif" width="18" height="15" /> <a href="message_recu.php">Messages re&ccedil;us (<? echo $nb_recu; ?>) </a></td>
                </tr>
                <tr>
                  <td valign="top" bgcolor="#FFFFFF"><img src="img/open.gif" width="18" height="15" /> <a href="message_envoyer.php">Messages envoy&eacute;s (<? echo $nb_envoyer; ?>) </a></td>
                </tr>
                <tr>
                  <td valign="top" bgcolor="#FFFFFF"><img src="img/actionEdit.gif" width="18" height="15" /> <a href="message_ecrire.php">Ecrire un message</a> </td>
                </tr>
                <tr>
                  <td valign="top" bgcolor="#FFFFFF"><img src="img/b_usrlist.png" width="18" height="15" /> <a href="contact.php">Vos contacts </a></td>
                </tr>
                <tr>
                  <td valign="top" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td bgcolor="#FFDFFF"><span class="Style11">Votre Espace </span></td>
                </tr>
                <tr bordercolor="#FFE8FB">
                  <td bgcolor="#FFFFFF"><a href="profil.php?pseudo_envoi=<? echo $pseudo_ident; ?>" class="Style11">- Votre profil </a></td>
                </tr>
                <tr bordercolor="#FFE8FB">
                  <td bgcolor="#FFFFFF"><a href="recherche.php?start=0" class="Style11">- Votre recherche </a></td>
                </tr>
                <tr bordercolor="#FFE8FB">
                  <td bgcolor="#FFFFFF"><a href="message.php" class="Style11">- Vos messages </a></td>
                </tr>
                <tr bordercolor="#FFE8FB">
                  <td bgcolor="#FFFFFF"><a href="photo.php" class="Style11">- Vos photos </a></td>
                </tr>
                <tr bordercolor="#FFE8FB">
                  <td bgcolor="#FFFFFF"><a href="contact.php" class="Style11">- Vos ami(e)s</a></td>
                </tr>
                <tr bordercolor="#FFE8FB">
                  <td bgcolor="#FFFFFF"><a href="annonce_mod.php" class="Style11">- Votre annonce </a></td>
                </tr>
                <tr>
                  <td bgcolor="#FFE8FB">&nbsp;</td>
                </tr>
                <tr>
                  <td bgcolor="#FFFFFF"><a href="index.php"><strong>- Retour Accueil</strong></a> </td>
                </tr>
                
            </table></td>
            <td width="4" bgcolor="#FFDFFF">&nbsp;</td>
            <td width="636" colspan="2" valign="top" bgcolor="#FFFFFF"><br />
              <table width="100%"  border="0" cellspacing="13" cellpadding="0">
                <tr>
                  <td bgcolor="#FFE8FB"><div align="center"><span class="Style11">::. Vos messages re&ccedil;us sur handicaperencontre.fr - rencontre pour les personnes handicap&eacute;es .:: </span></div></td>
                </tr>
                <tr bgcolor="#96ACC2">
                  <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="0">
                      <tr bgcolor="#AFBFCF">
                        <td bgcolor="#C4CEDB"><table width="100%" border="0" cellpadding="0" cellspacing="1">
                            <tr>
                              <td bgcolor="#FFE8FB"><table width="380" height="5" border="1" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="69"><div align="center">
                                        <input name="Submit" type="submit" value="Supprimer" />
                                    </div></td>
                                    <td width="85"><div align="center">
                                        <input name="Submit4" type="submit" onclick="MM_goToURL('parent','message_recu.php?action=cocher');return document.MM_returnValue" value="Tout cocher" />
                                    </div></td>
                                    <td width="92"><div align="center">
                                        <input name="Submit2" type="submit" onclick="MM_goToURL('parent','message_recu.php?action=vider');return document.MM_returnValue" value="Vider la boite" />
                                    </div></td>
                                    <td width="124"><div align="center">
                                        <input name="Submit3" type="submit" onclick="MM_goToURL('parent','message_recu.php?action=masquer');return document.MM_returnValue" value="Masquer comme lu" />
                                    </div></td>
                                  </tr>
                              </table></td>
                            </tr>
                            <tr>
                              <td bgcolor="#CCCCCC"><table width="100%" height="4" border="0" cellpadding="0" cellspacing="0">
                                  <tr>
                                    <td width="4%"><div align="left"></div></td>
                                    <td width="4%"><div align="left"></div></td>
                                    <td width="22%"><div align="center" class="Style16">
                                        <div align="left">Message de : </div>
                                    </div></td>
                                    <td width="63%"><div align="center" class="Style16">
                                        <div align="left">Objet : </div>
                                    </div></td>
                                    <td width="7%"><div align="left"></div></td>
                                  </tr>
                              </table></td>
                            </tr>
                            <?
						 
//lie et affiche les messages
// couleur du premier
$couleur = "#A4B7CA";
// variable de d&eacute;but et fin


if(empty($_GET['start'])) {
	$start = 0;
	}
	else {
	$start = $_GET['start'];
}
	  
$query = "SELECT * FROM message WHERE destinataire='$pseudo_ident' ORDER BY  id DESC"; 
$compt=0;
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$fin = $start+20;
$i=$start;
for($i;$i < $fin;$i++) {

	
if($i<$row = mysql_num_rows($r)) {
	
	if (mysql_data_seek($r, $i))  {
	
	$row = mysql_fetch_row($r);
	$pseudo_expediteur = $row[1];
	$objet = $row[3];
	$lu = $row[7];
	$message_heure = $row[6];
	$id = $row[0];
	$objet_envoi = $objet;
	$objet = str_replace("&sect;&sect;","'",$objet);

	if($lu=="o") {
		$image="<img src='img/actionReview.gif' width='18' height='18'>";
		}
		else {
		$image="<img src='img/Cfpop.gif' width='18' height='18'>";
	}
	//limitation de la taille de l objet
	$t=0;
	$objet_reduit = "";
	for($t;($t < 50 && $t<strlen($objet));$t++) {
	$objet_reduit = $objet_reduit . $objet[$t];
	}
	$objet_reduit = 	$objet_reduit." ...";
	
	if ($row = mysql_num_rows($r)) {
		
		//def couleur
		if (is_integer($i/2)) { $couleur = "#DDE4EC"; } else { $couleur = "#D1DAE4"; }
		
		// place du texte
		echo "	  <tr>
                            <td bgcolor='$couleur'><table width='619' height='26' border='0'>
                              <tr>
                                <td width='20' height='14'><input name='box$compt' type='checkbox' id='box$compt' value='$id' $etat_check></td>
                                <td width='20'>$image</td>
                                <td width='132'><a href='profil.php?pseudo_envoi=$pseudo_expediteur'>$pseudo_expediteur  </a></td>
                                <td width='385'><a href='message_lire.php?objet=$objet_envoi&message_heure=$message_heure'>$objet_reduit </a></td>
                                <td width='40'><div align='center'><a href='message_lire.php?objet=$objet_envoi&message_heure=$message_heure'>- Lire -</a> </div></td>
                              </tr>
                            </table></td>
                          </tr>";
		
			  }
			
			  }
			 
			  
			  

	}

	$compt++;
}
						 

						 
					
                         
						 
						 
?>
                            <tr>
                              <td bgcolor="#D8DFE7"><div align="center"><strong>
                                  <? if (mysql_num_rows($r)==0) { echo "<BR><BR>Pas de message re&ccedil;u ...<BR><BR><BR>"; } ?>
                              </strong></div></td>
                            </tr>
                            <tr>
                              <td bgcolor="#FFF3FF">&nbsp;</td>
                            </tr>
                            <tr>
                              <td bgcolor="#FFF3FF"><div align="center"><strong>Page :
                                <? 
// cr&eacute;ation des n&deg; de page 
$query = "SELECT * FROM message WHERE destinataire='$pseudo_ident' ORDER BY  'id' desc"; 
	
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$i=0;
$page = 1;
$nb_ligne = mysql_num_rows($r);
				
				echo "[ - ";
				while ($i< $nb_ligne) {
				echo "<a href='message_recu.php?start=$i'>$page</a> ";
				echo " - ";
				$page=$page+1;
				$i=$i+20;
				}
	echo "]";
?>
                              </strong></div></td>
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
</form>
  <p>&nbsp;</p>
</body>
</html>
