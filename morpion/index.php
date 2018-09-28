<?
require '_bdd.php';
require '_identification.php';
require '_restriction.php';
require 'lignechat.php';// On initialise le chrono 
function get_microtime() {
	list($usec, $sec) = explode(" ", microtime());
	return ((float)$usec + (float)$sec);
	}
$time_start = get_microtime();
?>
<html>
<head>
<META name="description" content="Jeu du Morpion imbattable développé en php. License GPL. Auteur : Matthieu Aubry">
<META name="keywords" content="jeu,morpion,php,imbattable,difficile,facile,développement,license, gpl,phpmyvisites">
<META name="robots" content="all">
<META name="revisit-after" content="8 day">
<style type="text/css">

H1
    {
    FONT-SIZE: 16pt;
	text-align:center;
	font-family: tahoma, verdana;
	color: black;
    }
H2
    {
    FONT-SIZE: 15pt;
	text-align:center;
	font-family:  verdana;
	color: #110662;
    }
TD
    {
    FONT-SIZE: 11pt;
	font-family:  verdana;
	color: black;
    }
	
A:link 
	{
	font-size : 11pt; 
	color : #444444; 
	text-decoration : none;
	font-family : verdana, tahoma, arial; 
	}

A:visited 
	{
	font-size : 11pt; 
	text-decoration : none;
	color : #444444; 
	font-family : verdana, tahoma, arial; 
	} 

A:active 
	{
	font-size : 11pt; 
	text-decoration : none;
	color : #767676; 
	font-family : verdana, tahoma, arial; 
	} 

A:hover 
	{
	text-decoration : underline; 
	color : #767676; 
	font-family : verdana, tahoma, arial;
	font-size : 11pt; 
	} 

A.l:link 
	{
	font-size : 11pt; 
	color : darkblue;
	text-decoration : none;
	font-family : verdana, tahoma, arial; 
	} 

A.l:visited 
	{
	font-size : 11pt; 
	text-decoration : none;
	color : darkblue; 
	font-family : verdana, tahoma, arial; 
	} 

A.l:active 
	{
	font-size : 11pt; 
	text-decoration : none;
	color : darkblue; 
	font-family : verdana, tahoma, arial; 
	} 

A.l:hover 
	{
	text-decoration : underline; 
	color : darkblue; 
	font-family : verdana, tahoma, arial;
	font-size : 11pt; 
	} 
</style>
<META name="robots" content="all">
<META name="revisit-after" content="7 day">
<META http-equiv="Content-Language" content="fr-FR">
<META name="author" content="Matthieu Aubry">
<META http-equiv="Reply-to" content="matthieu.webdesign@free.fr">
<META name="copyright" content="phpMyVisites">
<meta charset="utf-8">
</head>
<body><td colspan="5" bgcolor="#FBE7F3"><div align="center" class="Style12">
  <table border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td colspan="8"><a href="indexiden.php"><img src="logo/logo.jpg" width="906" height="112" border="0"></a>
          <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
          <!-- 728x90 bani&egrave;re1 -->
          <ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-1493739445870732"
     data-ad-slot="7527634302"></ins>
          <script>
(adsbygoogle = window.adsbygoogle || []).push({});
    </script></td>
    </tr>
    <tr>
      <td><a href="http://www.handicaperencontre.fr/indexiden.php"><img src="logo/acceuil.jpg" width="220" height="29" border="0"></a></td>
      <td><a href="http://www.handicaperencontre.fr/jeux.php"><img src="logo/jeux.jpg" width="76" height="29" border="0"></a></td>
      <td><a href="http://www.handicaperencontre.fr/forum_sujet.php"><img src="logo/forum.jpg" width="76" height="29" border="0"></a></td>
      <td><a href="http://www.handicaperencontre.fr/mur.php?pseudo_envoi=<? echo $moi;?>"><img src="logo/mur.jpg" width="97" height="29" border="0"></a></td>
      <td><a href="http://www.handicaperencontre.fr/photo.php"><img src="logo/photo.jpg" width="120" height="29" border="0"></a></td>
      <td><a href="http://www.handicaperencontre.fr/recherche.php"><img src="logo/recherche.jpg" width="112" height="29" border="0"></a></td>
      <td><a href="http://www.handicaperencontre.fr/message.php"><img src="logo/message.jpg" width="98" height="29" border="0"></a></td>
      <td><a href="http://www.handicaperencontre.fr/chat.php?pseudo_envoi=<? echo $moi;?>"><img src="logo/chat.jpg" width="99" height="28" border="0"></a></td>
    </tr>
  </table>
  <strong>
  <? if($pass_reel==$pass_ident and !empty($pass_ident) ) echo"<a href='inscription2.php'>modifier Votre profil---</a><a href='supr.php'>supprimer votre profil</a>";?>
  <img src="img/B_USRLIST.PNG" width="16" height="16">
  <? if($erreur_ident=="") { echo $message_acceuil; } else { echo $erreur_ident; } ?>
  </strong> </strong><a href="http://www.speedrencontre.fr/"> </div></td>



