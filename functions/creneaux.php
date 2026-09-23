<?php

require_once __DIR__ . '/../connexion/db.php';

function getAllCreneaux()
{
    $db = getDb();
    $stmt = $db->prepare("SELECT * FROM creneaux");
    $stmt->execute();
    return $stmt->fetchAll();
}
function createCreneaux($classesId, $coursId, $jour, $heureDebut, $heureFin, $salle)
{
    try {
        $db = getDb();
        $stmt = $db->prepare(
            "INSERT INTO creneaux(classe_id, cours_id, jour, heure_debut, heure_fin, salle)
        VALUES (:classe_id, :cours_id, :jour, :heure_debut, :heure_fin, :salle)
        "
        );

        $stmt->bindParam(":classe_id", $classesId);
        $stmt->bindParam(":cours_id", $coursId);
        $stmt->bindParam(":jour", $jour);
        $stmt->bindParam(":heure_debut", $heureDebut);
        $stmt->bindParam(":heure_fin", $heureFin);
        $stmt->bindParam(":salle", $salle);

        return $stmt->execute();
    } catch (\Throwable $th) {
        throw $th;
    }
}

function updateCreneaux($id, $classesId, $coursId, $jour, $heureDebut, $heureFin, $salle)
{
    try {
        $db = getDb();
        $stmt = $db->prepare(
            "UPDATE creneaux SET classe_id = :classe_id, cours_id = :cours_id, jour = :jour, heure_debut = :heure_debut, heure_fin = :heure_fin, salle = :salle WHERE id = :id"
        );

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":classe_id", $classesId);
        $stmt->bindParam(":cours_id", $coursId);
        $stmt->bindParam(":jour", $jour);
        $stmt->bindParam(":heure_debut", $heureDebut);
        $stmt->bindParam(":heure_fin", $heureFin);
        $stmt->bindParam(":salle", $salle);

        return $stmt->execute();
    } catch (\Throwable $th) {
        throw $th;
    }
}

function deleteCreneaux($id)
{
    try {
        $db = getDb();
        $stmt = $db->prepare("DELETE FROM creneaux WHERE id = :id");
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    } catch (\Throwable $th) {
        throw $th;
    }
}