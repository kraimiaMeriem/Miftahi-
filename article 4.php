<?php
    session_start();               
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>Article 4</title>
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
    <img src="assets/img/image article4.JPEG" alt="Le rôle d'un notaire"> 
        <h1>Le rôle d'un notaire dans une transaction immobilière</h1></br>
    
        <p>Dans toute transaction immobilière, qu’il s’agisse d’un achat, d’une vente ou d’un transfert de propriété, le notaire joue un rôle fondamental. En tant qu’officier public, il garantit la sécurité juridique de l’opération, conseille les parties et veille à ce que toutes les étapes soient conformes à la législation en vigueur.</p>
    
        <h2>1. Vérification de la situation juridique du bien</h2>
    <p>Avant la signature de l’acte de vente, le notaire procède à plusieurs vérifications :</p>
    <ul>
      <li>Propriété du bien par le vendeur</li>
      <li>Absence d’hypothèque ou de servitude non déclarée</li>
      <li>Règlement de copropriété et charges</li>
      <li>Urbanisme et conformité</li>
    </ul>

    <h2>2. Rédaction et authentification des actes</h2>
    <p>Le notaire est responsable de la rédaction de deux documents majeurs :</p>
    <ul>
      <li>Le compromis ou promesse de vente (parfois rédigé par un agent)</li>
      <li>L’acte authentique de vente</li>
    </ul>
    <p>La signature de l’acte de vente chez le notaire rend la transaction officielle et opposable aux tiers.</p>

    <h2>3. Sécurisation des fonds</h2>
    <p>Le notaire perçoit les fonds de l’acheteur (prix du bien, frais de notaire) sur un compte séquestre. Il en assure la bonne répartition : paiement au vendeur, règlement des taxes, et encaissement des droits pour l’État.</p>

    <h2>4. Enregistrement et publicité foncière</h2>
    <p>Après la vente, le notaire se charge d’enregistrer l’acte auprès du service de la publicité foncière. Cela permet de mettre à jour le nom du nouveau propriétaire dans les registres officiels.</p>

    <h2>5. Conseil impartial</h2>
    <p>Le notaire a une mission de conseil. Il informe les deux parties (acheteur et vendeur) sur leurs droits, obligations, les conséquences fiscales, ou encore les possibilités de financement ou de donation.</p>

    <h2>6. Conservation des actes</h2>
    <p>Le notaire conserve les actes authentiques dans ses archives pendant 75 ans (100 ans pour les actes familiaux). Cela permet de retrouver un document en cas de litige ou de besoin ultérieur.</p>

    </br></br>
    <p>Le recours à un notaire n’est pas une simple formalité : c’est une garantie essentielle pour sécuriser votre transaction immobilière. Grâce à son expertise juridique et sa neutralité, il veille aux intérêts de chacun tout en assurant la validité et la régularité de l’opération.</p>
</main>

    
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
