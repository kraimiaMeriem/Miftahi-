<?php
session_start();

if (!isset($_SESSION['utilisateur_id'])) {
    header("Location: connexion.php");
    exit;
}

$annonce_id = $_GET['id'] ?? $_POST['id'] ?? null;

if (!$annonce_id) {
    die("ID de l'annonce non spécifié.");
}

$utilisateur_id = $_SESSION['utilisateur_id'];
$table = 'bien_a_vendre'; 


$conn = new mysqli("localhost", "root", "", "siteimmob");
if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}


function getAnnonceVenteDetails($conn, $annonce_id, $utilisateur_id) {
    $sql = "SELECT * FROM bien_a_vendre WHERE id = ? AND id_utilisateur = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $annonce_id, $utilisateur_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

$annonce = getAnnonceVenteDetails($conn, $annonce_id, $utilisateur_id);


if (!$annonce) {
    die("Annonce non trouvée ou vous n'avez pas la permission de la modifier.");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ancienne_annonce = $annonce;
    $titre = isset($_POST["titre"]) && !empty(trim($_POST["titre"])) ? htmlspecialchars(trim($_POST["titre"])) : $ancienne_annonce['titre'];
    $adresse = isset($_POST["adresse"]) && !empty(trim($_POST["adresse"])) ? htmlspecialchars(trim($_POST["adresse"])) : $ancienne_annonce['adresse'];
    $prix = isset($_POST["prix"]) && !empty($_POST["prix"]) ? filter_var($_POST["prix"], FILTER_VALIDATE_FLOAT) : $ancienne_annonce['prix'];
    $description = isset($_POST["description"]) ? htmlspecialchars(trim($_POST["description"])) : $ancienne_annonce['description'];


    if (empty($titre) || empty($adresse) || empty($prix) || empty($description)) {
        $error_message = "Veuillez remplir tous les champs correctement.";
    } 
    else {
        
        $sql = "UPDATE bien_a_vendre SET  titre = ?, adresse = ?, prix = ?, description = ? WHERE id = ? AND id_utilisateur = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssdsii", $titre, $adresse, $prix, $description, $annonce_id, $utilisateur_id);

        if ($stmt->execute()) {
            header("Location: profil.php?message=Annonce de vente mise à jour avec succès.");
            exit;
        } 
        else {
            $error_message = "Erreur lors de la mise à jour de l'annonce : " . $stmt->error;
        }
    }
}

$sql_types = "SELECT id, nom FROM type_bien";
$result_types = $conn->query($sql_types);
$types_biens = [];
if ($result_types->num_rows > 0) {
    while ($row = $result_types->fetch_assoc()) {
        $types_biens[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier l'annonce de vente</title>
    <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- jQuery (Obligatoire pour Owl Carousel) -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Owl Carousel CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

    <style>
        #header .navmenu {
    flex-grow: 1; /* Allows the navmenu to take up available space */
    display: flex;
    justify-content: center; /* Centers the ul within the navmenu */
}

#header .navmenu ul {
    display: flex; /* Makes the list items flex items */
    justify-content: center; /* Centers the list items horizontally */
    width: 100%; /* Ensure the ul takes full width of its parent */
}
main.main {
    margin-top: 130px; /* Adjust this value based on your header's actual height */
}
        body { font-family: sans-serif; margin: 20px; }
        h2 { margin-bottom: 20px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input[type="text"], input[type="number"], select, textarea { width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        .error-message { color: red; margin-top: 10px; }
        .button-container { margin-top: 20px; }
        button { background-color: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; font-size: 1em; }
        button:hover { background-color: #0056b3; }
        a { text-decoration: none; color: #007bff; }
        a:hover { text-decoration: underline; }
        /* --- Ajustements de la navigation de l'en-tête --- */

#header .navmenu ul {
    /* Supprimez tout width: 100% existant si cela rend les éléments trop espacés */
    /* width: auto; ou supprimez cette ligne si elle est présente */
    /* display: flex; est déjà présent, garde les éléments en ligne */
    /* justify-content: center; est déjà présent pour le centrage global */
}

#header .navmenu a {
    padding: 10px 15px; /* Ajustez le padding pour contrôler l'espacement autour des liens */
    /* Ce padding ajoutera de l'espace entre le texte des liens */
    /* Si vous voulez moins d'espace entre les *boîtes* des liens,
       vous devrez peut-être cibler directement le li avec margin-right */
}

#header .navmenu li {
    margin-right: 10px; /* Ajoutez une petite marge à droite de chaque élément de liste */
    /* Ajustez cette valeur (par exemple, 5px, 10px, 20px) pour contrôler l'espacement entre les éléments */
    /* Pour le dernier élément, vous voudrez peut-être supprimer cette margin-right : */
    /*
    #header .navmenu li:last-child {
        margin-right: 0;
    }
    */
}

/* --- Corrections spécifiques au menu déroulant --- */

#header .navmenu .dropdown {
    position: relative; /* Essentiel : Cela rend le positionnement absolu du menu déroulant relatif à ce li parent */
}

#header .navmenu .dropdown ul {
    display: none; /* Masqué par défaut */
    position: absolute;
    top: calc(100% + 5px); /* Positionne le légèrement en dessous du lien parent. Ajustez '5px' si nécessaire. */
    left: 0; /* Aligne sur le bord gauche du lien parent */
    min-width: 200px; /* Donne une largeur minimale au menu déroulant */
    background: #fff; /* Arrière-plan blanc pour le menu déroulant */
    padding: 10px 0;
    margin: 0;
    list-style: none;
    z-index: 99; /* S'assure qu'il apparaît au-dessus des autres contenus */
    box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1); /* Ombre subtile pour la profondeur */
    border-radius: 5px;
    opacity: 0; /* Commence masqué pour une transition fluide */
    visibility: hidden; /* Commence masqué pour une transition fluide */
    transition: 0.3s; /* Transition fluide pour l'apparition */
}

