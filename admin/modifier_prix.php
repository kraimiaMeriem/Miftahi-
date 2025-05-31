<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}

$prices_file = '../data/prices.json'; // Chemin vers votre fichier JSON

$message = '';

// Fonction pour lire les prix du fichier JSON
function readPrices($filePath) {
    if (file_exists($filePath)) {
        $json_content = file_get_contents($filePath);
        return json_decode($json_content, true);
    }
    return ['vente' => [], 'location' => []]; // Retourne un tableau vide si le fichier n'existe pas
}

// Fonction pour écrire les prix dans le fichier JSON
function writePrices($filePath, $data) {
    return file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));
}

// Traitement de la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_prices'])) {
    $all_prices = readPrices($prices_file);

    // Mettre à jour les prix de vente
    if (isset($_POST['vente_prices'])) {
        foreach ($_POST['vente_prices'] as $index => $data) {
            if (isset($all_prices['vente'][$index])) {
                $all_prices['vente'][$index]['individuel'] = (int)$data['individuel'];
                $all_prices['vente'][$index]['collectif'] = (int)$data['collectif'];
            }
        }
    }

    // Mettre à jour les prix de location
    if (isset($_POST['location_prices'])) {
        foreach ($_POST['location_prices'] as $index => $data) {
            if (isset($all_prices['location'][$index])) {
                $all_prices['location'][$index]['individuel'] = (int)$data['individuel'];
                $all_prices['location'][$index]['collectif'] = (int)$data['collectif'];
            }
        }
    }

    if (writePrices($prices_file, $all_prices)) {
        $message = "Prix mis à jour avec succès.";
    } else {
        $message = "Erreur lors de la mise à jour des prix. Vérifiez les permissions d'écriture du fichier.";
    }
}

// Lire les prix pour l'affichage initial du formulaire
$all_prices = readPrices($prices_file);
$prices_vente = $all_prices['vente'];
$prices_location = $all_prices['location'];

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Modifier les Prix - Admin</title>
    <link rel="stylesheet" href="style.css">
      <meta charset="UTF-8">
    <title>Gérer les types de biens lors de l'ajout </title>
    <link rel="stylesheet" href="style.css"> 
     <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="main.css" rel="stylesheet">
     <style>
        .container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            color: #333;
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        input[type="number"] {
            width: 100px; /* Taille réduite pour les champs de prix */
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .message {
            text-align: center;
            margin-bottom: 20px;
            padding: 10px;
            border-radius: 5px;
        }
        .message.success {
            background-color: #d4edda;
            color: #155724;
            border-color: #c3e6cb;
        }
        .message.error {
            background-color: #f8d7da;
            color: #721c24;
            border-color: #f5c6cb;
        }
        .form-actions {
            text-align: center;
            margin-top: 20px;
        }
        .btn-submit {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }
        .btn-submit:hover {
            background-color: #218838;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <header id="header" class="header d-flex align-items-center fixed-top">
            
        <div class="container-fluid position-relative d-flex align-items-center justify-content-between">
            <a href="dashboard.php" class="logo d-flex align-items-center me-auto me-xl-0">
                <h1 class="sitename">Miftahi</h1>
            </a>
            <nav id="navmenu" class="navmenu">
                <ul></ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
            <div class="header-actions">
                <a href="logout.php" class="btn-logout">Se déconnecter</a>
            </div>
        </div>
    </header>

    <div class="container">
        <h1>Modifier les Prix</h1>

        <?php if ($message): ?>
            <p class="message <?= strpos($message, 'succès') !== false ? 'success' : 'error' ?>"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

        <form method="post" action="modifier_prix.php">
            <h2>Prix moyen de vente au m² en 2025</h2>
            <table>
                <thead>
                    <tr>
                        <th>Wilaya</th>
                        <th>Logement individuel (DA/m²)</th>
                        <th>Logement collectif (DA/m²)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($prices_vente as $index => $price_data): ?>
                        <tr>
                            <td><?= htmlspecialchars($price_data['wilaya']) ?></td>
                            <td>
                                <input type="number" step="1" name="vente_prices[<?= $index ?>][individuel]" value="<?= htmlspecialchars($price_data['individuel']) ?>" required>
                            </td>
                            <td>
                                <input type="number" step="1" name="vente_prices[<?= $index ?>][collectif]" value="<?= htmlspecialchars($price_data['collectif']) ?>" required>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h2>Prix moyen de location au m² en 2025</h2>
            <table>
                <thead>
                    <tr>
                        <th>Wilaya</th>
                        <th>Logement individuel (DA/m²)</th>
                        <th>Logement collectif (DA/m²)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($prices_location as $index => $price_data): ?>
                        <tr>
                            <td><?= htmlspecialchars($price_data['wilaya']) ?></td>
                            <td>
                                <input type="number" step="1" name="location_prices[<?= $index ?>][individuel]" value="<?= htmlspecialchars($price_data['individuel']) ?>" required>
                            </td>
                            <td>
                                <input type="number" step="1" name="location_prices[<?= $index ?>][collectif]" value="<?= htmlspecialchars($price_data['collectif']) ?>" required>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div class="form-actions">
                <button type="submit" name="update_prices" class="btn-submit">Enregistrer les modifications</button>
            </div>
        </form>

        <a href="dashboard.php" class="back-link">Retour au Dashboard</a>
    </div>

</body>
</html>