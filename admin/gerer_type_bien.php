<?php
session_start();
require '../connection.php';
if (!isset($_SESSION['admin_id'])) exit("Accès interdit");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['nouveau_type'])) {
        $stmt = $db->prepare("INSERT INTO type_bien (nom) VALUES (?)"); // Utilisez 'nom' ici
        $stmt->execute([$_POST['nouveau_type']]);
    } elseif (!empty($_POST['supprimer_type'])) {
        $stmt = $db->prepare("DELETE FROM type_bien WHERE id = ?");
        $stmt->execute([$_POST['supprimer_type']]);
    }
}

$types = $db->query("SELECT * FROM type_bien");
?>
<!DOCTYPE html>
<html>
<head>
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
    <link href="main.css" rel="stylesheet"><style>

    
    <style>
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2, h3 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
            align-items: center;
            justify-content: center; /* Centrer les éléments du formulaire */
        }
        form input[type="text"] {
            flex-grow: 1; /* Permet à l'input de prendre l'espace disponible */
            max-width: 300px; /* Limiter la largeur de l'input */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        form button {
            padding: 8px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
        }
        form button:hover {
            background-color: #0056b3;
        }
        .type-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            border: 1px solid #eee;
            border-radius: 4px;
            margin-bottom: 10px;
            background-color: #f9f9f9;
        }
        .type-item button {
            background-color: #dc3545; /* Couleur rouge pour supprimer */
        }
        .type-item button:hover {
            background-color: #c82333;
        }
        .back-link {
            display: block;
            text-align: center;
            margin-top: 30px;
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
        <h2>Gérer les types de biens lors de l'ajout</h2>

        <form method="post">
            <input type="text" name="nouveau_type" placeholder="Nouveau type de bien" required>
            <button type="submit">Ajouter</button>
        </form>

        <h3>Types existants :</h3>
        <?php foreach ($types as $type): ?>
            <div class="type-item">
                <span><?= htmlspecialchars($type['nom']) ?></span> <form method="post" style="margin-bottom: 0;">
                    <input type="hidden" name="supprimer_type" value="<?= $type['id'] ?>">
                    <button type="submit">Supprimer</button>
                </form>
            </div>
        <?php endforeach; ?>

        <a href="dashboard.php" class="back-link">← Retour au tableau de bord</a>
    </div>

</body>
</html>