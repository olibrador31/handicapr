<?


require '_bdd.php';
require '_identification.php';

if($_GET['id'] != 2) {

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
	$age=htmlspecialchars($_POST['age']);
	$sexe=$_POST['sexe'];
	$taille=htmlspecialchars($_POST['taille']);
	$poids=htmlspecialchars($_POST['poids']);
	$yeux=$_POST['yeux'];
	$cheveux=$_POST['cheveux'];
	$style=$_POST['style'];
	$silouhaite=$_POST['silouhaite'];
	$departement=$_POST['departement'];
	$ville=htmlspecialchars($_POST['ville']);
	$profession=$_POST['profession'];
	$prenom=htmlspecialchars($_POST['prenom']);
	$situation=$_POST['situation'];
	$fumeur=$_POST['fumeur'];
	$esprit=$_POST['esprit'];
	$ville = str_replace("'"," ",$ville);


	$sess = session_id();
	$query = "UPDATE user SET age='$age',sexe='$sexe',taille='$taille',poid='$poids',yeux='$yeux',cheveux='$cheveux',style='$style',silouhaite='$silouhaite',departement='$departement',ville='$ville',profession='$profession',prenom='$prenom',situation='$situation',fumeur='$fumeur',esprit='$esprit' WHERE session='$sess'"; 
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris ");
	
	if($sexe=="Homme") {$sexe_chat=1;} else {$sexe_chat=0;}
	

	$req = "'inscription3.php'";
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
<title>information sur votre inscription rencontre gratuit pour handicapés valides victimes d'avc, ou malades et leurs familles</title>
<META NAME="Author" CONTENT="Olivier RIMBERT">
<META NAME="Category" CONTENT="rencontre,handicap,handicapé,forum,discution">
<META NAME="Copyright" CONTENT="RIMBERT Olivier">
<META http-equiv=content-language content=fr-ca>
<META NAME="Description" CONTENT=" plus de détail sur votre inscription handicaperencontre.fr rencontres gratuites pour handicapés et valides en france pour les célibataires qui désirent trouver l'amour, l'âme soeur, créer de nouvelles amitiés avec chat et forum pour aider les malades et leurs proches a se parler, a se connaitre,se rencontrer  et a trouver des solutions, surtout ne restez pas isolé, avc, traumatisme cranien, discutions et échange entre handicapés et valides  malades handicapés discutions sur rééducation et travail. réseau social sur le handicap et la rencontre en france. Rejoignez notre communauté de malades valides et handicapés pour des échanges de plus en plus nombreux et entièrement gratuit en france avec chat et forum sur le handicap bienvenu sur l accueil du site de handicaperencontre.fr site de rencontre gratuit">
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
	background-color: #FCEFF9;
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
<form action="inscription2.php" method="post" name="form1">
  <table width="800"  border="0" align="left" cellpadding="1" cellspacing="0" bgcolor="#000000">
    <tr>
      <td><table width="100%"  border="0" align="center" cellpadding="0" cellspacing="0">
         <tr bgcolor="#96ACC2"><td colspan="4" bgcolor="#FBE7F3"><div align="center"><img src="img/logo.jpg" width="800" height="116" border="0"></td></tr>
          <tr bgcolor="#96ACC2">

            <td valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="13" cellpadding="1">
              
              <tr align="center" bgcolor="#96ACC2">
                <td width="65%" bgcolor="#FFFFFF"><table width="400"  border="0" cellspacing="0" cellpadding="3">
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFDFFF"><div align="center">
                          <p><span class="Style11">::. Etape 2  - Votre description .::</span><br />
                          </p>
                      </div></td>
                    </tr>
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFFFFF"><div align="left">
                          <table width="100%"  border="0" cellspacing="7" cellpadding="0">
                            <tr>
                              <td colspan="2" bgcolor="#FFE8FB"><div align="left"><strong>A quoi vous ressemblez ? </strong></div></td>
                            </tr>
                            <tr>
                              <td><div align="right">Age&nbsp;: </div></td>
                              <td><div align="left">
                                <select name="age" id="age">
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35</option>
                                    <option value="36">36</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                    <option value="43">43</option>
                                    <option value="44">44</option>
                                    <option value="45">45</option>
                                    <option value="46">46</option>
                                    <option value="47">47</option>
                                    <option value="48">48</option>
                                    <option value="49">49</option>
                                    <option value="50">50</option>
                                    <option value="51">51</option>
                                    <option value="52">52</option>
                                    <option value="53">53</option>
                                    <option value="54">54</option>
                                    <option value="55">55</option>
                                    <option value="56">56</option>
                                    <option value="57">57</option>
                                    <option value="58">58</option>
                                    <option value="59">59</option>
                                    <option value="60">60</option>
                                    <option value="61">61</option>
                                    <option value="62">62</option>
                                    <option value="63">63</option>
                                    <option value="64">64</option>
                                    <option value="65">65</option>
                                    <option value="66">66</option>
                                    <option value="67">67</option>
                                    <option value="68">68</option>
                                    <option value="69">69</option>
                                    <option value="70">70</option>
                                    <option value="71">71</option>
                                    <option value="72">72</option>
                                    <option value="73">73</option>
                                    <option value="74">74</option>
                                    <option value="75">75</option>
                                    <option value="76">76</option>
                                    <option value="77">77</option>
                                    <option value="78">78</option>
                                    <option value="79">79</option>
                                    <option value="80">80</option>
                                  </select>
                                  <input name="ins" type="hidden" id="ins" value="oui" />
                              </div></td>
                            </tr>
                            <tr>
                              <td><div align="right">Sexe :</div></td>
                              <td><div align="left">
                                <select name="sexe" id="select">
                                    <option value="Femme" selected="selected">Femme</option>
                                    <option value="Homme">Homme</option>
                                    <option value="Couple">Couple</option>
                                  </select>
                              </div></td>
                            </tr>
                            <tr>
                              <td width="50%"><div align="right">Taille (cm) :</div></td>
                              <td><div align="left">
                                  <input name="taille" type="text" id="taille" size="6" maxlength="3" />
                              </div></td>
                            </tr>
                            <tr>
                              <td><div align="right">Poids&nbsp;(kg) : </div></td>
                              <td><div align="left">
                                  <input name="poids" type="text" id="poids" size="6" maxlength="3" />
                              </div></td>
                            </tr>
                            <tr>
                              <td><div align="right">Couleur des yeux&nbsp;:</div></td>
                              <td><div align="left">
                                <SELECT 
                          name=yeux id="yeux">
                                  <option value="Myst&egrave;re" selected>Myst&egrave;re</option>
                                  <option value="Bleus">Bleus</option>
                                  <option value="Gris">Gris</option>
                                  <option value="Marrons">Marrons</option>
                                  <option value="Noirs">Noirs</option>
                                  <option value="Pers">Pers</option>
                                  <option value="Verts">Verts</option>
                                  <option value="Autre">Autre</option>
                                </SELECT>
                                </div></td>
                            </tr>
                            <tr>
                              <td><div align="right">Couleur des cheveux : </div></td>
                              <td><div align="left">
                                <SELECT 
                          name=cheveux id="cheveux">
                                  <option value="Myst&egrave;re" selected>Myst&egrave;re</option>
                                  <option value="Auburn">Auburn</option>
                                  <option value="Blancs">Blancs</option>
                                  <option value="Blonds">Blonds</option>
                                  <option value="Bruns">Bruns</option>
                                  <option value="Ch&acirc;tains">Ch&acirc;tains</option>
                                  <option value="Poivre et sel">Poivre et sel</option>
                                  <option value="Noirs">Noirs</option>
                                  <option value="Roux">Roux</option>
                                  <option value="Sans">Sans</option>
                                  <option value="Autre">Autre</option>
                                </SELECT>
                                </div></td>
                            </tr>
                            <tr>
                              <td><div align="right">Style&nbsp;:</div></td>
                              <td><div align="left">
                                  <select name="style" id="select4">
                                    <option value="Myst&egrave;re" selected>Myst&egrave;re</option>
                                    <option value="BCBG">BCBG</option>
                                    <option value="Classique">Classique</option>
                                    <option value="D&eacute;contract&eacute;">D&eacute;contract&eacute;</option>
                                    <option value="Habill&eacute;">Habill&eacute;</option>
                                    <option value="Sport">Sport</option>
                                  </select>
                              </div></td>
                            </tr>
                            <tr>
                              <td><div align="right">Silhouette&nbsp;:</div></td>
                              <td><div align="left">
                                  <select name="silouhaite" id="select5">
                                    <option value="Myst&egrave;re" selected>Myst&egrave;re</option>
                                    <option value="Fine">Fine</option>
                                    <option value="Ronde">Ronde</option>
                                    <option value="Sportive">Sportive</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Tr&egrave;s fine">Tr&egrave;s fine</option>
                                    <option value="Tr&egrave;s ronde">Tr&egrave;s ronde</option>
                                    <option value="Autre">Autre</option>
                                  </select>
                              </div></td>
                            </tr>
                            <tr>
                              <td colspan="2">&nbsp;</td>
                            </tr>
                            <tr>
                              <td colspan="2" bgcolor="#FFE8FB"><div align="left"><strong>Un peu plus sur vous </strong></div></td>
                            </tr>
                            <tr>
                              <td><div align="right">D&eacute;partement&nbsp;:</div></td>
                              <td><div align="left">
                                  <select name="departement" id="departement">
                                    <option value="Suisse">Suisse</option>
                                    <option value="Belgique">Belgique</option>
                                    <option value="Ain" selected>Ain</option>
                                    <option value="Aisne">Aisne</option>
                                    <option value="Allier">Allier</option>
                                    <option value="Alpes-de-Hte-Prov">Alpes-de-Hte-Prov.</option>
                                    <option value="Alpes-Maritimes">Alpes-Maritimes</option>
                                    <option value="Ard&egrave;che">Ard&egrave;che</option>
                                    <option value="Ardennes">Ardennes</option>
                                    <option value="Arri&egrave;ge">Arri&egrave;ge</option>
                                    <option value="Aube">Aube</option>
                                    <option value="Aude">Aude</option>
                                    <option value="Aveyron">Aveyron</option>
                                    <option value="Bas-Rhin">Bas-Rhin</option>
                                    <option value="Bouches-du-Rh&ocirc;ne">Bouches-du-Rh&ocirc;ne</option>
                                    <option value="Calvados">Calvados</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Cantal">Cantal</option>
                                    <option value="Charente">Charente</option>
                                    <option value="Charente-Maritime">Charente-Maritime</option>
                                    <option value="Cher">Cher</option>
                                    <option value="Corr&egrave;ze">Corr&egrave;ze</option>
                                    <option value="Corse">Corse</option>
                                    <option value="Cotes-d'Armor">Cotes-d'Armor</option>
                                    <option value="Creuse">Creuse</option>
                                    <option value="Deux-S&egrave;vres">Deux-S&egrave;vres</option>
                                    <option value="Dordogne">Dordogne</option>
                                    <option value="Doubs">Doubs</option>
                                    <option value="Dom-Tom">Dom-Tom</option>
                                    <option value="Dr&ocirc;me">Dr&ocirc;me</option>
                                    <option value="Essonne">Essonne</option>
                                    <option value="Eure">Eure</option>
                                    <option value="Eure-et-Loir">Eure-et-Loir</option>
                                    <option value="Finist&egrave;re">Finist&egrave;re</option>
                                    <option value="Gard">Gard</option>
                                    <option value="Gers">Gers</option>
                                    <option value="Gironde">Gironde</option>
                                    <option value="Haute-Garonne">Haute-Garonne</option>
                                    <option value="Haute-Loire">Haute-Loire</option>
                                    <option value="Haute-Marne">Haute-Marne</option>
                                    <option value="Hautes-Alpes">Hautes-Alpes</option>
                                    <option value="Haute-Saone">Haute-Saone</option>
                                    <option value="Haute-Savoie">Haute-Savoie</option>
                                    <option value="Hautes-Pyr&eacute;n&eacute;es">Hautes-Pyr&eacute;n&eacute;es</option>
                                    <option value="Haute-Vienne">Haute-Vienne</option>
                                    <option value="Haut-Rhin">Haut-Rhin</option>
                                    <option value="Hauts-de-Seine">Hauts-de-Seine</option>
                                    <option value="H&eacute;rault">H&eacute;rault</option>
                                    <option value="Ille-et-Vilaine">Ille-et-Vilaine</option>
                                    <option value="Indre">Indre</option>
                                    <option value="Indre-et-Loire">Indre-et-Loire</option>
                                    <option value="Is&egrave;re">Is&egrave;re</option>
                                    <option value="Jura">Jura</option>
                                    <option value="Landes">Landes</option>
                                    <option value="Loire">Loire</option>
                                    <option value="Loire-Atlantique">Loire-Atlantique</option>
                                    <option value="Loiret">Loiret</option>
                                    <option value="Loir-et-Cher">Loir-et-Cher</option>
                                    <option value="Lot">Lot</option>
                                    <option value="Lot-et-Garonne">Lot-et-Garonne</option>
                                    <option value="Loz&egrave;re">Loz&egrave;re</option>
                                    <option value="Maine-et-Loire">Maine-et-Loire</option>
                                    <option value="Manche">Manche</option>
                                    <option value="Marne">Marne</option>
                                    <option value="Mayenne">Mayenne</option>
                                    <option value="Meurthe-et-Moselle">Meurthe-et-Moselle</option>
                                    <option value="Meuse">Meuse</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Morbihan">Morbihan</option>
                                    <option value="Moselle">Moselle</option>
                                    <option value="Ni&egrave;vre">Ni&egrave;vre</option>
                                    <option value="Nord">Nord</option>
                                    <option value="Oise">Oise</option>
                                    <option value="Orne">Orne</option>
                                    <option value="Paris">Paris</option>
                                    <option value="Pas-de-Calais">Pas-de-Calais</option>
                                    <option value="Puy-de-D&ocirc;me">Puy-de-D&ocirc;me</option>
                                    <option value="Pyr&eacute;n&eacute;es-Atlantiques">Pyr&eacute;n&eacute;es-Atlantiques</option>
                                    <option value="Pyr&eacute;n&eacute;es-Orientales">Pyr&eacute;n&eacute;es-Orientales</option>
                                    <option value="Rhones">Rhones</option>
                                    <option value="Saone-et-Loire">Saone-et-Loire</option>
                                    <option value="Sarthes">Sarthes</option>
                                    <option value="Savoie">Savoie</option>
                                    <option value="Seine-et-Marne">Seine-et-Marne</option>
                                    <option value="Seine-Maritime">Seine-Maritime</option>
                                    <option value="Seine-Saint-Denis">Seine-Saint-Denis</option>
                                    <option value="Somme">Somme</option>
                                    <option value="Tarn">Tarn</option>
                                    <option value="Tarn-et-Garonne">Tarn-et-Garonne</option>
                                    <option value="Territoire-de-Belfort">Territoire-de-Belfort</option>
                                    <option value="Val-de-Marne">Val-de-Marne</option>
                                    <option value="Val-d'OIse">Val-d'OIse</option>
                                    <option value="Var">Var</option>
                                    <option value="Vaucluse">Vaucluse</option>
                                    <option value="Vend&eacute;e">Vend&eacute;e</option>
                                    <option value="Vienne">Vienne</option>
                                    <option value="Vosges">Vosges</option>
                                    <option value="Yonne">Yonne</option>
                                    <option value="Yvelines">Yvelines</option>
                                    <option value="Autre">Autre</option>
                                    <option value="quebec">quebec</option>
                                  </select>
                              </div></td>
                            </tr>
                            <tr>
                              <td><div align="right">Ville&nbsp;:</div></td>
                              <td><div align="left">
                                  <input name="ville" type="text" id="ville2" maxlength="25" />
                              </div></td>
                            </tr>
                            <tr>
                              <td><div align="right">Profession&nbsp;:</div></td>
                              <td><div align="left">
                                <SELECT 
                        name=profession id="profession">
                                  <option value="Myst&egrave;re" selected>Myst&egrave;re</option>
                                  <option value="Agent de ma&icirc;trise">Agent de ma&icirc;trise</option>
                                  <option value="Agriculteur">Agriculteur</option>
                                  <option value="Artisan">Artisan</option>
                                  <option value="Cadre administratif">Cadre administratif</option>
                                  <option value="Cadre Technique">Cadre Technique</option>
                                  <option value="Commer&ccedil;ant">Commer&ccedil;ant</option>
                                  <option value="Commercial">Commercial</option>
                                  <option value="Dirigeant, cadre">Dirigeant, cadre</option>
                                  <option value="Employ&eacute;">Employ&eacute;</option>
                                  <option value="Enseignant">Enseignant</option>
                                  <option value="Etudiant">Etudiant</option>
                                  <option value="Fonctionnaire">Fonctionnaire</option>
                                  <option value="Ing&eacute;nieur">Ing&eacute;nieur</option>
                                  <option value="Journaliste">Journaliste</option>
                                  <option value="Ouvrier">Ouvrier</option>
                                  <option value="Arts et spectacles">Arts et spectacles</option>
                                  <option value="Lib&eacute;rale">Lib&eacute;rale</option>
                                  <option value="M&eacute;dicale">M&eacute;dicale</option>
                                  <option value="Param&eacute;dicale">Param&eacute;dicale</option>
                                  <option value="Retrait&eacute;">Retrait&eacute;</option>
                                  <option value="Technicien">Technicien</option>
                                  <option value="Autres">Autres</option>
                                </SELECT>
                                </div></td>
                            </tr>
                            <tr>
                              <td><div align="right">Pr&eacute;nom&nbsp;:</div></td>
                              <td><div align="left">
                                  <input name="prenom" type="text" id="prenom2" maxlength="20" />
                              </div></td>
                            </tr>
                            <tr>
                              <td><div align="right">Situation&nbsp;:</div></td>
                              <td><div align="left">
                                <select  
                        name=situation id="situation">
                                  <option value="Myst&egrave;re" selected>Myst&egrave;re</option>
                                  <option value="C&eacute;libataire">C&eacute;libataire</option>
                                  <option value="Mari&eacute; (e)">Mari&eacute; (e)</option>
                                  <option value="S&eacute;par&eacute; (e)">S&eacute;par&eacute; (e)</option>
                                  <option value="Divorc&eacute; (e)">Divorc&eacute; (e)</option>
                                  <option value="Veuf / Veuve">Veuf / Veuve</option>
                                  <option value="En couple">En couple</option>
                                </select>
                              </div></td>
                            </tr>
                            <tr>
                              <td><div align="right">Fumeur&nbsp;:</div></td>
                              <td><div align="left">
                                  <select name="fumeur" id="select8">
                                    <option value="Myst&egrave;re" selected>Myst&egrave;re</option>
                                    <option value="Oui,souvent">Oui,souvent</option>
                                    <option value="Oui,a l occasion">Oui,a l'occasion</option>
                                    <option value="Oui,rarement">Oui,rarement</option>
                                    <option value="Non,jamais">Non,jamais</option>
                                    <option value="Non,&ccedil;a me d&eacute;renge">Non,&ccedil;a me d&eacute;renge</option>
                                  </select>
                              </div></td>
                            </tr>
                            <tr>
                              <td><div align="right">But recherch&eacute; &nbsp;:</div></td>
                              <td><div align="left">
                                <select name="esprit" id="select2">
                                  <option value="Myst&egrave;re" selected>Myst&egrave;re</option>
                                  <option value="Amitier">Amitier</option>
                                  <option value="Relation s&eacute;rieuse">Relation s&eacute;rieuse</option>
                                  <option value="Sortie">Sortie</option>
                                  <option value="Discution">Discution</option>
                                  <option value="rencontre">rencontre</option>
                                  <option value="Sexe">Sexe</option>
                                    </select>
                              </div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><div align="left"></div></td>
                            </tr>
                            <tr>
                              <td colspan="2"><div align="center">
                                  <input type="submit" name="Submit2" value="Passez &agrave; l'&eacute;tape 3" />
                              </div></td>
                            </tr>
                          </table>
                      </div></td>
                    </tr>
                </table></td>
                <td width="35%" colspan="2" valign="top" bgcolor="#FFFFFF"><table width="100%"  border="0" cellspacing="0" cellpadding="3">
                    <tr bgcolor="#AFBFCF">
                      <td bgcolor="#FFF4FF"><p><br />
                          <br />
  &nbsp;&nbsp;&nbsp;S'il y a une erreur, la description de l'erreur se marque au-dessous du texte d'ent&ecirc;te de la page. </p>
                        <p>&nbsp;</p>
                        <p><FONT color=#999999 size=1>En application de 
                                l'article 34 de la loi Informatique et Libert&eacute;s du 6 
                                janvier 1978, vous disposez d'un droit d'acc&egrave;s et de 
                                rectification sur les informations vous concernant. Pour 
                                exercer ces droits, il vous suffit de modifier vos 
                                informations personnelles sur cette page ( &laquo;Votre profil  
                        &raquo; ) et dans &laquo; Votre espace &raquo;.</FONT></p></td>
                    </tr>
                </table></td>
              </tr>

            </table></td>
          </tr>
          <tr bgcolor="#96ACC2">
            <td colspan="3" bgcolor="#FFF0FF"><div align="center"><img src="img/bas.jpg" width="800" height="53" /></div></td>
          </tr>
      </table></td>
    </tr>
  </table>
</form>

</body>
</html>
