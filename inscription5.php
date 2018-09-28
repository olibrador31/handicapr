<?
require '_bdd.php';
require '_identification.php';
require '_restriction.php';
require 'lignechat.php';$resultat_ajouter="";
$aff_modifier = "";

if (htmlspecialchars($_GET['action'])=="suprimer") {
$id=htmlspecialchars($_GET['id']);
$id++;

	$query = "UPDATE photo SET image_$id='' WHERE pseudo='$pseudo_ident'"; 
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
}

if (htmlspecialchars($_GET['action'])=="modifier_aff") {
$aff_modifier = "oui";
$id=htmlspecialchars($_GET['id']);
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


if ($_GET['action']=="modifier") {
$id=$_GET['id'];
$img = $_FILES['chemin']['name'];
$desc = $_POST['description'];
// vérifie le type de fichier
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
				$resultat_ajouter = "Le fichier est valide, et a été téléchargé
				avec succès et à modifiée la précédente. Cette photo est à présent la photo affiché dans votre profil.";
				
				
				

				// compression et transformation en jpg
				$img_src = $uploadfile;   // chemin de l'image source 
				$img_dest =  $uploadfile;  // chemin de l'image à créer 

				// récupération de la taille 
			  $size = @GetImageSize($img_src); 
			  $src_w = $size[0]; 
			  $src_h = $size[1]; 

				$dst_w =  800;          // largeur de l'image à créer 
				$dst_h =  600;        // h auteur de l'image à créer 
				  
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
			  
			  // crée la copie redimensionnée 
			  @ImageCopyResampled($dst_img, $src_img, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h); 
			  // --> jpg 
			  @ImageJpeg($dst_img, $img_dest); 
			  // destruction des images temporaires 
			  @ImageDestroy($dst_img); 
			  @ImageDestroy($src_img); 
			  
				} else {
				$resultat_ajouter = "Votre fichier n'a pas été pris en compte,les midification n'ont pas pu avoir lieux désoler.";
				}
				$description_photo=htmlspecialchars($_POST['description']);
	$desc = str_replace("'","§§",$description_photo);
		$query = "UPDATE photo SET image_$id='$img',desc_$id='$desc' WHERE pseudo='$pseudo_ident'"; 
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
				}
			else {
			 	$resultat_ajouter = "Votre fichier n'est pas une image, si votre image est au format BMP veuillez la convertir au format JPG (Utilisez votre logiciel de visualisation d'image et faite : Fichier , Enregistrer sous, et séléctionné Type : JPEG File. Merci";
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




			// vérifie le type de fichier
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
				$resultat_ajouter = "Le fichier est valide, et a été téléchargé
				avec succès. Cette photo est à présent la photo affiché dans votre profil.";


				
				

				// compression et transformation en jpg
				$img_src = $uploadfile;   // chemin de l'image source 
				$img_dest =  $uploadfile;  // chemin de l'image à créer 

				// récupération de la taille 
			  $size = @GetImageSize($img_src); 
			  $src_w = $size[0]; 
			  $src_h = $size[1]; 

				$dst_w =  800;          // largeur de l'image à créer 
				$dst_h =  600;        // h auteur de l'image à créer 
				  
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
			  
			  // crée la copie redimensionnée 
			  @ImageCopyResampled($dst_img, $src_img, 0, 0, 0, 0, $dst_w, $dst_h, $src_w, $src_h); 
			  // --> jpg 
			  @ImageJpeg($dst_img, $img_dest); 
			  // destruction des images temporaires 
			  @ImageDestroy($dst_img); 
			  @ImageDestroy($src_img); 
			  
				} else {
				$resultat_ajouter = "Votre fichier n'a pas été pris en compte, désoler.";
				}
				$description_photo=$_POST['description'];
	$description_photo = str_replace("'","§§",$description_photo);
				$query = "UPDATE photo SET $place_photo='$url_photo',$desc_photo='$description_photo',afficher='$url_photo' WHERE pseudo='$pseudo_ident'"; 
				$r = mysql_query($query) or die ("Pas pris ");
				}
			else {
			 	$resultat_ajouter = "Votre fichier n'est pas une image, si votre image est au format BMP veuillez la convertir au format JPG (Utilisez votre logiciel de visualisation d'image et faite : Fichier , Enregistrer sous, et séléctionné Type : JPEG File. Merci";
				}
			}



}




