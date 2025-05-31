<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>page de vacances</title>
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
  /* Assurez-vous que l'en-tête (header) a un z-index élevé */
#header {
    z-index: 1050; /* Doit être supérieur au z-index du moteur de recherche */
    /* Assurez-vous qu'il a aussi une position (comme fixed, absolute, relative) pour que z-index fonctionne */
    position: fixed; /* Il est déjà défini comme ça */
}

/* Assurez-vous que le navmenu lui-même a un z-index adéquat */
#navmenu {
    /* Si nécessaire, ajustez ici. Souvent, c'est l'élément parent qui porte le z-index principal. */
    position: relative; /* S'assurer qu'il est positionné */
    z-index: 1051; /* Un peu plus haut que le header si des éléments du navmenu doivent apparaître par-dessus */
}

/* Ciblez le sous-menu du dropdown (l'ul) */
.navmenu ul ul { /* Cela cible les <ul> imbriquées qui sont les dropdowns */
    z-index: 1052; /* Doit être supérieur à l'en-tête et au moteur de recherche */
    position: absolute; /* Le dropdown est souvent positionné absolument */
    /* Autres styles comme display: none; pour le cacher quand il n'est pas actif,
       et display: block; ou flex; quand il est actif via JavaScript/hover */
}

/* Pour le moteur de recherche, assurez-vous que son z-index est bien défini */
#aa-advance-search {
    position: relative; /* Important pour que z-index fonctionne */
    z-index: 1000; /* Maintenez ceci, ou un chiffre plus bas que le dropdown */
}
  #aa-advance-search {
      position: relative;
      width: 100%;
      margin-top: 80px;
      background: #f8f9fa;
      padding: 20px;
      z-index: 1000;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  }
  
  .aa-advance-search-area .form {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
      gap: 15px;
      align-items: start;
  }
  
  .aa-single-advance-search label,
  .aa-single-filter-search > p {
      display: block;
      margin-bottom: 5px;
      font-size: 14px;
      color: #333;
      font-weight: bold;
  }
  
  .aa-single-advance-search select {
      padding: 10px;
      font-size: 16px;
      width: 100%;
      border: 1px solid #ced4da;
      border-radius: 5px;
      box-sizing: border-box;
  }
  
  .aa-search-btn {
      background: #007bff;
      color: white;
      font-size: 16px;
      font-weight: bold;
      padding: 12px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      position: absolute; /* Positionnement absolu par rapport à #aa-advance-search */
      top: 78%; /* Centrer verticalement (approche initiale) */
      right: 30px; /* Positionner à droite */
      transform: translateY(-50%); /* Ajustement précis pour le centrage vertical */
  }
  
  .aa-search-btn:hover {
      background-color: #0056b3;
  }
  
  .filters-row-1 {
      display: flex;
      gap: 15px;
      grid-column: 1 / -1;
      margin-bottom: 15px;
  }
  
  .filters-row-1 .aa-single-advance-search {
      flex: 1;
      min-width: 150px;
  }

  .aa-single-filter-search > div {
      display: flex;
      align-items: center;
      gap: 5px;
      margin-bottom: 5px; /* Ajouter un espace entre les lignes Min et Max */
  }
  
  .aa-single-filter-search label {
      display: inline-block;
      font-weight: normal;
      width: auto;
  }
  
  .aa-single-filter-search input[type="number"] {
      padding: 8px;
      font-size: 16px;
      border: 1px solid #ced4da;
      border-radius: 5px;
      box-sizing: border-box;
      flex-grow: 1;
  }
  
  .aa-advance-search-bottom {
      display: none;
  }

  .sale_section .heading_container {
  -webkit-box-align: center;
      -ms-flex-align: center;
          align-items: center;
  margin-bottom: 35px;
}

.sale_section .sale_container {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
  -ms-flex-wrap: wrap;
      flex-wrap: wrap;
}

.sale_section .sale_container .box {
  -ms-flex-preferred-size: 32%;
      flex-basis: 32%;
  margin: .65%;
}

.sale_section .sale_container .box .img-box img {
  width: 100%;
}

.sale_section .sale_container .box .detail-box {
  margin-top: 10px;
}

.sale_section .sale_container .box .detail-box h6 {
  text-transform: uppercase;
  font-weight: bold;
  font-size: 18px;
}

.sale_section .btn-box {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: center;
      -ms-flex-pack: center;
          justify-content: center;
}

.sale_section .btn-box a {
  display: inline-block;
  padding: 7px 30px;
  background-color: transparent;
  color: #3554d1;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
  border: 1px solid #3554d1;
  border-radius: 25px;
  margin-top: 35px;
}

.sale_section .btn-box a:hover {
  background-color: #3554d1;
  border-color: transparent;
  color: #ffffff;
}

/* Cibler les images dans le conteneur 'sale_container' */
#sale-carousel .box .img-box img {
  width: 350px; /* Exemple de largeur */
  height: 250px; /* Exemple de hauteur */
  object-fit: cover; /* Optionnel: pour gérer les proportions */
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
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

          <?php if (isset($_SESSION['utilisateur_id'])): ?>
    <a href="Annonce de vente.php">Publier une annonce</a>
<?php else: ?>
    <a href="connexion.php">Se connecter pour publier une annonce</a>
<?php endif; ?>      
      

  <!-- Avatar -->
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
  </header>

