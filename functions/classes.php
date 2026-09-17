<?php

require_once __DIR__ . '/../connexion/db.php';

function getAllClasses()
{
    $db = getDb();
    $stmt = $db->prepare("SELECT * FROM classes");
    $stmt->execute();
    return $stmt->fetchAll();
}
function createClasses($nom, $anneeScolaire)
{
    try {
        $db = getDb();
        $stmt = $db->prepare(
            "INSERT INTO classes(nom, annee_scolaire)
        VALUES (:nom, :annee_scolaire)
        "
        );

        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":annee_scolaire", $anneeScolaire);

        return $stmt->execute();
    } catch (\Throwable $th) {
        throw $th;
    }
}

function updateClasses($id, $nom, $anneeScolaire)
{
    try {
        $db = getDb();
        $stmt = $db->prepare(
            "UPDATE classes SET nom = :nom, annee_scolaire = :annee_scolaire WHERE id = :id"
        );

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":annee_scolaire", $anneeScolaire);

        return $stmt->execute();
    } catch (\Throwable $th) {
        throw $th;
    }
}

function deleteClasses($id)
{
    try {
        $db = getDb();
        $stmt = $db->prepare("DELETE FROM classes WHERE id = :id");
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    } catch (\Throwable $th) {
        throw $th;
    }
}