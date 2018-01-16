<?php
try
{
	    //$bdd = new PDO('mysql:host=db397652720.db.1and1.com;dbname=db397652720', 'dbo397652720', 'Temps!D@nse.65');
			$bdd = new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

?>
