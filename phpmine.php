<?php
require '_bdd.php';
require '_identification.php';
require '_restriction.php';
require 'lignechat.php';error_reporting(E_ALL ^ E_NOTICE);

/*/////// PHPMINE v1.0 
///////// 

// Copyright 2000, Kidou / PHPVault (http://www.phpvault.com) 
////////////////////////////////////////////////////////////////////////// 
// Ce script est un freeware. Vous pouvez l'utiliser et le modifier librement, mais vous devez laisser le copyright. Merci de me faire savoir si vous trouvez ce script utile. (mathias@phpvault.com) 
// PHPMine est une version PHP du célèbre jeu "Démineur" de Mirosoft. 
///////////////////////////////////////////////////////////////////////// 
// This script is a freeware. You can use it and modify it freely as long as you leave the copyright. Please tell me if you find this script useful (mathias@phpvault.com) 
// PHPMine is a PHP version of famous game "Minesweeper" by Microsoft. 
/////////////////////////////////////////////////////////////////////////*/ 

print "<html>"; 
print "<head>"; 

echo"<script type='text/javascript'><!--
google_ad_client = 'ca-pub-1493739445870732';
/* baniere 1 rose */
google_ad_slot = '3439886067';
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type='text/javascript'
src='http://pagead2.googlesyndication.com/pagead/show_ads.js'>
</script><title> bienvenu sur le Demineur $pseudo_ident</title><script type='text/javascript'><!--
google_ad_client = 'ca-pub-1493739445870732';
/* baniere 11 rose */
google_ad_slot = '7443439510';
google_ad_width = 728;
google_ad_height = 90;
//-->
</script>
<script type='text/javascript'
src='http://pagead2.googlesyndication.com/pagead/show_ads.js'>
</script>";
print "</head>"; 
print "<body><center>"; 
print "<font size=4 face=Verdana><b>bienvenu sur le Demineur $pseudo_ident</b>"; 

if ($submit=="") { 
     $NumMine=4; 
     $RowSize=5; 
     $ColSize=5; 
     $generer=1; 
} 

if ($generer==1) { 
     srand((double)microtime()*100000000); 
     $time_start=time(); 
     if (($RowSize<=1) || ($ColSize<=1) || ($NumMine==0)) { 
         print "<p><br><font size=-1 color=red>Wrong number for Rows, Cols or Mines!</font>"; 
         exit; 
     } 
     if ($NumMine > $RowSize*$ColSize) { 
         print "<p><br><font size=-1 color=red>Too many mines!</font>"; 
         exit; 
     } 
     
     for ($Row=1;$Row<=$RowSize;$Row++) { 
         for ($Col=1;$Col<=$ColSize;$Col++) { 
             $Mine[$Row][$Col]="0"; 
             $Decouv[$Row][$Col]="0"; 
         } 
     } 
     $index=0; 
     while ($index<$NumMine) { 
         $Row=rand(1,$RowSize); 
         $Col=rand(1,$ColSize); 
         if ($Mine[$Row][$Col]=="0") { 
             $Mine[$Row][$Col]="1"; 
             $index++; 
         } 
     } 
} else { 
     $perdu=0; 
     $reste=$RowSize*$ColSize; 
     for ($Row=1;$Row<=$RowSize;$Row++) { 
         for ($Col=1;$Col<=$ColSize;$Col++) { 
             $temp="Mine".($Row*($ColSize+1)+$Col); 
             $Mine[$Row][$Col]=$$temp; 
             $temp="Decouv".($Row*($ColSize+1)+$Col); 
             $Decouv[$Row][$Col]=$$temp; 
         if ($Decouv[$Row][$Col]=="1") {$reste=$reste-1;} 
             $temp="submit".($Row*($ColSize+1)+$Col); 
             if ($$temp=="ok") { 
                 $reste=$reste-1; 
                 if ($Mine[$Row][$Col]=="0") { 
                     $Decouv[$Row][$Col]="1"; 
                 } else { 
                     $perdu=1; 
                 } 
             } 
         } 
     } 
     if ($perdu==1) { 
         print "<h2>Perdu!</h2>"; 
         for ($i=1;$i<=$RowSize;$i++) { 
             for ($j=1;$j<=$ColSize;$j++) { 
                 $Decouv[$i][$j]="1"; 
             } 
         } 
     } 
     if (($reste==$NumMine)&&($perdu!=1)) { 
         print "<h2>Gagné!</h2>"; 
         $time_stop=time(); 
         $time=$time_stop-$time_start; 
         print "<p><font size=-1><i>Votre score: $time</i></font>"; 
		 
		 // enregistrement score
		 $sql = "INSERT INTO scoredemineur (id,pseudo,score) ";
		$sql =$sql."VALUES ('','$pseudo_ident','$time')";
		$result = mysql_query($sql) or die ("Error in query: $query. " . mysql_error()); 
         
         for ($i=1;$i<=$RowSize;$i++) { 
             for ($j=1;$j<=$ColSize;$j++) { 
                 $Decouv[$i][$j]="1"; 
             } 
         } 
     } 
} 

