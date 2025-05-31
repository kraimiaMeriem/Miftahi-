<?php
session_start();

// Connexion à la base de données
define('HOST', 'localhost');
define('DB_NAME', 'siteimmob');
define('USER', 'root');
define('PASS', '');

try {
    $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", USER, PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Laissez cette ligne pour le débogage initial de la connexion DB
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

$annonce = null;
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $annonce_id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

    if ($annonce_id === false) {
        header("Location: index.php?error=invalid_id");
        exit;
    }

    try {
        // MODIFICATION CRUCIALE ICI: Changé de 'bien_a_vendre' à 'bien_a_louer'
        // et ajusté les colonnes pour correspondre à 'bien_a_louer'
        $sql = "SELECT b.*, t.nom as type_nom, u.nom as nom_utilisateur, u.numtel
                FROM bien_a_louer b
                JOIN type_bien t ON b.id_type = t.id
                JOIN utilisateur u ON b.id_utilisateur = u.id
                WHERE b.id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$annonce_id]);
        $annonce = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$annonce) {
            header("Location: index.php?error=annonce_not_found");
            exit;
        }

        // Traiter la chaîne de photos en tableau
        $photos = explode(',', $annonce['photos']);

    } catch (PDOException $e) {
        // Laissez cette ligne pour le débogage des requêtes SQL
        die("Erreur PDO détaillée lors du chargement de l'annonce : " . $e->getMessage());
    }
} else {
    header("Location: index.php?error=no_id_provided");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Annonces de Location Alger</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/main.css" rel="stylesheet">


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <style>
        :root {
            --primary-color: #007bff;
            --secondary-color: #6c757d; /* Gris foncé */
            --light-bg: #f8f9fa; /* Fond très clair */
            --dark-text: #343a40; /* Texte foncé */
            --light-text: #666; /* Texte gris clair */
            --border-color: #e9ecef; /* Couleur de bordure légère */
            --shadow: 0 0.5rem 1rem rgba(0,0,0,.08); /* Ombre légère et moderne */
            --border-radius: 0.5rem; /* Bordures arrondies */
        }

        body {

            background-color: var(--light-bg);
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            box-sizing: border-box;
            color: var(--dark-text);
        }

        /* Conteneur principal de l'annonce */
        .annonce-wrapper {
            width: 95%;
            max-width: 1400px; /* AUGMENTÉ: Agrandit le conteneur global */
            margin-top: 120px; /* Espace pour le header fixe */
            margin-bottom: 30px;
            display: flex;
            gap: 30px;
            flex-wrap: wrap;
            justify-content: center; /* Centrer les éléments si l'espace le permet */
        }

        /* Section du contenu principal de l'annonce */
        .annonce-main-content {
            flex: 3; /* AUGMENTÉ: Prend plus d'espace */
            min-width: 750px; /* AUGMENTÉ: Largeur minimale plus grande */
            background: white;
            padding: 30px;
            box-shadow: var(--shadow); /* Ombre plus prononcée */
            box-sizing: border-box;
        }

        /* Sidebar pour les informations du propriétaire */
        .sidebar {
    flex: 1;
    min-width: 350px;
    background-color: var(--primary-color);
    color: white;
    padding: 25px;
    box-shadow: var(--shadow);
    box-sizing: border-box;
    align-self: flex-start;
    position: relative; /* Ou 'static'. 'relative' est souvent un bon choix par défaut si d'autres éléments sont positionnés relativement à elle. */
    /* Supprimez ou commentez la ligne 'top: 140px;' car elle n'est plus pertinente avec position: relative; */
    /* top: 140px; */
    height: fit-content;
    transition: transform 0.3s ease-in-out;
}
        .sidebar:hover {
            transform: translateY(-5px); /* Petit effet au survol */
        }
        .sidebar h3 {
            color: white; /* Titre blanc */
            font-size: 1.8rem;
            margin-bottom: 20px;
            font-weight: 700;
            text-align: center; /* Centrer le titre */
        }
        .sidebar p {
            font-size: 1.15rem;
            color: #f1f1f1; /* Gris clair pour le texte */
            margin: 10px 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .sidebar p i {
            margin-right: 10px;
            color: white; /* Icônes blanches */
            font-size: 1.3em;
        }
        .sidebar .btn-contact {
            background-color: white; /* Bouton blanc */
            color: var(--primary-color); /* Texte bleu */
            padding: 12px 25px;
            border: none;
            border-radius: var(--border-radius);
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            font-weight: 600;
            transition: background-color 0.3s ease, color 0.3s ease;
            box-shadow: 0 0.25rem 0.5rem rgba(0,0,0,.1);
            width: 100%; /* Bouton pleine largeur */
            text-align: center;
        }
        .sidebar .btn-contact:hover {
            background-color: #e2e6ea; /* Gris clair au survol */
            color: var(--primary-color);
        }

        /* Responsive adjustments */
        @media (max-width: 992px) {
            .annonce-wrapper {
                flex-direction: column;
                gap: 20px; /* Réduit l'espace entre les sections empilées */
            }
            .annonce-main-content, .sidebar {
                min-width: unset;
                width: 100%;
                padding: 20px; /* Ajuste le padding pour les petits écrans */
            }
            .sidebar {
                position: static;
                margin-top: 0; /* Pas de marge supplémentaire si déjà empilée */
            }
        }

        /* Titre et sous-titre de l'annonce */
        .annonce-header {
            text-align: left;
            margin-bottom: 30px; /* Plus d'espace sous le titre */
        }
        .annonce-header h1 {
            font-size: 2.5rem; /* Plus grand titre */
            color: var(--primary-color); /* Couleur primaire pour le titre */
            margin-bottom: 0.5rem;
            line-height: 1.2;
        }
        .annonce-header p {
            font-size: 1.1rem;
            color: var(--light-text);
            margin-top: 0;
            font-weight: 500; /* Légèrement plus épais */
        }

        /* Carrousel de photos */
        /* Carrousel de photos */


        .owl-theme .owl-nav [class*='owl-'] {
            background: var(--primary-color) !important;
            color: white !important;
            font-size: 1.5rem !important;
            opacity: 0.8;
            transition: opacity 0.3s ease;
        }


        /* Détails de l'annonce (grille) */

        /* Détails de l'annonce (style en liste) */
.annonce-details {
    /* Supprimez les propriétés de grille pour le conteneur principal */
    /* display: grid; */
    /* grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); */
    /* gap: 20px 30px; */

    margin-top: 20px;
    padding-top: 20px;
    margin-bottom: 30px;
}
.annonce-details h3 {
    /* Gardez le style de votre titre "Détails du bien" */
    font-size: 1.6rem;
    color: var(--dark-text);
    margin-bottom: 15px; /* Ajustez la marge si nécessaire */
    font-weight: 600;
}

/* Nouveau style pour la liste */
.details-list {
    list-style: none; /* Supprime les puces par défaut */
    padding: 0; /* Supprime le padding par défaut de la liste */
    margin: 0; /* Supprime la marge par défaut de la liste */
}

.details-list li {
    font-size: 1.1rem; /* Taille de police pour chaque élément de la liste */
    color: var(--dark-text);
    margin-bottom: 10px; /* Espace entre chaque détail */
    padding-left: 0px; /* Ajustez si vous voulez une indentation */
}

.details-list li strong {
    color: #343a40; /* Changed from var(--primary-color) to dark-text */
    margin-right: 8px; /* Espace entre le titre du détail et sa valeur */
}
        /* Description de l'annonce */
        .annonce-description {
            margin-top: 30px;
            padding-top: 20px;
        }
        .annonce-description h3 {
            font-size: 1.6rem;
            color: var(--dark-text);
            margin-bottom: 15px;
            font-weight: 600;
        }
        .annonce-description p {
            font-size: 1.1rem;
            line-height: 1.7;
            color: var(--light-text);
        }
        #footer {

    width: 100% ; /* Ensure it takes full width */
}
.single-annonce-photo { /* Nouvelle classe pour la seule image */
    width: 100%; /* L'image prend toute la largeur du conteneur parent */
    max-width: 800px; /* Optionnel: définir une largeur maximale pour ne pas qu'elle soit trop grande */
    height: 500px; /* Garder la hauteur souhaitée */
    object-fit: cover; /* Assure que l'image couvre la zone sans déformation */
    box-shadow: var(--shadow); /* Utilise la variable pour l'ombre */
}
    </style>
</head>
<body class="annoncevacance-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
            <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1 class="sitename">Miftahi</h1>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="#about">Acheter</a></li>
                    <li><a href="#about">Vendre</a></li>
                    <li class="dropdown"><a href="#"><span>Louer</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="location proprietaire.php">Mettre en location</a></li>
                            <li><a href="location client.php">Chercher une location</a></li>
                        </ul>
                    </li>
                    <li><a href="#about">Vacances</a></li>
                    <li><a href="#demenagement">Déménagement</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            <div class="avatar-container">
                <?php if (isset($_SESSION['utilisateur_id'])): ?>
                    <a href="tableau_de_bord.php" title="Tableau de bord">
                <?php else: ?>
                    <a href="connexion.php" title="Se connecter">
                <?php endif; ?>
                            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                        </a>
            </div>
        </div>
    </header>

    <main class="main">
        <?php if ($annonce): ?>
            <div class="annonce-wrapper">
                <div class="annonce-main-content">
                    <div class="annonce-header">
                        <h1 style= "color: black;"><?php echo htmlspecialchars($annonce['titre']); ?></h1>
                    </div>

                    <div class="annonce-photos">
    <?php if (!empty($photos) && !empty($photos[0])): ?>
        <img src="<?php echo htmlspecialchars($photos[0]); ?>" alt="Photo de l'annonce" class="single-annonce-photo">
    <?php else: ?>
        <p>Aucune photo disponible pour cette annonce.</p>
    <?php endif; ?>
</div>

                    <div class="annonce-details">
    <h3>Détails du bien</h3>
    <ul class="details-list">
        <li><strong>Type de bien:</strong> <?php echo htmlspecialchars($annonce['type_nom']); ?></li>
            <?php
            // Define the $wilayas array BEFORE attempting to use it
            $wilayas = [
                "1" => "Adrar",
                "2" => "Chlef",
                "3" => "Laghouat",
                "4" => "Oum El Bouaghi",
                "5" => "Batna",
                "6" => "Béjaïa",
                "7" => "Biskra",
                "8" => "Béchar",
                "9" => "Blida",
                "10" => "Bouira",
                "11" => "Tamanrasset",
                "12" => "Tébessa",
                "13" => "Tlemcen",
                "14" => "Tiaret",
                "15" => "Tizi Ouzou",
                "16" => "Alger",
                "17" => "Djelfa",
                "18" => "Jijel",
                "19" => "Sétif",
                "20" => "Saïda",
                "21" => "Skikda",
                "22" => "Sidi Bel Abbès",
                "23" => "Annaba",
                "24" => "Guelma",
                "25" => "Constantine",
                "26" => "Médéa",
                "27" => "Mostaganem",
                "28" => "M'Sila",
                "29" => "Mascara",
                "30" => "Ouargla",
                "31" => "Oran",
                "32" => "El Bayadh",
                "33" => "Illizi",
                "34" => "Bordj Bou Arreridj",
                "35" => "Boumerdès",
                "36" => "El Tarf",
                "37" => "Tindouf",
                "38" => "Tissemsilt",
                "39" => "El Oued",
                "40" => "Khenchela",
                "41" => "Souk-Ahras",
                "42" => "Tipaza",
                "43" => "Mila",
                "44" => "Aïn Defla",
                "45" => "Naâma",
                "46" => "Aïn Témouchent",
                "47" => "Ghardaïa",
                "48" => "Relizane",
                "49" => "Timimoun",
                "50" => "Bordj Badji Mokhtar",
                "51" => "Ouled Djellal",
                "52" => "Béni Abbès",
                "53" => "In Salah",
                "54" => "In Guezzam",
                "55" => "Touggourt",
                "56" => "Djanet",
                "57" => "El M'Ghair",
                "58" => "El Meniaa"
            ];
            ?>
        <li><strong>Wilaya:</strong> <?php echo htmlspecialchars($wilayas[$annonce['wilaya']] ?? 'Inconnue'); ?></li>
        <li><strong>Adresse:</strong> <?php echo htmlspecialchars($annonce['adresse']); ?></li>
        <li><strong>Superficie:</strong> <?php echo htmlspecialchars($annonce['superficie']); ?> m²</li>
        <li><strong>État:</strong> <?php echo htmlspecialchars($annonce['etat']); ?></li>
        <li><strong>Meublé:</strong> <?php echo ($annonce['meuble'] == 1 ? 'Oui' : 'Non'); ?></li>
        <li><strong>Nombre de pièces:</strong> <?php echo htmlspecialchars($annonce['piece']); ?></li>
        <li><strong>Loyer Mensuel:</strong> <?php echo number_format($annonce['loyer_mensuel'], 2, ',', ' '); ?> DZD</li>
        <li><strong>Durée de Location:</strong> <?php echo htmlspecialchars($annonce['duree_de_location']); ?></li>
    </ul>
</div>

                    <div class="annonce-description">
                        <h3>Description </h3>
                        <p><?php echo nl2br(htmlspecialchars($annonce['description'])); ?></p>
                    </div>
                </div>

                <div class="sidebar">
                    <h3>Coordonnées du Propriétaire</h3>
                    <p><i class="fas fa-user"></i> <strong><?php echo htmlspecialchars($annonce['nom_utilisateur']); ?></strong></p>
                    <p><i class="fas fa-phone-alt"></i> <?php echo htmlspecialchars($annonce['numtel'] ?? 'Non spécifié'); ?></p>
                </div>
            </div>
        <?php else: ?>
            <p>L'annonce que vous recherchez n'existe pas ou n'est plus disponible.</p>
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

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <div id="preloader"></div>

  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

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

    $(document).ready(function(){
            $(".owl-carousel").owlCarousel({
                items: 1,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                nav: true,
                dots: true
            });
        });
  </script>
</body>
</html>