// affichage des photo


?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>vos photos sur le site de rencontre gratuit pour handicapés valides victimes d'avc, ou malades et leurs familles</title>
<META NAME="Author" CONTENT="Olivier RIMBERT">
<META NAME="Category" CONTENT="rencontre,handicap,handicapé,forum,discution">
<META NAME="Copyright" CONTENT="RIMBERT Olivier">
<META http-equiv=content-language content=fr-ca>
<META NAME="Description" CONTENT=" vos photos sur le site de rencontres gratuites pour handicapés et valides en france pour les célibataires qui désirent trouver l'amour, l'âme soeur, créer de nouvelles amitiés avec chat et forum pour aider les malades et leurs proches a se parler, a se connaitre,se rencontrer  et a trouver des solutions, surtout ne restez pas isolé, avc, traumatisme cranien, discutions et échange entre handicapés et valides  malades handicapés discutions sur rééducation et travail. réseau social sur le handicap et la rencontre en france. Rejoignez notre communauté de malades valides et handicapés pour des échanges de plus en plus nombreux et entièrement gratuit en france avec chat et forum sur le handicap bienvenu sur l accueil du site de handicaperencontre.fr site de rencontre gratuit">
<META NAME="Identifier-URL" CONTENT="http://www.handicaperencontre.fr/">
<META NAME="Keywords" CONTENT="rencontre, rencontres, rencontre handicapés valides, rencontre handicapé valide, rencontre gratuite handicapés, handicaps,handicap,rencontres, handicapés, rencontre handicapés, rencontre handicapé, traumatisme cranien, rencontre, traumatisme cranien, aidetraumatisme cranien, aide AVC Accident Vasculaire Cerebral, Attaque Cérébrale, AIT, Accident Ischémique Transitoire, Hémorragie Cérébrale, rencontre et aide, sida,cancer, maladie grave, anévrisme,aide rencontre, cancer, curie,institut curie,donateurs, sein, prostate, oeil,rencontre et aide profession maladie, avtivite professionnelle, symptome sclérose, symptome sclérose en plaque, traitement sclérose en plaque, 
 , sarcome, metastase,  biologie, immunotherapie,, angiogenese, pharmacochimie, physique, genotoxicologie, bio-informatique, rencontre, aide, sclerose en plaques symptomes, maladie longue duree, scleroses en plaques, sclérose, malades sep, 
