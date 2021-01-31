<!DOCTYPE html>
<html>
	<head>
		<title>Recherche</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/recherche.css">
	</head>
	
	<body>
		<?php
			session_start();
			if(!(isset($_SESSION['user_connexion']))){
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
								<i class="bi bi-search">
									<a class="nav-link" href="recherche.php">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
											<path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
										</svg> Recherche
									</a>
								</i>
							</li>
							<li class="nav-item">
								<i class="bi bi-telephone-fill">
									<a class="nav-link" href="contact.php">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
											<path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
										</svg> Contact
									</a>
								</i>
							</li>
							<li class="nav-item">
								<i class="bi bi-person-lines-fill">
									<a class="nav-link" href="profil.php">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
											<path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
										</svg> Profil
									</a>
								</i>
							</li>
							<li class="nav-item">
								<i class="bi bi-plus-square">
									<a class="nav-link" href="insertionObjet.php">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
											<path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
											<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
										</svg> Ajouter un objet
									</a>
								</i>
							</li>
							<li class="nav-item">
								<i class="bi bi-plus-circle">
									<a class="nav-link" href="pret_objet.php">
										<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
											<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
											<path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
										</svg> Ajouter un prêt
									</a>
								</i>
							</li>
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
						
					$tables="categories";
					$requete="SELECT * FROM $tables";
					$resultat=mysqli_query($connexion,$requete);
				?>
				
				<div class="container">
					<form class="d-flex" method="post">
						<input class="form-control col-md-6" name="barre_recherche" type="search" placeholder="Rechercher" aria-label="Search">
						<?php
							echo"<div class='input-group col-md-3'>
								<select class='custom-select' id='inputGroupSelect01' name='categories'>";
									while ($ligne=mysqli_fetch_row($resultat)) {
										echo "<option value=".$ligne[0].">".$ligne[1]."</option>";
									}
								echo"</select>
							</div>";
							mysqli_close($connexion);
						?>
						<button class="btn btn-primary"  name="recherche" type="submit">Rechercher</button>
					</form>
				</div>

				<?php
					function affichage($resultat_requete){
							
						require("parametres.php");
						$connexion_affichage=mysqli_connect($host,$user,$mdp) 
							or die("Connexion impossible au serveur $serveur pour $login");
						$bd="quartier_du_haras";
						mysqli_select_db($connexion_affichage,$bd)
							or die("Impossible d'acc?der ? la base de donn?es");

						$row = mysqli_num_rows($resultat_requete); 

						if($row == 0){
							echo "pas d'objet trouvé pour cette recherche";
						}
						else{

							echo"<table width='50%' border='1' cellspacing='3' cellpadding='10'>
								<tr><th>Propriétaire</th><th>Objet</th><th>Catégorie</th><th>Description</th></tr>";

								while ($ligne=mysqli_fetch_row($resultat_requete)) {
									echo "<tr>";
										$requete_affichage_proprio="SELECT login FROM connexion WHERE id ='".$ligne[0]."'";
										$resultat_proprio=mysqli_query($connexion_affichage,$requete_affichage_proprio);
										
										while ($ligne_proprio=mysqli_fetch_row($resultat_proprio)) {
											$proprietaire_login=$ligne_proprio[0];
										}
										
										echo "<td>".$proprietaire_login."
													<form method='post'>
														<button class='btn btn-primary'  name='contacter_proprio' value='".$ligne[0]."' type='submit'>Coordonées</button>
													</form>
												</td>";
										echo "<td>".$ligne[1]."</td>";

										$requete_affichage_categorie="SELECT categorie FROM categories WHERE id_categorie ='".$ligne[2]."'";
										$resultat_categorie =mysqli_query($connexion_affichage,$requete_affichage_categorie);
										
										while ($ligne_categorie=mysqli_fetch_row($resultat_categorie)) {
											$nom_categorie=$ligne_categorie[0];
										}
										echo "<td>".$nom_categorie."</td>";
										echo "<td>".$ligne[3]."</td>";
									echo "</tr>";
								}
							echo "</table>";
						}
					}
					function champs_non_remplis(){
						echo "Entrez au moins un champ";
					}
					if(isset($_POST['recherche'])){

						if(isset($_POST['categories'])and isset($_POST['barre_recherche'])){
							
							//Vérification pour savoir si la categorie pas de categorie a été sélectionnée
							$connexionrecherche=mysqli_connect($host,$user,$mdp) 
								or die("Connexion impossible au serveur $serveur pour $login");
							$bd="quartier_du_haras";
							mysqli_select_db($connexionrecherche,$bd)
								or die("Impossible d'acc?der ? la base de donn?es");
								
							$query="SELECT id_categorie FROM categories WHERE categorie ='pas de categorie'";
							$result=mysqli_query($connexionrecherche,$query);
							
							
							while ($ligne=mysqli_fetch_row($result)) {
								$id_pas_categorie=$ligne[0];// id_categorie qui correspond a la categorie pas de categorie
							}
							
							$categorie = ceil($_POST['categories']);

							// Cas où la barre de recherche ET la categorie sont entrés
							if($_POST['barre_recherche']!="" and $_POST['categories']!=$id_pas_categorie){
								$objet_cherche=$_POST['barre_recherche'];
								$id_categorie_selectionne=$_POST['categories'];
								
								$requete_recherche_b_c="SELECT * FROM objets WHERE nom_objet ='".$objet_cherche."' AND id_categorie ='".$id_categorie_selectionne."'"; 
								$result_objet_cherche=mysqli_query($connexionrecherche, $requete_recherche_b_c);
								
								affichage($result_objet_cherche);

							}
							
							//Cas où seule la barre de recherche est complétée
							if($_POST['categories']==$id_pas_categorie and $_POST['barre_recherche']!="" ){ 
								$objet_cherche=$_POST['barre_recherche'];
								
								$requete_recherche_b = "SELECT * FROM objets WHERE nom_objet ='".$objet_cherche."'";
								$result_objet_cherche=mysqli_query($connexionrecherche, $requete_recherche_b);
								
								affichage($result_objet_cherche);
							}

							//Cas où seule la catégorie est séectionnée
							if($_POST['barre_recherche']=="" and $_POST['categories']!=$id_pas_categorie ){ 
								$id_categorie_selectionne=$_POST['categories'];
								
								$requete_recherche_c = "SELECT * FROM objets WHERE id_categorie ='".$id_categorie_selectionne."'";
								$result_objet_cherche=mysqli_query($connexionrecherche, $requete_recherche_c);
								
								affichage($result_objet_cherche);
							}
							
							//Cas où la barre de recherche est vide ET la categorie est pas de categorie
							if ($_POST['barre_recherche']=="" and $_POST['categories']==$id_pas_categorie ){ 
								champs_non_remplis();
							}
							mysqli_close($connexionrecherche);
						}
					}
					if(isset($_POST['contacter_proprio'])){
							$_SESSION['id_proprio']=$_POST['contacter_proprio'];
							echo "<script type='text/javascript'>document.location.replace('contact_proprio.php');</script>";
							exit();
						}
					
					
			}
		?>
		<script src="scripts/jquery-3.3.1.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="scripts/main.js"></script>
	</body>
</html>