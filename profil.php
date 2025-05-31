<?php
session_start();

if (!isset($_SESSION['utilisateur_id'])) {
    header("Location: connexion.php");
    exit;
}

$utilisateur_id = $_SESSION['utilisateur_id'];

$conn = new mysqli("localhost", "root", "", "siteimmob"); 

if ($conn->connect_error) {
    die("Connexion échouée : " . $conn->connect_error);
}

$sql_user = "SELECT nom, numtel, email FROM utilisateur WHERE id = ?";
$stmt = $conn->prepare($sql_user);
$stmt->bind_param("i", $utilisateur_id);
$stmt->execute();
$result_user = $stmt->get_result();
$utilisateur = $result_user->fetch_assoc();

$nom = htmlspecialchars($utilisateur['nom']);
$email = htmlspecialchars($utilisateur['email']);
$numtel = htmlspecialchars($utilisateur['numtel']);
$photo_profil = "assets/img/user icon.PNG"; 

function getAnnoncesParTable($conn, $table, $utilisateur_id, $type_annonce) {
    $annonces = [];

    $tables_autorisees = ['bien_a_louer', 'bien_a_vendre', 'bien_a_louer_pour_vacances', 'service_de_demenagement'];
    if (!in_array($table, $tables_autorisees)) {
        return $annonces; 
    }


    $sql = "SELECT id, titre, date_annonce FROM $table WHERE id_utilisateur = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        return $annonces; 
    }

    $stmt->bind_param("i", $utilisateur_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $row['type'] = $type_annonce;
        $row['table'] = $table;
        $annonces[] = $row;
    }

    return $annonces;
}


$annonces = array_merge(
    getAnnoncesParTable($conn, 'bien_a_louer', $utilisateur_id, 'Location'),
    getAnnoncesParTable($conn, 'bien_a_vendre', $utilisateur_id, 'Vente'),
    getAnnoncesParTable($conn, 'bien_a_louer_pour_vacances', $utilisateur_id, 'Vacances'),
    getAnnoncesParTable($conn, 'service_de_demenagement', $utilisateur_id, 'Déménagement')
);

$conn->close();

?>

<!DOCTYPE html>
<html lang="fr">
<head>
      <meta charset="utf-8">
  <title>Profil</title>
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
        /* Dans assets/css/main.css ou directement dans <style> de profil.php */

/* Centre le navmenu */
#header .navmenu {
    flex-grow: 1; /* Permet au navmenu de prendre tout l'espace disponible */
    display: flex;
    justify-content: center; /* Centre le contenu du navmenu */
    margin: 0; /* Assurez-vous qu'il n'y a pas de marges poussant le contenu */
}

/* Ajustez les éléments internes du navmenu si nécessaire */
#header .navmenu ul {
    margin: 0;
    padding: 0;
    list-style: none;
    display: flex; /* Pour que les li soient sur une ligne */
    align-items: center;
}

#header .navmenu ul li {
    margin: 0 2px; /* Espace entre les éléments de navigation */
}

/* Assurez-vous que l'icône utilisateur reste à droite */
#header .container-fluid {
    display: flex;
    align-items: center;
    justify-content: space-between; /* Garde le logo à gauche, l'icône à droite */
}


#header .logo {
    margin-right: auto; 
}

#header .profile-icon-container { /* Assurez-vous que votre icône utilisateur a un conteneur avec cette classe ou similaire */
    margin-left: auto; 
}

.btn-deconnexion {
    display: inline-block; 
    padding: 10px 20px;
    background-color: #dc3545; 
    border: none;
    border-radius: 5px;
    text-decoration: none; 
    font-weight: bold;
    transition: background-color 0.3s ease; 
}

.btn-deconnexion:hover {
    background-color: #c82333; 
}


.main p:last-child {
    text-align: center;
    margin-top: 30px; 
    margin-bottom: 30px; 
}

.main {
    padding-top: 2px; 
}


.main .profile-section {
    margin-top: 80px; 
}
        body {
            font-family: sans-serif;
            margin: 20px;
        }
        .profile-section {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 15px;
        }
        .profile-info {
            margin-left: 20px;
        }
        .profile-actions {
            margin-left: auto;
            position: relative;
            z-index: 1000;
        }
        .dropdown-button {
            background: none;
            border: none;
            font-size: 1.5em;
            cursor: pointer;
            padding: 5px;
        }
        
