<?
require '_bdd.php';

require '_identification.php';
require '_restriction.php';
require 'lignechat.php';//récupère le pseudo du profil a afficher + donnée
$pseudo_envoi = $pseudo_ident;
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
if (!$photo) { $photo="img/20000503113333_54143.jpg"; }
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
<title>Document sans nom</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
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
	font-size: 12px;
	font-weight: bold;
}
.Style16 {color: #0000FF}
.Style17 {
	font-size: 12px;
	color: #990000;
}
-->
</style>
<link href="vbbcv_profil.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.Style18 {
	font-size: 13px;
	font-weight: bold;
}
.Style22 {font-size: 16px}
.Style26 {color: #0066CC; font-weight: bold; }
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
            <td colspan="4" bgcolor="#FBE7F3"><div align="center" class="Style22">
              <p><a href="http://www.handicaperencontre.fr/"><img src="img/logo.jpg" width="800" height="116" border="0" /></a><br>  
                <br>
              </p>

              </div></td>
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
        </form>
            </td>
            <td width="5" bgcolor="#FFDFFF">&nbsp;</td>
            <td colspan="2" valign="top" bgcolor="#FFFFFF"><table width="650"  border="0" cellspacing="13" cellpadding="1">
              <tr>
                <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFDFFF"><div align="center">
                          <p class="Style13"><strong>::. Information sur le profil de rencontre .:: <br />
                                                    </strong></p>
                      </div></td>
                    </tr>
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFFFFF">&nbsp;&nbsp;&nbsp;Votre profil sert aux visiteurs inscri(e)s et souhaitant faire des rencontres &agrave; savoir qui vous &eacute;te et ce que vous aimez. Vous pouvez &agrave; pr&eacute;sent g&eacute;rer votre annonce, votre album photo et vous faire connaitre aupr&egrave;s des autres visiteurs. Tout au long de votre visite sur handicaperencontre.fr site de rencontres pour les personnes handicap&eacute;es, vous pourrez &eacute;changer, communiquer et discuter librement et gratuitement. </td>
                    </tr>
                </table></td>
              </tr>
              <tr>
                <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                    <tr bgcolor="#AFBFCF">
                      <td colspan="2" bgcolor="#FFDFFF"><div align="center">
                          <p class="Style13"><strong>::. Votre profil .:: <br />
                                                    </strong></p>
                      </div></td>
                    </tr>
                    <tr bgcolor="#AFBFCF">
                      <td width="28%" rowspan="2" bgcolor="#FFFFFF">
                        <table width="100%" height="100%" border="0" cellpadding="5" cellspacing="0">
                          <tr>
                            <td bgcolor="#FEF1FB"><div align="center" class="Style18">Vos actions </div></td>
                          </tr>
                          <tr>
                            <td><div align="center"><strong><a href="photo_profil.php?pseudo_envoi=<? echo $pseudo; ?>">Voir vos photos</a> </strong></div></td>
                          </tr>
                          <tr>
                            <td><div align="center"><a href="annonce_mod.php"><strong>Modifier votre annonce </strong></a></div></td>
                          </tr>
                          <tr>
                            <td><div align="center"></div></td>
                          </tr>
                          <tr>
                            <td><div align="center"><a href="inscription3.php"><strong>Modifier vos pr&eacute;cisions </strong></a></div></td>
                          </tr>
                        </table>
                      <div align="right"></div></td>
                      <td width="72%" bgcolor="#FCECF7"><div align="center">
                        <table width="442" border="0" cellspacing="0" cellpadding="2">
                            <tr>
                              <td width="239"><div align="right"><span class="Style14"><span class="Style10">---&gt;</span> Popularit&eacute; total est de :</span></div></td>
                              <td width="195"><div align="left"><span class="Style14"><img src="img/bar5.gif" width="<? echo $note_global; ?>" height="11"> <span class="Style16"><? echo $note_global; ?> % </span></span></div></td>
                            </tr>
                            <tr>
                              <td><div align="right"><span class="Style14">Note Mental : </span></div></td>
                              <td><div align="left"><span class="Style14"><img src="img/bar2.gif" width="<? echo $mental_2; ?>" height="11"><span class="Style16"> <? echo $mental_2; ?> % </span></span></div></td>
                            </tr>
                            <tr>
                              <td><div align="right"><span class="Style14">Note Physique : </span></div></td>
                              <td><div align="left"><span class="Style16"><img src="img/bar2.gif" width="<? echo $note; ?>" height="11"> <? echo $note; ?> <span class="Style14">% </span></span></div></td>
                            </tr>
                          </table>
                          <br />
                          <strong>Profil vu <span class="Style17"><? echo $click; ?></span> fois</strong></div></td>
                    </tr>
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFFFFF">
                        <div align="left"></div></td>
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
                                    <td bgcolor="#FFE8FB"><div align="left"><strong>Votre photo </strong></div></td>
                                  </tr>
                                  <tr>
                                    <td><div align="left"><a href='photo_profil.php?pseudo_envoi=<? echo $pseudo_envoi; ?>'><img src="<? echo $photo; ?>" width="190" height="230" /></a></div></td>
                                  </tr>
                              </table></td>
                              <td width="65%" valign="top"><table width="100%"  border="0" cellspacing="7" cellpadding="0">
                                  <tr>
                                    <td bgcolor="#FFE8FB" class="Style12"><div align="left" class="Style13">Votre annonce </div></td>
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
                                    <td colspan="2" bgcolor="#FFE8FB"><div align="left"><strong>A quoi vous ressemblez ? </strong></div></td>
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
                                    <td colspan="2" bgcolor="#FFE8FB" class="Style12"><div align="left" class="Style13">Un peu plus sur vous </div></td>
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

<p>&nbsp;</p>
</body>
</html>
