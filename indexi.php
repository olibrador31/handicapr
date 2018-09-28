<?

require '_bdd.php';
require '_identification.php';
require 'lignechat.php';

if($_POST['mailins'] !="") {



	// vérifie que les champs sont rempli
	$erreur ="";
	if (!$_POST[pseudoins]) $erreur="Vous devez entrer un pseudonyme <br>";
	if (!$_POST[passins]) $erreur=$erreur."Vous devez entrer un mot de pass<br>";
	if (!$_POST[mailins]) $erreur=$erreur."Vous devez entrer une adresse mail<br>";
	if ($_POST[maj]!=1) $erreur=$erreur."Vous devez etre majeur<br>";
	if (substr_count($_POST[mailins],"@")!=1) $erreur=$erreur."Adresse mail non valide<br>";
	if (substr_count($_POST[pseudoins]," ")) $erreur=$erreur."Le pseudo ne doit pas contenir d espace ni caractère spéciaux !<br>";


	//vérifie si le pseudo est pas déja pris


	// Construit la requete
	$pseudo=$_POST[pseudoins];
	$pseudo = str_replace("'"," ",$pseudo);


	$query = "SELECT * FROM user WHERE pseudo='$pseudo'"; 

	// Execute la requete
	$r = mysql_query($query) or die ("votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");

	$i = mysql_num_rows($r);

	if (mysql_num_rows($r) != 0) { 
		$erreur = $erreur."Le pseudonyme existe déja, choisissez en un autre <br>";
	}

	// vérifie que le pass correspond a la confirmation

	if($_POST['passins'] != $_POST['confirmins']) { $erreur =$erreur."Le mot de pass ne correspond pas à la confirmation <br>"; }

	// si pas d erreur on enregistre et on continu sinon en reviens a la page et on affiche les erreur


	if ($erreur == "") {
		$session=session_id();
		$pseudo=$_POST['pseudoins'];
		$pass=$_POST['passins'];
		$sexe=$_POST['sexeins'];
		$departement=$_POST['departementins'];
		$age=$_POST['ageins'];
		$annonce=$_POST['annonceins'];
		$but=$_POST['butins'];
		$mail=$_POST['mailins'];
		
		//enregistrement 
		
$sql = "INSERT INTO user (id,pseudo,pass,session,mail,age,sexe,departement,annonce,click,val,esprit) ";
		$sql =$sql."VALUES ('','$pseudo','$pass','$session','$mail','$age','$sexe','$departement','$annonce','0','0','$but')";
		$result = mysql_query($sql) or die ("Error in query: $query. " . mysql_error()); 
		// préparation table photo
			$sql__ = "INSERT INTO photo (id,pseudo) ";
		$sql__ =$sql__."VALUES ('','$pseudo')";
		$result__ = mysql_query($sql__) or die ("Error in query: $query. " . mysql_error()); 

		// création du répertoire
		$rrr= "./photos/".$pseudo;
		mkdir ($rrr, 0777);

echo"$erreur"; $req="index.php echo "<script type='text/javascript'>	document.location.replace($req); </script> ";

 //Variables :



  $headers ='From: " handicaperencontre.fr/"'."\n";
     $headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
     $headers .='Content-Transfer-Encoding: 8bit';

$message = "merci pour votre inscription, l'equipe de http://www.handicaperencontre.fr/  vous souhaite de faire de nombreuses rencontres, votre login_____ :  ".$pseudo."    votre mot de pass_____:  ".$pass."    ______pour toutes question contactez moi par mail icedenice@live.fr pour tte aide et information  à bientot http://www.rencontrenous.fr";

$sujet = "bienvenu sur http://www.handicaperencontre.fr/  ".$pseudo;
$to=$mail; $from="De:icedenice@live.fr\r\n";   //appel de la fonction mail (envoi):
 mail($to,$sujet,$message,$headers ); 




		$PWD_Hash = md5(stripslashes($pass));
		
	

$message= "rappel de vos identifiants : login :".$pseudo ." votre mot de passe :". $$pass. " bonnes rencontres à tous" ;



	}
	else {

	$message = $erreur;

	}

}


