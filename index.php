<?php
include_once __DIR__ . '/includes/header.php';
?>

<main class="container my-4">
    <nav>
        <ul class="nav nav-pills justify-content-center my-4">
            <li class="nav-item"><a class="nav-link active" href="index.php">Accueil</a></li>
            <li class="nav-item"><a class="nav-link" href="pages/cours.php">Cours</a></li>
            <li class="nav-item"><a class="nav-link" href="pages/classes.php">Classes</a></li>
            <li class="nav-item"><a class="nav-link" href="pages/horaire.php">Horaire</a></li>
        </ul>
    </nav>

    <h1>Accueil</h1>

    <div class="row">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title h5">Cours</h2>
                    <p class="card-text">Ajouter et supprimer des cours.</p>
                    <a href="pages/cours.php" class="btn btn-primary">Gérer les cours</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title h5">Classes</h2>
                    <p class="card-text">Ajouter et supprimer des classes.</p>
                    <a href="pages/classes.php" class="btn btn-primary">Gérer les classes</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title h5">Horaire</h2>
                    <p class="card-text">Saisir et consulter les horaires.</p>
                    <a href="pages/horaire.php" class="btn btn-primary">Gérer les horaires</a>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include_once __DIR__ . '/includes/footer.php'; ?>