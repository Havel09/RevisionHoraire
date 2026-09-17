<?php

require_once __DIR__ . '/../connexion/db.php';

function getAllCours()
{
    $db = getDb();
    $stmt = $db->prepare("SELECT * FROM cours");
    $stmt->execute();
    return $stmt->fetchAll();
}

function createCours($nom, $code)
{
    try {
        $db = getDb();
        $stmt = $db->prepare(
            "INSERT INTO cours(nom, code)
        VALUES (:nom, :code)
        "
        );

        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":code", $code);

        return $stmt->execute();
    } catch (\Throwable $th) {
        throw $th;
    }
}

function updateCours($id, $nom, $code)
{
    try {
        $db = getDb();
        $stmt = $db->prepare(
            "UPDATE cours SET nom = :nom, code = :code WHERE id = :id"
        );

        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":nom", $nom);
        $stmt->bindParam(":code", $code);

        return $stmt->execute();
    } catch (\Throwable $th) {
        throw $th;
    }
}

function deleteCours($id)
{
    try {
        $db = getDb();
        $stmt = $db->prepare("DELETE FROM cours WHERE id = :id");
        $stmt->bindParam(":id", $id);
        return $stmt->execute();
    } catch (\Throwable $th) {
        throw $th;
    }
}