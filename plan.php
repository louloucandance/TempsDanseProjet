<?php session_start();
include("include/Head.php");
include("include/Menu.php"); ?>
<div>Vous êtes ici : <a href="index.html">Accueil</a> - Plan</div>
	
<section>

	<h2>Plan du site</h2>
	<ul>
		<li>Accueil</li>
		<li>Comptabilité</li>
		<ul>
			<li>Formulaire</li>
			<li>Mise à Jour</li>
			<li>Affihage de la BDD</li>
		</ul>
		<li>Gestion Adhérents</li>
		<ul>
			<li>Formulaire</li>
			<li>Mise à Jour</li>
			<li>Affihage de la BDD</li>
		</ul>
		<li>Plan</li>
		<li>Aide</li>
	</ul>
		
</section>
<?php include("include/Footer.php");?>
</body>
</html>	