<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];

    // Connexion à la base
    $db = new PDO("mysql:host=localhost;dbname=siteimmob;charset=utf8mb4", "root", "");

    // Vérifie si l'utilisateur existe
    $stmt = $db->prepare("SELECT * FROM utilisateur WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();

    if ($user) {
        $token = bin2hex(random_bytes(50));
        $expire = date("Y-m-d H:i:s", strtotime("+1 hour"));

        $stmt = $db->prepare("UPDATE utilisateur SET token = ?, token_expire = ? WHERE email = ?");
        $stmt->execute([$token, $expire, $email]);

        $lien = "http://localhost/site/reset.php?token=$token";
        echo "Un lien de réinitialisation a été envoyé : <a href='$lien'>$lien</a>";
        // En pratique, on envoie ce lien par email
    } else {
        echo "Aucun compte avec cet email.";
    }
}
?>

<form method="POST">
    <h2>Réinitialiser le mot de passe</h2>
    <input type="email" name="email" placeholder="Votre email" required>
    <button type="submit">Envoyer le lien</button>
</form>
