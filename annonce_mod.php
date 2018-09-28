<?

require '_bdd.php';

require '_identification.php';
require '_restriction.php';
require 'lignechat.php';//récupération de l'annonce
$sess=session_id();
$query = "SELECT pseudo,annonce FROM user WHERE session='$sess'"; 
$r = mysql_query($query) or die ("votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$row = mysql_fetch_row($r);
$annonce = $row[1];
$pseudo_envoi = $row[0];


//modifier l annonce
if ($_GET['action']=="modifier") {
	$annonce=$_POST['annonce'];
	$sess=session_id();
	$annonce = str_replace("'","§§",$annonce);
	$query = "UPDATE user SET annonce='$annonce' WHERE session='$sess'"; 
	// Execute la requete
	$r = mysql_query($query) or die ("votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");

	$req = "'profil.php"."?pseudo_envoi=".$pseudo_envoi."'";
    echo "<script type='text/javascript'>	document.location.replace($req); </script> ";
}					




					?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Annonce : handicaperencontre.fr rencontre pour pour les personnes handicapés et valides victimes avc ou malades etc avec chat forum, profil vérifié avec chat forum, profil vérifié </title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META lang=fr-ca 
content="rencontre entièrement gratuite avec des hommes et femmes de toutes les régions de France, avec chat gratuit, coquine ou amicale
" 
name=description>
<META lang=fr-ca 
content=" rencontre, rencontres, rencontres sur internet, rencontre gratuite, site de rencontre gratuit, rencontres gratuites, gratuite, gratuit, sexe, chat, célibataire, cherche homme, cherche femme, amour, amitié, caline, coquine, amicale, amant, flirt, matrimonial, internet, discutions, partenaire, france, région, region" 
name=keywords>
<META http-equiv=content-language content=fr-ca>
<META http-equiv=content-style-Type content=text/css>
<META lang=fr-ca content="rencontre gratuite par Olivier RIMBERT" 
name=Author>
<META http-equiv=Content-Language content=fr-ca>
<META content="7 days" name=revisit-after>
<META content=never name=expires>
<META content=all name=audience>
<META 
content="rencontre, gratuit, chat, homme, femme, sexe" 
name=classification>
<META lang=fr-ca content="rencontre gratuite" name=subject>
<META content=fr-ca name=language>
<META content="handicaperencontre.fr rencontre pour pour les personnes handicapés et valides victimes avc ou malades etc avec chat forum, profil vérifié avec chat forum, profil vérifié " name=title>
<style type="text/css">
<!--
body {
	background-color: #FFEFFA;
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
.Style13 {color: #000000}
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
</script><table width="800"  border="0" align="left" cellpadding="1" cellspacing="0" bgcolor="#000000">
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
            <td width="143" align="left" valign="top" bgcolor="#FFFFFF"><form action="index.php" method="post" name="form">
          '<table width="100%"  border="1" cellpadding="1" cellspacing="0">
            <tr>
              <td bgcolor="#FFFFFF"><div align="center"></div></td>
            </tr>
            <tr>
              <td bgcolor="#FFDFFF" class="Style17"><p><img src="logo/inscription.png" width="145" height="21"></p>                </td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><div align="center" class="Style17">
                  <input name="pseudo_ident" type="text" id="pseudo_ident" value="pseudonyme" size="20" maxlength="20">
              </div></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><div align="center" class="Style17">
                  <input name="pass_ident" type="password" id="pass_ident" value="password" size="20" maxlength="20">
              </div></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><div align="center" class="Style17">
                  <input type="submit" name="Submit" value="Connection">
                  <br>
                  <input name="ident" type="hidden" id="ident" value="oui">
              </div></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><span class="Style17">
                <input name="chat_bouton23" type="submit" id="chat_bouton23" onClick="MM_goToURL('parent','deco.php');return document.MM_returnValue" value="DECONNECTION">
              </span></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="mdp.php"></a><a href="chat.php" class="Style12">
                <input name="chat_bouton32" type="submit" id="chat_bouton32" onClick="MM_goToURL('parent','mdp.php');return document.MM_returnValue" value="Mot de pass oubli&eacute;">
              </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="plan.php"><strong>Plan</strong></a></td>
            </tr>
            <tr>
              <td bgcolor="#FFDFFF" class="Style17"><img src="img/MINIMEMBRE.GIF" width="16" height="12"> Votre Espace </td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="photo.php" class="Style17">- </a><a href="chat.php" class="Style12">
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
                <input name="chat_bouton2423" type="submit" id="chat_bouton2423" onClick="MM_goToURL('parent','annonce_mod.php');return document.MM_returnValue" value="Modifier vos preferences">
                <input name="chat_bouton24" type="submit" id="chat_bouton24" onClick="MM_goToURL('parent','contact.php');return document.MM_returnValue" value="Gerer vos amis">
              </a></td>
            </tr>
            
            <tr>
              <td bgcolor="#FFDFFF" class="Style17"><img src="img/B_TBLOPS.PNG" alt="Sommaire" width="16" height="12"> Jeux </td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="top_femme.php" class="Style17"><strong>
                <input name="submit2" type="submit" onClick="MM_goToURL('parent','phpmine.php');return document.MM_returnValue" value="D&eacute;mineur" la="la" partie="partie" />
              </strong></a></td>
            </tr>
            <tr>
              <td bgcolor="#FFDFFF" class="Style17"><img src="img/MAIL.GIF" alt="Votre parole" width="14" height="11"> Votre parole </td>
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
            <td colspan="2" valign="top" bgcolor="#FFFFFF"><form name="form1" method="post" action="annonce_mod.php?action=modifier">
              <table width="100%"  border="0" cellspacing="13" cellpadding="1">
                <tr>
                  <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                      <tr bgcolor="#AFBFCF">
                        <td bgcolor="#FFDFFF"><div align="center">
                            <p class="Style11">::. Aide : profil de rencontre .:: <br />
                            </p>
                        </div></td>
                      </tr>
                      <tr bgcolor="#AFBFCF">
                        <td bgcolor="#FFFFFF">Votre annonce est le texte qui apparaitra lors des recherches des membres. Ne n&eacute;gligez donc pas cette partie et soyez le plus pr&eacute;cis possible sur qui vous &ecirc;tes et ce que vous recherchez. Bonne chance :) </td>
                      </tr>
                  </table></td>
                </tr>
                <tr>
                  <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                      <tr bgcolor="#AFBFCF">
                        <td bgcolor="#FFDFFF"><div align="center">
                            <p class="Style13">::. <strong>Votre annonce </strong>.::<br />
                            </p>
                        </div></td>
                      </tr>
                  </table></td>
                </tr>
                <tr align="center" bgcolor="#96ACC2">
                  <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                      <tr bgcolor="#AFBFCF">
                        <td bgcolor="#FFDFFF"><div align="center">
                            <p class="Style13">::. Voir et modifier votre annonce .::<br />
                            </p>
                        </div></td>
                      </tr>
                      <tr bgcolor="#AFBFCF">
                        <td bgcolor="#FFFFFF"><div align="left">
                            <table width="100%"  border="0" cellspacing="7" cellpadding="0">
                              <tr>
                                <td width="100%"><div align="center">
                                    <table width="100%"  border="0" cellspacing="10" cellpadding="1">
                                      <tr>
                                        <td width="76%"><div align="center">
                                            <textarea name="annonce" cols="90" rows="10" id="annonce"><? echo $annonce; ?></textarea>
                                        </div></td>
                                      </tr>
                                      <tr>
                                        <td><div align="center">
                                            <input type="submit" name="Submit2" value="Modifier votre annonce" />
                                        </div></td>
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
              </table>
                        </form>
              <br /></td>
          </tr>
          <tr bgcolor="#96ACC2">
            <td colspan="4" bgcolor="#FFF0FF"><div align="center"><img src="img/bas.jpg" width="800" height="53" /></div></td>
          </tr>
      </table></td>
    </tr>
  </table>

<p>&nbsp;</p>
</body>
</html>
