<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>page de déménagement</title>
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
.team.section {
    padding-top: 60px; 
    padding-bottom: 60px; 
    background: #f8f9fa; 
}

.team.section .section-title {
    text-align: center;
    margin-bottom: 30px;
}

.team.section .section-title h2 {
    font-size: 28px;
    font-weight: bold;
    color: #333;
    margin-bottom: 15px;
}

.team .member {
    overflow: hidden; 
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    background: white;
    display: flex;
    flex-direction: column;
}

.team .member img {
    width: 100%;
    height: 200px; 
    object-fit: cover;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}

.team .member .member-info-content {
    padding: 20px;
    text-align: center;
}

.team .member .member-info-content h4 {
    font-size: 16px;
    font-weight: bold;
    color: #333;
    margin-bottom: 0;
    line-height: 1.3;
}
#map-section {
  margin-top: 20px;
}

#map {
  width: 60%;
  height: 600px;
  margin-top: 20px; 
  border-radius: 8px; 
  box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
.main {
    padding-top: 80px; 
}

.btn-box button {
    border: 1px solid #007bff; 
    border-radius: 50px; 
    color: #007bff; 
    background-color: white; 
    padding: 10px 20px; 
    cursor: pointer; 
    font-size: 16px; 
    transition: background-color 0.3s ease, color 0.3s ease; 
}

.btn-box button:hover {
    background-color: #007bff; 
    color: white; 
}

.col-md-8 button { 
    border: 1px solid #007bff;
    border-radius: 50px;
    color: #007bff;
    background-color: white;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease, color 0.3s ease;
    margin-top: 10px; 
}

.col-md-8 button:hover {
    background-color: #007bff;
    color: white;
}

#about .btn-box button {
    border: 1px solid #007bff;
    border-radius: 50px;
    color: #007bff;
    background-color: white;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
    transition: background-color 0.3s ease, color 0.3s ease;
}

#about .btn-box button:hover {
    background-color: #007bff;
    color: white;
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

<section id="about" class="about section">
<div class="container">

        <div class="row gy-4" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-5">
            <img src="assets/img/image2.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>Déménagez en toute sérénité</h3>
              <p>
                Vous préparez un déménagement ? Que ce soit dans votre ville ou vers une autre wilaya, 
                notre site vous aide à trouver rapidement des services de déménagement fiables, partout en Algérie.
              </p>
              <ul>
                <li><i class="bi bi-check-circle-fill"></i> <span>Trouvez les services de déménagement disponibles dans votre wilaya.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Informez-vous grâce à nos articles et conseils pour un déménagement sans stress.</span></li>
                <li><i class="bi bi-check-circle-fill"></i> <span>Vous êtes un professionnel?  Présentez votre service</span></li>
              </span></li>
              </ul>
            </div>
          </div>
        </div>

      </div>

    </section>
    <div class="col-md-8">
        <h2>Je cherche un service </h2>
        <div id="map">
          <iframe src="html5countrymapv4.5/test.html" width="100%" height="800" style="border: none;"></iframe>
        </div>
        <a href="service_demenagement.php"><button>Présenté votre service</button></a>
      </div>    

        </div>

      </div>

        </div>

      </div>

      <section id="featured-services" class="featured-services section">

    <section id="team" class="team section">

      <div class="container section-title" data-aos="fade-up">
        <h2>Déménager sans stress</h2>
      </div>

      <div class="container">

        <div class="row gy-4">

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="...">
            <div class="member">
              <a href="article 13.php"><img src="assets/img/carton.jpg" alt="" ></a>
                <div class="member-info-content">
                  <h4>Comment bien organiser ses cartons ?</h4>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="member">
              <a href="article 14.php"><img src="assets/img/demarches.jpg" alt="" ></a>
                <div class="member-info-content">
                  <h4>Quelles démarches après un déménagement?</h4>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="member">
              <a href="article 15.php"><img src="assets/img/demenagement-avec-des-enfants.jpg" alt="" ></a>
                <div class="member-info-content">
                  <h4>Déménager avec des enfants : nos astuces</h4>
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="member">
              <a href="article 16.php"><img src="assets/img/erreurs demenagement.jpg" alt="" ></a>
                <div class="member-info-content">
                  <h4>Les erreurs à éviter lors d’un déménagement</h4>
              </div>
            </div>
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
