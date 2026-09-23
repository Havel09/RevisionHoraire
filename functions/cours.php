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

function getCoursByClasse($classeNom)
{
    $db = getDb();
    $stmt = $db->prepare(
        "SELECT cl.nom AS classe, cl.annee_scolaire, c.nom AS cours, c.code AS code_cours, cr.jour, cr.heure_debut, cr.heure_fin, cr.salle
        FROM creneaux cr
        JOIN cours c ON c.id = cr.cours_id
        JOIN classes cl ON cl.id = cr.classe_id
        WHERE cl.nom = :classe"
    );
    $stmt->bindParam(":classe", $classeNom);
    $stmt->execute();
    $creneaux = $stmt->fetchAll();

    $horaires = [];
    $classe = $classeNom;
    $anneeScolaire = null;

    if (count($creneaux) > 0) {
        $classe = $creneaux[0]['classe'];
        $anneeScolaire = $creneaux[0]['annee_scolaire'];
        foreach ($creneaux as $creneau) {
            $horaires[] = [
                'jour' => $creneau['jour'],
                'heure_debut' => substr($creneau['heure_debut'], 0, 5),
                'heure_fin' => substr($creneau['heure_fin'], 0, 5),
                'cours' => $creneau['cours'],
                'code_cours' => $creneau['code_cours'],
                'salle' => $creneau['salle'],
            ];
        }
    }

    return [
        'classe' => $classe,
        'annee_scolaire' => $anneeScolaire,
        'horaires' => $horaires,
    ];
}