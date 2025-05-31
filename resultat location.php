<?php
    session_start();               
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>resulat de location</title>
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
    /* Styles pour l'icône de favori */
/* Styles pour l'overlay content */
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

.property-type {
    background-color: #007bff; /* Couleur de fond bleue */
    color: white; /* Texte blanc */
    padding: 5px 10px; /* Un peu d'espace intérieur */
    border-radius: 5px; /* Bords arrondis */
    font-size: 0.9em; /* Taille de police légèrement plus petite */
    margin-top: 5px; /* Un peu d'espace au-dessus */
    display: inline-block; /* Pour ne prendre que la largeur nécessaire */
}

/* Autre style possible pour le mettre en évidence */
.property-type-badge {
    background-color: #28a745; /* Couleur de fond verte */
    color: white;
    padding: 3px 8px;
    border-radius: 3px;
    font-size: 0.8em;
    position: absolute; /* Pour le positionner par rapport à un parent */
    top: 10px;
    left: 10px;
    z-index: 1; /* Pour qu'il soit au-dessus de l'image si nécessaire */
}

/* Si vous avez choisi de le mettre dans le header */
.card-header-a .property-type {
    margin-top: 8px;
}
.card-box-a {
    position: relative; /* Important pour que le positionnement absolute de l'enfant soit relatif à lui */
    /* Les autres styles de votre carte restent ici */
}

