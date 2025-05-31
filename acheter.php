<?php
session_start();

// Inclure le fichier de connexion à la base de données
// Si 'connection.php' n'existe pas ou ne définit pas $db, vous devrez copier la logique de connexion ici.
// Pour l'exemple, la connexion est incluse directement ici.
// include('connection.php'); // Si vous avez un fichier de connexion séparé

// Configuration de la base de données
define('HOST', 'localhost');
define('DB_NAME', 'siteimmob');
define('USER', 'root');
define('PASS', '');

$db = null; // Initialiser $db à null
try {
    $db = new PDO("mysql:host=" . HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", USER, PASS);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // En production, vous devriez logger l'erreur et afficher un message générique à l'utilisateur
    error_log("Erreur de connexion à la base de données : " . $e->getMessage());
    echo "<p style='color: red;'>Une erreur est survenue lors de la connexion à la base de données. Veuillez réessayer plus tard.</p>";
    exit; // Arrête l'exécution du script si la connexion échoue
}

// --- Initialisation des variables pour le moteur de recherche ---
// Définir des valeurs par défaut pour la sélection (ex: première wilaya, F1, premier type de bien)
// Ou laisser vide si vous voulez que l'utilisateur sélectionne obligatoirement
$wilaya = isset($_GET['wilaya']) ? htmlspecialchars(trim($_GET['wilaya'])) : ''; // Initialiser à vide, ou à la première wilaya si vous voulez une sélection par défaut
$piece = isset($_GET['piece']) ? htmlspecialchars(trim($_GET['piece'])) : '';    // Initialiser à vide
$type_bien = isset($_GET['type_bien']) ? htmlspecialchars(trim($_GET['type_bien'])) : ''; // Initialiser à vide
$superficie_min = isset($_GET['superficie_min']) ? filter_var($_GET['superficie_min'], FILTER_VALIDATE_FLOAT) : '';
$superficie_max = isset($_GET['superficie_max']) ? filter_var($_GET['superficie_max'], FILTER_VALIDATE_FLOAT) : '';
$prix_min = isset($_GET['prix_min']) ? filter_var($_GET['prix_min'], FILTER_VALIDATE_FLOAT) : '';
$prix_max = isset($_GET['prix_max']) ? filter_var($_GET['prix_max'], FILTER_VALIDATE_FLOAT) : '';


// Liste des wilayas (SANS l'option "Tous")
$wilayas_options = [
    "1" => "Adrar", "2" => "Chlef", "3" => "Laghouat", "4" => "Oum El Bouaghi", "5" => "Batna",
    "6" => "Béjaïa", "7" => "Biskra", "8" => "Béchar", "9" => "Blida", "10" => "Bouira",
    "11" => "Tamanrasset", "12" => "Tébessa", "13" => "Tlemcen", "14" => "Tiaret", "15" => "Tizi Ouzou",
    "16" => "Alger", "17" => "Djelfa", "18" => "Jijel", "19" => "Sétif", "20" => "Saïda",
    "21" => "Skikda", "22" => "Sidi Bel Abbès", "23" => "Annaba", "24" => "Guelma", "25" => "Constantine",
    "26" => "Médéa", "27" => "Mostaganem", "28" => "M'Sila", "29" => "Mascara", "30" => "Ouargla",
    "31" => "Oran", "32" => "El Bayadh", "33" => "Illizi", "34" => "Bordj Bou Arreridj", "35" => "Boumerdès",
    "36" => "El Tarf", "37" => "Tindouf", "38" => "Tissemsilt", "39" => "El Oued", "40" => "Khenchela",
    "41" => "Souk-Ahras", "42" => "Tipaza", "43" => "Mila", "44" => "Aïn Defla", "45" => "Naâma",
    "46" => "Aïn Témouchent", "47" => "Ghardaïa", "48" => "Relizane", "49" => "Timimoun",
    "50" => "Bordj Badji Mokhtar", "51" => "Ouled Djellal", "52" => "Béni Abbès", "53" => "In Salah",
    "54" => "In Guezzam", "55" => "Touggourt", "56" => "Djanet", "57" => "El M'Ghair", "58" => "El Meniaa"
];

// Options pour le nombre de pièces (SANS l'option "Tous")
$pieces_options = [
    "1" => "F1", "2" => "F2", "3" => "F3", "4" => "F4",
    "5" => "F5", "6" => "F6", "7" => "F7", "8" => "Plus"
];

// Récupération des types de biens pour le filtre de recherche (SANS l'option "Tous" statique)
$types_bien_options = [];
try {
    if ($db) { // Vérifie si $db est bien défini (connexion réussie)
        $stmt_types = $db->query("SELECT id, nom FROM type_bien");
        while ($row = $stmt_types->fetch(PDO::FETCH_ASSOC)) {
            $types_bien_options[$row['id']] = $row['nom'];
        }
    }
} catch (PDOException $e) {
    error_log("Erreur lors de la récupération des types de biens : " . $e->getMessage());
    echo "<p style='color: red;'>Une erreur est survenue lors du chargement des types de biens.</p>";
}
// Optionnel : si vous voulez une valeur par défaut sélectionnée si aucun GET n'est présent
// Par exemple, si vous voulez que la première wilaya soit sélectionnée par défaut
if (empty($wilaya) && !empty($wilayas_options)) {
    $wilaya = array_key_first($wilayas_options);
}
if (empty($piece) && !empty($pieces_options)) {
    $piece = array_key_first($pieces_options);
}
if (empty($type_bien) && !empty($types_bien_options)) {
    $type_bien = array_key_first($types_bien_options);
}


// Chemin vers votre fichier JSON (ajustez le chemin si nécessaire par rapport à la racine du projet)
$prices_file = 'data/prices.json';

$all_prices = [];
if (file_exists($prices_file)) {
    $json_content = file_get_contents($prices_file);
    $all_prices = json_decode($json_content, true);
}

$prices_vente = isset($all_prices['vente']) ? $all_prices['vente'] : [];
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <title>page de d'achat</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <link href="assets/css/main.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">


    <style>
        /* Assurez-vous que l'en-tête (header) a un z-index élevé */
#header {
    z-index: 1050; /* Doit être supérieur au z-index du moteur de recherche */
    /* Assurez-vous qu'il a aussi une position (comme fixed, absolute, relative) pour que z-index fonctionne */
    position: fixed; /* Il est déjà défini comme ça */
}

