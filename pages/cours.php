<?php include_once __DIR__ . '/../includes/header.php'; ?>

<main>
    <h1>Cours</h1>
    <form action="cours.php" method="post">
        <label for="code">Code :</label>
        <input type="text" name="code" id="code">

        <label for="nom_cours">Nom :</label>
        <input type="text" name="nom_cours" id="nom_cours">

        <input type="submit" value="Ajouter le cours">
    </form>

</main>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>
