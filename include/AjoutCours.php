
<?php
//Fonction ajouter cours
function AjouterCours($Num, $Discipline, $Niveau){
	$bdd=new PDO('mysql:host=localhost;dbname=tempsdanse', 'root', '');
	$req=$bdd->query("INSERT INTO `classe` (`NumAdh`, `Discipline`, `Niveau`) VALUES ($Num, '$Discipline', '$Niveau')");
}
//COURS

	$EV=false;
	$BS=false;
	if(isset($_POST["BarreSol"])) {
		AjouterCours($NumAdh, "BarreSol", "Unique");
		$BS=true;
	}
	if(isset($_POST["Eveil"])){
		AjouterCours($NumAdh,"Eveil", "Unique");
		$EV=true;
	}
	if(isset($_POST["Initiation"])) {
		AjouterCours($NumAdh, "Initiation", "Unique");
	}
	if(isset($_POST["ContemporainAdo"])) {
		AjouterCours($NumAdh, "Contemporain", "Ado");
	}
	if(isset($_POST["ContemporainSup"])) {
		AjouterCours($NumAdh, "Contemporain", "Superieur");
	}
	if(isset($_POST["JaAdo"])) {
		AjouterCours($NumAdh, "Jazz", "Ado");
	}
	if(isset($_POST["JaSup"])) {
		AjouterCours($NumAdh, "Jazz", "Superieur");
	}
	if(isset($_POST["JaEnf"])) {
		AjouterCours($NumAdh, "Jazz", "Enfant");
	}
	if(isset($_POST["JaAdu"])) {
		AjouterCours($NumAdh, "Jazz", "Adulte");
	}
	if (isset($_POST["ClaAdo"])) {
		AjouterCours($NumAdh, "Classique", "Ado");
	}
	if (isset($_POST["ClaSup"])) {
		AjouterCours($NumAdh, "Classique", "Superieur");
	}
	if (isset($_POST["ClaEnf"])) {
		AjouterCours($NumAdh, "Classique", "Enfant");
	}
	if (isset($_POST["ClaPrep"])) {
		AjouterCours($NumAdh, "Classique", "Preparatoire");
	}
	if(isset($_POST["StAdo"])) {
		AjouterCours($NumAdh, "StreetJazz", "Ado");
	}
	if (isset($_POST["StSup"])) {
		AjouterCours($NumAdh, "StreetJazz", "Superieur");
	}
	if (isset($_POST["P1"])) {
		AjouterCours($NumAdh, "Pointe", "Niveau1");
	}
	if (isset($_POST["P2"])) {
		AjouterCours($NumAdh, "Pointe", "Niveau2");
	}

?>