/* Assurez-vous que le navmenu lui-même a un z-index adéquat */
#navmenu {
    /* Si nécessaire, ajustez ici. Souvent, c'est l'élément parent qui porte le z-index principal. */
    position: relative; /* S'assurer qu'il est positionné */
    z-index: 1051; /* Un peu plus haut que le header si des éléments du navmenu doivent apparaître par-dessus */
}

/* Ciblez le sous-menu du dropdown (l'ul) */
.navmenu ul ul { /* Cela cible les <ul> imbriquées qui sont les dropdowns */
    z-index: 1052; /* Doit être supérieur à l'en-tête et au moteur de recherche */
    position: absolute; /* Le dropdown est souvent positionné absolument */
    /* Autres styles comme display: none; pour le cacher quand il n'est pas actif,
        et display: block; ou flex; quand il est actif via JavaScript/hover */
}

/* Pour le moteur de recherche, assurez-vous que son z-index est bien défini */
#aa-advance-search {
    position: relative; /* Important pour que z-index fonctionne */
    z-index: 1000; /* Maintenez ceci, ou un chiffre plus bas que le dropdown */
}
        #map-section {
            margin-top: 20px;
        }

        #map {
            width: 60%;
            height: 500px;
            margin-top: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }


        #aa-advance-search {
            position: relative;
            width: 100%;
            margin-top: 80px;
            background: #f8f9fa;
            padding: 20px;
            z-index: 1000;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .aa-advance-search-area .form {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 15px;
            align-items: start;
        }

        .aa-single-advance-search label,
        .aa-single-filter-search > p {
            display: block;
            margin-bottom: 5px;
            font-size: 14px;
            color: #333;
            font-weight: bold;
        }

        .aa-single-advance-search select {
            padding: 10px;
            font-size: 16px;
            width: 100%;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .aa-search-btn {
            background: #007bff;
            color: white;
            font-size: 16px;
            font-weight: bold;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            position: absolute;
            top: 78%;
            right: 30px;
            transform: translateY(-50%);
        }

        .aa-search-btn:hover {
            background-color: #0056b3;
        }

        .filters-row-1 {
            display: flex;
            gap: 15px;
            grid-column: 1 / -1;
            margin-bottom: 15px;
        }

        .filters-row-1 .aa-single-advance-search {
            flex: 1;
            min-width: 150px;
        }

        .surface-prix-container {
            grid-column: 1 / -1;
            display: flex;
            gap: 15px;
            align-items: flex-start;
        }

        .surface-prix-container {
            grid-column: 1 / -1;
            display: flex;
            gap: 10px;
            align-items: flex-start;
        }
        .aa-single-filter-search > div {
            display: flex;
            align-items: center;
            gap: 5px;
            margin-bottom: 5px;
        }

        .aa-single-filter-search label {
            display: inline-block;
            font-weight: normal;
            width: auto;
        }

        .aa-single-filter-search input[type="number"] {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ced4da;
            border-radius: 5px;
            box-sizing: border-box;
            flex-grow: 1;
        }

        .aa-advance-search-bottom {
            display: none;
        }

        .prix-moyen-container {
            margin-top: 30px;
            margin-bottom: 30px;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .prix-moyen-container h2 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }

        .prix-moyen-tableau {
            display: inline-block;
            width: 100%;
            max-width: 600px;
            height: 600px;
        }

        .prix-moyen-tableau table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }

        .prix-moyen-tableau th,
        .prix-moyen-tableau td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid white;
            color: #333;
        }

        .prix-moyen-tableau th {
            background-color: white ;
            font-weight: bold;
        }

        .prix-moyen-tableau tr:last-child td {
            border-bottom: none;
        }

        .prix-moyen-tableau td:last-child {
            text-align: right;
        }

        .prix-moyen-tableau th:last-child {
            text-align: right;
        }

        .prix-moyen-tableau {
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
            margin-top: 10px;
        }


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

        <section id="aa-advance-search">
            <div class="container">
                <div class="aa-advance-search-area">
                    <form action="recherche_achat.php" method="GET">
                        <div class="form">
                            <div class="filters-row-1">
                                <div class="aa-single-advance-search">
                                    <label for="search_wilaya">Wilaya</label>
                                    <select id="search_wilaya" name="wilaya">
                                        <?php foreach ($wilayas_options as $id => $nom): ?>
                                            <option value="<?= $id ?>" <?= $wilaya == $id ? 'selected' : '' ?>><?= htmlspecialchars($nom) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="aa-single-advance-search">
                                    <label for="search_piece">Nombre de pièces</label>
                                    <select id="search_piece" name="piece">
                                        <?php foreach ($pieces_options as $id => $nom): ?>
                                            <option value="<?= $id ?>" <?= $piece == $id ? 'selected' : '' ?>><?= htmlspecialchars($nom) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="aa-single-advance-search">
                                    <label for="search_type_bien">Type de bien</label>
                                    <select id="search_type_bien" name="type_bien">
                                        <?php foreach ($types_bien_options as $id => $nom): ?>
                                            <option value="<?= $id ?>" <?= $type_bien == $id ? 'selected' : '' ?>><?= htmlspecialchars($nom) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="surface-prix-container">
                                <div class="superficie-container">
                                    <div class="aa-single-filter-search">
                                        <p>Superficie (m2)</p>
                                        <label for="superficie_min">Min :</label>
                                        <input type="number" id="superficie_min" name="superficie_min" value="<?= htmlspecialchars($superficie_min) ?>">
                                        <label for="superficie_max">Max :</label>
                                        <input type="number" id="superficie_max" name="superficie_max" value="<?= htmlspecialchars($superficie_max) ?>">
                                    </div>
                                </div>
                                <div class="prix-container">
                                    <div class="aa-single-filter-search">
                                        <p>Prix (DA)</p>
                                        <label for="prix_min">Min :</label>
                                        <input type="number" id="prix_min" name="prix_min" value="<?= htmlspecialchars($prix_min) ?>">
                                        <label for="prix_max">Max :</label>
                                        <input type="number" id="prix_max" name="prix_max" value="<?= htmlspecialchars($prix_max) ?>">
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="aa-search-btn">Rechercher</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>


        <section id="map-section" class="container mt-5">
            <div class="row">
                <div class="col-md-8">
                    <h2>Nos Annonces</h2>
                    <div id="map">
                        <iframe src="html5countrymapv4.5 2/test.php" width="100%" height="800" style="border: none;"></iframe>
                    </div>
                </div>


                <div class="col-md-4">
            <h2>Prix moyen de vente au m² en 2025</h2>
            <div class="prix-moyen-container">
                <div class="prix-moyen-tableau">
                    <table>
                        <thead>
                            <tr>
                                <th>Wilaya</th>
                                <th>Logement individuel (DA/m²)</th>
                                <th>Logement collectif (DA/m²)</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($prices_vente as $price_data): ?>
                                <tr>
                                    <td><?= htmlspecialchars($price_data['wilaya']) ?></td>
                                    <td><?= htmlspecialchars(number_format($price_data['individuel'], 0, ',', ' ')) ?></td>
                                    <td><?= htmlspecialchars(number_format($price_data['collectif'], 0, ',', ' ')) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

            <section id="featured-services" class="featured-services section">

                <section id="team" class="team section">

                    <div class="container section-title" data-aos="fade-up">
                        <h2>Conseils et guides pour un achat réussi</h2>
                    </div><div class="container">

                        <div class="row gy-4">

                            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                                <div class="member">
                                    <a href="article 5.php"><img src="assets/img/documents achat.jpg" alt=""></a>

                                    <div class="member-info-content">
                                        <h4>Achat : les documents à préparer pour constituer un bon dossier</h4>
                                    </div>

                                </div>
                            </div><div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                                <div class="member">
                                    <a href="article 6.php"><img src="assets/img/acheter sans agence.jpg" alt=""></a>

                                    <div class="member-info-content">
                                        <h4>Acheter sans agence: les avantages et les précautions</h4>
                                    </div>

                                </div>
                            </div><div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                                <div class="member">
                                    <a href="article 7.php"><img src="assets/img/erreurs.jpg" alt=""></a>

                                    <div class="member-info-content">
                                        <h4>Les 7 erreurs à éviter lors de l'achat d'un bien immobilier</h4>
                                    </div>

                                </div>
                            </div><div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
                                <div class="member">
                                    <a href="article 8.php"><img src="assets/img/achat.jpg" alt=""></a>

                                    <div class="member-info-content">
                                        <h4>Les étapes clés pour finaliser l'achat d'un bien en toute sécurité</h4>
                                    </div>

                                </div>
                            </div></div>

                    </div>

                </section></main>

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


    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <div id="preloader"></div>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

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

        // Cette fonction semble être destinée à filtrer le tableau des prix moyens,
        // et non le moteur de recherche principal.
        function filterTable() {
            const wilaya = document.getElementById("wilaya").value; // Assurez-vous que cet ID existe dans le tableau
            const type = document.getElementById("type").value;     // Assurez-vous que cet ID existe dans le tableau
            const rows = document.querySelectorAll("#prixTable tbody tr"); // Assurez-vous que votre tableau a l'ID "prixTable"

            rows.forEach(row => {
                // Ces cellules doivent correspondre à la structure de votre tableau des prix moyens
                const w = row.cells[0].textContent; // Supposons que la wilaya est dans la première colonne
                const t = row.cells[1].textContent; // Supposons que le type est dans la deuxième colonne

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
