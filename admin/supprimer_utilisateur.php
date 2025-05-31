<?php
session_start();
require '../connection.php';
if (!isset($_SESSION['admin_id'])) exit("Accès interdit");

if (isset($_GET['id'])) {
    $stmt = $db->prepare("DELETE FROM utilisateur WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    echo "Utilisateur supprimé.<br><br>";
}

$users = $db->query("SELECT * FROM utilisateur");
?>
<h2>Liste des utilisateurs</h2>
<?php foreach ($users as $u): ?>
    <p>
        <?= htmlspecialchars($u['nom']) ?> (<?= $u['email'] ?>)
        <a href="?id=<?= $u['id'] ?>" onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</a>
    </p>
<?php endforeach; ?>
<a href="dashboard.php">← Retour au tableau de bord</a>
