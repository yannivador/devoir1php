
<?php
	// iNITIALISATION DU TABLEAU
	$travels = array(
		0 => array('departure_min' => 'paris'  , 'departure' => 'Paris'  , 'arrival' => 'Nantes'  , 'departureTime' => '11:00', 'arrivalTime' => '12:34', 'driver' => 'Thomas'),
		1 => array('departure_min' => 'orleans', 'departure' => 'Orléans', 'arrival' => 'Nantes'  , 'departureTime' => '05:15', 'arrivalTime' => '09:32', 'driver' => 'Mathieu'),
		2 => array('departure_min' => 'dublins', 'departure' => 'Dublins', 'arrival' => 'Tours'   , 'departureTime' => '07:23', 'arrivalTime' => '08:50', 'driver' => 'Nathanael'),
		3 => array('departure_min' => 'paris'  , 'departure' => 'Paris'  , 'arrival' => 'Orléans' , 'departureTime' => '03:00', 'arrivalTime' => '05:26', 'driver' => 'Clément'),
		4 => array('departure_min' => 'paris'  , 'departure' => 'Paris'  , 'arrival' => 'Nice'    , 'departureTime' => '10:00', 'arrivalTime' => '12:09', 'driver' => 'Audrey'),
		5 => array('departure_min' => 'nice'   , 'departure' => 'Nice'   , 'arrival' => 'Nantes'  , 'departureTime' => '10:40', 'arrivalTime' => '13:00', 'driver' => 'Pollux'),
		6 => array('departure_min' => 'nice'   , 'departure' => 'Nice'   , 'arrival' => 'Tours'   , 'departureTime' => '11:00', 'arrivalTime' => '16:10', 'driver' => 'Edouard'),
		7 => array('departure_min' => 'tours'  , 'departure' => 'Tours'  , 'arrival' => 'Amboise' , 'departureTime' => '16:00', 'arrivalTime' => '18:40', 'driver' => 'Priscilla'),
		8 => array('departure_min' => 'nice'   , 'departure' => 'Nice'   , 'arrival' => 'Nantes'  , 'departureTime' => '12:00', 'arrivalTime' => '16:00', 'driver' => 'Charlotte')
	);

	// ---- AFFICHAGE TABLEAU POUR TESTS -----
	// echo '<pre>';
	// print_r($travels);
	// // var_dump($travels);
	// echo '</pre>';

	if (isset($_GET['validation'])) {   // si le formulaire est soumis
		if (empty($_GET['prenom']) OR empty($_GET['nom']) OR empty($_GET['email']) OR empty($_GET['tel']) OR empty($_GET['ville_depart'])) {   // Si un des champs est vide
			echo 'Tous les champs n\'ont pas été remplis';
		}
		else {
			// Récupère les variables GET
			$nom          = $_GET['nom'];
			$prenom       = $_GET['prenom'];
			$email        = $_GET['email'];
			$tel          = $_GET['tel'];
			$ville_depart = $_GET['ville_depart'];

			echo '<div id="resultat" class="centre">';   // -- Début div resultat --

			echo '<h2>Résultats:</h2>';
			foreach ($travels as $travel) {
				if ($travel['departure_min'] == $ville_depart) {
					echo '<div class="itineraire">';
					echo '<strong>Itinéraire avec ' . $travel['driver'] . '</strong><br>';
					echo 'Départ : ' . $travel['departure'] . ' à ' . $travel['departureTime'] . '<br>' . 'Arrivé : ' . $travel['arrival'] .' à ' . $travel['arrivalTime']  . '<br>';
					echo '</div>';
				}
			}

			// echo '<h2>Vos coordonnées :</h2>';
			// echo 'Votre nom est : ' . $nom . '<br>';
			// echo 'Votre Prénom est : ' . $prenom . '<br>';
			// echo 'Votre email est : ' . $email . '<br>';
			// echo 'Votre numéro de téléphone est : ' . $tel . '<br>';
			// echo 'Votre ville de départ est : ' . $ville_depart . '<br>';
			
			echo '</div>';								// -- fin div resultat --
		}
	}
	
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="utf-8">
		<title>Covoiturage</title>
		<link rel="stylesheet" type="text/css" href="styles.css">
	</head>

	<body>
		<div id="wrapper">
			<h1 class="centre">Formulaire de contact- covoiturage</h1>
			<form action="index.php" method="get" name="formulaire_01" class="formulaire_01">
				<fieldset>
					<legend>Informations sur vous</legend>
					<p class="clearfix">
						<label for="nom" class="fl-l w25 left">Nom :</label>  
						<input type="text" name="nom" placeholder="votre nom" autocomplete="on" class="fl-l w50">
					</p>
					<p class="clearfix">
						<label for="prenom" class="fl-l w25">Prénom :</label>
						<input type="text" name="prenom" placeholder="votre prénom" autocomplete="on" class="fl-l w50">
					</p>
					<p class="clearfix">
						<label for="email" class="fl-l w25">Email</label>
						<input type="email" name="email" id="fichier" placeholder="votre Email" autocomplete="on" class="fl-l w50">
					</p>
					<p class="clearfix">
						<label for="tel" class="fl-l w25">N° tel</label>
						<input type="tel" name="tel" placeholder="n° de téléphone" class="fl-l w50">
					</p>
					<p class="clearfix">
						<label for="ville_depart" class="fl-l w25">Quel est votre ville de départ ?</label>
						<select name="ville_depart" class="fl-l w25">
							<option value="paris">Paris</option>
							<option value="orleans">Orléans</option>
							<option value="dublins">Dublins</option>
							<option value="nice">Nice</option>
							<option value="tours">Tours</option>
						</select>
					</p class="clearfix">
					<p class="centre" id="envoyer">
						<input class="bt" type="submit" name="validation" class="centre" value="Rechercher">
					</p>
				</fieldset>
			</form>
		</div>
	</body>
</html>