cacer, amitie, isole, contact, contacts humain, solidarite,syndrome, ald,  solidaire, solitaire, hopitaux, cliniques, reconfort,AVC , AIT, attaque, accident, congestion cerebral, association , aide, france,victime, patient, vacsculaire, cerebrale, temoignage, liens, trouble, vaisseaux sanguins, cerveau, accident vasculaire c&eacute;r&eacute;braux, accident isch&eacute;mique transitoire, devouement, copain, copine, pere, mere, frere, soeur,dialoguer, discuter, rire, affinite, enfants fils filles">
<META NAME="Publisher" CONTENT="RIMBERT Olivier">
<META NAME="Revisit-After" CONTENT="30 days">
<META NAME="Robots" CONTENT="all">
<META NAME="GOOGLEBOT" CONTENT="NOARCHIVE">
<META http-equiv="Content-Type"
content="text/html; charset=iso-8859-1">
<META http-equiv="Pragma" CONTENT="no-cache">
<META content="handicaperencontre.fr rencontre pour pour les personnes handicapés et valides victimes avc ou malades etc avec chat forum, profil vérifié avec chat forum, profil vérifié " name=title>
<style type="text/css">
<!--
body {
	background-color: #FAEEF8;
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
      <tr bgcolor="#96ACC2"><td colspan="4" bgcolor="#FBE7F3"><div align="center"><img src="img/logo.jpg" width="800" height="116" border="0"></td></tr>
      <tr bgcolor="#96ACC2">

        <td valign="top" bgcolor="#FFFFFF"><table width="650"  border="0" cellspacing="13" cellpadding="1">
          <tr>
            <td bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
            </table>
              <strong>Pour ajouter une photo et la faire parraitre, clickez sur <a href="inscription5.php?action=aff_ajouter">AJOUTER</a> <br>
              </strong></td>
          </tr>
          <tr align="center" bgcolor="#96ACC2">
            <td bgcolor="#567596"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                <tr bgcolor="#AFBFCF">
                  <td bgcolor="#FFDFFF"><div align="center">
                      <p><span class="Style11">::. Etape 4  - Votre album photo .::</span><br />
                      </p>
                  </div></td>
                </tr>
                <tr bgcolor="#AFBFCF"><?
						// les actions a afficher
						if ($resultat_ajouter != "") {
							echo "<td height='118' bgcolor='#AFBFCF'>
 <strong>$resultat_ajouter</strong>
                        </td>";
							}
							
						if ($aff_ajouter == "oui") {

// aaaaa metre le 1 sur la base user qu il a une photo de phofil

$queryp = "UPDATE user SET photo='1' WHERE pseudo='$pseudo_ident'"; 
	// Execute la requete
	$rp = mysql_query($queryp) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
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
                  <td bgcolor="#FFFFFF"><div align="left">
                      <table width="100%"  border="0" cellspacing="7" cellpadding="0">
                        <tr>
                          <td colspan="2" bgcolor="#FFE8FB"><div align="left" class="Style23">La photo ne doit pas prendre plus de 30 secondes &agrave; se charger sur le site! </div></td>
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
                                    <td><a href='inscription5.php'><img src='$image' width='120' height='120' onclick=\"MM_openBrWindow('$image','$pseudo_ident','scrollbars=yes,width=800,height=600')\"></a></td>
                                  </tr>
                                </table></td>
                                <td width='78%' height='90' valign='top' bgcolor='#D8D8D8'><div align='left'><strong><span class='Style12'>DESCRIPTION :</span><br> 
                                  <br>
                                $description </strong></div></td>
                              </tr>
                              <tr>
                                <td height='10'><table width='100%' border='1' cellspacing='0' cellpadding='0'>
                                  <tr>
                                    <td bgcolor='#DBE2EA'><div align='center'><a href='inscription5.php?action=suprimer&id=$i'>Suprimer</a></div></td>
                                    <td bgcolor='#DBE2EA'><div align='center'><a href='inscription5.php?action=modifier_aff&id=$i'>Modifier</a></div></td>
                                    <td bgcolor='#DBE2EA'><div align='center'><a href='inscription5.php?action=profil&image=$image2&id=$i'>Afficher dans votre profil </a></div></td>
                                    </tr>
                                </table></td>  </tr>";

			  }
			
			  }
			

						 
					
                         
						 
							  
                                
                              
							  
							  ?>
                          <td colspan="2"><div align="center"></div></td>
                        </tr>
                        <tr>
                          <td width="22%" valign="top" bgcolor="#D8DFE7"><div align="center"><a href="inscription5.php?action=aff_ajouter"><span class="Style13">Ajouter</span></a><span class="Style13"></span></div></td>
                          <td bgcolor="#D8DFE7"><input name="ins" type="hidden" id="ins" value="oui" />
                              <span class="Style13">Vous avez <? echo $compt; ?> photos sur 6 dispo : <a href="inscription5.php?action=aff_ajouter">Ajouter une photo </a></span></td>
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
                  <input type="submit" name="Submit2" value="Terminer l'inscription" />
                </div>
            </form></td>
          </tr>
        </table></td>
      </tr>
      <tr bgcolor="#96ACC2">
        <td colspan="3" bgcolor="#FFF0FF"><div align="center"><img src="img/bas.jpg" width="800" height="53" /></div></td>
      </tr>
    </table></td>
  </tr>
</table>
<p>&nbsp;</p>
</body>
</html>