// affichage des femme et homme de la page
$query = "SELECT * FROM user WHERE sexe='Femme' ORDER BY id DESC LIMIT 0, 5"; 
	
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
$query = "SELECT * FROM user WHERE sexe='Homme' ORDER BY  id DESC LIMIT 0, 5"; 
	
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


<meta http-equiv="content-type" content="text/html; charset=iso-8859-1">
<title>rencontre gratuit pour handicapés valides victimes d'avc, ou malades et leurs familles</title>
<META NAME="Author" CONTENT="Olivier RIMBERT">
<META NAME="Category" CONTENT="rencontre,handicap,handicapé,forum,discution">
<META NAME="Copyright" CONTENT="RIMBERT Olivier">
<META http-equiv=content-language content=fr-ca>
<META NAME="Description" CONTENT=" accueil rencontres gratuites autour du handicape pour les célibataires rencontre   pour femme homme avec un handicap  bienvenu surl'accueil du site de handicaperencontre.fr - site de rencontre gratuit">
<META NAME="Identifier-URL" CONTENT="http://www.handicaperencontre.fr/">
<META NAME="Keywords" CONTENT="rencontre, handicap, rencontres,rencontre handicap, rencontre handicapés valides, rencontre handicapé valide, rencontre gratuite handicapés, handicaps, handicap, rencontres, handicapés, rencontre handicapés, rencontre handicapé, traumatisme cranien, rencontre, traumatismes craniens, aide traumatisme cranien, aide AVC Accident Vasculaire Cérébral, Attaque Cérébrale, AIT, Accident, rencontre et aide, sida, cancer, maladie grave, anévrisme, aide rencontre, cancer, curie, institut curie, donateurs, sein, prostate, oeil, symptome sclérose en plaques, traitement, physique, genotoxicologie, bio-informatique, rencontre, aide, sclerose en plaques symptomes,cancer, amitie, isole, contact, solidarite, reconfort, AVC, AIT, attaque, accident, association , aide, France, victime, patient, vacsculaire, cerebrale, temoignage, liens, trouble, vaisseaux sanguins, cerveau, accident vasculaire cerebraux, devouement, copain, copine, pere, mere, dialoguer, discuter, rire, affinite, enfants fils filles">
<META NAME="Publisher" CONTENT="RIMBERT Olivier">
<META NAME="Revisit-After" CONTENT="30 days">
<META NAME="Robots" CONTENT="all">
<META NAME="GOOGLEBOT" CONTENT="NOARCHIVE">
<META http-equiv="Content-Type"
content="text/html; charset=iso-8859-1">
<META http-equiv="Pragma" CONTENT="no-cache">
<meta name="verify-v1" content="6smf/kDkvptevVkao0kZ4L2f+H1r025m0+8HFPMB1N0=" />
<style type="text/css">	background-color: #FFF0FF;
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
.Style29 {font-size: 16px; color: #0000FF; }
.Style30 {color: #0000FF}
.style31 {font-size: 14px}
.style32 {
	font-size: 36px;
	font-weight: bold;
	color: #0000CC;
}
.Style33 {
	font-size: 14;
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
<script type="text/JavaScript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
</head>
<meta name="verify-v1" content="6smf/kDkvptevVkao0kZ4L2f+H1r025m0+8HFPMB1N0=" />


<body><script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-17606813-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script><script type="text/javascript"><!--
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
<script type="text/javascript" src="http://www.google.fr/cse/brand?form=cse-search-box&amp;lang=fr"></script> 
<h2>aider les malades et leurs proches a se parler, a se connaitre,se   rencontrer  et a trouver des solutions, surtout ne restez pas isol&eacute;
</h2>
<table width="800"  border="0" align="left" cellpadding="1" cellspacing="0" bgcolor="#000000">
  <tr>
    <td><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
      <tr bgcolor="#99CCFF">
        <td colspan="5" bgcolor="#FBE7F3"><div align="center" class="Style12"><a href="http://www.handicaperencontre.fr/indexiden.php"><img src="img/logo.jpg" width="800" height="116" border="0">
 
<br>
          <br>
           
           <? if($erreur_ident=="") { echo $message_acceuil; } else { echo $erreur_ident; } ?>
           <span class="Style12"><strong>
           <input name="Submit4" type="button" class="Style30" onClick="MM_goToURL('parent','profil.php?pseudo_envoi=<?echo"$moi";?>');return document.MM_returnValue" value="<? 
		   
		   // recherche le nb de nouveaux comentaires
$query = "SELECT * FROM evennous WHERE des='$moi' AND vu='0' "; 
	
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe iciiii!!!");


$ncom=mysql_num_rows($r);

echo"$ncom";?> évenement(s) non vu">
           </strong></span> 
           <? if($pass_reel==$pass_ident and !empty($pass_ident) ) echo"<a href='inscription2.php'>modifier Votre profil---</a><a href='supr.php'>supprimer votre profil</a>";?><br>
          <br>
        </strong></div></td>
      </tr>
      <tr bgcolor="#99CCFF">
        <td width="143" align="left" valign="top" bgcolor="#FFF0FF"></td>
        <td width="143" align="left" valign="top" bgcolor="#FFF0FF"><form action="indexi.php" method="post" name="form">
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
        <td colspan="2" valign="top" bgcolor="#FFFFFF">
          <table width="100%"  border="0" cellspacing="13" cellpadding="1">
            <tr>
              <td colspan="2" bgcolor="#FFFFFF"><table width="100%" height="151"  border="0" cellpadding="1" cellspacing="0">
                  <tr bgcolor="#AFBFCF">
                    <td width="244" height="149" bgcolor="#FFFFFF"><?if ($pseudo_ident!='') { echo"<table width='100%' height='100%' border='0' cellpadding='0' cellspacing='0'>
                            <tr>
                              <td colspan='2'><a href='inscription1.php?id=1'><img src='img/Bouton/ind.png' alt='Pour faire des rencontres gratuites' name='inscription' width='317' height='50' border='0' id='inscription'></a></td>
                              </tr>
                            <tr>
                              <td width='25%'><img src='img/smiley113.png' width='80' height='80'></td>
                              <td width='75%' valign='top'> &nbsp;&nbsp;&nbsp;<strong>www.rencontrenous.fr rencontre sur internet<br>
                                  <br>
                                  <span class='Style29'>ENTIEREMENT GRATUIT !</span></strong>
                                <p>
                                  <input name='chat_bouton' type='submit' id='chat_bouton' onClick='MM_goToURL('parent','chat.php');return document.MM_returnValue' value='ENTRER SUR LE CHAT !!'>
                                  <input name='chat_bouton3' type='submit' id='chat_bouton3' onClick='MM_goToURL('parent','forum_sujet.php');return document.MM_returnValue' value='Forum'>
                                </a>
                                <input name='chat_bouton2' type='submit' id='chat_bouton2' onClick='MM_goToURL('parent','photo.php');return document.MM_returnValue' value='Gerer vos photos'>
                                </a>
                                <input name='chat_bouton22' type='submit' id='chat_bouton22' onClick='MM_goToURL('parent','annonce_mod.php');return document.MM_returnValue' value='Modifier votre annonce'>
                                </a>
                                <input name='chat_bouton222' type='submit' id='chat_bouton222' onClick='MM_goToURL('parent','inscription3.php');return document.MM_returnValue' value='Modifier vos pr&eacute;f&eacute;rences'>
                                </a></a></p>
                                <div align='center'>
                                  <p>&nbsp;</p>
                                  <p class='style31'><strong><span class='style31'>pour </span>bonnes rencontres à tous <br>
                                        <br>
                                        <a href='inscription1.php?id=1'>Inscrivez vous</a> et chattez avec des hommes et des femmes de toutes la France <span class='Style30'>GRATUITEMENT</span>                                  !</strong><strong> ne restez pas isol&eacute;s! </strong><br>
  &nbsp;&nbsp;&nbsp;&nbsp;</p>
                                </div></td>
                            </tr>
                          </table>";} else echo " <form id='form1' name='form1' method='post' action='index.php'>
  <table width='100%' height='100%' border='0' cellpadding='0' cellspacing='7'>
    
    <tr>
          <td colspan='2'><div align='center' class='Style33'>Inscription rapide </div></td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td>pseudonyme&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;</td>
      <td><input name='pseudoins' type='text' id='pseudoins' size='20' maxlength='20' />
        <input name='ins' type='hidden' id='ins' value='oui' /></td>
    </tr>
    <tr>
      <td>Mot de pass &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;</td>
      <td><input name='passins' type='password' id='passins' size='20' maxlength='20' /></td>
    </tr>
    <tr>
      <td>Confirez le pass&nbsp;&nbsp;:&nbsp;</td>
      <td><input name='confirmins' type='password' id='confirmins' size='20' maxlength='20' /></td>
    </tr>
    <tr>
      <td>Adresse Mail&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;</td>
      <td><input name='mailins' type='text' id='mailins' size='20' maxlength='70' /></td>
    </tr>
    <tr>
      <td colspan='2'><strong>Je d&eacute;clare sur l'honneur &eacute;tre majeur : </strong>
        <input name='maj' type='checkbox' id='maj' value='1' /></td>
    </tr>
    <tr>
      <td><strong>Votre sexe </strong></td>
      <td><select name='sexeins' id='select'>
          <option value='Femme' selected='selected'>Femme</option>
          <option value='Homme'>Homme</option>
          <option value='Couple'>Couple</option>
      </select></td>
    </tr>
    <tr>
      <td><strong>Votre age </strong></td>
      <td><select name='ageins' id='ageins'>
        <option value='18'>18</option>
        <option value='19'>19</option>
        <option value='20'>20</option>
        <option value='21'>21</option>
        <option value='22'>22</option>
        <option value='23'>23</option>
        <option value='24'>24</option>
        <option value='25'>25</option>
        <option value='26'>26</option>
        <option value='27'>27</option>
        <option value='28'>28</option>
        <option value='29'>29</option>
        <option value='30'>30</option>
        <option value='31'>31</option>
        <option value='32'>32</option>
        <option value='33'>33</option>
        <option value='34'>34</option>
        <option value='35'>35</option>
        <option value='36'>36</option>
        <option value='37'>37</option>
        <option value='38'>38</option>
        <option value='39'>39</option>
        <option value='40'>40</option>
        <option value='41'>41</option>
        <option value='42'>42</option>
        <option value='43'>43</option>
        <option value='44'>44</option>
        <option value='45'>45</option>
        <option value='46'>46</option>
        <option value='47'>47</option>
        <option value='48'>48</option>
        <option value='49'>49</option>
        <option value='50'>50</option>
        <option value='51'>51</option>
        <option value='52'>52</option>
        <option value='53'>53</option>
        <option value='54'>54</option>
        <option value='55'>55</option>
        <option value='56'>56</option>
        <option value='57'>57</option>
        <option value='58'>58</option>
        <option value='59'>59</option>
        <option value='60'>60</option>
        <option value='61'>61</option>
        <option value='62'>62</option>
        <option value='63'>63</option>
        <option value='64'>64</option>
        <option value='65'>65</option>
        <option value='66'>66</option>
        <option value='67'>67</option>
        <option value='68'>68</option>
        <option value='69'>69</option>
        <option value='70'>70</option>
        <option value='71'>71</option>
        <option value='72'>72</option>
        <option value='73'>73</option>
        <option value='74'>74</option>
        <option value='75'>75</option>
        <option value='76'>76</option>
        <option value='77'>77</option>
        <option value='78'>78</option>
        <option value='79'>79</option>
        <option value='80'>80</option>
      </select></td>
    </tr>
    <tr>
      <td><strong>Votre but rencontre </strong></td>
      <td><select name='butins' id='select2'>
        <option value='Myst&egrave;re'>Myst&egrave;re</option>
        <option value='Amitier'>Amitier</option>
        <option value='Relation s&eacute;rieuse'>Relation s&eacute;rieuse</option>
        <option value='Sortie'>Sortie</option>
        <option value='Discution'>Discution</option>
        <option value='rencontre'>rencontre</option>
        <option value='sport'>sport</option>
        <option value='arts'>arts</option>
        <option value='culture'>culture</option>
        <option value='cr&eacute;ation'>cr&eacute;ation</option>
        <option value='loisir'>loisir</option>
        <option value='projet'>projet</option>
      </select></td>
    </tr>
    <tr>
      <td><strong>Votre d&eacute;partement </strong></td>
      <td><select name='departementins' id='departementins'>
          <option value='Suisse'>Suisse</option>
          <option value='Belgique'>Belgique</option>
          <option value='Ain'>Ain</option>
          <option value='Aisne'>Aisne</option>
          <option value='Allier'>Allier</option>
          <option value='Alpes-de-Hte-Prov'>Alpes-de-Hte-Prov.</option>
          <option value='Alpes-Maritimes'>Alpes-Maritimes</option>
          <option value='Ard&egrave;che'>Ard&egrave;che</option>
          <option value='Ardennes'>Ardennes</option>
          <option value='Arri&egrave;ge'>Arri&egrave;ge</option>
          <option value='Aube'>Aube</option>
          <option value='Aude'>Aude</option>
          <option value='Aveyron'>Aveyron</option>
          <option value='Bas-Rhin'>Bas-Rhin</option>
          <option value='Bouches-du-Rh&ocirc;ne'>Bouches-du-Rh&ocirc;ne</option>
          <option value='Calvados'>Calvados</option>
          <option value='Canada'>Canada</option>
          <option value='Cantal'>Cantal</option>
          <option value='Charente'>Charente</option>
          <option value='Charente-Maritime'>Charente-Maritime</option>
          <option value='Cher'>Cher</option>
          <option value='Corr&egrave;ze'>Corr&egrave;ze</option>
          <option value='Corse'>Corse</option>
          <option value='Cotes-d'Armor'>Cotes-d'Armor</option>
          <option value='Creuse'>Creuse</option>
          <option value='Deux-S&egrave;vres'>Deux-S&egrave;vres</option>
          <option value='Dordogne'>Dordogne</option>
          <option value='Doubs'>Doubs</option>
          <option value='Dom-Tom'>Dom-Tom</option>
          <option value='Dr&ocirc;me'>Dr&ocirc;me</option>
          <option value='Essonne'>Essonne</option>
          <option value='Eure'>Eure</option>
          <option value='Eure-et-Loir'>Eure-et-Loir</option>
          <option value='Finist&egrave;re'>Finist&egrave;re</option>
          <option value='Gard'>Gard</option>
          <option value='Gers'>Gers</option>
          <option value='Gironde'>Gironde</option>
          <option value='Haute-Garonne'>Haute-Garonne</option>
          <option value='Haute-Loire'>Haute-Loire</option>
          <option value='Haute-Marne'>Haute-Marne</option>
          <option value='Hautes-Alpes'>Hautes-Alpes</option>
          <option value='Haute-Saone'>Haute-Saone</option>
          <option value='Haute-Savoie'>Haute-Savoie</option>
          <option value='Hautes-Pyr&eacute;n&eacute;es'>Hautes-Pyr&eacute;n&eacute;es</option>
          <option value='Haute-Vienne'>Haute-Vienne</option>
          <option value='Haut-Rhin'>Haut-Rhin</option>
          <option value='Hauts-de-Seine'>Hauts-de-Seine</option>
          <option value='H&eacute;rault'>H&eacute;rault</option>
          <option value='Ille-et-Vilaine'>Ille-et-Vilaine</option>
          <option value='Indre'>Indre</option>
          <option value='Indre-et-Loire'>Indre-et-Loire</option>
          <option value='Is&egrave;re'>Is&egrave;re</option>
          <option value='Jura'>Jura</option>
          <option value='Landes'>Landes</option>
          <option value='Loire'>Loire</option>
          <option value='Loire-Atlantique'>Loire-Atlantique</option>
          <option value='Loiret'>Loiret</option>
          <option value='Loir-et-Cher'>Loir-et-Cher</option>
          <option value='Lot'>Lot</option>
          <option value='Lot-et-Garonne'>Lot-et-Garonne</option>
          <option value='Loz&egrave;re'>Loz&egrave;re</option>
          <option value='Maine-et-Loire'>Maine-et-Loire</option>
          <option value='Manche'>Manche</option>
          <option value='Marne'>Marne</option>
          <option value='Mayenne'>Mayenne</option>
          <option value='Meurthe-et-Moselle'>Meurthe-et-Moselle</option>
          <option value='Meuse'>Meuse</option>
          <option value='Monaco'>Monaco</option>
          <option value='Morbihan'>Morbihan</option>
          <option value='Moselle'>Moselle</option>
          <option value='Ni&egrave;vre'>Ni&egrave;vre</option>
          <option value='Nord'>Nord</option>
          <option value='Oise'>Oise</option>
          <option value='Orne'>Orne</option>
          <option value='Paris'>Paris</option>
          <option value='Pas-de-Calais'>Pas-de-Calais</option>
          <option value='Puy-de-D&ocirc;me'>Puy-de-D&ocirc;me</option>
          <option value='Pyr&eacute;n&eacute;es-Atlantiques'>Pyr&eacute;n&eacute;es-Atlantiques</option>
          <option value='Pyr&eacute;n&eacute;es-Orientales'>Pyr&eacute;n&eacute;es-Orientales</option>
          <option value='Rhones'>Rhones</option>
          <option value='Saone-et-Loire'>Saone-et-Loire</option>
          <option value='Sarthes'>Sarthes</option>
          <option value='Savoie'>Savoie</option>
          <option value='Seine-et-Marne'>Seine-et-Marne</option>
          <option value='Seine-Maritime'>Seine-Maritime</option>
          <option value='Seine-Saint-Denis'>Seine-Saint-Denis</option>
          <option value='Somme'>Somme</option>
          <option value='Tarn'>Tarn</option>
          <option value='Tarn-et-Garonne'>Tarn-et-Garonne</option>
          <option value='Territoire-de-Belfort'>Territoire-de-Belfort</option>
          <option value='Val-de-Marne'>Val-de-Marne</option>
          <option value='Val-d'OIse'>Val-d'OIse</option>
          <option value='Var'>Var</option>
          <option value='Vaucluse'>Vaucluse</option>
          <option value='Vend&eacute;e'>Vend&eacute;e</option>
          <option value='Vienne'>Vienne</option>
          <option value='Vosges'>Vosges</option>
          <option value='Yonne'>Yonne</option>
          <option value='Yvelines'>Yvelines</option>
          <option value='Autre'>Autre</option>
            </select></td>
    </tr>
    <tr>
      <td><strong>Votre annonce </strong></td>
      <td><textarea name='annonceins' rows='3' id='annonceins'></textarea></td>
    </tr>
    <tr>
      <td colspan='2'><div align='center'>
          <input type='submit' name='Submit2' value='Valider' />
      </div></td>
    </tr>
  </table>
";?></td>
                  </tr>
              </table></td>
            </tr>
            <tr bgcolor="#567596">
              <td colspan="2" bgcolor="#FFF0FF"><table width="100%"  border="1" cellspacing="0" cellpadding="3">
                  <tr bgcolor="#AFBFCF">
                    <td colspan="5" bgcolor="#FFDFFF"><div align="center">
                        <p><span class="Style17">::. Elles nous ont rejoins .:: </span><br>
                        </p>
                    </div></td>
                  </tr>
                  <tr bgcolor="#AFBFCF">
                    <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="90%"  border="0" cellspacing="0" cellpadding="1">
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
                    <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="90%"  border="0" cellspacing="0" cellpadding="1">
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
                    <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="90%"  border="0" cellspacing="0" cellpadding="1">
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
                    <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="90%"  border="0" cellspacing="0" cellpadding="1">
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
                    <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="90%"  border="0" cellspacing="0" cellpadding="1">
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
              <td colspan="2" bgcolor="#FFFFFF"><table width="100%"  border="1" cellspacing="0" cellpadding="3">
                  <tr bgcolor="#AFBFCF">
                    <td colspan="5" bgcolor="#FFDFFF"><div align="center">
                        <p><span class="Style17">::. Ils nous ont rejoins .:: </span><br>
                        </p>
                    </div></td>
                  </tr>
                  <tr bgcolor="#AFBFCF">
                    <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="90%"  border="0" cellspacing="0" cellpadding="1">
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
                    <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="90%"  border="0" cellspacing="0" cellpadding="1">
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
                    <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="90%"  border="0" cellspacing="0" cellpadding="1">
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
                    <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="90%"  border="0" cellspacing="0" cellpadding="1">
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
                    <td width="20%" align="center" valign="top" bgcolor="#FFFFFF"><table width="90%"  border="0" cellspacing="0" cellpadding="1">
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
              <td width="57%"><input name="yeux" type="hidden" id="yeux" value="x">
                <input name="cheveux" type="hidden" id="cheveux" value="x">
                <input name="style" type="hidden" id="style" value="x">
                <input name="silouhaite" type="hidden" id="silouhaite" value="x">
                <input name="profession" type="hidden" id="profession" value="x">
                <input name="fumeur" type="hidden" id="fumeur" value="x">
                <input name="esprit" type="hidden" id="esprit" value="x"></td>
              <td width="43%">&nbsp;</td>
            </tr>
          </table>
                </form>        </td>
      </tr>
      <tr bgcolor="#99CCFF">
        <td colspan="5" bgcolor="#FFF0FF"><div align="center"><img src="img/bas.jpg" width="800" height="53"></div></td>
</tr>
    </table></td>
  </tr>
</table>
<br><!-- google_ad_section_start -->
<h1 align="left">&nbsp;</h1>
<p><strong><u>Handicaperencontre.fr</u></strong><strong> </strong></p>
<p></p>
<h1>Site de rencontre 100% gratuit et s&eacute;rieux, rencontre amoureuse de c&eacute;libataires en France.</h1>
</p>
<p>&nbsp;</p>
<p></p>
<h2>Consultez des annonces de profils contr&ocirc;l&eacute;s de c&eacute;libataires s&eacute;rieux et motiv&eacute;s hommes, femmes pr&egrave;s de chez vous.</h2>
</p>
<p></p>
<h3>Site de rencontre gratuit pour personnes motiv&eacute;es &agrave; trouver l&rsquo;amour l&rsquo;&acirc;me soeur ou juste partager des passion<br />
    <br />
</h3>
</p>
<p><strong>S</strong><strong>ite de rencontre enti&egrave;rement gratuit &agrave; votre service&nbsp;! Inscrivez- vous vite et ne soyez plus jamais seul ! </strong></p>
<p></p>
<h4>Site de rencontre totalement gratuit pour c&eacute;libataires qui cherchent l'amour, la passion, l'&acirc;me s&oelig;ur, &nbsp;des amis ou amies&hellip;</h4>
</p>
<p><strong>Site pour rencontrer l'&acirc;me s&oelig;ur, &nbsp;ou l'amour avec un homme ou une femme en France </strong></p>
<p><strong>le r&eacute;seau social de la rencontre entre hommes et femme qui cherchent l&rsquo;amour, l&rsquo;amiti&eacute; ou une relation durable </strong></p>
<p><strong>handicaperencontre.fr</strong></p>
<p><strong>Attention   certaines filles peuvent donner leur adresse MSN sur le site&nbsp;: ce sont   g&eacute;n&eacute;ralement des tentatives de piratages ne les ajoutez pas&nbsp;! Merci </strong></p>
<p><strong>Attention   : tout(e) utilisateur(trice) dont les textes sont &agrave; caract&egrave;re raciste   ou offensant, ainsi que pr&eacute;sentant une annonce v&eacute;nale (prostitution)   verra son compte supprim&eacute; et son adresse IP mis sur liste noire. Il lui   sera alors d&eacute;finitivement impossible de se r&eacute;inscrire sur le site. <br />
  Si vous rencontrez une annonce ou un(e) utilisateur(trice) incorrect(e),   vous pouvez pr&eacute;venir le webmaster &agrave; l'adresse suivante: <a href="mailto:icedenice@live.fr" target="_blank" rel="noopener noreferrer">icedenice@live.fr</a> </strong></p>
<p>&nbsp;</p>
<p align="left"><br />
</p>
<h1><script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("UA-8923834-1");
pageTracker._trackPageview();
} catch(err) {}</script>
</h1>
</html>
