<?php
try
{  
	    $bdd = new PDO('mysql:host=db397652720.db.1and1.com;dbname=db397652720', 'dbo397652720@10.46.135.36', 'Temps!D@nse.65');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

?>
