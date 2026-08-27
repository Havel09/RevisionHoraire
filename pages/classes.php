<?php include_once __DIR__ . '/../includes/header.php'; ?>

<main>
    <h1>Classes</h1>

    <form action="classes.php" method="post">
        <label for="nom_classe">Nom de la classe :</label>
        <input type="text" name="nom_classe" id="nom_classe">

        <label for="annee_scolaire">Année scolaire :</label>
        <input type="text" name="annee_scolaire" id="annee_scolaire">

        <input type="submit" value="Ajouter la classe">
    </form>

</main>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>
