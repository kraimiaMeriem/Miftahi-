<?php 
// Connexion à la base de données
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

// Vérifier si le formulaire est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Nettoyage et validation des entrées
    $nom_utilisateur = htmlspecialchars(trim($_POST["nom"] ?? ''));
    $email = filter_var(trim($_POST["email"] ?? ''), FILTER_VALIDATE_EMAIL);
    $numtel = preg_replace('/\D/', '', $_POST["numtel"] ?? ''); // Enlever les caractères non numériques
    $password = $_POST["mot_de_passe"] ?? ''; 
    $type_utilisateur = $_POST["accountType"] ?? '';

    // Vérification des champs obligatoires
    if (empty($nom_utilisateur) || empty($email) || empty($numtel) || empty($password) || empty($type_utilisateur)) {
        die("Veuillez remplir tous les champs correctement.");
    }

    // Vérification de l'email
    if ($email === false) { 
        die("Adresse email invalide !");
    }

    // Vérification du numéro de téléphone (doit contenir 10 chiffres et commencer par 0)
    if (!preg_match('/^0\d{9}$/', $numtel)) {
        die("Le numéro de téléphone doit commencer par 0 et contenir 10 chiffres !");
    }

    // Hasher le mot de passe pour plus de sécurité
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Vérifier que le type d'utilisateur est valide
    $allowed_tables = ["proprietaire", "client"];
    if (!in_array($type_utilisateur, $allowed_tables)) {
        die("Type d'utilisateur invalide !");
    }

    // Insérer les données dans la base
    try {
        $sql = "INSERT INTO $type_utilisateur (nom, email, numtel, mot_de_passe) VALUES (?, ?, ?, ?)";
        $stmt = $db->prepare($sql);
        if ($stmt->execute([$nom_utilisateur, $email, $numtel, $password_hash])) {
            // Rediriger après inscription réussie
            header("Location: success.php"); // Change "success.php" par ta page de confirmation
            exit;
        } else {
            echo "Erreur lors de l'inscription.";
        }
    } catch (PDOException $e) {
        die("Une erreur est survenue, veuillez réessayer plus tard.");
    }
}
var_dump($_POST);
exit;

?>


