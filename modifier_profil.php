<?php
session_start();

if (!isset($_SESSION['utilisateur_id'])) {
    header("Location: connexion.php");
    exit;
}

$utilisateur_id = $_SESSION['utilisateur_id'];
$conn = new mysqli("localhost", "root", "", "siteimmob");

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nouveau_nom = $_POST['nom'];
    $nouveau_email = $_POST['email'];
    $nouveau_numtel = $_POST['numtel'];

    // Validation des données (à compléter)
    if (!empty($nouveau_nom) && filter_var($nouveau_email, FILTER_VALIDATE_EMAIL)) {
        $sql_update = "UPDATE utilisateur SET nom = ?, email = ?, numtel = ? WHERE id = ?";
        $stmt_update = $conn->prepare($sql_update);
        $stmt_update->bind_param("sssi", $nouveau_nom, $nouveau_email, $nouveau_numtel, $utilisateur_id);

        if ($stmt_update->execute()) {
            $message = "Informations mises à jour avec succès.";
            // Peut-être mettre à jour les variables de session si nécessaire
        } else {
            $message = "Erreur lors de la mise à jour des informations : " . $stmt_update->error;
        }
        $stmt_update->close();
    } else {
        $message = "Veuillez vérifier les informations saisies.";
    }
}

// Récupération des infos utilisateur pour pré-remplir le formulaire
$sql_user = "SELECT nom, numtel, email FROM utilisateur WHERE id = ?";
$stmt_select = $conn->prepare($sql_user);
$stmt_select->bind_param("i", $utilisateur_id);
$stmt_select->execute();
$result_user = $stmt_select->get_result();
$utilisateur = $result_user->fetch_assoc();

$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier l'annonce de location</title>
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
    /* Styles existants */
    #header .navmenu {
        flex-grow: 1;
        display: flex;
        justify-content: center;
    }

    #header .navmenu ul {
        display: flex;
        justify-content: center;
        width: 100%;
    }

    main.main {
        margin-top: 130px;
        padding: 20px; /* Ajout d'un padding pour un meilleur espacement général */
    }

    body {
        font-family: sans-serif;
        margin: 20px;
    }

    h1, h2 {
        margin-bottom: 20px;
    }

    .form-group {
        margin-bottom: 20px; /* Augmenter l'espace entre les groupes de champs */
    }

    label {
        display: block;
        margin-bottom: 8px; /* Augmenter l'espace entre le label et l'input */
        font-weight: bold;
    }

    /* Tous les champs auront la même taille et un padding uniforme */
    input[type="text"],
    input[type="number"],
    input[type="email"],
    input[type="tel"],
    select,
    textarea {
        width: 100%; /* S'assure que tous les champs prennent 100% de la largeur de leur parent */
        max-width: 400px; /* Définit une largeur maximale pour les champs pour éviter qu'ils ne soient trop larges */
        padding: 10px; /* Augmenter le padding pour une meilleure apparence */
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box; /* Inclut le padding et la bordure dans la largeur totale */
    }

    .error-message {
        color: red;
        margin-top: 10px;
        margin-bottom: 10px;
    }

    /* Modifié pour donner de l'espace au bouton */
    button[type="submit"] {
        background-color: #007bff;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1.1em;
        margin-top: 25px; /* Augmenté à 25px pour plus d'espace */
    }

    button[type="submit"]:hover {
        background-color: #0056b3;
    }

    a {
        text-decoration: none;
        color: #007bff;
    }

    a:hover {
        text-decoration: underline;
    }

    /* Styles pour la navigation de l'en-tête (inchangés) */
    #header .navmenu a {
        padding: 10px 15px;
    }

    #header .navmenu li {
        margin-right: 10px;
    }

    #header .navmenu .dropdown {
        position: relative;
    }

    #header .navmenu .dropdown ul {
        display: none;
        position: absolute;
        top: calc(100% + 5px);
        left: 0;
        min-width: 200px;
        background: #fff;
        padding: 10px 0;
        margin: 0;
        list-style: none;
        z-index: 99;
        box-shadow: 0px 0px 30px rgba(0, 0, 0, 0.1);
        border-radius: 5px;
        opacity: 0;
        visibility: hidden;
        transition: 0.3s;
    }

    #header .navmenu .dropdown:hover > ul {
        opacity: 1;
        visibility: visible;
        display: block;
        top: 100%;
    }

    #header .navmenu .dropdown ul a {
        padding: 10px 20px;
        font-weight: 400;
        color: #333;
        white-space: nowrap;
        transition: 0.3s;
        display: block;
    }

    #header .navmenu .dropdown ul a:hover {
        background-color: #f8f8f8;
        color: #007bff;
    }

    .mobile-nav-toggle {
        display: none;
    }

    @media (max-width: 1200px) {
        .mobile-nav-toggle {
            display: block;
        }

        #navmenu {
            display: none;
        }
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
    <h1>Modifier mon profil</h1>

    <?php
    // Afficher le message de succès/erreur général
    if (!empty($message)) {
        echo '<p>' . htmlspecialchars($message) . '</p>';
    }
    ?>

    <?php if ($utilisateur): ?>
        <form method="post">
            <div>
                <label for="nom">Nom:</label>
                <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($utilisateur['nom']) ?>" required>
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?= htmlspecialchars($utilisateur['email']) ?>" required>
            </div>
            <div>
                <label for="numtel">Téléphone:</label>
                <input type="tel" id="numtel" name="numtel" value="<?= htmlspecialchars($utilisateur['numtel']) ?>">
            </div>
            <button type="submit">Enregistrer les modifications</button>
            <p><a href="profil.php">Retour au profil</a></p>
        </form>
    <?php else: ?>
        <p>Impossible de récupérer les informations de l'utilisateur.</p>
        <p><a href="profil.php">Retour au profil</a></p>
    <?php endif; ?>
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

              