<?

require '_bdd.php';

require '_identification.php';
require '_restriction.php';
require 'lignechat.php';//récupère le pseudo du profil a afficher + donnée
$pseudo_envoi = $_GET['pseudo_envoi'];
	$query = "SELECT * FROM user WHERE pseudo='$pseudo_envoi'"; ;
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	$row = mysql_fetch_array($r);

	$pseudo = $pseudo_envoi;
	$age = $row['5'];
	$idpseudo = $row['0'];
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
<title>Rencontre gratuite en France avec chat  profil !</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<META lang=fr-ca 
content="Rencontre entièrement gratuite avec des hommes et femmes de toutes les régions de France, avec chat gratuit, coquine ou amicale
" 
name=description>
<META lang=fr-ca 
content=" rencontre, rencontres, rencontres sur internet, rencontre gratuite, site de rencontre gratuit, rencontres gratuites, gratuite, gratuit, sexe, chat, célibataire, cherche homme, cherche femme, amour, amitié, caline, coquine, amicale, amant, flirt, matrimonial, internet, discutions, partenaire, france, région, region" 
name=keywords>
<META http-equiv=content-language content=fr-ca>
<META http-equiv=content-style-Type content=text/css>
<META lang=fr-ca content="Rencontre gratuite par Olivier RIMBERT" 
name=Author>
<META http-equiv=Content-Language content=fr-ca>
<META content="7 days" name=revisit-after>
<META content=never name=expires>
<META content=all name=audience>
<META 
content="rencontre, gratuit, chat, homme, femme, sexe" 
name=classification>
<META lang=fr-ca content="Rencontre gratuite" name=subject>
<META content=fr-ca name=language>
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
.Style16 {color: #0000FF}
-->
</style>
<style type="text/css">
<!--
.Style26 {color: #0066CC; font-weight: bold; }
.Style28 {color: #FF0000}
.style32 {	font-size: 36px;
	font-weight: bold;
	color: #0000CC;
}
.Style38 {font-size: 14px}
.Style39 {color: #990000}
.Style17 {color: #000000; font-weight: bold; }
.Style42 {font-size: 18px}
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
<link href="vbbcv.css" rel="stylesheet" type="text/css">
</head>

<body>
<script type="text/javascript"><!--
google_ad_client = "pub-1493739445870732";
/* baniere11 */
google_ad_slot = "3572161003";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script><script type="text/javascript"><!--
google_ad_client = "pub-1493739445870732";
/* 728x90 banière1 */
google_ad_slot = "7527634302";
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
ovenez discuter avec des hommes et femmes de votre r&eacute;gion ou de toute la france soit pour passer le temps, soit vous faire de nouveaux amis ou &eacute;changer des id&eacute;s ou adresse m&eacute;dical technique de r&eacute;education.Reprenez le moral grace &agrave; ce site et les &eacute;change et contact qaue vous allez faire. de nombreux amis vous attendent et pourquoi pas trouver l amour. A votre disposition aussi le groupe et la page de membre facebook solidarit&eacute; handicap avc cr&eacute;e par mes soin pour vous. Homme et Femme mobilison nous et venez nous rejoindre :<br>
<table width="800"  border="0" align="left" cellpadding="1" cellspacing="0" bgcolor="#000000">
  <tr>
    <td class="Style38"><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
          <tr bgcolor="#96ACC2">
            <td colspan="5" bgcolor="#FBE7F3"><div align="center" class="Style12"><a href="http://www.handicaperencontre.fr/"><img src="img/logo.jpg" width="800" height="116" border="0"><br>
          <br>
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
            <td width="143" align="left" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
            <td width="143" align="left" valign="top" bgcolor="#FFF0FF"><form action="index.php" method="post" name="form">
          <table width="100%"  border="1" cellpadding="1" cellspacing="0">
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
          <p><a href="http://www.compare-le-net.com/index.php" target="_blank" title="Annuaire gratuit de liens en dur Compare le Net - accueil du site"></a>
        </form></td>
            <td width="5" bgcolor="#FFDFFF">&nbsp;</td>
            <td colspan="2" valign="top" bgcolor="#FFFFFF"><p>&nbsp;</p>
              <p class="style32">Profil suprim&eacute; </p>
              <p class="style32">&nbsp;</p>
              <p>
                <input name="chat_bouton2" type="submit" id="chat_bouton2" onClick="MM_goToURL('parent','index.php');return document.MM_returnValue" value="Retour &agrave; l'acceuil">
            </p></td>
          </tr>
          <tr bgcolor="#96ACC2">
            <td colspan="5" bgcolor="#FFF0FF"><div align="center"><img src="img/bas.jpg" width="800" height="53" /></div></td>
          </tr>
    </table></td>
  </tr>
</table>

<br>
<h1><!- -google_ad_section_start- -> site de rencontre pour handicap&eacute;s, victimes d'avc, ou malades, traumatisme cranien et leurs familles ou leurs proche</h1>
<blockquote>
  <blockquote>
    <p><strong>Viens           plus pr&egrave;s de moi</strong></p>
  </blockquote>
</blockquote>
<p>Viens       plus pr&eacute;s de moi. Je te regarde et je te vois fr&eacute;mir de d&eacute;sirs       l&eacute;gers, r&ecirc;ves inaboutis, &eacute;bauches effrang&eacute;es.<br>
  Viens plus pr&eacute;s de moi, je te vois &agrave; demi d'un &eacute;lan ma&icirc;tris&eacute;.</p>
<p>Viens       l&agrave;, tout pr&eacute;s de moi, viens te r&eacute;chauffer de ce cot&eacute;       de toi que tu mets en suspend. Laisse le fleurir de mes doigts caressants       &agrave; ton &acirc;me.<br>
  Dors mon Prince, repose toi de la vie, d&eacute;poses les armes un instant       sans soucis d'&ecirc;tre fait prisonnier.<br>
  J'ai &ocirc;t&eacute; ton armure pour que tu prennes mon soleil tout raviv&eacute;       de toi.<br>
  Ta chair est blanche et pale, quelques bleus t'ont meurtri mais l'or s'y couche       aussi.<br>
  Fait le briller, &eacute;panoui.</p>
<p>Viens       plus pr&eacute;s de moi que je t'aime, m&ecirc;me loin.</p>
<p>Les ann&eacute;es       et les coups m'ont donn&eacute; la libert&eacute; d'aimer aux del&agrave;       des convenances, pour survivre enfin.<br>
  Prends de ma lumi&egrave;re blanche, fais t'en &eacute;charpe au cou, mon       odeur est fragrance de mon amour si doux.</p>
<p>Vas, libre,       aux d&eacute;tours des sentes et des bois . Etends toi sur les mousses offertes,       &eacute;coutes le bruit des eaux cristallines et secr&egrave;tes. Rince toi       du vent, bouche ouverte sur mes mots qui ruissellent &agrave; ta peau comme       un bapt&ecirc;me.</p>
<blockquote>
  <blockquote>
    <p><strong>Regarde moi </strong></p>
  </blockquote>
</blockquote>
<p>Je voudrais       que tu voies mes transparences bleues, mon &acirc;me comme un soleil qui fait       lever mes aubes.<br>
  Regarde dans mes yeux au plus profond de moi.</p>
<p>Derri&egrave;re       mes col&egrave;res, mes rires, ma folie, mes pleurs, mes mis&egrave;res, regarde       moi. ..</p>
<p>Derri&egrave;re       mes erreurs, et mes peurs &agrave; la vie, regarde moi.<br>
    <br>
  Derri&egrave;re mes l&acirc;chet&eacute;s, mes vilenies parfois, derri&egrave;re       mes tendret&eacute;s que tu ne comprends pas, derri&egrave;re mes d&eacute;pressions       qui me font voir en moi, derri&egrave;re ce que tu crois, regarde moi. </p>
<p>Il y a       le silence des solitudes intenses, qui r&eacute;verb&egrave;rent encore le       bruit de mon absence, &agrave; toi.<br>
  Il y a des jardins qui fleurissent dans le noir, de fabuleux miroirs qui semblent       des espoirs &agrave; mes mouvements d'&acirc;me. </p>
<p>Un fr&eacute;missement       lent qui remue au dedans, comme un ultime sanglot &agrave; la vie qui me fuit,       faute de territoire &agrave; parcourir encore, d'amour m&ecirc;l&eacute;s       de corps. <br>
  Regarde moi encore, comme quand j'&eacute;tais jeune, belle de tout l'espoir       que j'avais &agrave; la vie. Le miroir est cass&eacute; et les morceaux bris&eacute;s,       ne renvoient que l'&eacute;clat d'un amour morcel&eacute;. </p>
<p>Qui me       regardera pour refaire l'unit&eacute; de ce visage l&agrave;, qui m'a si bien       &eacute;t&eacute;, jadis.<br>
  Un &eacute;cho de silence, est ce l'&eacute;cho de la mort ?</p>
<blockquote>
  <blockquote>
    <p>Isabelle           Odin           &nbsp;<a href="mailto:">odin.isabelle@neuf.fr</a></p>
  </blockquote>
</blockquote>
<p>&nbsp;</p>
<h2>aider les malades et leurs proches a se parler, a se connaitre,se rencontrer  et a trouver des solutions, surtout ne restez pas isol&eacute;</h2>
<h3>rencontres gratuites site de rencontre entierement gratuit  au service des gens, inscrivez vous vite et ne soyez plus jamais seul ! </h3>
<h4>aide service et rencontre entre personnes handicap&eacute;es tc ou avc ou valide<!- -google_ad_section_end- -></h4>
<h5>titre5</h5>
<h6>titre6</h6>
<!-- DEBUT LOGO PAGE 1 -->
<!-- FIN LOGO PAGE 1 -->
<p class="style32"> handicaperencontre.fr</p>
<p>&nbsp;</p>
<p><span class="Style12"><strong>rencontres gratuites</strong> </span><span class="Style27"><span class="Style12"><strong>site de rencontre entierement gratuit  au service des gens, inscrivez vous vite et ne soyez plus jamais seul ! </strong></span></span></p>
<p class="Style12"><strong>Attention des filles g&eacute;n&eacute;ralement donnent leur adresse MSN sur le site cela est g&eacute;n&eacute;ralement des tentatives de piratages ne les ajoutez pas Merci </strong></p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p class="Style33">Attention : tout(e) utilisateur(trice) dont les textes sont &agrave; caract&egrave;re raciste ou offensant, ainsi que pr&eacute;sentant une annonce v&eacute;nale (prostitution) verra son compte supprim&eacute; et son adresse IP mise sur liste noire: il sera alors d&eacute;finitivement impossible de se r&eacute;inscire sur le site. Si vous rencontrez une annonce ou  un(e) utilisateur(trice)  incorrect(e), vous pouvez pr&eacute;venir le webmaster &agrave; l'adresse suivante: <a href="mailto:icedenice@live.fr">icedenice@live.fr</a><br>
  <br>
</p></body>
</html>
