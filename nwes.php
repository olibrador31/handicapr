<? 
	$message = $_POST['message'];
	$messagesave = $_POST['message'];
	$objet = $_POST['objet'];
require '_bdd.php';
require '_identification.php';
require '_restriction.php';
require 'lignechat.php';require 'stat_message.php';
echo"
<form id='form1' name='form1' method='post' action='nwes.php'>
    <textarea name='message' cols='90' rows='12'></textarea>

    <input type='submit' name='Submit' value='Envoyer' />
    <input name='objet' type='text' id='objet' size='90' />

</form>";
$query = "SELECT * FROM user"; 

if (isset($message)) { 
$compt=0;
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");

for($i=0;$i <$row = mysql_num_rows($r);$i++) {

	
	if (mysql_data_seek($r, $i))  {
	
	$row = mysql_fetch_row($r);
	$pseudo = $row[1];
	$mail = $row[4];





}
$message=$messagesave;

if ($message !="") {

$headers ='From:   handicaperencontre.fr/"'."\n";
     $headers .='Reply-To: icedenice@live.fr'."\n";
     $headers .='Content-Type: text/plain; charset="iso-8859-1"'."\n";
     $headers .='Content-Transfer-Encoding: 8bit';


$message = " http://www.handicaperencontre.fr/  votre login_____ :".$pseudo ."___pour toute question contactez moi par mail indiqué sur le site   à bientot http://www.handicaperencontre.fr/   "."  :".$message;
$sujet = "lettre d'information http://www.handicaperencontre.fr/  ::";
$to=$mail; $from="icedenice@live.fr\r\n";   //appel de la fonction mail (envoi):


mail($mail,$objet,$message,$headers); 

 }


}}



	
?>
