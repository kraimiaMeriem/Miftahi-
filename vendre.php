<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <title>page d'accueil</title>
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

.layout_padding-bottom {
  padding-bottom: 90px;
}

body {
      font-family: 'Segoe UI', sans-serif;
      background-color: #f8f8f8;
      margin: 0;
      padding: 0;
      line-height: 1.6;
    }

    .faq-section {
      max-width: 900px;
      margin: 40px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 12px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .faq-section h2 {
      text-align: center;
      color: #2c3e50;
      margin-bottom: 30px;
      font-size: 28px;
    }

    .faq-item {
      margin-bottom: 25px;
      border-left: 4px solid #555;
      padding-left: 15px;
    }

    .faq-item h3 {
      color: #333;
      font-size: 20px;
      margin-bottom: 8px;
    }

    .faq-item p {
      color: #555;
      margin: 0;
    }

    @media (max-width: 600px) {
      .faq-section {
        margin: 20px;
        padding: 15px;
      }

      .faq-item h3 {
        font-size: 18px;
      }
    }
  .main{
    margin-top: 120px; /* Ajoutez une marge supérieure (ajustez la valeur si nécessaire) */
    padding-top: 20px; /* Vous pouvez également ajouter un peu de padding en haut du contenu principal */
  }
  .owl-nav button.owl-prev,
.owl-nav button.owl-next {
    font-size: 2em !important;
    /* Couleur bleue, plus visible (vous pouvez choisir une autre couleur) */
    background: none !important;
    border: none !important;
    padding: 5px 10px !important;
    cursor: pointer;
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    outline: none !important;
    -webkit-transition: all 0.3s ease;
    transition: all 0.3s ease;
}

.owl-nav button.owl-prev span,
.owl-nav button.owl-next span {
    font-size: inherit;
    line-height: 1;
}

.owl-nav button.owl-prev {
    left: 10px;
}

.owl-nav button.owl-next {
    right: 10px;
}

.owl-nav button.owl-prev:hover,
.owl-nav button.owl-next:hover {
    color: #007bff !important; /* Couleur bleue plus foncée au survol */
}

.faq-section {
    max-width: 900px;
    margin: 40px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}

.faq-section h2 {
    text-align: center;
    color: #2c3e50;
    margin-bottom: 30px;
    font-size: 28px;
}

.faq-item {
    margin-bottom: 15px; /* Réduire la marge entre les items */
    border-bottom: 1px solid #eee; /* Ajouter une bordure de séparation */
    padding-bottom: 15px; /* Ajouter un peu de padding en bas */
}

.faq-item:last-child {
    border-bottom: none; /* Supprimer la bordure du dernier item */
    padding-bottom: 0;
    margin-bottom: 0;
}

.faq-question-container {
    display: flex;
    justify-content: space-between; /* Aligner la question à gauche et la flèche à droite */
    align-items: center;
    cursor: pointer;
}

.faq-question {
    color: #333;
    font-size: 18px;
    margin-bottom: 0; /* Supprimer la marge par défaut du h3 */
    font-weight: bold; /* Mettre la question en gras */
}

.toggle-icon {
    font-size: 1.2em;
    color: #007bff; /* Couleur de la flèche */
    transition: transform 0.3s ease-in-out;
}

.faq-item.open .toggle-icon {
    transform: rotate(90deg); /* Faire pivoter la flèche vers le bas */
}

.faq-answer {
    display: none;
    padding-left: 20px;
    margin-top: 10px;
    color: #555;
    font-size: 16px;
    line-height: 1.6;
}

@media (max-width: 600px) {
    .faq-section {
        margin: 20px;
        padding: 15px;
    }

    .faq-section h2 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .faq-question {
        font-size: 16px;
    }

    .toggle-icon {
        font-size: 1em;
    }

    .faq-answer {
        font-size: 14px;
        padding-left: 15px;
    }
}
.toggle-icon {
    font-size: 1.2em; /* Ajuster la taille de l'icône */
    color: #555; /* Couleur de la flèche */
    transition: transform 0.3s ease-in-out;
}

.faq-item.open .toggle-icon {
    transform: rotate(90deg); /* Faire pivoter la flèche vers le bas */
}
</style>
</head>

<body class="vendre-page">

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

    <section class="sale_section layout_padding-bottom">
      <div class="container-fluid">
          <div class="heading_container">
              <h2>
                  Type de bien a vendre
              </h2>
          </div>
          <div id="sale-carousel" class="owl-carousel owl-theme sale_container">
              <div class="box">
                  <div class="img-box">
                      <img src="assets/img/maison.jpg" alt="">
                  </div>
                  <div class="detail-box">
                      <h6>
                          Maison
                      </h6>
                  </div>
              </div>
              <div class="box">
                  <div class="img-box">
                      <img src="assets/img/appartement..jpg" alt="">
                  </div>
                  <div class="detail-box">
                      <h6>
                          Appartement
                      </h6>
                  </div>
              </div>
              <div class="box">
                  <div class="img-box">
                      <img src="assets/img/villa.jpg" alt="">
                  </div>
                  <div class="detail-box">
                      <h6>
                          Villa
                      </h6>
                  </div>
              </div>
              <div class="box">
                  <div class="img-box">
                      <img src="assets/img/enrepot.jpg" alt="">
                  </div>
                  <div class="detail-box">
                      <h6>
                          Entropot
                      </h6>
                  </div>
              </div>
              <div class="box">
                  <div class="img-box">
                      <img src="assets/img/bureau.jpg" alt="">
                  </div>
                  <div class="detail-box">
                      <h6>
                          Bureau
                      </h6>
                  </div>
              </div>
              <div class="box">
                  <div class="img-box">
                      <img src="assets/img/terrain.jpg" alt="">
                  </div>
                  <div class="detail-box">
                      <h6>
                          Terrain
                      </h6>
                  </div>
              </div>
              <div class="box">
                  <div class="img-box">
                      <img src="assets/img/local commercial.jpg" alt="">
                  </div>
                  <div class="detail-box">
                      <h6>
                          Local Commercial
                      </h6>
                  </div>
              </div>
          </div>
          <div class="btn-box">
              <a href="Annonce_de_vente.php">
                  Publier Votre Annonce
              </a>
          </div>
      </div>
  </section>

  <!-- end sale section -->



  <section class="faq-section">
    <h2>Vendre sans stress : FAQ des vendeurs</h2>

    <div class="faq-item">
        <div class="faq-question-container">
            <h3 class="faq-question">1. Comment savoir si je peux vendre mon bien ?</h3>
            <span class="toggle-icon"><i class="fa fa-chevron-right"></i></span>
        </div>
        <div class="faq-answer">
            <p>Vous devez être propriétaire du bien ou avoir une procuration. En cas d’indivision, l’accord de tous les co-propriétaires est nécessaire.</p>
        </div>
    </div>

    <div class="faq-item">
        <div class="faq-question-container">
            <h3 class="faq-question">2. Quels documents dois-je fournir pour mettre en vente ?</h3>
            <span class="toggle-icon"><i class="fa fa-chevron-right"></i></span>
        </div>
        <div class="faq-answer">
            <p>Titre de propriété, pièce d’identité, diagnostics, plan, taxe foncière, etc.</p>
        </div>
    </div>

    <div class="faq-item">
      <div class="faq-question-container">
          <h3 class="faq-question">3. Quels documents dois-je fournir pour mettre en vente ?</h3>
          <span class="toggle-icon"><i class="fa fa-chevron-right"></i></span>
      </div>
      <div class="faq-answer">
          <p>Titre de propriété, pièce d’identité, diagnostics, plan, taxe foncière, etc.</p>
      </div>
  </div>

  <div class="faq-item">
    <div class="faq-question-container">
        <h3 class="faq-question">4. Comment estimer le bon prix de vente ? </h3>
        <span class="toggle-icon"><i class="fa fa-chevron-right"></i></span>
    </div>
    <div class="faq-answer">
        <p>Utilisez notre outil “Estimer mon bien” ou comparez avec les prix du marché local.</p>
    </div>
</div>

<div class="faq-item">
  <div class="faq-question-container">
      <h3 class="faq-question">5. Puis-je vendre un bien occupé par un locataire ?</h3>
      <span class="toggle-icon"><i class="fa fa-chevron-right"></i></span>
  </div>
  <div class="faq-answer">
      <p>Oui, c’est possible, sous certaines conditions légales.</p>
  </div>
</div>

  <div class="faq-item">
  <div class="faq-question-container">
      <h3 class="faq-question">6. Combien de temps faut-il pour vendre ?</h3>
      <span class="toggle-icon"><i class="fa fa-chevron-right"></i></span>
  </div>
  <div class="faq-answer">
      <p>En moyenne quelques semaines, selon le prix et la présentation du bien.</p>
  </div>
</div>

<div class="faq-item">
  <div class="faq-question-container">
      <h3 class="faq-question">7. Dois-je faire des travaux avant de vendre ?</h3>
      <span class="toggle-icon"><i class="fa fa-chevron-right"></i></span>
  </div>
  <div class="faq-answer">
      <p>Non, mais un petit rafraîchissement peut valoriser votre bien.</p>
  </div>
</div>

<div class="faq-item">
  <div class="faq-question-container">
      <h3 class="faq-question">8. Quel est le rôle du notaire ?</h3>
      <span class="toggle-icon"><i class="fa fa-chevron-right"></i></span>
  </div>
  <div class="faq-answer">
      <p>Il sécurise la vente en rédigeant les actes et vérifiant les documents.</p>
  </div>
</div>

<div class="faq-item">
  <div class="faq-question-container">
      <h3 class="faq-question">9. Y a-t-il des frais à payer en tant que vendeur ?</h3>
      <span class="toggle-icon"><i class="fa fa-chevron-right"></i></span>
  </div>
  <div class="faq-answer">
      <p>Oui : diagnostics, frais de notaire (en partie), frais liés à un prêt en cours.</p>
  </div>
</div>

<div class="faq-item">
  <div class="faq-question-container">
      <h3 class="faq-question">10. Et si je change d’avis après avoir mis mon bien en vente ?</h3>
      <span class="toggle-icon"><i class="fa fa-chevron-right"></i></span>
  </div>
  <div class="faq-answer">
      <p>Tant qu’aucun compromis n’est signé, vous pouvez retirer votre annonce à tout moment.</p>
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
      nav: true,  // Ajoute des flèches de navigation
      dots: true, // Ajoute les indicateurs de pagination
      responsive: {
        0: { items: 1 },
        769: { items: 2 },
        992: { items: 3 }
      }
    });

    // Initialisation du carrousel "Type de bien a vendre"
    $('#sale-carousel').owlCarousel({
      loop: true,
      margin: 10, // Marge entre les éléments
      nav: true, // Afficher les flèches de navigation
      dots: false, // Ne pas afficher les points de navigation (facultatif)
      responsive: {
        0: {
          items: 1 // Afficher 1 élément sur les petits écrans
        },
        600: {
          items: 3 // Afficher 3 éléments sur les écrans de taille moyenne
        },
        1000: {
          items: 4 // Afficher 4 éléments sur les grands écrans (ajustez selon vos besoins)
        }
      }
    });
  });
document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.faq-item');

    faqItems.forEach(item => {
        const questionContainer = item.querySelector('.faq-question-container');
        const answer = item.querySelector('.faq-answer');

        questionContainer.addEventListener('click', () => {
            item.classList.toggle('open');
            answer.style.display = item.classList.contains('open') ? 'block' : 'none';
        });
    });
});
  </script>
</body>
</html>
