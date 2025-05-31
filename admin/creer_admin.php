<?php
require '../connection.php';


$nom = "Admin Meriem";
$email = "adminmeriem@gmail.com";
$mdp = password_hash("admin123", PASSWORD_DEFAULT); 

$stmt = $db->prepare("INSERT INTO administrateur (nom, email, mot_de_passe) VALUES (?, ?, ?)");
$stmt->execute([$nom, $email, $mdp]);

echo "Administrateur ajouté avec succès.";
?>