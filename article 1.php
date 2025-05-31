<?php
    session_start();               
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Article 1</title>
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
.footer {
    width: 100%;
}
.main {
    width: 95%;
    max-width: 960px;
    padding: 30px;
    background: white;
    box-sizing: border-box;
    margin: 150px auto 30px auto;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    text-align: justify;
}

.main img {
    width: 100%;
    max-height: 500px;
    object-fit: cover;
    border-radius: 8px;
    margin-bottom: 20px;
}

h1, h2, h3 {
    color: #005792;
    text-align: center;
}

p {
    margin-bottom: 15px;
    
    line-height: 1.6;
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
    <img src="assets/img/assurance.jpg" alt="Assurance immobilière"> 
        <h1>Les différents types d’assurances immobilières</h1></br>
    
        <p>L’achat ou la location d’un bien immobilier est un investissement important qui mérite d’être protégé. Pour cela, plusieurs types d’assurances immobilières existent, chacune répondant à des besoins spécifiques, que ce soit pour le propriétaire, le locataire ou le professionnel de l’immobilier. Dans cet article, nous faisons le point sur les principales assurances immobilières à connaître.</p>
    
        <h2>1. L’assurance habitation</h2>
    
        <h3>a. Pour les locataires</h3>
        <p>L’assurance habitation est obligatoire pour les locataires, sauf en cas de location meublée de courte durée. Elle couvre les risques locatifs comme les incendies, dégâts des eaux ou explosions. Le locataire peut aussi choisir une assurance multirisque habitation, qui inclut la responsabilité civile, le vol, et parfois des garanties supplémentaires (bris de glace, assistance, etc.).</p>
    
        <h3>b. Pour les propriétaires occupants</h3>
        <p>Le propriétaire qui vit dans son logement peut souscrire une assurance multirisque habitation. Elle protège à la fois le bâtiment, le mobilier, les équipements et inclut généralement la responsabilité civile.</p>
    
        <h3>c. Pour les propriétaires non occupants (PNO)</h3>
        <p>L’assurance propriétaire non occupant est fortement conseillée (et parfois obligatoire) pour les propriétaires qui louent leur bien ou laissent leur logement vacant. Elle couvre les sinistres qui pourraient survenir même en l’absence de locataire ou en complément de l’assurance du locataire.</p>
    
        <h2>2. L’assurance loyers impayés (GLI)</h2>
        <p>L’assurance loyers impayés protège le propriétaire bailleur contre les risques de non-paiement du loyer, les dégradations immobilières, ou encore les frais juridiques en cas de litige. Elle est utile pour sécuriser ses revenus locatifs, notamment dans les grandes agglomérations.</p>
    
        <h2>3. L’assurance dommages-ouvrage</h2>
        <p>Obligatoire pour tout particulier qui fait construire ou rénover une maison, l’assurance dommages-ouvrage permet d’obtenir rapidement le remboursement des travaux de réparation en cas de malfaçon touchant la structure du bâtiment, sans attendre une décision de justice.</p>
    
        <h2>4. L’assurance responsabilité civile du syndic (copropriété)</h2>
        <p>Dans une copropriété, le syndic doit souscrire une assurance responsabilité civile professionnelle. Elle couvre les dommages causés aux tiers en cas de mauvaise gestion ou d’erreurs.</p>
    
        <h2>5. L’assurance pour les biens en construction</h2>
        <p>Lorsqu’un bien est en cours de construction, il est important de souscrire une assurance tous risques chantier (TRC), qui couvre les dommages matériels pouvant survenir pendant les travaux (intempéries, vols, effondrement partiel, etc.).</p>
    </br></br>
        <p>Les assurances immobilières sont essentielles pour protéger un bien immobilier et ses occupants contre les aléas de la vie. Que vous soyez locataire, propriétaire occupant, investisseur ou en pleine construction, il existe une couverture adaptée à votre situation. Bien choisir ses assurances, c’est anticiper les risques et assurer la pérennité de son investissement immobilier.</p>
    
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
