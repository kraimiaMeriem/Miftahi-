<?php
session_start();
require '../connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $mdp = $_POST['mot_de_passe'];

    $stmt = $db->prepare("SELECT * FROM administrateur WHERE email = ?");
    $stmt->execute([$email]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin && password_verify($mdp, $admin['mot_de_passe'])) {
        $_SESSION['admin_id'] = $admin['id'];
        $_SESSION['admin_nom'] = $admin['nom']; // <-- AJOUTEZ CETTE LIGNE
        header("Location: dashboard.php");
        exit;
    } else {
        echo "Email ou mot de passe incorrect.";
    }
}
?>
<form method="post" action="login.php">
    <input type="email" name="email" placeholder="Email admin" required>
    <input type="password" name="mot_de_passe" placeholder="Mot de passe" required>
    <button type="submit">Connexion</button>
</form>


