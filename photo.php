<?
require '_bdd.php';
require '_identification.php';
require '_restriction.php';
require 'lignechat.php';$resultat_ajouter="";
$aff_modifier = "";

if ($_GET['action']=="suprimer") {
$id=$_GET['id'];

//efface tout les comentaires de l image

$query = "DELETE FROM comphoto WHERE numphoto='$id' AND destinateur='$moi'"; 
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe11ici !!!");



$id++;



// efface le nom de la photo de la place de l image

	$queryimg = "UPDATE photo SET image_$id='' WHERE pseudo='$moi'"; 
	// Execute la requete
	$rimg = mysql_query($queryimg) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe22 !!!");

// efface la description de la photo de la place de l image

	$querydesc = "UPDATE photo SET desc_$id='' WHERE pseudo='$moi'"; 
	// Execute la requete
	$rdesc = mysql_query($querydesc) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe33 !!!");
}

if ($_GET['action']=="modifier_aff") {
$aff_modifier = "oui";
$id=$_GET['id'];
$id++;

}

if (htmlspecialchars($_GET['action'])=="profil") {
$id=$_GET['id'];
$image_profil=$_GET['image'];
$id++;


$query = "UPDATE photo SET afficher='$image_profil' WHERE pseudo='$pseudo_ident'"; 
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	
	
	$req = "'profil.php"."?pseudo_envoi=".$pseudo_ident."'";

         echo "<script type='text/javascript'>	document.location.replace($req); </script> ";
}


if (htmlspecialchars($_GET['action'])=="modifier") {
$id=$_GET['id'];
$img = $_FILES['chemin']['name'];
$desc = htmlspecialchars($_POST['description']);
// v�rifie le type de fichier
			$fichier =$_FILES['chemin']['name'];
			if (substr($fichier, -3) == "gif" || 
    		   substr($fichier, -3) == "jpg" || 
		       substr($fichier, -3) == "png" ||
    		   substr($fichier, -4) == "jpeg" || 
	    	   substr($fichier, -3) == "PNG" || 
	    	   substr($fichier, -3) == "GIF" || 
		       substr($fichier, -3) == "JPG") 
										      {  
					$uploaddir = "./photos/".$pseudo_ident."/";

				$uploadfile = $uploaddir . basename($_FILES['chemin']['name']);
				$url_photo = $_FILES['chemin']['name'];
				if (move_uploaded_file($_FILES['chemin']['tmp_name'], $uploadfile)) {
				$resultat_ajouter = "Le fichier est valide, et a �t� t�l�charg�
				avec succ�s et � modifi�e la pr�c�dente. Cette photo est � pr�sent la photo affich� dans votre profil.";
				
				
				

				// compression et transformation en jpg
				$img_src = $uploadfile;   // chemin de l'image source 
				$img_dest =  $uploadfile;  // chemin de l'image � cr�er 

				// r�cup�ration de la taille 
			  $size = @GetImageSize($img_src); 
			  $src_w = $size[0]; 
			  $src_h = $size[1]; 

				$dst_w =  800;          // largeur de l'image � cr�er 
				$dst_h =  600;        // h auteur de l'image � cr�er 
				  
			  // redimensionnement de l'image (garde le ration)    
			   if($src_w < $dst_w && $src_h < $dst_h) 
			   { 
			      $dst_w = $src_w; 
			      $dst_h = $src_h; 
			   } 
			   else 
			      @$dst_h = round(($dst_w / $src_w) * $src_h); 

			  $dst_img = ImageCreateTrueColor($dst_w, $dst_h); 
			  
			  
			  if (substr($fichier, -3) == "gif") {  $src_img = ImageCreateFromgif($img_src); }
  			  if (substr($fichier, -3) == "jpg") {  $src_img = ImageCreateFromJpeg($img_src); }
			  if (substr($fichier, -3) == "png") {  $src_img = ImageCreateFrompng($img_src); }
			  if (substr($fichier, -3) == "jpeg") {  $src_img = ImageCreateFromJpeg($img_src); }
  			  if (substr($fichier, -3) == "GIF") {  $src_img = ImageCreateFromgif($img_src); }
  			  if (substr($fichier, -3) == "JPG") {  $src_img = ImageCreateFromJpeg($img_src); }
			  if (substr($fichier, -3) == "PNG") {  $src_img = ImageCreateFrompng($img_src); }
			  if (substr($fichier, -3) == "JPEG") {  $src_img = ImageCreateFromJpeg($img_src); }
			  
			  // cr�e la copie redimensionn�e 
			  @ImageCopyResampled($dst_img, $src_img, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h); 
			  // --> jpg 
			  @ImageJpeg($dst_img, $img_dest); 
			  // destruction des images temporaires 
			  @ImageDestroy($dst_img); 
			  @ImageDestroy($src_img); 
			  
				} else {
				$resultat_ajouter = "Votre fichier n'a pas �t� pris en compte,les midification n'ont pas pu avoir lieux d�soler.";
				}
				$description_photo=htmlspecialchars($_POST['description']);
	$desc = str_replace("'","��",$description_photo);
		$query = "UPDATE photo SET image_$id='$img',desc_$id='$desc' WHERE pseudo='$pseudo_ident'"; 
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
				}
			else {
			 	$resultat_ajouter = "Votre fichier n'est pas une image, si votre image est au format BMP veuillez la convertir au format JPG (Utilisez votre logiciel de visualisation d'image et faite : Fichier , Enregistrer sous, et s�l�ctionn� Type : JPEG File. Merci";
				}
			





}

