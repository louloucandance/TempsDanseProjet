<body>

	<nav>
		<h1>Compt'Temps Danse</h1>
		<ul id="menu">
			<li>
				<a href="index.php">Accueil</a>
			</li>

			<li>
				<a href="Compta.php">Comptabilité</a>
				<ul>
					<li><a href="ComptaForm.php">Nouvelle ligne</a></li>
					<li><a href="ComptaMAJ.php">Mise à jour</a></li>
					<li><a href="ComptaListes.php">Mes tableaux comptables</a></li>
				</ul>
			</li>

			<li>
				<a href="GestionAdh.php">Gestion des adhérents</a>
				<ul>
					<li><a href="GestionAdhForm.php">Nouvel adhérent</a></li>
					<li><a href="GestionAdhMAJ.php">Mise à jour</a></li>
					<li><a href="GestionAdhListes.php">Mes listes d'appel</a></li>
				</ul>
			</li>

			<li>
				<a href="Aide.php">Aide</a>
			</li>

		</ul>
	</nav>
	<?php
	include("include/ConnexionBDD.php");
	?>
	<br><br>