<h1>Jeu du morpion </h1>
<br>
<table align=center cellpadding=0 cellspacing=0>
<tr>
  <td><?php

$nb_joueurs1=0;
$nb_joueurs2=0;
$nb_joueurs3=0;

if(isset($_GET['p']))
{ 
	if($_GET['p']=='contacts'){ print("Ce script a été réalisé par Matthieu Aubry.<br><br> Contacts : <a href=\"mailto:matthieu@phpmyvisites.net\">matthieu@phpmyvisites.net</a>"); }
	elseif($_GET['p']=='changelog'){ include "CHANGELOG.htm"; }
	elseif($_GET['p']=='license'){ include "LICENSE.htm"; }
}
elseif(!isset($_GET["level"]) && !isset($_POST["level"]))
{
	print("<b>Choisir un niveau de difficulté :</b> <br><br> <a href=\"".$_SERVER['PHP_SELF'] ."?level=1\" class=\"l\">[ Facile ]</a> <br> <a href=\"".$_SERVER['PHP_SELF'] ."?level=2\" class=\"l\">[ Humain ]</a> <br> <a href=\"".$_SERVER['PHP_SELF'] ."?level=3\" class=\"l\">[ Dieu ]</a><br><br>");
	
	//-------------------
	// Nombres de joueurs depuis le début 
	//-------------------
	
	$handle = fopen ("stats.txt", "r");
	$line=0;
	while (!feof ($handle)) 
	{	
		$line++;
		$buffer = fgets($handle, 4096);
		if($line==1)
		{
		$tab=explode('|',$buffer);
		$nb_joueurs1=$tab[0];
		$nb_joueurs2=$tab[2];
		$nb_joueurs3=$tab[4];
		}
	}
	fclose ($handle);
	print("Déjà <b>".($nb_joueurs1+$nb_joueurs2+$nb_joueurs3)."</b> parties de jouées au Morpion !<br><br>");
}
else
{
	
	global $level, $nb_joueurs, $nb_win, $fini;

	// Définitions de variables diverses
	if(isset($_GET['level'])){ $level=$_GET['level']; } elseif(isset($_POST['level'])){ $level=$_POST['level']; } 
	if(!isset($_POST['tour'])) { $tour=0; } else { $tour=$_POST['tour']; }
	if(isset($_POST['fini'])){ $fini = $_POST['fini']; } else { $fini=0; }
	$joue=0;
	$jouer_1=0;
	$jouer_2=0;
	$jouer_3=0;

	// prise en compte des valeurs des formulaires (pas de triche possible de cette manière)
	if(!isset($_POST['t11'])) { $tab[1][1]='-'; }	elseif(isset($_POST['st11_x'])){ $tab[1][1] = 'b'; } else { $tab[1][1] = $_POST['t11']; }
	if(!isset($_POST['t12'])) { $tab[1][2]='-'; }	elseif(isset($_POST['st12_x'])){ $tab[1][2] = 'b'; } else { $tab[1][2] = $_POST['t12']; }
	if(!isset($_POST['t13'])) { $tab[1][3]='-'; }	elseif(isset($_POST['st13_x'])){ $tab[1][3] = 'b'; } else { $tab[1][3] = $_POST['t13']; }
	if(!isset($_POST['t21'])) { $tab[2][1]='-'; }	elseif(isset($_POST['st21_x'])){ $tab[2][1] = 'b'; } else { $tab[2][1] = $_POST['t21']; }
	if(!isset($_POST['t22'])) { $tab[2][2]='-'; }	elseif(isset($_POST['st22_x'])){ $tab[2][2] = 'b'; } else { $tab[2][2] = $_POST['t22']; }
	if(!isset($_POST['t23'])) { $tab[2][3]='-'; }	elseif(isset($_POST['st23_x'])){ $tab[2][3] = 'b'; } else { $tab[2][3] = $_POST['t23']; }
	if(!isset($_POST['t31'])) { $tab[3][1]='-'; }	elseif(isset($_POST['st31_x'])){ $tab[3][1] = 'b'; } else { $tab[3][1] = $_POST['t31']; }
	if(!isset($_POST['t32'])) { $tab[3][2]='-'; }	elseif(isset($_POST['st32_x'])){ $tab[3][2] = 'b'; } else { $tab[3][2] = $_POST['t32']; }
	if(!isset($_POST['t33'])) { $tab[3][3]='-'; }	elseif(isset($_POST['st33_x'])){ $tab[3][3] = 'b'; } else { $tab[3][3] = $_POST['t33']; }

	// on définit les lignes qui seront testées lors du jeu
	$row1 = $tab[1][1] . $tab[1][2] . $tab[1][3];
	$row2 = $tab[2][1] . $tab[2][2] . $tab[2][3];
	$row3 = $tab[3][1] . $tab[3][2] . $tab[3][3];
	$row4 = $tab[1][1] . $tab[2][2] . $tab[3][3];
	$row5 = $tab[3][1] . $tab[2][2] . $tab[1][3];
	$row6 = $tab[1][1] . $tab[2][1] . $tab[3][1];
	$row7 = $tab[1][2] . $tab[2][2] . $tab[3][2];
	$row8 = $tab[1][3] . $tab[2][3] . $tab[3][3];

	// ces valeurs ne sont utiles que lors du développement/ débuggage
	$ligne[1][1] = '1-1';
	$ligne[1][2] = '1-2';
	$ligne[1][3] = '1-3';
	$ligne[2][1] = '2-1';
	$ligne[2][2] = '2-2';
	$ligne[2][3] = '2-3';
	$ligne[3][1] = '3-1';
	$ligne[3][2] = '3-2';
	$ligne[3][3] = '3-3';
	$ligne[4][1] = '1-1';
	$ligne[4][2] = '2-2';
	$ligne[4][3] = '3-3';
	$ligne[5][1] = '3-1';
	$ligne[5][2] = '2-2';
	$ligne[5][3] = '1-3';
	$ligne[6][1] = '1-1';
	$ligne[6][2] = '2-1';
	$ligne[6][3] = '3-1';
	$ligne[7][1] = '1-2';
	$ligne[7][2] = '2-2';
	$ligne[7][3] = '3-2';
	$ligne[8][1] = '1-3';
	$ligne[8][2] = '2-3';
	$ligne[8][3] = '3-3';
	
	//-------------------
	// Fonction de conversion des lignes de type $tab[x][y] 
	// pour ressortir la coordonnée des cases (comprise entre 1 et 3)
	//-------------------

	function cv($i, $j)
	{
		// si $tab[6][2] alors val1C=2 val2c=1
		if($i>3) 
		{
			if($i==4 && $j==1) { $valc1=1; $valc2=1; }
			if($i==4 && $j==2) { $valc1=2; $valc2=2; }
			if($i==4 && $j==3) { $valc1=3; $valc2=3; }
			if($i==5 && $j==1) { $valc1=3; $valc2=1; }
			if($i==5 && $j==2) { $valc1=2; $valc2=2; }
			if($i==5 && $j==3) { $valc1=1; $valc2=3; }
			if($i==8 && $j==1) { $valc1=1; $valc2=3; }
			if($i==6 && $j==1) { $valc1=1; $valc2=1; }
			if($i==6 && $j==2) { $valc1=2; $valc2=1; }
			if($i==6 && $j==3) { $valc1=3; $valc2=1; }
			if($i==7 && $j==1) { $valc1=1; $valc2=2; }
			if($i==7 && $j==2) { $valc1=2; $valc2=2; }
			if($i==7 && $j==3) { $valc1=3; $valc2=2; }
			if($i==8 && $j==1) { $valc1=1; $valc2=3; }
			if($i==8 && $j==2) { $valc1=2; $valc2=3; }
			if($i==8 && $j==3) { $valc1=3; $valc2=3; }
		}
		else
		{
			$valc1=$i;
			$valc2=$j;
		}

		return array($valc1,$valc2);
	}

	
	//-------------------
	// Fonction de sauvegarde dans un fichier texte
	//-------------------

	function save($level, $win, $fini)
	{
		if($fini!=true && $fini!=1)
		{
			$handle = fopen ("stats.txt", "r");
			$line=0;

			while (!feof ($handle)) 
			{	
				$line++;
				$buffer = fgets($handle, 4096);
				if($line==1)
				{
					$tab=explode('|',$buffer);
					$nb_joueurs1=$tab[0];
					$nb_win1=$tab[1];
					$nb_joueurs2=$tab[2];
					$nb_win2=$tab[3];
					$nb_joueurs3=$tab[4];
					$nb_win3=$tab[5];


					$varj='nb_joueurs'.$level;
					$varw='nb_win_rec'.$level;
					$varw2='nb_win'.$level;

					if($win==1) 
					{ 
						$$varw=$$varw2+1; 
					}
					else 
					{
						$$varw=$$varw2; 
					}

					$$varj=$$varj+1;
					$$varw2= $$varw;
					$$varw2=$$varw;
					$to_write=$nb_joueurs1."|".$nb_win1."|".$nb_joueurs2."|".$nb_win2."|".$nb_joueurs3."|".$nb_win3;
				}
			}
			fclose ($handle);

			$handle2 = fopen ("stats.txt", "w");
			fputs($handle2, $to_write);
			fclose ($handle2);
		}
	}

	//-------------------
	// Fonction d'affichage des
	// stats du fichier stats.txt
	//-------------------

	function stats($level)
	{
		$handle = fopen ("stats.txt", "r");
		$line=0;
		while (!feof ($handle)) 
		{	
			$line++;
			$buffer = fgets($handle, 4096);
			if($line==1)
			{
				$tab=explode('|',$buffer);
				$nb_joueurs1=$tab[0];
				$nb_win1=$tab[1];
				$nb_joueurs2=$tab[2];
				$nb_win2=$tab[3];
				$nb_joueurs3=$tab[4];
				$nb_win3=$tab[5];
			}
		}
		fclose ($handle);
		$varj='nb_joueurs'.$level;
		$varw2='nb_win'.$level;

		print("<table><tr><td><u>Statistiques niveau $level</u> :</td></tr><tr><td>Nombre de joueurs total : <b>{$$varj}</b> </td></tr><tr><td>Victoires :<b> ".round((100*$$varw2/$$varj),1)." %</b></td></tr></table><br><br>");
	}
	

	// Si le jeu est terminé mais que le joueur clique sur des cases
	// encore inutilisées, alors on affiche les statistiques de jeu
	// sans pour autant incrémenter le compteur
	if($fini==true) { stats($level); }
	

	// Test victoire
	if($fini!=true)
	{
		for($i=1;$i<9;$i++)
		{
			$var = 'row'.$i;
			$combi = $$var;

			if($combi == 'aaa')
			{
				print("<h2>PERDU !</h2>");
				save($level,0,$fini);
				stats($level);
				$fini=true;
			}
			if($combi == 'bbb' && $fini!=true)
			{
				print("<h2>GAGNE !</H2>");








$query = "SELECT * FROM `scoremorpion` WHERE pseudo='$moi' AND dif='$level'";
	
	$r1 = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe select !!!");
$row = mysql_fetch_array($r1);
$score = $row['3'];
 
// si existe augmente de 1 sinon on crée
 if (!$score) { 
 // enregistrement score
 
		 $sql = "INSERT INTO scoremorpion (id,pseudo,dif,score) ";
		$sql =$sql."VALUES ('','$pseudo_ident','$level','1')";
		$result = mysql_query($sql) or die ("Error in query: $query. " . mysql_error()); 

                 } else { 
// on augmente de 1
$query_c = "UPDATE scoremorpion SET score=score+1 WHERE pseudo='$moi'"; 
	$r_ = mysql_query($query_c) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
                 } 


				
				save($level,1,$fini);
				stats($level);
				$fini=true;
			}
		}
	}

	if($tour!=0 && $fini!=true)
	{
		if($tour==1)
		{
					/*--------*/
					/* TOUR 1 */
					/*--------*/

			// si le joueur a joué au centre alors on joue dans un coin
			if($tab[2][2] == 'b' && $joue != true)
			{
			$valr1 = ((rand(1,2)*2)-1);
			$valr2 = ((rand(1,2)*2)-1);
			$tab[$valr1][$valr2] = 'a';
			$joue = true;
			}

			// si le joueur a joué dans un coin alors on joue au centre
			if(($tab[1][1] == 'b' | $tab[1][3] == 'b' | $tab[3][1] == 'b' | $tab[3][3] == 'b') && $joue != true)
			{
			$tab[2][2] = 'a';
			$joue = true;
			}

			// si le joueur a joué au milieu d'une ligne alors on joue au centre
			if(($tab[1][2] == 'b' | $tab[2][1] == 'b' | $tab[2][3] == 'b' | $tab[3][2] == 'b') && $joue != true)
			{
			$tab[2][2] = 'a';
			$joue = true;
			}
		}

		elseif($tour>1 | !$tour)
		{
			if($level==3)
			{
				/*----------------------------*/
				/* PHASE 1 : PEUT ON GAGNER ? */
				/*----------------------------*/
				
				// Au début de chaque tour, on regarde si il est possible de gagner
				for($i=1;$i<9;$i++)
				{
					$var = 'row'.$i;
					$combi = $$var;

					if($combi=='a-a' && $joue!=true)
					{
						$j=2;
						list($val1, $val2) = cv($i, $j);
						$tab[$val1][$val2] = 'a';
						$joue=true;
					}

					if($combi=='aa-' && $joue!=true)
					{
						$j=3;
						list($val1, $val2) = cv($i, $j);
						$tab[$val1][$val2] = 'a';
						$joue=true;
					}

					if($combi=='-aa' && $joue!=true)
					{
						$j=1;
						list($val1, $val2) = cv($i, $j);
						$tab[$val1][$val2] = 'a';
						$joue=true;
					}

				}

				/*--------------------------------------*/
				/* PHASE 2 : LE JOUEUR PEUT IL GAGNER ? */
				/*--------------------------------------*/
				
				// Au début de chaque tour, on regarde si le joueur adverse peut gagner (b-b ou bb- ou -bb)
				
				for($i=1;$i<9;$i++)
				{
					$var = 'row'.$i;
					$combi = $$var;

					if($combi=='b-b' && $joue!=true)
					{
						$j=2;
						list($val1, $val2) = cv($i, $j);
						$tab[$val1][$val2] = 'a';
						$joue=true;
					}

					if($combi=='bb-' && $joue!=true)
					{
						$j=3;
						list($val1, $val2) = cv($i, $j);
						$tab[$val1][$val2] = 'a';
						$joue=true;
					}

					if($combi=='-bb' && $joue!=true)
					{
						$j=1;
						list($val1, $val2) = cv($i, $j);
						$tab[$val1][$val2] = 'a';
						$joue=true;
					}
				}

						/*-------------------------------------------*/
						/* PHASE 3 : OU JOUER SI LA VOIE EST LIBRE ? */
						/*-------------------------------------------*/

				// Si on ne peut pas gagner et que le joueur ne peut pas non plus gagner ce tour, alors on joue
				// Mais attention, on joue "intelligemment".
				
				if($joue!=true)
				{
					for($i=1;$i<9;$i++)
					{
						$var = 'row'.$i;
						$combi = $$var;

						if($tour==2 && $joue!=true && ($row4=='bab' | $row5=='bab'))
						{
							$tab[1][2] = 'a';
							$joue=true;
						}

						// teste le cas où on doit jouer coin à coté des deux croix pour ne pas perdre 
						elseif($tour==2 && $joue!=true && ($row2=='ba-' | $row7=='-ab'))
						{
							$tab[3][1] = 'a';
							$joue=true;
						}
						elseif($tour==2 && $joue!=true && ($row2=='-ab' | $row7=='-ab'))
						{
							$tab[3][3] = 'a';
							$joue=true;
						}
						elseif($tour==2 && $joue!=true && ($row2=='ba-' | $row7=='ba-'))
						{
							$tab[1][1] = 'a';
							$joue=true;
						}
						elseif($tour==2 && $joue!=true && ($row2=='-ab' | $row7=='ba-'))
						{
							$tab[1][3] = 'a';
							$joue=true;
						}

						$aab=0;
						$baa=0;
						
						if($i<4)
						{
							// aab, donc il faut jouer coin haut-droite ou bas-droite
							// baa, donc il faut jouer coin haut-gauche ou bas-gauche
							if($tour==3 && $aab!=0 && $joue!=true)
							{
								$j = 3;
								list($val1, $val2) = cv($i, $j);
								$tab[$val1][$val2] = 'a';
								$joue=true;
							}
							if($tour==3 && $baa!=0 && $joue!=true)
							{
								$j=1;
								list($val1, $val2) = cv($i, $j);
								$tab[$val1][$val2] = 'a';
								$joue=true;
							}
							if($combi=='aab') 
							{ 
								$aab++;
							}
							if($combi=='baa') 
							{ 
								$baa++;
							}
						}

						if($combi=='-a-' && $tab[2][2]=='a' && $i==2 && $joue!=true)
						{
							if($tab[1][1]=='b')
							{
								$tab[3][1] = 'a';
								$joue=true;
							}
							elseif($tab[1][3]=='b')
							{
								$tab[3][3] = 'a';
								$joue=true;
							}
							elseif($tab[3][1]=='b')
							{
								$tab[1][1] = 'a';
								$joue=true;
							}
							elseif($tab[3][3]=='b')
							{
								$tab[1][3] = 'a';
								$joue=true;
							}
						}

						elseif($combi=='-a-' && $tab[2][2]=='a' && $i==7 && $joue!=true)
						{
							if($tab[1][1]=='b')
							{
								$tab[1][3] = 'a';
								$joue=true;
							}
							elseif($tab[1][3]=='b')
							{
								$tab[1][1] = 'a';
								$joue=true;
							}
							elseif($tab[3][1]=='b')
							{
								$tab[3][3] = 'a';
								$joue=true;
							}
							elseif($tab[3][3]=='b')
							{
								$tab[3][1] = 'a';
								$joue=true;
							}
						}

						elseif($combi=='--a' && $joue!=true)
						{
							$j=1;
							list($val1, $val2) = cv($i, $j);
							$tab[$val1][$val2] = 'a';
							$joue=true;
						}

						// on regarde les cases vides pour jouer aléatoirement si on a rien de mieux a faire
						if($joue!=true)
						{

							// peut-on jouer en case 1 ? Si oui on enregistre la case possible
							if($combi=='-bb' | $combi=='-aa' | $combi=='-ab' | $combi=='-ba' | $combi=='---' | $combi=='--a' | $combi=='--b' | $combi=='-b-' | $combi=='-a-')
							{
								$jouer_1=true;
								$val_1=$i;
							}
							
							// peut-on jouer en case 2 ? Si oui on enregistre la case possible
							if($combi=='b-b' | $combi=='a-a' | $combi=='a-b' | $combi=='b-a' | $combi=='---' | $combi=='--a' | $combi=='--b' | $combi=='b--' | $combi=='a--')
							{
								$jouer_2=true;
								$val_2=$i;
							}

							// peut-on jouer en case 3 ? Si oui on enregistre la case possible
							if($combi=='bb-' | $combi=='aa-' | $combi=='ab-' | $combi=='ba-' | $combi=='---' | $combi=='-a-' | $combi=='-b-' | $combi=='b--' | $combi=='a--')
							{
								$jouer_3=true;
								$val_3=$i;
							}

						}
						
					} // for($i=1;$i<9;$i++)

					// si l'on a pas réussi a jouer avec tous les tests précédents
					// alors on joue aléatoirement dans une case vide 
					// c'est la meilleure - et seule -  solution !
					if($joue!=true)
					{
						// on joue case 1 si on a pas joué
						if($jouer_1==true && $joue!=true)
						{
							$j=1;
							$i=$val_1;
							list($val1, $val2) = cv($i, $j);
							$tab[$val1][$val2] = 'a';
							$joue=true;
						}

						// on joue case 2 si on a pas joué
						if($jouer_2==true && $joue!=true)
						{
							$j=2;
							$i=$val_2;
							list($val1, $val2) = cv($i, $j);
							$tab[$val1][$val2] = 'a';
							$joue=true;
						}

						// on joue case 3 si on a pas joué
						if($jouer_3==true && $joue!=true)
						{
							$j=3;
							$i=$val_3;
							list($val1, $val2) = cv($i, $j);
							$tab[$val1][$val2] = 'a';
							$joue=true;
						}
					} // if $joue!=true
				} // if($joue!=true)
			} // if($level==3)
			// si $level==2 n'est pas inhumain
			// alors on joue là ou on peut, sans réfléchir.
			else
			{
				for($i=1;$i<4;$i++)
				{
					if($joue!=true)
					{
						for($j=1;$j<4;$j++)
						{
							if($tab[$i][$j]=='-' && $joue!=true)
							{
									$tab[$i][$j] = 'a';
									$joue=true;
							}
						}
					}
				}
			} // else (if
			

			/*-------------------------------------*/
			/* PHASE 4 : PERDU, GAGNE, MATCH NUL ? */
			/*-------------------------------------*/
			
			// on redéfinit les lignes après le traitement
			// du jeu du computer pour tester la victoire

			$row1 = $tab[1][1] . $tab[1][2] . $tab[1][3];
			$row2 = $tab[2][1] . $tab[2][2] . $tab[2][3];
			$row3 = $tab[3][1] . $tab[3][2] . $tab[3][3];
			$row4 = $tab[1][1] . $tab[2][2] . $tab[3][3];
			$row5 = $tab[3][1] . $tab[2][2] . $tab[1][3];
			$row6 = $tab[1][1] . $tab[2][1] . $tab[3][1];
			$row7 = $tab[1][2] . $tab[2][2] . $tab[3][2];
			$row8 = $tab[1][3] . $tab[2][3] . $tab[3][3];

			if($fini!=true)
			{
				for($i=1;$i<9;$i++)
				{
					$var = 'row'.$i;
					$combi = $$var;
					if($combi == 'aaa')
					{
						print("<h2>PERDU !</h2>");
						save($level,0,$fini);
						stats($level);
						$fini=true;
					}
					if($combi == 'bbb' && $fini!=true)
					{
						print("<h2>GAGNE !</H2>");
						
						save($level,1,$fini);
						stats($level);
						$fini=true;
						
					}
				}
			} // if fini!=true
		} // if $tour>1 | !$tour
	} // if($tour!=0 && $fini!=true)


	// si on est au cinquième tour et qu'il
	// n'y a pas de vainqueur, alors match nul
	if($tour==5 && $fini!=true) 
	{
		print("<h2>MATCH NUL !</h2>"); 
		save($level,0,$fini);
		stats($level);
		$fini=true;
	}
	
	// sinon on incrémente le compteur tour 
	// (jusqu'à ce que sa valeur soit 5)
	else 
	{
		$tour++;
		
	}

	/*----------------*/
	/* AFFICHAGE HTML */
	/*----------------*/

	$t11 = $tab[1][1];
	$t12 = $tab[1][2];
	$t13 = $tab[1][3];
	$t21 = $tab[2][1];
	$t22 = $tab[2][2];
	$t23 = $tab[2][3];
	$t31 = $tab[3][1];
	$t32 = $tab[3][2];
	$t33 = $tab[3][3];

	print("<table border=0 cellpadding=5 cellspacing=5>");
	print("<tr>");
	
	print("<form enctype=\"multipart/form-data\" method=\"POST\" action=\"".$_SERVER['PHP_SELF'] ."\">\n");
	print("
			<input type=\"hidden\" name=\"level\" value=\"$level\">
			<input type=\"hidden\" name=\"tour\" value=\"$tour\">
			<input type=\"hidden\" name=\"fini\" value=\"$fini\">
			<input type=\"hidden\" name=\"t11\" value=\"$t11\">
			<input type=\"hidden\" name=\"t12\" value=\"$t12\">
			<input type=\"hidden\" name=\"t13\" value=\"$t13\">
			<input type=\"hidden\" name=\"t21\" value=\"$t21\">
			<input type=\"hidden\" name=\"t22\" value=\"$t22\">
			<input type=\"hidden\" name=\"t23\" value=\"$t23\">
			<input type=\"hidden\" name=\"t31\" value=\"$t31\">
			<input type=\"hidden\" name=\"t32\" value=\"$t32\">
			<input type=\"hidden\" name=\"t33\" value=\"$t33\">
				");
	print("<tr>\n\r");
	if($t11=='-') { print("<td><input type=\"image\" src=\"-.gif\" name=\"st11\">"); }
	else {	print("<td><img border=0 src=$t11.gif></td>"); }

	if($t12=='-') { print("<td><input type=\"image\" src=\"-.gif\" name=\"st12\">"); }
	else {	print("<td><img border=0 src=$t12.gif></td>"); }
	
	if($t13=='-') { print("<td><input type=\"image\" src=\"-.gif\" name=\"st13\">"); }
	else {	print("<td><img border=0 src=$t13.gif></td>"); }
	
	print("</tr>\n<tr>\n");
	if($t21=='-') { print("<td><input type=\"image\" src=\"-.gif\" name=\"st21\">"); }
	else {	print("<td><img border=0 src=$t21.gif></td>"); }
	
	if($t22=='-') { print("<td><input type=\"image\" src=\"-.gif\" name=\"st22\">"); }
	else {	print("<td><img border=0 src=$t22.gif></td>"); }
	
	if($t23=='-') { print("<td><input type=\"image\" src=\"-.gif\" name=\"st23\">"); }
	else {	print("<td><img border=0 src=$t23.gif></td>"); }
	
	print("</tr>\n<tr>\n");
	if($t31=='-') { print("<td><input type=\"image\" src=\"-.gif\" name=\"st31\">"); }
	else {	print("<td><img border=0 src=$t31.gif></td>"); }
	
	if($t32=='-') { print("<td><input type=\"image\" src=\"-.gif\" name=\"st32\">"); }
	else {	print("<td><img border=0 src=$t32.gif></td>"); }
	
	if($t33=='-') { print("<td><input type=\"image\" src=\"-.gif\" name=\"st33\">"); }
	else {	print("<td><img border=0 src=$t33.gif></td>"); }

	print("</tr>\n</table>");
	print("<br><b><a href=\"".$_SERVER['PHP_SELF'] ."\" class=l>Recommencer</a></b><br>");

}
?>
     <?
  //recherche du meilleur score morpion
  
  // difficulté 1
  
	$querydif1 = "SELECT * FROM `scoremorpion` WHERE dif='1' ORDER BY `score` ASC LIMIT 0 , 6 ";

	
	$r1 = mysql_query($querydif1) or die ("1Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$row1 = mysql_fetch_row($r1);

$score_dif1 = $row1[3];
$pseudo_dif1 = $row1[1];
// difficulté 2
  
	$querydif2 = "SELECT * FROM `scoremorpion` WHERE dif='2' ORDER BY `score` ASC LIMIT 0 , 6";
	
	$r2 = mysql_query($querydif2) or die ("2Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$row2 = mysql_fetch_row($r2);
// difficulté 3
  
	$querydif3 = "SELECT * FROM `scoremorpion` WHERE dif='3' ORDER BY `score` ASC LIMIT 0 , 6";
	
	$r3 = mysql_query($querydif3) or die ("3Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
$row3 = mysql_fetch_row($r3);

print "<table width='196' border='1' cellspacing='0' cellpadding='3'>
  <tr>
    <td width='79'><div align='right'><span class='Style4'>Difficult&eacute;</span></div></td>
    <td width='307'><div align='left'>
      <p><strong> nb de victoire </strong></p>
    </div></td>
  </tr>
  <tr>
    <td><div align='right'><span class='Style1'>Facile</span></div></td>
    <td><div align='left'><span class='Style2'>$pseudo_dif1.score $score_dif1</span></div></td>
  </tr>
  <tr>
    <td><div align='right'><span class='Style1'>Humain</span></div></td>
    <td><div align='left'><span class='Style2'>olive</span></div></td>
  </tr>
  <tr>
    <td height='33'><div align='right'><span class='Style1'>Dieu :) </span></div></td>
    <td><div align='left'><span class='Style2'>olive</span></div></td>
  </tr>
</table>";

?>
</table>
</td>
  <td>&nbsp;</td>
<td>&nbsp;</td></tr>
</table>
</body>
</html>