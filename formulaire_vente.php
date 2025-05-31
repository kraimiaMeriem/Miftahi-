<?php
if (isset($_GET['success']) && $_GET['success'] == 1) {
    echo "<h2>Annonce ajoutée avec succès !</h2>";
} else {
    echo "<h2>Page non valide</h2>";
}
?>