<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="accueil.php">Ressources (RE)lationnelles</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" 
      aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <?php if (isset($_SESSION['idUtilisateur'])) { ?>
          <li class="nav-item">
            <a class="nav-link" href="creer_ressource.php">Créer une ressource</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="mes_ressources.php">Mes ressources</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="modifier_profil.php">Mon profil</a>
          </li>
        <?php } else {
            header("Location: login.php");
        };?>

      </ul>

      <ul class="navbar-nav mb-2 mb-lg-0">
        <?php if (isset($_SESSION['idUtilisateur'])): ?>
          <li class="nav-item">
            <span class="navbar-text text-white me-3">
              Connecté en tant que <strong><?= htmlspecialchars($_SESSION['nom']) ?></strong>
            </span>
          </li>
          <li class="nav-item">
            <a class="btn btn-outline-light" href="logout.php">Déconnexion</a>
          </li>
        <?php else: ?>
          <li class="nav-item me-2">
            <a class="btn btn-outline-light" href="login.php">Connexion</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-success" href="inscription.php">S'inscrire</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>
