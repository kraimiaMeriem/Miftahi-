<?php
session_start();

define('HOST', 'localhost');
define('DB_NAME', 'siteimmob');
define('USER', 'root');
define('PASS', '');

try {
    $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", USER, PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_POST["nom"], $_POST["email"], $_POST["numtel"], $_POST["mot_de_passe"])) {
        die("Veuillez remplir tous les champs.");
    }

    $nom_utilisateur = htmlspecialchars(trim($_POST["nom"]));
    $email = filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL);
    $numtel = htmlspecialchars(trim($_POST["numtel"]));
    $password = $_POST["mot_de_passe"];

    if (empty($nom_utilisateur) || empty($email) || empty($numtel) || empty($password)) {
        die("Veuillez remplir tous les champs correctement.");
    }

    if ($email === false) {
        die("Adresse email invalide !");
    }

    if (!preg_match('/^0\d{9}$/', $numtel)) {
        die("Le numéro de téléphone doit commencer par 0 et contenir 10 chiffres !");
    }




    $password_hash = password_hash($password, PASSWORD_DEFAULT);





    
    try {
        $sql = "INSERT INTO utilisateur (nom, email, numtel, mot_de_passe) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($sql);

        if ($stmt->execute([$nom_utilisateur, $email, $numtel, $password_hash])) {
            $_SESSION['utilisateur_id'] = $db->lastInsertId();
            $_SESSION['nom'] = $utilisateur['nom'];
            header("Location: index.php");
            exit();
        } else {
            echo "Erreur lors de l'inscription.";
        }
    } catch (PDOException $e) {
        die("Une erreur est survenue : " . $e->getMessage());
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="script.js" defer></script>
    <title>Formulaire d'inscription</title>
    
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
        .footer{
              width: 100%;
                }
        main {
             width: 100vw; /* Tente de prendre toute la largeur de la fenêtre */
             max-width: 600px; /* Garde une largeur maximale raisonnable */
             padding: 50px;
             background: white;
             box-sizing: border-box;
             margin-top: 350px;
             margin-bottom: 30px;
             border-radius: 8px;
             box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            }
        body {
            font-family: Arial, sans-serif;
            background-color: #f3f4f6;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            box-sizing: border-box;
            padding: 20px;
            flex-direction: column;    
        }
        .container {
            text-align: center;
        }
        h2 {
            font-size: 28px;
            color: #333;
            font-weight: bold;
            margin-bottom: 25px;
        }
        .form-group, .password-container {
            text-align: left;
            margin-bottom: 22px;
        }
        
        label {
            font-size: 16px;
            font-weight: bold;
            color: #444;
            display: block;
            margin-bottom: 8px;
        }
        input {
            width: 100%;
            height: 50px; /* Définir une hauteur uniforme */
            padding: 12px; /* Ajuster l'espacement intérieur */
            box-sizing: border-box; /* Évite que le padding affecte la largeur */
            padding: 14px; /* Champs plus grands */
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 18px;
        }
        .password-container {
            position: relative;
        }
        .password-container i {
            position: absolute;
            right: 12px;
            top: 70%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
            color: #666;
        }
        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
            color: #666;
        }
        .terms {
            font-size: 16px;
            display: flex;
            align-items: center;
        }
        .terms input {
            margin-right: 8px;
        }
        .btn-container {
            display: flex;
            justify-content: center;
            margin-top: 25px;
        }
        .btn {
            width: 46%;
            padding: 13px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 18px;
            font-weight: bold;
            transition: 0.3s;
            background-color: #17a2b8;
            color: white;
            margin-top: 15px;
            margin-bottom: 20px;
        }
        .btn:hover {
            opacity: 0.9;
        }
        .text-right {
    text-align: right;
    display: block;
}
.phone-container {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 6px;
            overflow: hidden;
            background: white;
        }
        .phone-container span {
            background: #f0f0f0;
            padding: 14px;
            font-size: 18px;
            border-right: 1px solid #ccc;
        }
        .phone-container input {
            border: none;
            flex: 1;
            padding: 14px;
        }

        /* Suppression de l'icône du navigateur */
        input[type="password"]::-ms-reveal,
        input[type="password"]::-webkit-contacts-auto-fill-button,
        input[type="password"]::-webkit-textfield-decoration-container {
            display: none !important;
        }
    </style>
</head>
<body>
<header id="header" class="header d-flex align-items-center fixed-top">
          <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
      
            <a href="index.html" class="logo d-flex align-items-center me-auto me-xl-0">
              <h1 class="sitename">Miftahi</h1>
            </a>
      
            <nav id="navmenu" class="navmenu">
              <ul>
                <li><a href="#about">Acheter</a></li>
                <li><a href="#about">Vendre</a></li>
                <li class="dropdown"><a href="#"><span>Louer</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                  <ul>
                  <li><a href="location proprietaire.php">Mettre en location</a></li>
                  <li><a href="location client.php">Chercher une location</a></li>
                  </ul>
                </li>
                <li><a href="#about">Vacances</a></li>
                <li><a href="#demenagement">Déménagement</a></li>
                
              </ul>
              <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
      
                
            
      
        <!-- Avatar -->
      <div class="avatar-container">
        <a href="page de connection.html">
            <svg fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
            </svg>
        </a>
      </div>
        </header>

<main class="main" >
<div class="container" x-data="formData()">
<?php
    if (isset($_GET['success']) && $_GET['success'] == 1) {
        echo "<p style='color: green;'>Inscription réussie !</p>";
    }
    ?>
    <h2>Créer un compte</h2>
    <form method="POST" action="inscription.php">
        <!-- Champ caché pour stocker le type d'utilisateur -->
        <input type="hidden" name="accountType" id="accountType">

        <div class="form-group">
            <label>Nom complet</label>
            <input type="text" name="nom" required>
        </div>

        <div class="form-group">
            <label>Email</label>
            <input type="email" name="email"  required>
        </div>

        <div class="form-group">
            <label>Numéro de téléphone</label>
            <input type="tel" name="numtel"  required>
        </div>

        <div class="password-container">
                <label>Mot de passe</label>
                <div class="relative w-full">
                    <input type="password" id="password" name="mot_de_passe" required class="w-full">
                    <i class="fa-solid fa-eye toggle-password" id="togglePassword"></i>
                </div>
            </div>

        
        <div class="btn-container">
            <button type="submit" class="btn">S'inscrire </button>
        </div>
    </form>
</div>
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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <script>
    function setAccountType(type) {
        document.getElementById('accountType').value = type;
    }

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
  document.addEventListener("DOMContentLoaded", function () {
                let togglePassword = document.getElementById("togglePassword");
                let passwordInput = document.getElementById("password");

                togglePassword.addEventListener("click", function () {
                    if (passwordInput.type === "password") {
                        passwordInput.type = "text";
                        this.classList.replace("fa-eye", "fa-eye-slash");
                    } else {
                        passwordInput.type = "password";
                        this.classList.replace("fa-eye-slash", "fa-eye");
                    }
                });
            });
  </script>
</body>
</html>

