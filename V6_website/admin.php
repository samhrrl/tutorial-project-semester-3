<!DOCTYPE html>
<html>
	<head>
		<title>Admin</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/admin.css">
	</head>
	
	<body>
		<?php
			session_start();
			if((!(isset($_SESSION['user_connexion']))) or($_SESSION['user_connexion']!="admin")){
				
				header("Location: index.php");
			}
			else{
				
				?>
				
				<nav class="navbar navbar-expand-md">
					<a class="navbar-brand" href="#">Menu</a>
					<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarNav">
						<span class="navbar-toggler-icon"></span>
					</button>

					<div class="collapse navbar-collapse" id="navbarNav">
						<ul class="navbar-nav">
							
							<li class="nav-item">
								<i class="bi bi-door-closed-fill">
									<a class="nav-link" href="deconnexion.php">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-closed-fill" viewBox="0 0 16 16">
											<path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
										</svg> Deconnexion
									</a>
								</i>
							</li>
						</ul>
					</div>	
				</nav>

				<?php
				
					require("parametres.php");
					$connexion=mysqli_connect($host,$user,$mdp) 
						or die("Connexion impossible au serveur $serveur pour $login");
					$bd="quartier_du_haras";
					mysqli_select_db($connexion,$bd)
						or die("Impossible d'acc?der ? la base de donn?es");
						
					$tables="objets";
					$requete="SELECT * FROM $tables";
					$resultat=mysqli_query($connexion,$requete);
				?>
				
				<div class="container">
					<h1>Données du site</h1>
					<?php
					
					$requetes="SELECT * FROM coordonnees";
					$resultats=mysqli_query($connexion,$requetes);
					echo"<h3>Coordonnées</h3>";
					echo"<table class='table table-striped' border='6' cellpadding='4' cellspacing='4'>";
						echo"<tr>";
							echo"<th >Pseudo</th>";
							echo"<th >Nom</th>";
							echo"<th >Prenom</th>";
							echo"<th >Adresse</th>";
							echo"<th >Telephone</th>";
							echo"<th >Mail</th>";
							
						echo"</tr>";
						while ($ligne=mysqli_fetch_row($resultats)) {
							echo"<tr>";
								$requete_affichage_login="SELECT login FROM connexion WHERE id ='".$ligne[0]."'";
								$resultat_login=mysqli_query($connexion,$requete_affichage_login);
								$proprietaire_login=mysqli_fetch_array($resultat_login);
								
								echo "<td>".$proprietaire_login[0]."</td>";
								echo "<td>".$ligne[1]."</td>";
								echo "<td>".$ligne[2]."</td>";
								echo "<td>".$ligne[3]."</td>";	
								echo "<td>".$ligne[4]."</td>";	
								echo "<td>".$ligne[5]."</td>";	
							echo "</tr>";			
						}
					echo "</table>";
					
					
					$requetes_connexion="SELECT * FROM connexion";
					$resultats_connexion=mysqli_query($connexion,$requetes_connexion);
					
					echo"<h3>Connexions</h3>";
					echo"<table class='table table-striped' border='6' cellpadding='4' cellspacing='4'>";
						echo"<tr>";
							echo"<th >Pseudo</th>";
							echo"<th >Mot de Passe</th>";
						echo"</tr>";
						while ($ligne=mysqli_fetch_row($resultats_connexion)) {
							echo"<tr>";
								echo "<td>".$ligne[1]."</td>";
								echo "<td>".$ligne[2]."</td>";
							echo "</tr>";			
						}
					echo "</table>";
					
					
					
					$requetes_objet="SELECT * FROM objets";
					$resultats_objet=mysqli_query($connexion,$requetes_objet);
					
					echo"<h3>Objets</h3>";
					echo"<table class='table table-striped' border='6' cellpadding='4' cellspacing='4'>";
						echo"<tr>";
							echo"<th >Propriétaire</th>";
							echo"<th >Nom</th>";
							echo"<th >Catégorie</th>";
							echo"<th >Description</th>";
						echo"</tr>";
						
						while ($ligne=mysqli_fetch_row($resultats_objet)) {
							echo"<tr>";
								$requete_affichage_proprio="SELECT login FROM connexion WHERE id ='".$ligne[0]."'";
								$resultat_proprio=mysqli_query($connexion,$requete_affichage_proprio);
								$proprietaire_login=mysqli_fetch_array($resultat_proprio);
								
								echo "<td>".$proprietaire_login[0]."</td>";
								echo "<td>".$ligne[1]."</td>";

								$requete_affichage_categorie="SELECT categorie FROM categories WHERE id_categorie ='".$ligne[2]."'";
								$resultat_categorie =mysqli_query($connexion,$requete_affichage_categorie);
								
								while ($ligne_categorie=mysqli_fetch_row($resultat_categorie)) {
									$nom_categorie=$ligne_categorie[0];
								}
								echo "<td>".$nom_categorie."</td>";
								echo "<td>".$ligne[3]."</td>";
							echo "</tr>";
						}
					echo "</table>";
					
					$requetes_compteur="SELECT * FROM compteur";
					$resultats_compteur=mysqli_query($connexion,$requetes_compteur);
					
					echo"<h3>Prêts et Emprunts</h3>";
					echo"<table class='table table-striped' border='6' cellpadding='4' cellspacing='4'>";
						echo"<tr>";
							echo"<th >Pseudo</th>";
							echo"<th >Nombre d'objets prêtés</th>";
							echo"<th >Nombre d'objet empruntés</th>";
						echo"</tr>";
						while ($ligne=mysqli_fetch_row($resultats_compteur)) {
							echo"<tr>";
								$requete_affichage_pseudo="SELECT login FROM connexion WHERE id ='".$ligne[0]."'";
								$resultat_pseudo=mysqli_query($connexion,$requete_affichage_pseudo);
								$pseudo=mysqli_fetch_array($resultat_pseudo);
								
								echo "<td>".$pseudo[0]."</td>";
								echo "<td>".$ligne[1]."</td>";
								echo "<td>".$ligne[2]."</td>";	
							echo "</tr>";			
						}
					echo "</table>";
					
					
				echo"</div>";
				?>
				
				<div class="container">
					<h1>Suppression d'objet</h1>	
					<form class="d-flex" method="post">
					
						<div class="supprimer_objets" >
							<?php
								echo"
									<select class='custom-select' id='inputGroupSelect01' name='objets'>";
										while ($ligne=mysqli_fetch_row($resultat)) {
											echo "<option value='".$ligne[1]."'>".$ligne[1]."</option>";
										}
								echo"</select>
								";
								mysqli_close($connexion);
							?>
							
						</div>
						<button class="btn btn-primary"  name="supprimer" type="submit">Supprimer</button>
					</form>
				</div>
				
				<div class="container">
					<h1>Suppression d'utilisateur</h1>	
					<form class="d-flex" method="post">
					
						<div class="supprimer_utilisateur" >
							<?php
								//$id_session = $_SESSION["user_connexion"];

								$connexion_coordonnees=mysqli_connect($host,$user,$mdp) 
									or die("Connexion impossible au serveur $serveur pour $login");
								$bd="quartier_du_haras";
								mysqli_select_db($connexion_coordonnees,$bd)
									or die("Impossible d'acc?der ? la base de donn?es");
								
								$tables="coordonnees";
								$requete_supprimer="SELECT *FROM $tables ";
								$resultat_supprimer=mysqli_query($connexion_coordonnees,$requete_supprimer);
								
								echo"
									<select class='custom-select' id='inputGroupSelect02' name='coordonnees'>";
										while ($ligne=mysqli_fetch_row($resultat_supprimer)) {
											echo "<option value='".$ligne[0]."'>".$ligne[1]."</option>";
										}
								echo"</select>
								";
								mysqli_close($connexion_coordonnees);
								
							?>
							
						</div>

						<button class="btn btn-primary"  name="supprimer_User" type="submit">Supprimer_utilisateur</button>
						
					</form>
				</div>
				<?php
					if(isset($_POST['supprimer'])){
						
						if(isset($_POST['objets'] )){
							$nom_objets= $_POST['objets'];

							$connexionrecherche=mysqli_connect($host,$user,$mdp) 
								or die("Connexion impossible au serveur $serveur pour $login");
							$bd="quartier_du_haras";
							mysqli_select_db($connexionrecherche,$bd)
								or die("Impossible d'acc?der ? la base de donn?es");
								
							$query="DELETE  FROM objets WHERE nom_objet ='".$nom_objets."' ";
							$result=mysqli_query($connexionrecherche,$query);
							
							echo "<script type='text/javascript'>document.location.replace('admin.php');</script>";
							
							mysqli_close($connexionrecherche);
						}
				
					}
					if(isset($_POST['supprimer_User'])){
						
						if(isset($_POST['coordonnees'])){
								$id_coordonnees= $_POST['coordonnees'];

								$connexionrecherche=mysqli_connect($host,$user,$mdp) 
									or die("Connexion impossible au serveur $serveur pour $login");
								$bd="quartier_du_haras";
								mysqli_select_db($connexionrecherche,$bd)
									or die("Impossible d'acc?der ? la base de donn?es");
									
								$query="DELETE FROM objets WHERE id ='".$id_coordonnees."' ";
								$query2="DELETE FROM compteur WHERE id ='".$id_coordonnees."' ";
								$query3="DELETE FROM coordonnees WHERE id ='".$id_coordonnees."' ";
								$query4="DELETE FROM connexion WHERE id ='".$id_coordonnees."' ";
								
								$result=mysqli_query($connexionrecherche,$query);
								$result=mysqli_query($connexionrecherche,$query2);
								$result=mysqli_query($connexionrecherche,$query3);
								$result=mysqli_query($connexionrecherche,$query4);
								
								echo "<script type='text/javascript'>document.location.replace('admin.php');</script>";
								
								mysqli_close($connexionrecherche);
						}
					}
			}
			?>
			<script src="scripts/jquery-3.3.1.min.js"></script>
            <script src="bootstrap/js/bootstrap.min.js"></script>
            <script src="scripts/main.js"></script>
		
	</body>
</html>