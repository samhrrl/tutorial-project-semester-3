<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Inscription</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/inscription.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head
	
	<body>
		<nav class="navbar navbar-expand-md">
			<a class="navbar-brand" href="#">Menu</a>
			<button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarNav">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
					<li class="nav-item">
						<i class="bi bi-house-fill">
							<a class="nav-link" href="index.php">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
								<path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
								<path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
							</svg> Accueil</a>
						</i>
					</li>
					<li class="nav-item">
						<i class="bi bi-person-lines-fill">
							<a class="nav-link" href="contact.php">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
								<path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
							</svg> Contact</a>
						</i>
					</li>
				</ul>
			</div>
		</nav>

		<div class="container">
			<h1>Inscription</h1>
			
			<form class="row g-3" method="post">
				<div class="col-md-6">
					<div class="col">
						<label class="form-label-inscription">Prénom</label>
						<input type="text" name="prenom" class="form-control">
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="col">
						<label class="form-label-inscription">Nom</label>
						<input type="text" name = "nom" class="form-control">
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="col">
						<label for="inputPseudo" class="form-label-inscription">Pseudo</label>
						<input type="text" name="pseudo" class="form-control">
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="col">
						<label class="form-label-inscription">Mot de Passe</label>
						<input type="password" name ="password"class="form-control">
					</div>
				</div>

				<div class="col-md-6">
					<div class="col">
						<label class="form-label-inscription" >Télephone</label>
						<input class="form-control" name="telephone" type="tel" placeholder="Ex: +33 7 45 23 12 81" >
					</div>
				</div>
				
				<div class="col-md-6">
					<div class="col">
						<label class="form-label-inscription">Email</label>
						<input type="email" name="email" placeholder="Ex: exemple@gmail.com" class="form-control" >
					</div>
				</div>

				<div class="col-md-12">
					<div class="col">
						<label class="form-label-inscription">Adresse</label>
						<input type="text" name = "adresse"class="form-control"  placeholder="Ex: 12 rue St Placide">
					</div>
					<br/>
				</div>  

				<div class="col text-center">
					<button class="btn btn-primary" type="submit" name="bouton">S'inscrire</button>
				</div>
				<br/>
			</form>

			<?php

			if(isset($_POST['bouton'])){

				$prenom=$_POST["prenom"];
				$nom=$_POST["nom"];
				$adresse=$_POST["adresse"];
				$telephone=$_POST["telephone"];
				$email=$_POST["email"];
				$pseudo=$_POST["pseudo"];
				$password=$_POST["password"];

				require("parametres.php");
				$connexion=mysqli_connect($host,$user,$mdp) 
					or die("Connexion impossible au serveur $serveur pour $login");
				$bd="quartier_du_haras";
				mysqli_select_db($connexion,$bd)
					or die("impossible d'acceder a la base de donnees");
					
				$requeteVerification="SELECT count( login) FROM connexion WHERE login= '".$pseudo."'";
				$resultatVerif=mysqli_query($connexion,$requeteVerification);
				$verif = mysqli_fetch_array($resultatVerif);
				$compte=$verif[0];
				
				if($compte == 0){
					$requeteajout="INSERT into coordonnees(prenom,nom,adresse,telephone,mail) values( '".$prenom."','".$nom."','".$adresse."','".$telephone."','".$email."') ";
					$requeteajoutConnexion="INSERT into connexion(login,password) values( '".$pseudo."','".$password."') ";
					$requeteCompteur="INSERT into compteur(objets_pretes, objets_empruntes) values(0,0) ";

					$resultat=mysqli_query($connexion,$requeteajout);
					$resultatCo=mysqli_query($connexion,$requeteajoutConnexion);
					$resultatCompteur=mysqli_query($connexion,$requeteCompteur);

					echo "
					<div class='alert alert-success' role='alert'>
					Votre compte a été crée ! Connectez-vous!
					</div>";  
				}
				else{
					echo "
					<div class='alert alert-danger' role='alert'>
					Inscription impossible, identifiant déjà utilisé!
					</div>";
				}

				mysqli_close($connexion);
			}
			?>
		</div>
		
		<script src="scripts/jquery-3.3.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="scripts/main.js"></script>
		
	</body>
</html>