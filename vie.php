<?
require '_bdd.php';

// recherche 10 homme	

$query = "SELECT * FROM user WHERE sexe='Homme' ORDER BY Rand() LIMIT 700";
	// Execute la requete
	$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !");



	

// recher femme qui corespond

$i=0;
$fin=700;
for($i;$i < $fin;$i++) {

if (mysql_data_seek($r, $i))  {
	
	$rowh = mysql_fetch_row($r);

$pseudoh = $rowh['1'];
	$age = $rowh['5'];
$mailh = $rowh['4'];

$querycor = "SELECT * FROM user WHERE sexe='Femme' AND age<'$age-8' AND age<'$age+8' ORDER BY Rand() LIMIT 700";
	// Execute la requete
	$rcor = mysql_query($querycor) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");
}
	
if (mysql_data_seek($rcor, $i))  {
	
	$row2 = mysql_fetch_row($rcor);
$pseudof = $row2['1'];
	$agef = $row2['5'];
$mailf = $row2['4'];

//envoi de mail aux hommes avec pseudo femme :



  $headers ='From:   handicaperencontre.fr/"'."\n";
     $headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
     $headers .='Content-Transfer-Encoding: 8bit';


$message = " $pseudoh votre profil a été visité par  $pseudof  pour voir son profil et la contacter clickez sur le lien  : http://http://www.handicaperencontre.fr/profil.php?pseudo_envoi=$pseudof";
$sujet = "votre profil a été visité par  $pseudof sur handicaperencontre.fr";






 mail($mailh,$sujet,$message,$headers); 

}
}

?>