$aff_ajouter="";
if ($_GET['action']=="aff_ajouter") {
	$aff_ajouter="oui";
}

$ajouter="";
if ($_GET['action']=="ajouter") {
	//cherche une place libre
	$query = "SELECT * FROM photo WHERE pseudo='$pseudo_ident'"; 
	$r = mysql_query($query) or die ("votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	$i = mysql_num_rows($r);
	$row = mysql_fetch_array($r);
	$photo1 = $row['2'];
	$photo2 = $row['3'];
	$photo3 = $row['4'];
	$photo4 = $row['5'];
	$photo5 = $row['6'];
	$photo6 = $row['7'];
	$trouver = "";
	if ($photo1 == "") {
		$trouver="oui";
		$place_photo = "image_1";
		$desc_photo = "desc_1";
		}
	elseif ($photo2 == "") {
		$trouver="oui";
		$place_photo = "image_2";
		$desc_photo = "desc_2";
		}
	elseif ($photo3 == "") {
		$trouver="oui";
		$place_photo = "image_3";
		$desc_photo = "desc_3";
		}
	elseif ($photo4 == "") {
		$trouver="oui";
		$place_photo = "image_4";
		$desc_photo = "desc_4";
		}
	elseif ($photo5 == "") {
		$trouver="oui";
		$place_photo = "image_5";
		$desc_photo = "desc_5";
		}
	elseif ($photo6 == "") {
		$trouver="oui";
		$place_photo = "image_6";
		$desc_photo = "desc_6";
		}
	else { $resultat_ajouter = "Vous n'avez plus de place dans votre album, vous devez soit modifier une photo soit en suprimer une avent de pouvoir ajouter une autre photo."; }
		
		// enregistrement de la photo
		if ($trouver == "oui") {
			// v�rifie le type de fichier
			$fichier =$_FILES['chemin']['name'];
			if (substr($fichier, -3) == "gif" || 
    		   substr($fichier, -3) == "jpg" || 
		       substr($fichier, -3) == "png" ||
    		   substr($fichier, -4) == "jpeg" || 
	    	   substr($fichier, -3) == "PNG" || 
	    	   substr($fichier, -3) == "GIF" || 
		       substr($fichier, -3) == "JPG") 
										      {  
					$uploaddir = "./photos/".$pseudo_ident."/";

				$uploadfile = $uploaddir . basename($_FILES['chemin']['name']);
				$url_photo = $_FILES['chemin']['name'];
				if (move_uploaded_file($_FILES['chemin']['tmp_name'], $uploadfile)) {
				$resultat_ajouter = "Le fichier est valide, et a �t� t�l�charg�
				avec succ�s. Cette photo est � pr�sent la photo affich� dans votre profil.";
				
				
				

				// compression et transformation en jpg
				$img_src = $uploadfile;   // chemin de l'image source 
				$img_dest =  $uploadfile;  // chemin de l'image � cr�er 

				// r�cup�ration de la taille 
			  $size = @GetImageSize($img_src); 
			  $src_w = $size[0]; 
			  $src_h = $size[1]; 

				$dst_w =  800;          // largeur de l'image � cr�er 
				$dst_h =  600;        // h auteur de l'image � cr�er 
				  
			  // redimensionnement de l'image (garde le ration)    
			   if($src_w < $dst_w && $src_h < $dst_h) 
			   { 
			      $dst_w = $src_w; 
			      $dst_h = $src_h; 
			   } 
			   else 
			      @$dst_h = round(($dst_w / $src_w) * $src_h); 

			  $dst_img = ImageCreateTrueColor($dst_w, $dst_h); 
			  
			  
			  if (substr($fichier, -3) == "gif") {  $src_img = ImageCreateFromgif($img_src); }
  			  if (substr($fichier, -3) == "jpg") {  $src_img = ImageCreateFromJpeg($img_src); }
			  if (substr($fichier, -3) == "png") {  $src_img = ImageCreateFrompng($img_src); }
			  if (substr($fichier, -3) == "jpeg") {  $src_img = ImageCreateFromJpeg($img_src); }
  			  if (substr($fichier, -3) == "GIF") {  $src_img = ImageCreateFromgif($img_src); }
  			  if (substr($fichier, -3) == "JPG") {  $src_img = ImageCreateFromJpeg($img_src); }
			  if (substr($fichier, -3) == "PNG") {  $src_img = ImageCreateFrompng($img_src); }
			  if (substr($fichier, -3) == "JPEG") {  $src_img = ImageCreateFromJpeg($img_src); }
			  
			  // cr�e la copie redimensionn�e 
			  @ImageCopyResampled($dst_img, $src_img, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h); 
			  // --> jpg 
			  @ImageJpeg($dst_img, $img_dest); 
			  // destruction des images temporaires 
			  @ImageDestroy($dst_img); 
			  @ImageDestroy($src_img); 
			  
				} else {
				$resultat_ajouter = "Votre fichier n'a pas �t� pris en compte, d�soler.";
				}
				$description_photo=htmlspecialchars($_POST['description']);
	$description_photo = str_replace("'","��",$description_photo);
				$query = "UPDATE photo SET $place_photo='$url_photo',$desc_photo='$description_photo',afficher='$url_photo' WHERE pseudo='$pseudo_ident'"; 
				$r = mysql_query($query) or die ("Pas pris ");
				}
			else {
			 	$resultat_ajouter = "Votre fichier n'est pas une image, si votre image est au format BMP veuillez la convertir au format JPG (Utilisez votre logiciel de visualisation d'image et faite : Fichier , Enregistrer sous, et s�l�ctionn� Type : JPEG File. Merci";
				}
			}



}




// affichage des photo


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>ajouter une Photo rencontre gratuit pour handicap�s valides victimes d'avc, ou malades et leurs familles</title>
<META NAME="Author" CONTENT="Olivier RIMBERT">
<META NAME="Category" CONTENT="rencontre,handicap,handicap�,forum,discution">
<META NAME="Copyright" CONTENT="RIMBERT Olivier">
<META http-equiv=content-language content=fr-ca>
<META NAME="Description" CONTENT=" ajouter une photo sur rencontres gratuites pour handicap�s et valides en france pour les c�libataires qui d�sirent trouver l'amour, l'�me soeur, cr�er de nouvelles amiti�s avec chat et forum pour aider les malades et leurs proches a se parler, a se connaitre,se rencontrer  et a trouver des solutions, surtout ne restez pas isol�, avc, traumatisme cranien, discutions et �change entre handicap�s et valides  malades handicap�s discutions sur r��ducation et travail. r�seau social sur le handicap et la rencontre en france. Rejoignez notre communaut� de malades valides et handicap�s pour des �changes de plus en plus nombreux et enti�rement gratuit en france avec chat et forum sur le handicap bienvenu sur l accueil du site de handicaperencontre.fr site de rencontre gratuit">
<META NAME="Identifier-URL" CONTENT="http://www.handicaperencontre.fr/">
<META NAME="Keywords" CONTENT="rencontre, rencontres, rencontre handicap�s valides, rencontre handicap� valide, rencontre gratuite handicap�s, handicaps,handicap,rencontres, handicap�s, rencontre handicap�s, rencontre handicap�, traumatisme cranien, rencontre, traumatisme cranien, aidetraumatisme cranien, aide AVC Accident Vasculaire Cerebral, Attaque C�r�brale, AIT, Accident Isch�mique Transitoire, H�morragie C�r�brale, rencontre et aide, sida,cancer, maladie grave, an�vrisme,aide rencontre, cancer, curie,institut curie,donateurs, sein, prostate, oeil,rencontre et aide profession maladie, avtivite professionnelle, symptome scl�rose, symptome scl�rose en plaque, traitement scl�rose en plaque, 
 , sarcome, metastase,  biologie, immunotherapie,, angiogenese, pharmacochimie, physique, genotoxicologie, bio-informatique, rencontre, aide, sclerose en plaques symptomes, maladie longue duree, scleroses en plaques, scl�rose, malades sep, 
cacer, amitie, isole, contact, contacts humain, solidarite,syndrome, ald,  solidaire, solitaire, hopitaux, cliniques, reconfort,AVC , AIT, attaque, accident, congestion cerebral, association , aide, france,victime, patient, vacsculaire, cerebrale, temoignage, liens, trouble, vaisseaux sanguins, cerveau, accident vasculaire c&eacute;r&eacute;braux, accident isch&eacute;mique transitoire, devouement, copain, copine, pere, mere, frere, soeur,dialoguer, discuter, rire, affinite, enfants fils filles">
<META NAME="Publisher" CONTENT="RIMBERT Olivier">
<META NAME="Revisit-After" CONTENT="30 days">
<META NAME="Robots" CONTENT="all">
<META NAME="GOOGLEBOT" CONTENT="NOARCHIVE">
<META http-equiv="Content-Type"
content="text/html; charset=iso-8859-1">
<META http-equiv="Pragma" CONTENT="no-cache">
<META content="handicaperencontre.fr rencontre pour pour les personnes handicap�s et valides victimes avc ou malades etc avec chat forum, profil v�rifi� avec chat forum, profil v�rifi� " name=title>
<style type="text/css">
<!--
body {
	background-color: #FFF5FF;
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
.Style13 {
	font-size: 12px;
	font-weight: bold;
}
.Style18 {color: #CCCCCC; font-weight: bold; }
.Style23 {
	color: #FF0000;
	font-weight: bold;
	font-size: 14px;
}
.Style24 {font-size: 18px}
-->
</style>
<script type="text/JavaScript">
<!--
function MM_openBrWindow(theURL,winName,features) { //v2.0
  window.open(theURL,winName,features);
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
<table width="800"  border="0" align="left" cellpadding="1" cellspacing="0" bgcolor="#000000">
  <tr>
    <td><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
      <tr bgcolor="#96ACC2"><td colspan="5" bgcolor="#FBE7F3"><div align="center"><a href="http://www.handicaperencontre.fr/indexiden.php"></td></a>
      </tr>
      <tr bgcolor="#567596">
        <td colspan="5" bgcolor="#FBE7F3"><div align="center" class="Style12">
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td colspan="8"><a href="indexiden.php"><img src="logo/logo.jpg" width="906" height="112" border="0"></a><script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- 728x90 bani�re1 -->
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
        </form></td>
        <td width="5" bgcolor="#FFDFFF">&nbsp;</td>
        <td colspan="2" valign="top" bgcolor="#FFFFFF"><table width="650"  border="0" cellspacing="13" cellpadding="1">
          <tr>
            <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                <tr bgcolor="#AFBFCF">
                  <td bgcolor="#FFDFFF"><div align="center"><a href="photo.php?action=aff_ajouter" class="Style24">Ajouter une photo </a></div></td>
                </tr>
                <tr bgcolor="#AFBFCF">
                  <?
						// les actions a afficher
						if ($resultat_ajouter != "") {
							echo "<td height='118' bgcolor='#AFBFCF'>
 <strong>$resultat_ajouter</strong>
                        </td>";
							}
							
						if ($aff_ajouter == "oui") {
						echo "<td height='118' bgcolor='#AFBFCF'><form enctype='multipart/form-data' action='photo.php?action=ajouter' method='post'>
                          <table width='100%' border='0' cellspacing='0' cellpadding='3'>
                            <tr>
                              <td width='17%'><strong>Votre photo : </strong></td>
                              <td width='83%'><input name='chemin' type='file' id='chemin' size='40'></td>
                            </tr>
                            <tr>
                              <td><strong>Description : </strong></td>
                              <td><input name='description' type='text' id='description' size='70' maxlength='200'></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td><input type='submit' name='Submit3' value='Envoyer votre photo'></td>
                            </tr>
                          </table>
                         </form>
                        </td>";
						}
						
						
						if ($aff_modifier == "oui") {
						echo "<td height='118' bgcolor='#AFBFCF'><form enctype='multipart/form-data' action='photo.php?action=modifier&id=$id' method='post'>
                          <table width='100%' border='0' cellspacing='0' cellpadding='3'>
                            <tr>
                              <td width='17%'><strong>Votre photo : </strong></td>
                              <td width='83%'><input name='chemin' type='file' id='chemin' size='40'></td>
                            </tr>
                            <tr>
                              <td><strong>Description : </strong></td>
                              <td><input name='description' type='text' id='description' size='70' maxlength='200'></td>
                            </tr>
                            <tr>
                              <td>&nbsp;</td>
                              <td><input type='submit' name='Submit3' value='Modifier votre photo'></td>
                            </tr>
                          </table>
                         </form>
                        </td>";
						}
						?>
                </tr>
            </table></td>
          </tr>
          <tr align="center" bgcolor="#96ACC2">
            <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                <tr bgcolor="#AFBFCF">
                  <td bgcolor="#FFDFFF"><div align="center">
                      <p class="Style11">::. Etape 4  - Votre album photo .::<br />
                      </p>
                  </div></td>
                </tr>
                <tr bgcolor="#AFBFCF">
                  <td bgcolor="#FFFFFF"><div align="left">
                      <table width="100%"  border="0" cellspacing="7" cellpadding="0">
                        <tr>
                          <td colspan="2" bgcolor="#F8E6F6"><div align="left" class="Style23">La photo ne doit pas prendre plus de 30 secondes &agrave; se charger sur le site! </div></td>
                        </tr>
                        <tr>
                          <? 
							  
							  //r&eacute;cup&eacute;ration des donn&eacute;es
							  
							  $query = "SELECT * FROM photo WHERE pseudo='$pseudo_ident'"; 
$compt=0;
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
	$row = mysql_fetch_row($r);
	
for($i=0;$i < 6;$i++) {

	$image = $row[2+$i];
	$description = $row[8+$i];
	$description = str_replace("&sect;&sect;","'",$description);
	$image2=$image;
$image = "./photos/".$pseudo_ident."/".$image2;
	if ($image2!="") {
			$compt++;	
		// place du texte
		echo "	  <tr><td rowspan='2' valign='top'><table width='120' border='1' cellspacing='0' cellpadding='0'>
                                  <tr>
                                    <td><a href='photo.php'><img src='$image' width='120' height='120' onclick=\"MM_openBrWindow('$image','$pseudo_ident','scrollbars=yes,width=800,height=600')\"></a></td>
                                  </tr>
                                </table></td>
                                <td width='78%' height='90' valign='top' bgcolor='#D8D8D8'><div align='left'><strong><span class='Style12'>DESCRIPTION :</span><br> 
                                  <br>
                                $description </strong></div></td>
                              </tr>
                              <tr>
                                <td height='10'><table width='100%' border='1' cellspacing='0' cellpadding='0'>
                                  <tr>
                                    <td bgcolor='#DBE2EA'><div align='center'><a href='photo.php?action=suprimer&id=$i'>Suprimer</a></div></td>
                                    <td bgcolor='#DBE2EA'><div align='center'><a href='photo.php?action=modifier_aff&id=$i'>Modifier</a></div></td>
                                    <td bgcolor='#DBE2EA'><div align='center'><a href='photo.php?action=profil&image=$image2&id=$i'>Afficher dans votre profil </a></div></td>
                                    </tr>
                                </table></td>  </tr>";

			  }
			
			  }
			

						 
					
                         
						 
							  
                                
                              
							  
							  ?>
                          <td colspan="2"><div align="center"></div></td>
                        </tr>
                        <tr>
                          <td width="22%" valign="top" bgcolor="#D8DFE7"><div align="center"><a href="photo.php?action=aff_ajouter"><span class="Style13">Ajouter</span></a><span class="Style13"></span></div></td>
                          <td bgcolor="#D8DFE7"><input name="ins" type="hidden" id="ins" value="oui" />
                              <span class="Style13">Vous avez <? echo $compt; ?> photos sur 6 dispo : <a href="photo.php?action=aff_ajouter">Ajouter une photo </a></span></td>
                        </tr>
                        <tr>
                          <td colspan="2"><div align="center"></div></td>
                        </tr>
                      </table>
                  </div></td>
                </tr>
            </table></td>
          </tr>
          <tr bgcolor="#96ACC2">
            <td bgcolor="#FFFFFF"><form action="profil.php?pseudo_envoi=<? echo $pseudo_ident; ?>" method="post" name="form2" id="form2">
                <div align="center">
                  <input type="submit" name="Submit2" value="Terminer" />
                </div>
            </form></td>
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
