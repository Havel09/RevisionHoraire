<?php include_once __DIR__ . '/../includes/header.php'; ?>

<main>
    <h1>Horaire</h1>
    <form action="horaire.php" method="post">
        <label for="jour">Voici la liste des créneaux disponibles :</label>
        <select name="jour" id="jour">
            <option value="lundi">lundi</option>
            <option value="mardi">mardi</option>
            <option value="mercredi">mercredi</option>
            <option value="jeudi">jeudi</option>
            <option value="vendredi">vendredi</option>
        </select>

        <label for="heure_debut">Heure de début :</label>
        <input type="time" name="heure_debut" id="heure_debut">

        <label for="heure_fin">Heure de fin :</label>
        <input type="time" name="heure_fin" id="heure_fin">

        <label for="salle">Salle :</label>
        <input type="text" name="salle" id="salle">

        <input type="submit" value="Ajouter l'horaire">
    <form action="horaire.php" method="post">

</main>

<?php include_once __DIR__ . '/../includes/footer.php'; ?>
