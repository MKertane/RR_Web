<?php
session_start();

include 'navbar.php';

if (!isset($_SESSION['idUtilisateur'])) {
    header("Location: login.php");
    exit();
}

$idUtilisateur = $_SESSION['idUtilisateur'];

try {
    $pdo = new PDO("mysql:host=localhost;dbname=cube_rr;charset=utf8", "root", "");
    $stmt = $pdo->prepare("SELECT * FROM ressource WHERE idUtilisateur = :idUtilisateur ORDER BY idRessource DESC");
    $stmt->execute(['idUtilisateur' => $idUtilisateur]);
    $ressources = $stmt->fetchAll();
} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes ressources</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h2>Mes ressources</h2>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="alert alert-success"><?= $_SESSION['message']; unset($_SESSION['message']); ?></div>
    <?php endif; ?>

    <?php if (empty($ressources)): ?>
        <p>Vous n'avez encore ajouté aucune ressource.</p>
    <?php else: ?>
        <ul class="list-group">
            <?php foreach ($ressources as $res): ?>
                <li class="list-group-item">
                    <h5><?= htmlspecialchars($res['titre']) ?></h5>
                    <p><?= nl2br(htmlspecialchars($res['contenu'])) ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</body>
</html>
