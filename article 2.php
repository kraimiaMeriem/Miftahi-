<?php
    session_start();               
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Article 2</title>
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
    <img src="assets/img/négocier.jpg" alt="négociation "> 
        <h1>Comment négocier le prix d’un bien immobilier?</h1></br>
    
        <p>Acheter un bien immobilier est une étape importante, souvent accompagnée d’un fort investissement financier. Dans ce contexte, savoir négocier le prix peut vous permettre d’économiser plusieurs milliers d’euros. Voici les étapes clés pour bien préparer et réussir votre négociation.</p>
    
        <h2>1. Faire une étude du marché local</h2>
        <p>Avant de faire une offre, il est essentiel d’analyser le marché immobilier dans le quartier ou la ville concernée :</p>
        <ul>
            <li>Comparez les prix au mètre carré dans la zone.</li>
            <li>Regardez les biens similaires (superficie, état, localisation).</li>
            <li>Tenez compte du contexte (tension du marché, délais de vente).</li>
          </ul>
          <p><strong>Objectif :</strong> repérer si le bien est <em>surévalué</em> ou <em>dans la moyenne</em> du marché.</p>

        <h2>2. Inspecter le bien avec attention</h2>
         <p>Lors de la visite, soyez observateur :</p>
    <ul>
      <li>État général du bien : travaux à prévoir, installations vétustes.</li>
      <li>Parties communes si c’est une copropriété.</li>
      <li>Environnement immédiat (nuisances sonores, exposition, vis-à-vis...).</li>
    </ul>
    <p>Tout défaut identifié peut <strong>justifier une baisse de prix</strong>.</p>
    
        <h2>3. Analyser les documents</h2>
        <p>Demandez :</p>
    <ul>
      <li>Le diagnostic de performance énergétique (DPE).</li>
      <li>Les procès-verbaux de copropriété.</li>
      <li>Le montant des charges, des impôts fonciers, etc.</li>
    </ul>
    <p>Ces éléments peuvent révéler des <strong>coûts cachés</strong> ou des problèmes futurs qui peuvent soutenir une négociation.</p>

    
        <h2>4.  Proposer une offre cohérente</h2>
        <p>Une bonne négociation commence par une <strong>offre raisonnable</strong>, ni trop basse (au risque de vexer le vendeur), ni trop proche du prix affiché :</p>
    <ul>
      <li>En général, une <em>baisse de 5 à 10 %</em> est courante.</li>
      <li>Soyez prêt à justifier votre offre avec des <strong>éléments concrets</strong>.</li>
    </ul>
    
        <h2>5. Adopter une posture calme et respectueuse</h2>
        <p>La négociation est aussi une affaire d’attitude :</p>
    <ul>
      <li>Montrez que vous êtes <strong>sérieux et solvable</strong>.</li>
      <li><strong>Écoutez</strong> le vendeur, comprenez ses motivations.</li>
      <li>Ne montrez pas trop d’enthousiasme.</li>
    </ul>

    <h2>6. Savoir attendre (ou relancer au bon moment)</h2>
    <p>Si le vendeur refuse votre offre, ne paniquez pas :</p>
    <ul>
      <li>Il peut revenir vers vous si aucun autre acheteur ne se manifeste.</li>
      <li>Vous pouvez relancer avec une <em>contre-offre</em>.</li>
    </ul>
    <p>Le temps joue parfois en faveur de l’acheteur, surtout si le bien reste en vente plusieurs semaines.</p>
    </br></br>
        <p>La négociation du prix d’un bien immobilier repose sur une bonne préparation, une analyse rigoureuse, et une communication intelligente avec le vendeur. En étant bien informé, patient et raisonnable, vous pouvez faire une bonne affaire et acheter au prix juste.</p>
    
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