print "<form method=get action=\"$PHP_SELF\">"; 

print "<input type=hidden name=time_start value=$time_start>"; 
print "<input type=hidden name=NumMine value=$NumMine>"; 
print "<input type=hidden name=RowSize value=$RowSize>"; 
print "<input type=hidden name=ColSize value=$ColSize>"; 
print "<input type=hidden name=generer value=0>"; 

print "<p><table border=1 cellpadding=8>"; 
for ($Row=1; $Row<=$RowSize; $Row++) { 
     print "<tr>"; 
     for ($Col=1; $Col<=$ColSize; $Col++) { 
         $nb=0; 
         for ($i=-1; $i<=1; $i++) { 
             for ($j=-1; $j<=1; $j++) { 
                 if ($Mine[$Row+$i][$Col+$j] == "1") { 
                     $nb++; 
                 } 
             } 
         } 
         print "<td width=15 height=15 align=center valign=middle>"; 
         if ($Decouv[$Row][$Col]=="1") { 
             if ($nb==0) { 
                 print "&nbsp;"; 
             } else { 
                 if ($Mine[$Row][$Col]=="1") { 
                     print "*"; 
                 } else { 
                     print "$nb"; 
                 } 
             } 
         } else { 
             print "<input type=hidden name=submit value=ok>"; 
             print "<input type=submit name=submit".($Row*($ColSize+1)+$Col)." value=ok>"; 
         } 
         print "<input type=hidden name=Mine".($Row*($ColSize+1)+$Col)." value=".$Mine[$Row][$Col].">"; 
         print "<input type=hidden name=Decouv".($Row*($ColSize+1)+$Col)." value=".$Decouv[$Row][$Col].">"; 
         print "</td>"; 
     } 
     print "</tr>"; 
} 
print "</table>"; 

print "</form>"; 

//recherche du meilleur score demineur

	$query = "SELECT * FROM `scoredemineur` ORDER BY `scoredemineur`.`score` ASC LIMIT 0 , 6";
	
	$r1 = mysql_query($query) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe !!!");



print "<table width='90%' border='1' cellspacing='0' cellpadding='0'>
  <tr>
    <td><strong>D&eacute;mineur Top score</strong></td>


";
$i=1; 
while  ($i!=6)  {


$row = mysql_fetch_row($r1);

$score[$i] = $row[2];
$pseudo[$i] = $row[1];
echo"<td><strong>$i: </strong><a href='profil.php?pseudo_envoi=$pseudo[2]'>$pseudo[$i]</a> (<strong>$score[$i]</strong> sec </td>";
$i++;

}?>
    
</table>
<link href="vbbcv.css" rel="stylesheet" type="text/css" />



<script type="text/JavaScript">
<!--
function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}
//-->
</script>
<style type="text/css">
<!--
.Style1 {font-size: 9px}
-->
</style>
<form method=post>
  <input type="hidden" name=RowSize value=5 size=2>
<br>
<input type="hidden" name=ColSize value=5 size=2> 
<br>
&nbsp;
 <input type="hidden" name=NumMine value=4 size=2>
<p><input type=submit name=submit value=Recomencer la partie> 
<input type=hidden name=generer value=1> 
<input name="submit2" type="submit" onclick="MM_goToURL('parent','index.php');return document.MM_returnValue" value="Retour &agrave; l'acceuil" la="la" partie="partie" />
</form> 
<p> 
<center><font size=-2>Script by <a href="mailto:perso@kidou.net">Kidou</a> 
</font> 
  <br />
  <span class="Style1">Copyright 2000, Kidou / PHPVault (http://www.phpvault.com  </span>
</center> 
</body> 
</html>
