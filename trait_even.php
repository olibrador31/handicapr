<link href="vbbcv.css" rel="stylesheet" type="text/css" />

<?


// affichage des evenement

$query = "SELECT * FROM even WHERE des='$moi' ORDER BY vu ASC , id DESC LIMIT 0, 5"; 
	
// Execute la requete
$r = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !1111!!");
for($i=0;$i < 5;$i++) {
if($i<$row = mysql_num_rows($r)) {
	
	if (mysql_data_seek($r, $i))  {
	
	$row = mysql_fetch_row($r);
	$exp = $row[2];
	$even = $row[3];
	$vu = $row[6];
	$date = $row[4];
	$heure = $row[5];
	
	
// affichage des evenement

if ($even=="mur")  {if($vu==0) {echo"<strong>";}echo"<span class='Style38'><a href='profil.php?pseudo_envoi=$exp'>$exp</a><a href='mur.php?pseudo_envoi=$moi'> à écrie sur votre mur </a><span class='Style27'>le $date à $heure</span></span><br />";if($vu==0) {echo"</strong>";}} 
if (substr($even, 0, 7)=="message")  {if($vu==0) {echo"<strong>";}echo"<span class='Style38'><a href='profil.php?pseudo_envoi=$exp'>$exp</a><a href='message.php?pseudo_envoi=$moi'> vous à envoyé un message </a><span class='Style27'>le $date à $heure</span></span><br />";if($vu==0) {echo"</strong>";}}

if ($even=="photo0")  {if($vu==0) {echo"<strong>";}echo"<span class='Style38'><a href='profil.php?pseudo_envoi=$exp'>$exp</a><a href='photo_profil.php?pseudo_envoi=$moi'> à posté un commentaire sur votre photo 1 </a><span class='Style27'>le $date à $heure</span></span><br />";if($vu==0) {echo"</strong>";}}
if ($even=="photo1")  {if($vu==0) {echo"<strong>";}echo"<span class='Style38'><a href='profil.php?pseudo_envoi=$exp'>$exp</a><a href='photo_profil.php?pseudo_envoi=$moi'> à posté un commentaire sur votre photo 2 </a><span class='Style27'>le $date à $heure</span></span><br />";if($vu==0) {echo"</strong>";}}

if ($even=="photo2")  {if($vu==0) {echo"<strong>";}echo"<span class='Style38'><a href='profil.php?pseudo_envoi=$exp'>$exp</a><a href='photo_profil.php?pseudo_envoi=$moi'> à posté un commentaire sur votre photo 3 </a><span class='Style27'>le $date à $heure</span></span><br />";if($vu==0) {echo"</strong>";}}

if ($even=="photo3")  {if($vu==0) {echo"<strong>";}echo"<span class='Style38'><a href='profil.php?pseudo_envoi=$exp'>$exp</a><a href='photo_profil.php?pseudo_envoi=$moi'> à posté un commentaire sur votre photo 4 </a><span class='Style27'>le $date à $heure</span></span><br />";if($vu==0) {echo"</strong>";}}

if ($even=="photo4")  {if($vu==0) {echo"<strong>";}echo"<span class='Style38'><a href='profil.php?pseudo_envoi=$exp'>$exp</a><a href='photo_profil.php?pseudo_envoi=$moi'> à posté un commentaire sur votre photo 5 </a><span class='Style27'>le $date à $heure</span></span><br />";if($vu==0) {echo"</strong>";}}

if ($even=="photo5")  {if($vu==0) {echo"<strong>";}echo"<span class='Style38'><a href='profil.php?pseudo_envoi=$exp'>$exp</a><a href='photo_profil.php?pseudo_envoi=$moi'> à posté un commentaire sur votre photo 6 </a><span class='Style27'>le $date à $heure</span></span><br />";if($vu==0) {echo"</strong>";}}

if ($even=="ami")  {if($vu==0) {echo"<strong>";}echo"<span class='Style38'><a href='profil.php?pseudo_envoi=$exp'>$exp</a><a href='contact.php?pseudo_envoi=$moi'> veut devenir votre ami(e) </a><span class='Style27'>le $date à $heure</span></span><br />";if($vu==0) {echo"</strong>";}}

if ($even=="amiok" )  {if($vu==0) {echo"<strong>";}echo"<span class='Style38'><a href='profil.php?pseudo_envoi=$exp'>$exp</a><a href='contact.php?pseudo_envoi=$moi'> a accepté de devenir votre ami(e) </a><span class='Style27'>le $date à $heure</span></span><br />";if($vu==0) {echo"</strong>";}}

if ($even=="forum")  {if($vu==0) {echo"<strong>";}echo"<span class='Style38'><a href='profil.php?pseudo_envoi=$exp'>$exp</a><a href='forum_message.php?pseudo_envoi=$moi'> à répondu à votre post sur le forum </a><span class='Style27'>le $date à $heure</span></span><br />";if($vu==0) {echo"</strong>";}}


 }}}
?>