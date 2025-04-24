<?php

include 'navbar.php';

if (!isset($_SESSION['idUtilisateur'])) {
    header("Location: login.php");
    exit();
}
// Simuler des données (id, titre, lien)
$ressources = [
    [
        'titre' => 'OpenAI - ChatGPT',
        'url' => 'https://chat.openai.com/',
        'description' => 'Un modèle d’IA pour discuter et générer du texte.'
    ],
    [
        'titre' => 'PHP.net',
        'url' => 'https://www.php.net/',
        'description' => 'La documentation officielle de PHP.'
    ],
    [
        'titre' => 'MDN Web Docs',
        'url' => 'https://developer.mozilla.org/',
        'description' => 'Documentation complète sur HTML, CSS, JavaScript, etc.'
    ]
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ressources Relationnelles</title>
</head>
<body>
    <h1>Ressources Relationnelles</h1>
    
    <?php foreach ($ressources as $res): ?>
        <div class="ressource">
            <div class="titre">
                <a href="<?= htmlspecialchars($res['url']) ?>" target="_blank">
                    <?= htmlspecialchars($res['titre']) ?>
                </a>
            </div>
            <div class="description"><?= htmlspecialchars($res['description']) ?></div>
        </div>
    <?php endforeach; ?>
</body>
</html>
