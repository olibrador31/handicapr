<?

require '_bdd.php';
require '_identification.php';
require 'lignechat.php';


// affichage des femme et homme de la page
$query = "SELECT * FROM user WHERE sexe='Femme' AND photo='1' ORDER BY id DESC LIMIT 0, 5"; 
	
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
for($i=0;$i < 5;$i++) {
	
if (@mysql_data_seek($r, $i))  {
	
$row = mysql_fetch_row($r);
$pseudo[$i] = $row[1];
$departement[$i] = $row[17];
$age[$i] = $row[5];
//recupere la photo
$query_photo = "SELECT afficher FROM photo WHERE pseudo='$pseudo[$i]'"; 
$r_photo = mysql_query($query_photo) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$row_photo = mysql_fetch_row($r_photo);
$photo[$i] = $row_photo[0];
if ($photo[$i]=="") { $photo[$i]="img/20000503113333_54143.jpg"; }
else {
$photo2[$i]=$photo[$i];
$photo[$i] = "./photos/".$pseudo[$i]."/".$photo2[$i];
}
}
}
$query = "SELECT * FROM user WHERE sexe='Homme' AND photo='1' ORDER BY  id DESC LIMIT 0, 5"; 
	
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
for($i=0;$i < 5;$i++) {
	
if (@mysql_data_seek($r, $i))  {
	
$row = mysql_fetch_row($r);
$pseudo_h[$i] = $row[1];
$departement_h[$i] = $row[17];
$age_h[$i] = $row[5];

//recupere la photo
$query_photo = "SELECT afficher FROM photo WHERE pseudo='$pseudo_h[$i]'"; 
$r_photo = mysql_query($query_photo) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$row_photo = mysql_fetch_row($r_photo);
$photo_h[$i] = $row_photo[0];
if (!$photo_h[$i]) { $photo_h[$i]="img/20000503113333_54143.jpg"; }
else {
$photo2_h[$i]=$photo_h[$i];
$photo_h[$i] = "./photos/".$pseudo_h[$i]."/".$photo2_h[$i];
}
}
}	
	
	
?>


<meta name="verify-v1" content="6smf/kDkvptevVkao0kZ4L2f+H1r025m0+8HFPMB1N0=" />


<meta charset="utf-8">
<meta charset="utf-8">
<title>handicaperencontre.fr Site de rencontre 100% gratuit pour rencontres sérieuses près de chez vous rejoignez des milliers de célibataires hommes femmes en france</title>
<meta name="description" content="handicaperencontre Site de rencontre 100% gratuit et sérieux, rencontre amoureuse de célibataires en france, consultez des annonces de rencontres sérieuses et gratuites profils controlés de célibataires sérieux et motivés hommes femmes de france près de chez vous, trouvez l'amour ou l'ame soeur"/>
<meta name="keywords" content="handicaperencontre site de rencontre sur internet, chat, chat gratuit, chat rencontre, 100% gratuit, site de rencontre, rencontre gratuite, gratuit,rencontres, rencontre sérieuse, site de rencontre gratuit, sérieux, célibataire, trouver l'amour, hommes, femmes, annonce rencontre, 100, qualité, trouver l'amour, ame soeur, rencontres amoureuses, profils vérifiés, profils sérieux, site de rencontre gratuit, site de rencontre en france, réseau social de l'amour, amour, amitier, rencontre, durable, sérieux, sérieuses, couple, internet, chat, chat rencontre, profils sérieux, rencontre en france, relation durable, rencontres pour relations durables, heureux, heureuse, histoire amour, rencontrer homme, rencontrer femme,rencontrer hommes, rencontrer femmes, rencontrer ame soeur, trouver l'aamour, près de chez vous, pres de chez vous, en france, france, photos, photo, photos femmes, photos hommes, profils sérieux, profils vérifiés, rencontrer, trouver, trouver l'amour, trouver des amis"/> 
<meta name="robots" content="index,follow">
<meta name="identifier-url" content="http://www.handicaperencontre.fr/>
<meta name="copyright" content="olivier rimbert">
<meta name="verify-v1" content="6smf/kDkvptevVkao0kZ4L2f+H1r025m0+8HFPMB1N0=" />
<meta property="og:title" content="handicaperencontre.fr Site de rencontre 100% gratuit pour rencontres sérieuses près de chez vous rejoignez des milliers de célibataires hommes femmes en france"/>
<meta property="og:description" content="handicaperencontre Site de rencontre 100% gratuit et sérieux, rencontre amoureuse de célibataires en france, consultez des annonces de rencontres sérieuses et gratuites profils controlés de célibataires sérieux et motivés hommes femmes de france près de chez vous, trouvez l'amour ou l'ame soeur"/>
<meta property="og:image" content="http://www.handicaperencontre.fr/logo/logo.jpg"/>
<meta name="copyright" content="olivier rimbert">
<meta name="verify-v1" content="6smf/kDkvptevVkao0kZ4L2f+H1r025m0+8HFPMB1N0=" />
<meta property="og:title" content=" handicaperencontre.fr Site de rencontre 100% gratuit pour rencontres sérieuses près de chez vous rejoignez des milliers de célibataires hommes femmes en france"/>
<meta property="og:description" content="handicaperencontre Site de rencontre 100% gratuit et sérieux, rencontre amoureuse de célibataires en france, consultez des annonces de rencontres sérieuses et gratuites profils controlés de célibataires sérieux et motivés hommes femmes de france près de chez vous, trouvez l'amour ou l'ame soeur"/>
<meta property="og:image" content="http://www.handicaperencontre.fr/logo/logo.jpg"/>
<style type="text/css">
<!--

