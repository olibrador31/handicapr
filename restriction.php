<?


?>


<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>vous n avez pas acces à cette page merci de vous identifier rencontre gratuit pour handicapés valides victimes d'avc, ou malades et leurs familles</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
-->
</style>
<link href="vbbcv.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Style12 {font-size: 16px}
.Style23 {	color: #000000;
	font-weight: bold;
}
.Style18 {color: #CCCCCC; font-weight: bold; }
.Style24 {
	font-size: 12px;
	font-weight: bold;
}
.Style25 {
	font-size: 18px;
	color: #0000FF;
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
<table width="800"  border="0" align="left" cellpadding="1" cellspacing="0" bgcolor="#000000">
  <tr>
    <td><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
      <tr bgcolor="#96ACC2">
        <td colspan="4" bgcolor="#FBE7F3"><div align="center" class="Style12"><a href="http://www.handicaperencontre.fr"><img src="img/logo.jpg" width="800" height="116" border="0"></a></div></td>
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
        <td width="143" align="left" valign="top" bgcolor="#FFFFFF"><form action="index.php" method="post" name="form">
          '<table width="100%"  border="1" cellpadding="1" cellspacing="0">
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
          </table>
        </form></td>
        <td width="5" bgcolor="#FFDFFF">&nbsp;</td>
        <td colspan="2" valign="top" bgcolor="#FFFFFF"><table width="605" height="203"  border="0" align="center" cellpadding="1" cellspacing="13">
          <tr>
            <td width="577" height="177" bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                <tr bgcolor="#AFBFCF">
                  <td bgcolor="#FFDFFF"><div align="center">
                      <p class="Style23">::. Identifiez vous ! .:: <br />
                          </p>
                  </div></td>
                </tr>
                <tr bgcolor="#AFBFCF">
                  <td bgcolor="#FDF0FA"><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                        <td colspan="3"><div align="center"><a href="inscription1.php?id=1"><br>
                            Vous devez vous inscrire pour acceder &agrave; cette page ! <br>
                                <br>
                                  <br>
                                <img src="img/Bouton/ind.png" alt="Pour faire des rencontres gratuites" name="inscription" width="317" height="50" border="0" id="inscription"></a></div></td>
                      </tr>
                      <tr>
                        <td width="18%"><img src="img/smiley113.png" alt="Pour faire des rencontres gratuites" width="80" height="80"></td>
                        <td width="54%"><strong>handicaperencontre.fr rencontre pour pour les personnes handicap&eacute;es,  rencontre sur internet<br>
                            <br>
                            <span class="Style29 Style25">ENTIEREMENT GRATUIT !</span><br>
                            <br>
                            <a href="inscription1.php?id=1">Inscrivez vous</a> et chatez avec des hommes et des femmes de toutes la France <span class="Style30">GRATUITEMENT</span> !</strong></td>
                        <td width="28%" valign="top">&nbsp;&nbsp;&nbsp;&nbsp;
                            <div align="center"><br>
                            </div></td>
                      </tr>
                    </table>
                    </td>
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
<p>&nbsp;</p>
</body>
</html>
