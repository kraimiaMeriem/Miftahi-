<?php
    session_start();       
    include('connection.php');    
    
    // Initialisation du tri par défaut (du plus récent au plus ancien)
    $orderBy = "bl.date_annonce DESC"; 

    // Récupération et sécurisation du paramètre de tri si présent
    if (isset($_GET['sort_order'])) {
        $sortOrder = htmlspecialchars($_GET['sort_order']);
        switch ($sortOrder) {
            case 'recent':
                $orderBy = "bl.date_annonce DESC";
                break;
            case 'oldest':
                $orderBy = "bl.date_annonce ASC";
                break;
            // Pas de cases pour 'price_asc' ou 'price_desc' si vous ne les voulez pas
            default: // Pour gérer les valeurs inattendues ou non spécifiées
                $orderBy = "bl.date_annonce DESC";
                break;
        }
    }

    // Initialisation pagination
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $annoncesParPage = 6;
    $offset = ($page - 1) * $annoncesParPage;

    // Total des annonces (compte tenu de la wilaya Annaba)
    $totalAnnonces = $db->query("SELECT COUNT(*) FROM bien_a_louer WHERE wilaya = '23'")->fetchColumn();
    $totalPages = ceil($totalAnnonces / $annoncesParPage);

    // Requête principale pour récupérer les annonces avec le tri dynamique
    $sql = "SELECT bl.*, tp.nom AS nom_type
            FROM bien_a_louer bl
            JOIN type_bien tp ON bl.id_type = tp.id
            WHERE bl.wilaya = '23'
            ORDER BY " . $orderBy . "
            LIMIT :offset, :limit";

    $requete = $db->prepare($sql);
    $requete->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
    $requete->bindValue(':limit', (int)$annoncesParPage, PDO::PARAM_INT);
    $requete->execute();

     $wilayas = [ "1" => "Adrar",
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
    "58" => "El Meniaa" ];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>annonces de vente Costantine</title>
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
<link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">

<!-- Owl Carousel JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">

<style>
  .card-overlay .property-type {
    position: absolute;
    top: 10px;
    right: 10px;
    color: #fff;
    font-size: 0.9rem;
    z-index: 2;
    background-color: rgba(0, 0, 0, 0.5);
    padding: 0.2rem 0.5rem;
    border-radius: 0.2rem;
    text-transform: uppercase; /* Optionnel */
}

.card-overlay-a-content {
    position: absolute;
    top: 0; /* Ancrer en haut */
    left: 0;
    width: 100%;
    height: auto; /* Ajuster la hauteur au contenu */
    padding: 1.5rem;
    display: flex;
    flex-direction: column; /* Empiler les éléments verticalement */
    justify-content: flex-start; /* Aligner les éléments en haut */
    align-items: flex-start; /* Aligner le contenu à gauche par défaut */
    z-index: 2; /* S'assurer qu'il est au-dessus de l'overlay de fond */
}

/* Styles pour le titre */
.card-header-a {
    margin-bottom: 1rem; /* Ajouter un espace en dessous du titre */
}

.card-title-a {
    font-size: 1.5rem;
    font-weight: bold;
    color: #fff;
    margin-bottom: 0.5rem;
}

.card-title-a a {
    color: #fff;
    text-decoration: none;
}

/* Styles pour le corps de la carte (prix et lien) */
.card-body-a {
    margin-bottom: 3rem; /* Ajouter un espace en dessous du corps */
}

.price-box {
    margin-bottom: 0.5rem;
}

.price-a {
    color: #fff;
    font-size: 1.2rem;
}

.link-a {
    color: #fff;
    text-decoration: none;
    font-size: 0.9rem;
}

.link-a span {
    display: inline-block;
    margin-left: 0.3rem;
}

/* Styles pour la localisation (positionné en bas) */
.card-overlay .property-location {
    position: absolute;
    bottom: 10px;
    left: 10px;
    color: #fff;
    font-size: 0.9rem;
    z-index: 2;
    display: flex;
    align-items: center;
}

