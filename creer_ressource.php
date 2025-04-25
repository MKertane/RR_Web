<?php
session_start();

include 'navbar.php';

if (!isset($_SESSION['idUtilisateur'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!empty($_POST['titre']) && !empty($_POST['contenu'])) {
        $titre = trim($_POST['titre']);
        $contenu = trim($_POST['contenu']);
        $idUtilisateur = $_SESSION['idUtilisateur'];

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=cube_rr;charset=utf8", "root", "");
            $stmt = $pdo->prepare("INSERT INTO ressource (titre, contenu, idUtilisateur) VALUES (:titre, :contenu, :idUtilisateur)");
            $stmt->execute([
                'titre' => $titre,
                'contenu' => $contenu,
                'idUtilisateur' => $idUtilisateur
            ]);
            $_SESSION['message'] = "Ressource ajoutée avec succès.";
            header("Location: mes_ressources.php");
            exit();
        } catch (PDOException $e) {
            $_SESSION['erreur'] = "Erreur lors de l'insertion : " . $e->getMessage();
        }
    } else {
        $_SESSION['erreur'] = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer une ressource</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
    <h2>Créer une nouvelle ressource</h2>

    <?php if (isset($_SESSION['erreur'])): ?>
        <div class="alert alert-danger"><?= $_SESSION['erreur']; unset($_SESSION['erreur']); ?></div>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="titre" class="form-label">Titre</label>
            <input type="text" class="form-control" name="titre" id="titre" required>
        </div>
        <div class="mb-3">
            <label for="contenu" class="form-label">Contenu (lien ou texte)</label>
            <textarea class="form-control" name="contenu" id="contenu" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-success">Créer</button>
    </form>
</body>
</html>
