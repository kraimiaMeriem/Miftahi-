<?php
session_start();
if (!isset($_SESSION['utilisateur_id'])) {
    header("Location: connexion.php");
    exit;
                                              }


define('HOST', 'localhost');
define('DB_NAME', 'siteimmob');
define('USER', 'root');
define('PASS', '');

try {
    $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", USER, PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données !");
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    if (!isset($_POST["nom"], $_POST["wilaya"], $_POST["adresse"], $_POST["numero"], $_POST["mail"], $_POST["site"], $_POST["description"])) {
        die("Veuillez remplir tous les champs.");
    }

  
    $nom_agence = htmlspecialchars(trim($_POST["nom"]));
        $wilaya = htmlspecialchars(trim($_POST["wilaya"]));
        $adresse = htmlspecialchars(trim($_POST["adresse"]));
        $numtel = htmlspecialchars(trim($_POST["numero"]));
        $email = htmlspecialchars(trim($_POST["mail"]));
        $siteweb = htmlspecialchars(trim($_POST["site"]));
        $description = htmlspecialchars(trim($_POST["description"]));

    
    if (isset($_SESSION['utilisateur_id'])) {
        $id_utilisateur = $_SESSION['utilisateur_id'];
    } else {
        die("Vous devez être connecté pour publier un service."); 
    }

    if (empty($nom_agence) || empty($wilaya) || empty($adresse) || empty($numtel) || empty($email) || empty($siteweb) || empty($description)) {
        die("Veuillez remplir tous les champs correctement.");
    }

    try {
        $sql = "INSERT INTO `service_de_demenagement` (`nom_agence`, `wilaya`, `adresse`, `numtel`, `email`, `siteweb`, `description`)
                VALUES (?, ?, ?, ?, ?, ?, ?)"; 
        $stmt = $db->prepare($sql);
        $stmt->execute([$nom_agence, $wilaya, $adresse, $numtel, $email, $siteweb, $description]); 

        header("Location: formulaire_demenagement.php?success=1"); 
        exit;
    } catch (PDOException $e) {
        die("Une erreur est survenue, veuillez réessayer plus tard. Erreur : " . $e->getMessage()); 
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
    <title>service de demenagement</title>
    
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
      
      </head>

      <body class="annoncevacance-page">

        <header id="header" class="header d-flex align-items-center fixed-top">
          <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
      
            <a href="index.php" class="logo d-flex align-items-center me-auto me-xl-0">
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
      
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f3f4f6;
    margin: 0;
    padding: 20px;
    display: flex;
    flex-direction: column;
    align-items: center;
    min-height: 100vh;
    box-sizing: border-box;
}

.footer {
    width: 100%;
}

.main {
    width: 40%;
    max-width: 960px;
    padding: 30px;
    background: white;
    box-sizing: border-box;
    margin-top: 120px;
    margin-bottom: 30px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

h2 {
    font-size: 24px;
    color: #333;
    font-weight: bold;
    margin-bottom: 20px;
    text-align: center;
}

.form-group {
    margin-bottom: 15px; 
}

label {
    font-size: 16px;
    font-weight: bold;
    color: #444;
    display: block;
    margin-bottom: 5px;
}

input[type="text"],
input[type="number"],
select,
textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    font-size: 14px;
    box-sizing: border-box;
}

textarea#description {
    min-height: 100px;
}

.form-group-photos {
    width: 100%;
    margin-bottom: 20px;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
}

.form-group-photos label {
    font-size: 16px;
    font-weight: bold;
    color: #444;
    display: block;
    margin-bottom: 5px;
    text-align: left;
}

.form-group-photos input[type="file"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    font-size: 14px;
}

.form-columns {
    display: flex;
    gap: 20px;
    margin-bottom: 20px; 
}

.form-col-left {
    flex: 0 0 calc(50% - 10px);
}

.form-col-right {
    flex: 0 0 calc(50% - 10px);
    display: flex;
    flex-direction: column;
    gap: 15px; 
}