.card-overlay .property-location i {
    margin-right: 0.3rem;
    font-size: 1rem;
}

/* Styles pour la date d'annonce (positionné en bas) */
.card-overlay .property-date {
    position: absolute;
    bottom: 10px;
    right: 10px;
    color: #fff;
    font-size: 0.8rem;
    z-index: 2;
    background-color: rgba(0, 0, 0, 0.5);
    padding: 0.2rem 0.5rem;
    border-radius: 0.2rem;
}

/* Styles pour la localisation (modifié pour le bas) */
.property-location {
    position: absolute;
    bottom: 10px; /* Le positionne à 10px du bas */
    left: 10px;
    color: #fff;
    font-size: 0.9rem;
    z-index: 2;
    display: flex;
    align-items: center;
}

.property-location i {
    margin-right: 0.3rem;
    font-size: 1rem;
}

/* Styles pour la date d'annonce (modifié pour le bas) */
.property-date {
    position: absolute;
    bottom: 10px; /* Le positionne à 10px du bas */
    right: 10px;
    color: #fff;
    font-size: 0.8rem;
    z-index: 2;
    background-color: rgba(0, 0, 0, 0.5);
    padding: 0.2rem 0.5rem;
    border-radius: 0.2rem;
}
.price-a {
  color: #ffffff;
  padding: .6rem .8rem;
  border: 2px solid #fff;
  border-radius: 50px;
  text-transform: uppercase;
  letter-spacing: 0.030em;
}
.intro-single .title-single-box {
  border-left: 3px solid #000;
}

.pagination-a .pagination .page-item.active .page-link {
  background-color: #199eb8;
}

/* Ajustement pour les écrans plus petits (vous pouvez modifier ces points de rupture) */
@media (max-width: 991.98px) {
    .property-grid.grid .container .row > .col-md-4 {
        width: 50%; /* Afficher 2 colonnes sur les écrans plus petits */
    }
}

@media (max-width: 767.98px) {
    .property-grid.grid .container .row > .col-md-4 {
        width: 100%; /* Afficher 1 colonne sur les écrans très petits */
    }
}

/* Styles pour la sélection "Tous" (si vous en avez une) */
.grid-option {
    margin-bottom: 20px;
    text-align: right;
}

.grid-option .custom-select {
    display: inline-block;
    width: auto;
    padding: 0.375rem 2.25rem 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    vertical-align: middle;
    background: white url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%23343a40' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e") right 0.75rem center/8px 10px no-repeat;
    border: 1px solid #ced4da;
    border-radius: 0.25rem;
    -webkit-appearance: none;
    -moz-appearance: none;
    appearance: none;
}

.card-box-a {
  height: 100%;
  display: flex;
  flex-direction: column;
  justify-content: space-between; /* répartir le contenu sur toute la hauteur */
}

.card-shadow {
  height: 100%;
}

.img-box-a img {
  object-fit: cover;
  width: 100%;
  height: 350px; /* ajuste selon la taille que tu veux */
}

.col-lg-4 {
  display: flex;
  flex-direction: column;
  height: 100%;
}

</style>

</head>

<body class="index-page">

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

          
      

  <!-- Avatar -->
  <div class="avatar-container">
  <?php if (isset($_SESSION['utilisateur_id'])): ?>
    <a href="profil.php" title="Profil">
  <?php else: ?>
    <a href="connexion.php" title="Se connecter">
  <?php endif; ?>
      <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
      </svg>
    </a>