#header .navmenu .dropdown:hover > ul {
    opacity: 1; /* Afficher au survol */
    visibility: visible; /* Afficher au survol */
    display: block; /* Le rendre visible (flex ou block selon la disposition intérieure) */
    top: 100%; /* Le déplacer directement en dessous lorsqu'il est visible (ajuster si nécessaire) */
}

#header .navmenu .dropdown ul a {
    padding: 10px 20px; /* Padding pour les éléments du menu déroulant */
    font-weight: 400; /* Ajuster le poids de la police pour les éléments du menu déroulant */
    color: #333; /* Couleur plus foncée pour le texte du menu déroulant */
    white-space: nowrap; /* Empêche le texte de se retourner à la ligne */
    transition: 0.3s;
    display: block; /* Rendre les liens de type bloc pour une zone cliquable complète */
}

#header .navmenu .dropdown ul a:hover {
    background-color: #f8f8f8; /* Arrière-plan clair au survol */
    color: #007bff; /* Couleur de surbrillance au survol */
}

/* S'assurer que le bouton de navigation mobile n'est pas affecté */
.mobile-nav-toggle {
    display: none; /* Masqué sur le bureau */
}
@media (max-width: 1200px) { /* Ajustez le point de rupture selon votre conception pour le mobile */
    .mobile-nav-toggle {
        display: block; /* Afficher sur mobile */
    }
    #navmenu {
        display: none; /* Masquer le navmenu sur mobile par défaut, géré par le basculement JS */
    }
    /* Ajoutez des styles pour les menus déroulants mobiles si nécessaire lorsque le menu mobile est actif */
}
    </style>
</head>
<body>
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
        <h1 class="sitename">Miftahi</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="acheter.php">Acheter</a></li>
          <li><a href="vendre.php">Vendre</a></li>
          <li class="dropdown"><a href="#"><span>Louer</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="location proprietaire.php">Mettre en location</a></li>
              <li><a href="location client.php">Chercher une location</a></li>
            </ul>
          </li>
          <li><a href="vacances.php">Vacances</a></li>
          <li><a href="demenagement.php">Déménagement</a></li>
          
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

  </header>

 <main class="main">
      <h2>Modifier l'annonce de vente</h2>

    <?php if (isset($error_message)): ?>
        <p class="error-message"><?= $error_message ?></p>
    <?php endif; ?>
    <form method="POST" action="modifier_annonce_vente.php">
    <input type="hidden" name="id" value="<?= htmlspecialchars($annonce['id']) ?>">

        <div class="form-group">
            <label for="titre">Titre :</label>
            <input type="text" id="titre" name="titre" value="<?= htmlspecialchars($annonce['titre']) ?>" >
        </div>

        <div class="form-group">
            <label for="adresse">Adresse :</label>
            <input type="text" id="adresse" name="adresse" value="<?= htmlspecialchars($annonce['adresse']) ?>" >
        </div>
        <div class="form-group">
            <label for="prix">Prix :</label>
            <input type="number" id="prix" name="prix" min="0" value="<?= htmlspecialchars($annonce['prix']) ?>" >
        </div>

        <div class="form-group">
    <label for="description">Description :</label>
    <textarea id="description" name="description" rows="5" ><?= htmlspecialchars($annonce['description']) ?></textarea>
</div>           

  
                    <input type="submit" value="Mettre à jour">
    </form>

    <a href="profil.php">Retour au profil</a>
    </main>
    <footer id="footer" class="footer dark-background">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <div class="address">
            <h4>Liens rapides</h4>
            <ul>
              <li><a href="index.php">Accueil</a></li>
              <li><a href="acheter.php">Acheter</a></li>
              <li><a href="location client.php">Louer</a></li>
              <li><a href="vacances.php">Vacances</a></li>
              <li><a href="demenagement.php">Demenagement</a></li>
            </ul> 
          </div>
        </div>

        <div class="col-lg-3 col-md-6 d-flex">
          
          <div>
            <h4>Contact</h4>
            <p>
              <strong>Phone: +213 555 55 55 55</strong> <span></span><br>
              <strong>Email: miftahidz@gmail.dz</strong> <span></span><br>
            </p>
          </div>
        </div>

       
        <div class="col-lg-3 col-md-6">
          <h4>A propos de nous</h4>
          <p>Notre plateforme vous permet de louer, vendre ou acheter un bien immobilier facilement, sans agence.</p>

        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">Miftahi</strong> <span>Tous droits réservés</span></p>
      <div class="credits">
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    
	/*--/ News owl /--*/
	$('#new-carousel').owlCarousel({
		loop: true,
		margin: 30,
		responsive: {
			0: {  
				items: 1,
			},
			769: {
				items: 2,
			},
			992: {
				items: 3,
			}
		}
	});
  $(document).ready(function(){
    $('#new-carousel').owlCarousel({
      loop: true,
      margin: 30,
      nav: true,  // Ajoute des flèches de navigation
      dots: true, // Ajoute les indicateurs de pagination
      responsive: {
        0: { items: 1 },
        769: { items: 2 },
        992: { items: 3 }
      }
    });
  });
  </script>
</body>
</html>

              