<main class="main">
    <section id="aa-advance-search">
    <div class="container">
        <div class="aa-advance-search-area">
            <form action="recherche_vacances.php" method="GET">
                <div class="form">
                    <div class="filters-row-1">
                        <div class="aa-single-advance-search">
                            <label for="search_destination">Destination</label>
                            <select id="search_destination" name="destination">
                                
                                <option value="montagne" <?= isset($_GET['destination']) && $_GET['destination'] == 'montagne' ? 'selected' : '' ?>>Montagne</option>
                                <option value="bord_de_la_mer" <?= isset($_GET['destination']) && $_GET['destination'] == 'bord_de_la_mer' ? 'selected' : '' ?>>Bord de la mer</option>
                                <option value="desert" <?= isset($_GET['destination']) && $_GET['destination'] == 'desert' ? 'selected' : '' ?>>Désert</option>
                            </select>
                        </div>

                        <div class="aa-single-advance-search">
                            <label for="search_type_bien">Type de bien</label>
                            <select id="search_type_bien" name="type_bien">
                                
                                <?php
                                // Connexion à la base de données pour récupérer les types de biens
                                // Assurez-vous que cette partie est exécutée là où la connexion PDO est disponible
                                try {
                                    $conn = new PDO("mysql:host=localhost;dbname=siteimmob", "root", "");
                                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                                    $stmt_types = $conn->query("SELECT id, nom FROM type_bien");
                                    while ($row_type = $stmt_types->fetch(PDO::FETCH_ASSOC)) {
                                        $selected = (isset($_GET['type_bien']) && $_GET['type_bien'] == $row_type['id']) ? 'selected' : '';
                                        echo '<option value="' . $row_type['id'] . '" ' . $selected . '>' . htmlspecialchars($row_type['nom']) . '</option>';
                                    }
                                } catch (PDOException $e) {
                                    echo '<option disabled>Erreur de connexion à la base</option>';
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="meuble">
                        <div class="aa-single-filter-search">
                            <p>Meublé :</p>
                            <label>
                                <input type="radio" name="meuble" value="oui" <?= isset($_GET['meuble']) && $_GET['meuble'] == 'oui' ? 'checked' : '' ?>> Oui
                            </label>
                            <label>
                                <input type="radio" name="meuble" value="non" <?= !isset($_GET['meuble']) || $_GET['meuble'] == 'non' ? 'checked' : '' ?>> Non
                            </label>
                        </div>
                    </div>

                    <div class="prix-container">
                        <div class="aa-single-filter-search">
                            <p>Prix par nuit (DA)</p>
                            <label for="prix_min">Min :</label>
                            <input type="number" id="prix_min" name="prix_min" value="<?= isset($_GET['prix_min']) ? htmlspecialchars($_GET['prix_min']) : '' ?>">
                            <label for="prix_max">Max :</label>
                            <input type="number" id="prix_max" name="prix_max" value="<?= isset($_GET['prix_max']) ? htmlspecialchars($_GET['prix_max']) : '' ?>">
                        </div>
                    </div>
                </div>

                <button type="submit" class="aa-search-btn">Rechercher</button>
            </form>
        </div>
    </div>
</section>

    <!-- About Section -->
    <section id="about" class="about section">

        <div class="container">
  
          <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-5">
              <img src="assets/img/algerie vacances.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
              <div class="content">
                <h3>Location de vacances en Algérie</h3>
                <p>
                    Partez en toute tranquillité grâce à notre sélection de logements saisonniers en Algérie. Que vous cherchiez un appartement en bord de mer, une maison à la campagne ou une villa en montagne, trouvez votre bonheur facilement avec notre moteur de recherche.
                </p>
                </p>
                <ul>
                  <li><i class="bi bi-check-circle-fill"></i> <span>Recherchez par destination, type de bien, équipements et budget.</span></li>
                  <li><i class="bi bi-check-circle-fill"></i> <span>Explorez les destinations populaires via nos cartes interactives.</span></li>
                  <li><i class="bi bi-check-circle-fill"></i> <span>Proposez votre logement en location saisonnière en quelques clics
                  </span></li>
                </ul>
              </div>
            </div>
          </div>
  
        </div>
  
      </section><!-- /About Section -->
  
      
    <section class="sale_section layout_padding-bottom">
        <div class="container-fluid">
            <div class="heading_container">
                <h3>Nos destinations</h3>
            </div>
            <div id="sale-carousel" class="owl-carousel owl-theme sale_container">
                <div class="box">
                    <div class="img-box">
                      <a href="Annonces Montagne.php"><img src="assets/img/montagne.jpg" alt="" ></a>
                    </div>
                    <div class="detail-box">
                        <h6>
                            Montagne
                        </h6>
                    </div>
                </div>
                <div class="box">
                    <div class="img-box">
                      <a href="Annonces Bord de la mer.php"><img src="assets/img/bord de la mer.jpg" alt=""></a>
                    </div>
                    <div class="detail-box">
                        <h6>
                            Bord de la mer
                        </h6>
                    </div>
                </div>
                <div class="box">
                     <div class="img-box">
                      <a href="Annonces Desert.php"><img src="assets/img/desert.jpg" alt=""></a>
                    </div>
                    <div class="detail-box">
                        <h6>
                            Desert
                        </h6>
                    </div>
                </div>
                
            <div class="btn-box">
                <a href="annonce vacances.php">
                    Publier Votre Annonce
                </a>
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