.dropdown-content {
    position: absolute;
    top: 100%; 
    right: 0;   

    background-color: #f9f9f9;
    min-width: 250px; 
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 10px 0;
    display: none;  

    overflow: visible; 
    z-index: 1000; 
}
        .dropdown-content a {
            color: black;
    padding: 10px 15px;
    text-decoration: none;
    display: block;
    white-space: nowrap; 
    box-sizing: border-box; 
        }
        .dropdown-content a:hover {background-color: #ddd;}
        .annonces-section {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 15px;
        }
        .annonce {
            border: 1px solid #eee;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .annonce-actions a {
            margin-left: 10px;
            text-decoration: none;
            padding: 5px 10px;
            border: 1px solid #007bff;
            color: #007bff;
            border-radius: 3px;
            font-size: 0.9em;
        }
        .annonce-actions a:hover {
            background-color: #007bff;
            color: white;
        }
    </style>
</head>

<body class="Profil-page">

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

    </header>


<main class="main">
    <section class="profile-section">
        <img src="<?= $photo_profil ?>" alt="Photo de profil" width="80" height="80" style="border-radius: 50%;">
        <div class="profile-info">
            <h2><?= $nom ?></h2>
            <p>Email: <?= $email ?></p>
            <p>Téléphone: <?= $numtel ?></p>
        </div>
        <div class="profile-actions">
            <button class="dropdown-button">&#8942;</button>
            <div class="dropdown-content">
                <a href="modifier_profil.php">Modifier mes informations</a>
                <a href="mtp.php">Modifier mot de passe</a>
                
            </div>
        </div>
    </section>
    
    <?php if (!empty($annonces)): ?>
<section class="annonces-section">
    <h2>Mes annonces</h2>
    <?php foreach ($annonces as $annonce): ?>
        <div class="annonce">
            <div>
                <strong><?= htmlspecialchars($annonce['titre']) ?></strong><br>
                <small>Publié le: <?= htmlspecialchars($annonce['date_annonce']) ?></small><br>
                <small>Type : <?= htmlspecialchars($annonce['type']) ?></small>
            </div>
            <div class="annonce-actions">
                <?php
                $modifier_url = '';
                $supprimer_url = 'supprimer_annonce.php?id=' . $annonce['id'] . '&table=' . $annonce['table'];

                switch ($annonce['table']) {
                    case 'bien_a_louer':
                        $modifier_url = 'modifier_location.php?id=' . $annonce['id'];
                        break;
                    case 'bien_a_vendre':
                        $modifier_url = 'modifier_annonce_vente.php?id=' . $annonce['id'];
                        break;
                    case 'bien_a_louer_pour_vacances':
                        $modifier_url = 'modifier_vacances.php?id=' . $annonce['id'];
                        break;
                    case 'service_de_demenagement':
                        $modifier_url = 'modifier_demenagement.php?id=' . $annonce['id'];
                        break;
                    default:
                        $modifier_url = '#';
                        break;
                }
                ?>
                <a href="<?= $modifier_url ?>">Modifier</a>
                <a href="<?= $supprimer_url ?>" onclick="return confirm('Supprimer cette annonce ?');">Supprimer</a>
            </div>
        </div>
    <?php endforeach; ?>
</section>
<?php endif; ?>

    <p><a href="deconnexion.php" class="btn-deconnexion">Se déconnecter</a></p>
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
        const dropdownButton = document.querySelector('.dropdown-button');
        const dropdownContent = document.querySelector('.dropdown-content');

        dropdownButton.addEventListener('click', () => {
            dropdownContent.style.display = dropdownContent.style.display === 'block' ? 'none' : 'block';
        });

        // Fermer le dropdown si on clique en dehors
        window.addEventListener('click', (event) => {
            if (!event.target.matches('.dropdown-button')) {
                if (dropdownContent.style.display === 'block') {
                    dropdownContent.style.display = 'none';
                }
            }
        });
    </script>

</body>
</html>