body {
	background-color: #FFF0FF;
}
-->
</style>
<link href="vbbcv.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Style12 {font-size: 16px}
#Layer1 {
	position:absolute;
	left:38px;
	top:493px;
	width:49px;
	height:25px;
	z-index:1;
}
.Style17 {color: #000000; font-weight: bold; }
.Style18 {color: #CCCCCC; font-weight: bold; }
#Layer2 {
	position:absolute;
	left:234px;
	top:154px;
	width:469px;
	height:20px;
	z-index:2;
}
.Style27 {font-size: 9px}
.style32 {
	font-size: 36px;
	font-weight: bold;
	color: #0000CC;
}
.Style33 {
	font-size: 14;
	font-weight: bold;
}
.Style34 {font-size: 14px; font-weight: bold; color: #0000CC; }
.Style39 {color: #FFFFFF; font-weight: bold; font-size: 18px; }
.style41 {font-size: 12px; font-weight: bold; }
.style42 {
	font-size: 16px;
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
<meta name="google-site-verification" content="nXijqP8TxHkBdTYVJjisYhWfH0a3pT3CADjGhZhJ6HU" />
<body><td colspan="5" bgcolor="#FBE7F3"> 

 
        </div>
        <span class="style41">
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 728x90 banière1 -->

<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
</span><a href="PRESENTATION EMISSION.docx"> <br>
<br>
</a></td>
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 728x90 banière1 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-1493739445870732"
     data-ad-slot="7527634302"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<table width="800"  border="0" align="left" cellpadding="1" cellspacing="0" bgcolor="#000000">
  <tr>
    <td><table width="100%" height="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
      <tr bgcolor="#96ACC2">
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
          <strong><? if($pass_reel==$pass_ident and !empty($pass_ident) ) echo"<a href='inscription2.php'>modifier Votre profil---</a><a href='supr.php'>supprimer votre profil</a>";?>
          <img src="img/B_USRLIST.PNG" width="16" height="16">
          <? if($erreur_ident=="") { echo $message_acceuil; } else { echo $erreur_ident; } ?>
          </strong> </strong><a href="http://www.handicaperencontre.fr/"> <br>
        </div></td>
      </tr>
      <tr bgcolor="#567596">
      <tr bgcolor="#96ACC2">
        <td width="143" align="left" valign="top" bgcolor="#FFF0FF"><form action="indexident.php" method="post" name="form">
          <table width="100%"  border="1" cellpadding="1" cellspacing="0">
            <tr>
              <td bgcolor="#CCCCFF" class="Style17"><p><img src="logo/inscription.png" width="145" height="21"></p></td>
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
              <td bgcolor="#FFFFFF"><a href="chat.php" class="Style12">
                <input name="chat_bouton322" type="submit" id="chat_bouton322" onClick="MM_goToURL('parent','supr.php');return document.MM_returnValue" value="supprimer votre compte">
              </a></td>
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
                <input name="chat_bouton2422" type="submit" id="chat_bouton2422" onClick="MM_goToURL('parent','photo.php');return document.MM_returnValue" value="Gerer vos photos">
              </a><a href="photo.php" class="Style17"> </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="chat.php" class="Style12">
                <input name="chat_bouton2422" type="submit" id="chat_bouton24223" onClick="MM_goToURL('parent','modif_2.php');return document.MM_returnValue" value="Modifier Vos centre d'int&eacute;r&ecirc;t">
              </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="chat.php" class="Style12">
                <input name="chat_bouton2423" type="submit" id="chat_bouton2423" onClick="MM_goToURL('parent','modif_1.php');return document.MM_returnValue" value="Modifier votre description">
              </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="chat.php" class="Style12">
                <input name="chat_bouton2422" type="submit" id="chat_bouton24223" onClick="MM_goToURL('parent','annonce_mod.php');return document.MM_returnValue" value="Modifier votre annonce">
              </a></td>
            </tr>
            <tr>
              <td bgcolor="#FFFFFF"><a href="chat.php" class="Style12">
                <input name="chat_bouton24" type="submit" id="chat_bouton24" onClick="MM_goToURL('parent','contact.php');return document.MM_returnValue" value="Gerer vos amis">
              </a></td>
            </tr>
            
            <tr>
              <td bgcolor="#CCCCFF" class="Style17"><img src="img/B_TBLOPS.PNG" alt="Sommaire" width="16" height="12"> Jeux </td>
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
        <td colspan="2" valign="top" bgcolor="#FFFFFF"><table width="100%" height="100%"  border="0" cellpadding="1" cellspacing="1">
          <tr>
            <td bgcolor="#FFFFFF"><table width="100%" height="100%"  border="0" cellpadding="1" cellspacing="0">
              <tr>
                <td width="244" height="193" valign="top" nowrap background="logo/couple.jpg" bgcolor="#FFCCFF">k
                  <form action="inscription1.php" method="post" name="formins" id="formins">
                            <table width="368"  border="0" cellpadding="0" cellspacing="7">
                              <tr>
                                <td><img src="logo/inscription1.png" width="317" height="40"></td>
                              </tr>
                              <tr>
                                <td width="347"><div align="center" class="Style39">
                                    <div align="left">Pseudonyme*:
                                      <input name="pseudo" type="text" id="pseudo" size="20" maxlength="20" />
                                      &nbsp;&nbsp;
                                      <input name="ins" type="hidden" id="ins" value="oui" />
                                    </div>
                                </div></td>
                              </tr>
                              <tr>
                                <td><div align="center" class="Style39">
                                    <div align="left">Mot de passe* &nbsp;:
                                      <input name="pass" type="password" id="pass" size="20" maxlength="20" />
                                    </div>
                                </div></td>
                              </tr>
                              <tr>
                                <td><div align="center" class="Style39">
                                    <div align="left">Confirmer pass * &nbsp;:
                                      <input name="confirm" type="password" id="confirm" size="20" maxlength="20" />
                                    </div>
                                </div></td>
                              </tr>
                              <tr>
                                <td><div align="center" class="Style39">
                                    <div align="left">Adresse Mail* :
                                      <input name="mail" type="text" id="mail" size="20" maxlength="70" />
                                      &nbsp;&nbsp;&nbsp;&nbsp;</div>
                                </div></td>
                              </tr>
                              <tr>
                                <td><div align="left" class="Style39">
                                    <div align="left">Je d&eacute;clare sur l'honneur &eacute;tre
                                      
                                      majeur*:
                                      <input name="maj" type="checkbox" id="maj" value="1">
                                    </div>
                                </div></td>
                              </tr>
                              <tr>
                                <td><div align="center">
                                    <input type="submit" name="Submit2" value="Inscription">
                                </div></td>
                              </tr>
                            </table>
                  </form></td>
              </tr>
            </table></td>
          </tr>
          <tr bgcolor="#567596">
            <td bgcolor="#FFF0FF"><table width="100%" height="100%"  border="1" cellpadding="1" cellspacing="0">
              <tr bgcolor="#AFBFCF">
                <td height="1" colspan="5" bgcolor="#FFDFFF"><div align="center"><span class="Style34">Elles nous ont rejoins</span></div></td>
              </tr>
              <tr bgcolor="#AFBFCF">
                <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="1">
                  <tr>
                    <td><div align="center"><img src="<? echo $photo[0]; ?>" width="90" height="120"></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><a href="profil.php?pseudo_envoi=<? echo $pseudo[0]; ?>"><strong><? echo $pseudo[0]; ?></strong></a></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><? echo $age[0]; ?> ans </div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><? echo $departement[0]; ?></div></td>
                  </tr>
                </table></td>
                <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="1">
                  <tr>
                    <td><div align="center"><img src="<? echo $photo[1]; ?>" width="90" height="120"></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><a href="profil.php?pseudo_envoi=<? echo $pseudo[1]; ?>"><strong><? echo $pseudo[1]; ?></strong></a></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><? echo $age[1]; ?> ans </div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><? echo $departement[1]; ?></div></td>
                  </tr>
                </table></td>
                <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="1">
                  <tr>
                    <td><div align="center"><img src="<? echo $photo[2]; ?>" width="90" height="120"></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><a href="profil.php?pseudo_envoi=<? echo $pseudo[2]; ?>"><strong><? echo $pseudo[2]; ?></strong></a></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><? echo $age[2]; ?> ans </div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><? echo $departement[2]; ?></div></td>
                  </tr>
                </table></td>
                <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="1">
                  <tr>
                    <td><div align="center"><img src="<? echo $photo[3]; ?>" width="90" height="120"></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><a href="profil.php?pseudo_envoi=<? echo $pseudo[3]; ?>"><strong><? echo $pseudo[3]; ?></strong></a></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><? echo $age[3]; ?> ans </div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><? echo $departement[3]; ?></div></td>
                  </tr>
                </table></td>
                <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="1">
                  <tr>
                    <td><div align="center"><img src="<? echo $photo[4]; ?>" width="90" height="120"></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><a href="profil.php?pseudo_envoi=<? echo $pseudo[4]; ?>"><strong><? echo $pseudo[4]; ?></strong></a></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><? echo $age[4]; ?> ans </div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><? echo $departement[4]; ?></div></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr bgcolor="#567596">
            <td bgcolor="#FFFFFF"><table width="100%" height="100%"  border="1" cellpadding="1" cellspacing="0">
              <tr bgcolor="#AFBFCF">
                <td colspan="5" bgcolor="#FFDFFF"><div align="center"><span class="Style34">Ils nous ont rejoins</span></div></td>
              </tr>
              <tr bgcolor="#AFBFCF">
                <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="1">
                  <tr>
                    <td><div align="center"><img src="<? echo $photo_h[0]; ?>" width="90" height="120"></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><a href="profil.php?pseudo_envoi=<? echo $pseudo_h[0]; ?>"><strong><? echo $pseudo_h[0]; ?></strong></a></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><? echo $age_h[0]; ?> ans </div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><? echo $departement_h[0]; ?></div></td>
                  </tr>
                </table></td>
                <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="1">
                  <tr>
                    <td><div align="center"><img src="<? echo $photo_h[1]; ?>" width="90" height="120"></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><a href="profil.php?pseudo_envoi=<? echo $pseudo_h[1]; ?>"><strong><? echo $pseudo_h[1]; ?></strong></a></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><? echo $age_h[1]; ?> ans </div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><? echo $departement_h[1]; ?></div></td>
                  </tr>
                </table></td>
                <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="1">
                  <tr>
                    <td><div align="center"><img src="<? echo $photo_h[2]; ?>" width="90" height="120"></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><a href="profil.php?pseudo_envoi=<? echo $pseudo_h[2]; ?>"><strong><? echo $pseudo_h[2]; ?></strong></a></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><? echo $age_h[2]; ?> ans </div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><? echo $departement_h[2]; ?></div></td>
                  </tr>
                </table></td>
                <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="1">
                  <tr>
                    <td><div align="center"><img src="<? echo $photo_h[3]; ?>" width="90" height="120"></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><a href="profil.php?pseudo_envoi=<? echo $pseudo_h[3]; ?>"><strong><? echo $pseudo_h[3]; ?></strong></a></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><? echo $age_h[3]; ?> ans </div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><? echo $departement_h[3]; ?></div></td>
                  </tr>
                </table></td>
                <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="1">
                  <tr>
                    <td><div align="center"><img src="<? echo $photo_h[4]; ?>" width="90" height="120"></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><a href="profil.php?pseudo_envoi=<? echo $pseudo_h[4]; ?>"><strong><? echo $pseudo_h[4]; ?></strong></a></div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><? echo $age_h[4]; ?> ans </div></td>
                  </tr>
                  <tr>
                    <td><div align="center"><? echo $departement_h[4]; ?></div></td>
                  </tr>
                </table></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td><input name="yeux" type="hidden" id="yeux" value="x">
                    <input name="cheveux" type="hidden" id="cheveux" value="x">
                    <input name="style" type="hidden" id="style" value="x">
                    <input name="silouhaite" type="hidden" id="silouhaite" value="x">
                    <input name="profession" type="hidden" id="profession" value="x">
                    <input name="fumeur" type="hidden" id="fumeur" value="x">
                    <input name="esprit" type="hidden" id="esprit" value="x"> <span class="style42">Webmaster RIMBERT Olivier </span></td>
            </tr>
        </table>
              </form></td>
      </tr>
      <tr bgcolor="#96ACC2">
        <td height="64" colspan="5" bgcolor="#FFF0FF"><div align="center"><img src="img/bas.jpg" width="800" height="53"></div></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>
  <script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
  </script>
</p>

</p>
<h1 align="left">&nbsp;</h1>
<h1 align="left">&nbsp;</h1>
<h1 align="left">&nbsp;</h1>
<h1 align="left">&nbsp;</h1>
<h1 align="left">&nbsp;</h1>
<h1 align="left">&nbsp;</h1>
<h1 align="left">&nbsp;</h1>
<h1 align="left">&nbsp;</h1>
<h1 align="left">&nbsp;</h1>
<h1 align="left">&nbsp;</h1>
<h1 align="left">&nbsp;</h1>
<h1 align="left">&nbsp;</h1>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<p align="left">&nbsp;</p>
<h1 align="left">&nbsp;</h1>
<h1 align="left">&nbsp;</h1>
<p align="left">&nbsp;</p>
<p align="left"><a href="http://referencement-naturel.page-internet.net/" title="page-internet.net">formation au referencement</a> - <a href="http://seogratuit.page-internet.net/" title="page-internet.net">annuaires gratuits référencement</a> -   <a href="http://www.marinapizza.fr" title="marinapizza.fr">pizza vitry</a> - <a href="http://gratuit.yes-messengers.eu/cougar-messenger.html" title="gratuit.yes-messengers.eu/cougar-messenger.html">cougar site gratuit</a>&nbsp;</p>
<a href="http://referencement-seo.page-internet.net/" title="page-internet.net">referencement lille</a> - <a href="http://refrapide-gratuit.page-internet.net/" title="page-internet.net">site de referencement gratuit</a> - <a href="http://petite-annonce.vivaprix.com" title="petite-annonce.vivaprix.com">topannonce</a> - <a href="http://tvlivedirect.vivaprix.com" title="tvdirectlive.vivaprix.com">tv en ligne</a> - <a href="http://www2.yes-messengers.eu" title="yes-messengers.eu">inscription yes messenger</a>
<h1 align="left">&nbsp;</h1>
<h1 align="left">&nbsp;</h1>
<h1 align="left">&nbsp;</h1>
<h1 align="left">handicaperencontre Site de rencontre 100% gratuit et s&eacute;rieux, rencontre amoureuse de c&eacute;libataires en france, consultez des annonces de rencontres s&eacute;rieuses et gratuites profils control&eacute;s de c&eacute;libataires s&eacute;rieux et motiv&eacute;s hommes femmes de france pr&egrave;s de chez vous, trouvez l'amour ou l'ame soeur sur handicaperencontre</h1>
<h2 align="left">site de rencontre gratuit pour personnes motivés a trouver l amour l ame soeur ou juste partager des passions</h2>
<h3 align="left">rencontres gratuites site de rencontre entierement gratuit  au service des gens, inscrivez vous vite et ne soyez plus jamais seul ! </h3>
<h4 align="left">site de rencontre totalement gratuit pour célibataires qui cherche l'amour la passion l'ame soeur des amis ou amies</h4>
<h5 align="left">site pour rencontrer l'&acirc;me soeur ou l'amour avec un homme ou une femme en france </h5>
<h6 align="left">le r&eacute;seau social de la rencontre entre hommes et femme qui cherchent l amour l amiti&eacute; ou une relation durable </h6>
<p align="left" class="style32"> handicaperencontre.fr</p>
<p align="left"><span class="Style12"><strong>rencontres gratuites</strong> </span><span class="Style27"><span class="Style12"><strong>site de rencontre  gratuit entre hommes et femmes de france qui cherchent l amour ou l ame soeur </strong></span></span></p>
<p align="left" class="Style12"><strong>Attention des filles g&eacute;n&eacute;ralement donnent leur adresse MSN sur le site cela est g&eacute;n&eacute;ralement des tentatives de piratages ne les ajoutez pas Merci </strong></p>
<p align="left" class="Style33">Attention : tout(e) utilisateur(trice) dont les textes sont &agrave; caract&egrave;re raciste ou offensant, ainsi que pr&eacute;sentant une annonce v&eacute;nale (prostitution) verra son compte supprim&eacute; et son adresse IP mise sur liste noire: il sera alors d&eacute;finitivement impossible 
<p align="left" class="Style33">de se r&eacute;inscire sur le site. Si vous rencontrez une annonce ou  un(e) utilisateur(trice)  incorrect(e), vous pouvez pr&eacute;venir le webmaster &agrave; l'adresse suivante: <a href="mailto:icedenice@live.fr">icedenice@live.fr</a>
<p align="left" class="Style33"><table bordercolor="#0033CC" cellpadding="2" cellspacing="0" border="1" bgcolor="#FFFFFF"><tr><td align="center"><a style="color:#0033CC; font-family:Verdana, Arial, Helvetica, sans-serif; font-size:9px" href="http://www.referencement-site-internet-eva.com/competences_referencement/referencement_aux_resultats.html" name="positionnement_garanti-referencement_garanti"><img src="http://www.referencement-site-internet-eva.com/liens/logo-eva.gif" alt="positionnement garanti, referencement garanti..." title="positionnement garanti, referencement garanti..." name="positionnement_garanti-referencement_garanti" width="100" height="62" border="0"><br>positionnement garanti</a></td></tr></table><a href="http://www.referencementgratuit.fr" target="_blank"><img src="http://www.referencementgratuit.fr/refgratuit-88x15.gif" alt="Referencement" border="0"></a><A ID='hftyi'  TARGET="_Fenetre"  class='uofjxm'  HREF='http://www.1-referencement.com/'  TITLE="" ><img src="http://www.1-referencement.com/images/label.png" border="0" width="120" height="103" alt="Référencement Gratuit"></A><br>
</body>
<a href="http://www.xiti.com/xiti.asp?s=419176" title="WebAnalytics" target="_top">
<script type="text/javascript">
<!--
Xt_param = 's=419176&p=http://www.handicaperencontre.fr/';
try {Xt_r = top.document.referrer;}
catch(e) {Xt_r = document.referrer; }
Xt_h = new Date();
Xt_i = '<img width="39" height="25" border="0" alt="" ';
Xt_i += 'src="http://logv10.xiti.com/hit.xiti?'+Xt_param;
Xt_i += '&hl='+Xt_h.getHours()+'x'+Xt_h.getMinutes()+'x'+Xt_h.getSeconds();
if(parseFloat(navigator.appVersion)>=4)
{Xt_s=screen;Xt_i+='&r='+Xt_s.width+'x'+Xt_s.height+'x'+Xt_s.pixelDepth+'x'+Xt_s.colorDepth;}
document.write(Xt_i+'&ref='+Xt_r.replace(/[<>"]/g, '').replace(/&/g, '$')+'" title="Internet Audience">');
//-->
</script>
<noscript><img width="39" height="25" src="http://logv10.xiti.com/hit.xiti?s=419176&p=http://www.handicaperencontre.fr/" alt="WebAnalytics" />
</noscript>
</a><script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-8923834-1");
pageTracker._trackPageview();
} catch(err) {}</script>

</html>
