<?php
    session_start();               
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>services Annaba</title>
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
#main {
    margin-top: 80px;
}
.agences-list {
        display: flex;
        flex-direction: column;
        gap: 40px; /* Espace entre les cartes d'agence */
        margin-top: 20px;
    }

    .agence-card {
        background-color: #fff;
        padding: 15px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .agence-info p {
        display: flex;
        align-items: center;
        margin-bottom: 8px;
    }

    .agence-info p i {
        margin-right: 10px;
        color: #555;
        font-size: 1em;
        width: 20px;
        text-align: center;
    }

    .agence-info .siteweb a {
        color: #007bff;
        text-decoration: none;
    }

    .agence-info .siteweb a:hover {
        text-decoration: underline;
    }

    .agence-info .services i {
        color: #28a745;
    }

    .agence-info h3 {
        margin-bottom: 15px;
        color: #28a745;
    }

    .agence-info .description {
        font-style: italic;
        margin-top: 10px;
        font-size: 0.9em;
        color: #777;
    }
</style>
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center fixed-top">
      <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
  
        <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
          <h1 class="sitename">Miftahi</h1>
        </a>
  
        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="acheter.html">Acheter</a></li>
            <li><a href="vendre.html">Vendre</a></li>
            <li class="dropdown"><a href="#"><span>Louer</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
              <ul>
                <li><a href="location proprietaire.html">propriétaire</a></li>
                <li><a href="location client.html">Locataire</a></li>
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
    <a href="connexion.php">
        <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
        </svg>
    </a>
  </div>
    </header>
  
    <main id="main">

        <section id="demenagement-list" class="demenagement-list">
            <div class="container">
                <h1>Trouvez l'agence de déménagement idéale à Alger!</h1>
                <p>Simplifiez votre déménagement avec notre liste d'agences professionnelles et fiables.</p>
                <section class="agences-list">
                    <div class="agence-card">
                        <div class="agence-info">
                            <h3>SOS Déménagement Annaba</h3>
                            <p class="wilaya"><i class="fas fa-city"></i> Annaba</p>
                            <p class="adresse"><i class="fas fa-map-marker-alt"></i>  </p>
                            <p class="telephone"><i class="fas fa-phone"></i> +0665 192 276</p>
                            <p class="email"><i class="fas fa-envelope"></i> </p>
                            <p class="siteweb"><i class="fas fa-globe"></i> <a href="" target="_blank"></a></p>
                            <p class="description">SOS Déménagement Annaba est une société fiable opérant dans les 58 wilayas, connue pour son sérieux et la diversité de ses services. Elle met à disposition une équipe de professionnels, notamment des menuisiers et des électriciens, pour accompagner les particuliers tout au long de leur déménagement, dans les meilleures conditions.</p>
                        </div>
                    </div>

                    <div class="agence-card">
                        <div class="agence-info">
                            <h3>Annaba Déménagement</h3>
                            <p class="wilaya"><i class="fas fa-city"></i> Annaba</p>
                            <p class="adresse"><i class="fas fa-map-marker-alt"></i> </p>
                            <p class="telephone"><i class="fas fa-phone"></i> 0665 192 276  </p>
                            <p class="email"><i class="fas fa-envelope"></i> </p>
                            <p class="siteweb"><i class="fas fa-globe"></i> <a href="" target="_blank"></a></p>
                            <p class="description">Annaba Déménagement est une entreprise locale spécialisée dans les déménagements pour particuliers et professionnels. Elle propose des services de transport sécurisé, démontage/remontage de meubles, et assure des prestations à l’échelle locale et nationale. Un devis gratuit est proposé pour chaque demande, assurant une solution adaptée à chaque besoin.</p>
                        </div>
                    </div>

                    <div class="agence-card">
                      <div class="agence-info">
                          <h3> Déménagement Annaba</h3>
                          <p class="wilaya"><i class="fas fa-city"></i> Annaba</p>
                          <p class="adresse"><i class="fas fa-map-marker-alt"></i> </p>
                          <p class="telephone"><i class="fas fa-phone"></i>  0797 477 281  </p>
                          <p class="email"><i class="fas fa-envelope"></i> </p>
                          <p class="siteweb"><i class="fas fa-globe"></i> <a href="" target="_blank"></a></p>
                          <p class="description">Déménagement Annaba accompagne les particuliers et les entreprises dans leurs projets de déménagement grâce à une équipe compétente et dynamique. L’entreprise assure un service rapide, sûr et soigné, que ce soit pour un changement d’adresse local ou national.</p>
                      </div>
                  </div>

                  <div class="agence-card">
                    <div class="agence-info">
                        <h3> El Zahra Transport et Déménagement</h3>
                        <p class="wilaya"><i class="fas fa-city"></i> Annaba</p>
                        <p class="adresse"><i class="fas fa-map-marker-alt"></i> Résidence Amina, Local N°02, Sidi Achour, Annaba </p>
                        <p class="telephone"><i class="fas fa-phone"></i>  </p>
                        <p class="email"><i class="fas fa-envelope"></i> </p>
                        <p class="siteweb"><i class="fas fa-globe"></i> <a href="" target="_blank"></a></p>
                        <p class="description">Située à Sidi Achour, El Zahra Transport et Déménagement offre des services complets de transport et de déménagement aux particuliers comme aux entreprises. Elle se distingue par sa proximité, sa réactivité et la qualité de son accompagnement sur mesure.</p>
                    </div>
                </div>
                </section>
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
              <li><a href="index.html">Accueil</a></li>
              <li><a href="acheter.php">Acheter</a></li>
              <li><a href="location client.php">Louer</a></li>
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
