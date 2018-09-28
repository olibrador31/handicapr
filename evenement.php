<?
// recherche le nb de nouveaux comentaires
$queryeven = "SELECT * FROM even WHERE des='$moi' AND vu='0' "; 
	
// Execute la requete
$reven = mysql_query($queryeven) or die ("Pas pris en compte, votre message/sujet/pseudo ne doit pas contenir d'apostrephe iciiii!!!");


$ncom=mysql_num_rows($reven);
?><td colspan="5" bgcolor="#FBE7F3"><div align="center"><a href="http://www.handicaperencontre.fr/indexiden.php"><img src="img/logo.jpg" width="800" height="116" border="0"></td></a>
        </tr>
      <tr bgcolor="#567596">
        <td colspan="5" background="" bgcolor="#FFF0FF"><div align="left"><strong>
           
           <? if($erreur_ident=="") { echo $message_acceuil; } else { echo $erreur_ident; } ?>
           <span class="Style12"><strong>
           <input name="Submit4" type="button" class="Style30" onClick="MM_showHideLayers('Layer3','','show')" value="<?echo"$ncom";?>">
           </strong></span>v&eacute;nement.:: 
           <? if($pass_reel==$pass_ident and !empty($pass_ident) ) echo"<a href='inscription2.php'>modifier Votre profil---</a><a href='supr.php'>supprimer votre profil</a>";?><br>
          <br>
        </strong></div></td>

<script type="text/JavaScript">
<!--

function MM_goToURL() { //v3.0
  var i, args=MM_goToURL.arguments; document.MM_returnValue = false;
  for (i=0; i<(args.length-1); i+=2) eval(args[i]+".location='"+args[i+1]+"'");
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_showHideLayers() { //v6.0
  var i,p,v,obj,args=MM_showHideLayers.arguments;
  for (i=0; i<(args.length-2); i+=3) if ((obj=MM_findObj(args[i]))!=null) { v=args[i+2];
    if (obj.style) { obj=obj.style; v=(v=='show')?'visible':(v=='hide')?'hidden':v; }
    obj.visibility=v; }
}
//-->
</script>
<link href="../vbbcv.css" rel="stylesheet" type="text/css">