</div>
  </header>

 <main class="main">
    <section class="intro-single">
        <div class="container-fluid">
            <div class="row d-flex align-items-stretch">
                <div class="col-md-12">
                    <div class="title-single-box">
                        <h1 class="title-single">Nos annonces à Costantine</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

  <section class="property-grid grid">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="grid-option">
                            <form id="sortForm" method="GET" action=""> 
                                <select name="sort_order" class="custom-select" onchange="this.form.submit()">
                                    <option value="recent" <?= (!isset($_GET['sort_order']) || $_GET['sort_order'] == 'recent') ? 'selected' : '' ?>>Du plus récent au plus ancien</option>
                                    <option value="oldest" <?= (isset($_GET['sort_order']) && $_GET['sort_order'] == 'oldest') ? 'selected' : '' ?>>De l'ancien au plus récent</option>
                                </select>
                            </form>
                        </div>
                    </div>

                <?php
                // Initialisation pagination
                $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                $annoncesParPage = 6;
                $offset = ($page - 1) * $annoncesParPage;

                // Total des annonces
                $totalAnnonces = $db->query("SELECT COUNT(*) FROM bien_a_vendre WHERE wilaya = '25'")->fetchColumn();
                $totalPages = ceil($totalAnnonces / $annoncesParPage);

                // Requête avec LIMIT sécurisée
                $requete = $db->prepare("SELECT bl.*, tp.nom AS nom_type
                    FROM bien_a_vendre bl
                    JOIN type_bien tp ON bl.id_type = tp.id
                    WHERE bl.wilaya = '25'
                    ORDER BY bl.date_annonce DESC
                    LIMIT :offset, :limit");
                $requete->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
                $requete->bindValue(':limit', (int)$annoncesParPage, PDO::PARAM_INT);
                $requete->execute();

    // Liste des wilayas
    $wilayas = [ "1" => "Adrar",
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
    "58" => "El Meniaa" ];

                if ($requete->rowCount() > 0) {
                    while ($annonce = $requete->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div class="col-lg-4">
                        <div class="card-box-a card-shadow">
                            <div class="img-box-a">
                                <img src="<?= htmlspecialchars($annonce['photos']); ?>" alt="<?= htmlspecialchars($annonce['titre']); ?>" class="img-a img-fluid">
                            </div>

                            <div class="card-overlay">
                                <div class="card-overlay-a-content" style="position: relative;">
                                    <div class="card-header-a">
                                        <h2 class="card-title-a">
                                            <div class="property-type">
                                                <?= htmlspecialchars($annonce['nom_type']); ?>
                                            </div>
                                            <a href="annonce.php?id=<?= $annonce['id']; ?>">
                                                <?= htmlspecialchars($annonce['titre']); ?><br />
                                                <?= htmlspecialchars($annonce['wilaya']); ?>
                                            </a>
                                        </h2>
                                    </div>
                                    <div class="card-body-a">
                                        <div class="price-box d-flex">
                                            <span class="price-a">Prix | DA <?= number_format($annonce['prix'], 0, ',', ' '); ?></span>
                                        </div>
                                        <a href="annonce.php?id=<?= $annonce['id']; ?>" class="link-a">Voir plus <span class="ion-ios-arrow-forward"></span></a>
                                    </div>
                                </div>
                                <div class="property-location">
                                    <i class="fa fa-map-marker-alt"></i>
                                    <?= isset($wilayas[$annonce['wilaya']]) ? htmlspecialchars($wilayas[$annonce['wilaya']]) : htmlspecialchars($annonce['wilaya']); ?>
                                </div>
                                <div class="property-date">
                                    Publié le <?= date('d/m/Y', strtotime($annonce['date_annonce'])); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                    }
                } else {
                    echo "<p class='mt-4'>Aucune annonce disponible pour le moment.</p>";
                }
                ?>

                <div class="col-sm-12">
                    <!-- Pagination -->
                    <nav class="pagination-a">
                        <ul class="pagination justify-content-end">
                            <li class="page-item <?= ($page <= 1) ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?= $page - 1 ?>">
                                    <span class="ion-ios-arrow-back"></span>
                                </a>
                            </li>
                            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                                <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                                    <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                                </li>
                            <?php endfor; ?>
                            <li class="page-item <?= ($page >= $totalPages) ? 'disabled' : '' ?>">
                                <a class="page-link" href="?page=<?= $page + 1 ?>">
                                    <span class="ion-ios-arrow-forward"></span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

            </div>
        </div>
    </section>
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