<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

        .main {
            padding-top: 80px; 
        }
        .header .btn-logout {
            margin-left: 20px;
            padding: 8px 15px;
            border-radius: 5px;
            background-color: #ff4500;
            color: white;
            text-decoration: none;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .header .btn-logout:hover {
            background-color: #e63900;
        }

        .dashboard-buttons li {
            margin-bottom: 10px; 
        }
        .btn-blue {
    display: inline-block;
    background-color: #007bff; /* bleu Bootstrap */
    color: white;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 5px;
    font-weight: 500;
    transition: background-color 0.3s ease;
}
.btn-blue:hover {
    background-color: #0056b3;
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

    <div class="container main">
        <h1>Bienvenue, <?= htmlspecialchars($_SESSION['admin_nom']) ?></h1>
        <p>Que souhaitez-vous faire ?</p>

        <ul style="list-style: none; padding: 0;" class="dashboard-buttons">
            <li><a href="supprimer_utilisateur.php" class="btn btn-blue">Supprimer un utilisateur</a></li>
            <li><a href="modifier_prix.php" class="btn btn-blue">Modifier les prix</a></li>
            <li><a href="gerer_type_bien.php" class="btn btn-blue">Gérer les types de bien</a></li>
        </ul>
    </div>

</body>
</html>