.property-type-top-right {
    position: absolute;
    top: 10px; /* Ajustez la distance depuis le haut */
    right: 10px; /* Ajustez la distance depuis la droite */
    background-color: #007bff; /* Couleur de fond */
    color: white; /* Couleur du texte */
    padding: 5px 10px; /* Espace intérieur */
    border-radius: 5px; /* Bords arrondis */
    font-size: 0.9em; /* Taille de la police */
    z-index: 2; /* Pour s'assurer qu'il est au-dessus de l'image et de l'overlay si nécessaire */
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
          <li><a href="acheter.html">Acheter</a></li>
          <li><a href="vendre.html">Vendre</a></li>
          <li class="dropdown"><a href="#"><span>Louer</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
            <li><a href="location proprietaire.php">Mettre en location</a></li>
            <li><a href="location client.php">Chercher une location</a></li>
            </ul>
          </li>
          <li><a href="vacances.html">Vacances</a></li>
          <li><a href="demenagement.html">Déménagement</a></li>
          
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
          <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

      

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
 <!--/ Intro Single star /-->
 <section class="intro-single">
    <div class="container">
      <div class="row">

        
      </div>
    </div>
  </section>
  <!--/ Intro Single End /-->

  <!--/ Property Grid Star /-->
  <section class="property-grid grid">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="grid-option">
            
          </div>
        </div>

        <div class="col-md-4">
            <div class="card-box-a card-shadow">
                <div class="property-type-top-right">Maison</div> <div class="img-box-a">
                    <img src="assets/img/maison.jpg" alt="" class="img-a img-fluid">
                    <button class="btn btn-light btn-sm position-absolute top-0 end-0 m-2 rounded-circle shadow-sm" title="Ajouter aux favoris">
                    </button>
                </div>
                <div class="card-overlay">
                    <div class="card-overlay-a-content" style="position: relative;">
                        <div class="card-header-a">
                            <h2 class="card-title-a">
                                <a href="#">204 Mount
                                    <br /> Olive Road Two</a>
                            </h2>
                           
                        </div>
                        <div class="card-body-a">
                            <div class="price-box d-flex">
                                <span class="price-a">Prix | DA 12.000</span>
                            </div>
                            <a href="détaille annonce.html" class="link-a">Click here to view
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                    <div class="property-location">
                        <i class="fa fa-map-marker-alt"></i> Sidi Amar, Annaba
                    </div>
                    <div class="property-date">
                        Publié le 25 Avril 2025
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card-box-a card-shadow">
                <div class="property-type-top-right">Maison</div> <div class="img-box-a">
                    <img src="assets/img/maison.jpg" alt="" class="img-a img-fluid">
                    <button class="btn btn-light btn-sm position-absolute top-0 end-0 m-2 rounded-circle shadow-sm" title="Ajouter aux favoris">
                    </button>
                </div>
                <div class="card-overlay">
                    <div class="card-overlay-a-content" style="position: relative;">
                        <div class="card-header-a">
                            <h2 class="card-title-a">
                                <a href="#">204 Mount
                                    <br /> Olive Road Two</a>
                            </h2>
                        </div>
                        <div class="card-body-a">
                            <div class="price-box d-flex">
                                <span class="price-a">Prix | DA 12.000</span>
                            </div>
                            <a href="détaille annonce.html" class="link-a">Click here to view
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                    <div class="property-location">
                        <i class="fa fa-map-marker-alt"></i> Sidi Amar, Annaba
                    </div>
                    <div class="property-date">
                        Publié le 25 Avril 2025
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card-box-a card-shadow">
                <div class="property-type-top-right">Maison</div> <div class="img-box-a">
                    <img src="assets/img/maison.jpg" alt="" class="img-a img-fluid">
                    <button class="btn btn-light btn-sm position-absolute top-0 end-0 m-2 rounded-circle shadow-sm" title="Ajouter aux favoris">
                    </button>
                </div>
                <div class="card-overlay">
                    <div class="card-overlay-a-content" style="position: relative;">
                        <div class="card-header-a">
                            <h2 class="card-title-a">
                                <a href="#">204 Mount
                                    <br /> Olive Road Two</a>
                            </h2>
                        </div>
                        <div class="card-body-a">
                            <div class="price-box d-flex">
                                <span class="price-a">Prix | DA 12.000</span>
                            </div>
                            <a href="détaille annonce.html" class="link-a">Click here to view
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                    <div class="property-location">
                        <i class="fa fa-map-marker-alt"></i> Sidi Amar, Annaba
                    </div>
                    <div class="property-date">
                        Publié le 25 Avril 2025
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card-box-a card-shadow">
                <div class="property-type-top-right">Maison</div> <div class="img-box-a">
                    <img src="assets/img/maison.jpg" alt="" class="img-a img-fluid">
                    <button class="btn btn-light btn-sm position-absolute top-0 end-0 m-2 rounded-circle shadow-sm" title="Ajouter aux favoris">
                    </button>
                </div>
                <div class="card-overlay">
                    <div class="card-overlay-a-content" style="position: relative;">
                        <div class="card-header-a">
                            <h2 class="card-title-a">
                                <a href="#">204 Mount
                                    <br /> Olive Road Two</a>
                            </h2>
                        </div>
                        <div class="card-body-a">
                            <div class="price-box d-flex">
                                <span class="price-a">Prix | DA 12.000</span>
                            </div>
                            <a href="détaille annonce.html" class="link-a">Click here to view
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                    <div class="property-location">
                        <i class="fa fa-map-marker-alt"></i> Sidi Amar, Annaba
                    </div>
                    <div class="property-date">
                        Publié le 25 Avril 2025
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card-box-a card-shadow">
                <div class="property-type-top-right">Maison</div> <div class="img-box-a">
                    <img src="assets/img/maison.jpg" alt="" class="img-a img-fluid">
                    <button class="btn btn-light btn-sm position-absolute top-0 end-0 m-2 rounded-circle shadow-sm" title="Ajouter aux favoris">
                    </button>
                </div>
                <div class="card-overlay">
                    <div class="card-overlay-a-content" style="position: relative;">
                        <div class="card-header-a">
                            <h2 class="card-title-a">
                                <a href="#">204 Mount
                                    <br /> Olive Road Two</a>
                            </h2>
                        </div>
                        <div class="card-body-a">
                            <div class="price-box d-flex">
                                <span class="price-a">Prix | DA 12.000</span>
                            </div>
                            <a href="détaille annonce.html" class="link-a">Click here to view
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                    <div class="property-location">
                        <i class="fa fa-map-marker-alt"></i> Sidi Amar, Annaba
                    </div>
                    <div class="property-date">
                        Publié le 25 Avril 2025
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card-box-a card-shadow">
                <div class="property-type-top-right">Maison</div> <div class="img-box-a">
                    <img src="assets/img/maison.jpg" alt="" class="img-a img-fluid">
                    <button class="btn btn-light btn-sm position-absolute top-0 end-0 m-2 rounded-circle shadow-sm" title="Ajouter aux favoris">
                    </button>
                </div>
                <div class="card-overlay">
                    <div class="card-overlay-a-content" style="position: relative;">
                        <div class="card-header-a">
                            <h2 class="card-title-a">
                                <a href="#">204 Mount
                                    <br /> Olive Road Two</a>
                            </h2>
                        </div>
                        <div class="card-body-a">
                            <div class="price-box d-flex">
                                <span class="price-a">Prix | DA 12.000</span>
                            </div>
                            <a href="détaille annonce.html" class="link-a">Click here to view
                                <span class="ion-ios-arrow-forward"></span>
                            </a>
                        </div>
                    </div>
                    <div class="property-location">
                        <i class="fa fa-map-marker-alt"></i> Sidi Amar, Annaba
                    </div>
                    <div class="property-date">
                        Publié le 25 Avril 2025
                    </div>
                </div>
            </div>
        </div>


      
  </section>
  <!--/ Property Grid End /-->
</main>
<footer id="footer" class="footer dark-background">

    <div class="container">
      <div class="row gy-3">
        <div class="col-lg-3 col-md-6 d-flex">
          <div class="address">
            <h4>Liens rapides</h4>
            <ul>
              <li><a href="index.html">Accueil</a></li>
              <li><a href="Annonce de location.php">Louer</a></li>
              <li><a href="Annonce de vente.php">Vendre</a></li>
              <li><a href="vacances.php">Vacances</a></li>
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
  <script src="assets//js/countrymap.js"></script>
  <script src="assets/js/mapdata.js"></script>
  

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

  function filterTable() {
const wilaya = document.getElementById("wilaya").value;
const type = document.getElementById("type").value;
const rows = document.querySelectorAll("#prixTable tbody tr");

rows.forEach(row => {
  const w = row.cells[0].textContent;
  const t = row.cells[1].textContent;

  if ((wilaya === "all" || w === wilaya) && (type === "all" || t === type)) {
    row.style.display = "";
  } else {
    row.style.display = "none";
  }
});
}

  </script>

</body>
</html>