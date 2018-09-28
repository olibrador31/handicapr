<? 

$URL = pathinfo("$REQUEST_URI"); // recupere le chemin demande 

$vrai_chemin = $URL["basename"]; // ici va recuperer "/titre-de-article-1" 

$tableau_chemin = explode("-",$vrai_chemin); // on obtient un tableau ["/titre","de","article","1"] 

$id = $tableau_chemin[(count($tableau_chemin)-1)]; // maintenant $id=1 

header("HTTP/1.0 200 OK"); 

header('Location: /article.php?id='.$id); // on fait une redirection code 200 vers /article.php?id=1 

?> 