.button-container {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

button[type="submit"] {
    width: auto;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: white;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s ease;
    margin: 0;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}
    </style>
</head>

<main class="main">
    <h2>Présentez votre service de déménagement</h2>
    <p>Vous êtes une entreprise de déménagement ? Remplissez ce formulaire 
       pour apparaître dans notre annuaire et aider les utilisateurs à vous trouver facilement !</p>
    <form method="POST" action="service_demenagement.php" enctype="multipart/form-data">

        <div class="form-row">
            <div class="form-col-left">
                <div class="form-group">
                    <label for="nom">Nom d'agence :</label>
                    <input type="text" id="nom" name="nom" required>
                </div>
                
            </div>
            <div class="form-col-right">
                <div class="form-subcol-left">
                    <div class="form-group">
                        <label for="wilaya">Wilaya :</label>
                        <select name="wilaya" id="wilaya" required>
                            <option value="0" selected></option>
                            <option value="1">Adrar</option>
                 <option value="2">Chlef</option>
                 <option value="3">Laghouat</option>
                 <option value="4">Oum El Bouaghi</option>
                 <option value="5">Batna</option>
                 <option value="6">Béjaia</option>
                 <option value="7">Biskra</option>
                 <option value="8">Béchar</option>
                 <option value="9">Blida</option>
                 <option value="10">Bouira</option>
                 <option value="11">Tamanrasset</option>
                 <option value="12">Tébessa</option>
                 <option value="13">Tlemcen</option>
                 <option value="14">Tiaret</option>
                 <option value="15">Tizi-Ouzou</option>
                 <option value="16">Alger</option>
                 <option value="17">Djelfa</option>
                 <option value="18">Jijel</option>
                 <option value="19">Sétif</option>
                 <option value="20">Saida</option>
                 <option value="21">Skikda</option>
                 <option value="22">Sidi-Bel-Abbès</option>
                 <option value="23">Annaba</option>
                 <option value="24">Geulma</option>
                 <option value="25">Costantine</option>
                 <option value="26">Médéa</option>
                 <option value="27">Mostaganem</option>
                 <option value="28">M'Sila</option>
                 <option value="29">Mascara</option>
                 <option value="30">Ouergla</option>
                 <option value="31">Oran</option>
                 <option value="32">El-Bayadh</option>
                 <option value="33">Illizi</option>
                 <option value="34">Bordj-Bou-Arreridj</option>
                 <option value="35">Boumerdès</option>
                 <option value="36">El-Tarf</option>
                 <option value="37">Tindouf</option>
                 <option value="38">Tissemsilt</option>
                 <option value="39">El-Oued</option>
                 <option value="40">Khenchela</option>
                 <option value="41">Souk-Ahras</option>
                 <option value="42">Tipaza</option>
                 <option value="43">Mila</option>
                 <option value="44">Ain-Defla</option>
                 <option value="45">Naama</option>
                 <option value="46">Ain-Témouchent</option>
                 <option value="47">Ghardaia</option>
                 <option value="48">Relizane</option>
                 <option value="49">Timimoun</option>
                 <option value="50">Bordj-Badji-Mokhtar</option>
                 <option value="51">Ouled-Djellal</option>
                 <option value="52">Béni-Abbès</option>
                 <option value="53">In-Salah</option>
                 <option value="54">In-Guezzam</option>
                 <option value="55">Touggourt</option>
                 <option value="56">Djanet</option>
                 <option value="57">El-M'Ghair</option>
                 <option value="58">El-Meniaa</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="adresse">Adresse :</label>
                        <input type="text" id="adresse" name="adresse" required>
                    </div>
                </div>
                    
                <div class="form-subcol-right">
                    <div class="form-group">
                        <label for="prix">Numéro de téléphone:</label>
                        <input type="number" id="numero" name="numero" min="0" required>
                    </div>

                    <div class="form-group">
                        <label for="mail">Email :</label>
                        <input type="text" id="mail" name="mail" required>
                    </div>
                </div> 
                
                <div class="form-group">
                    <label for="site">Site Web :</label>
                    <input type="text" id="site" name="site">
                </div>
            </div> 


                    <div class="form-group">
                        <label for="description">Description :</label>
                        <textarea id="description" name="description" rows="5"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="button-container">
            <button type="submit">Publier</button>
        </div>
    </form>
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
