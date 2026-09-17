<?php

require_once __DIR__ . '/../connexion/db.php';

$serverMethod = $_SERVER['REQUEST_METHOD'];
$_GET['action'];
$_GET['id'];

$uri = explode("/", trim($_SERVER['REQUEST_URI'], "/"));

$URL = $uri[3];

switch ($serverMethod) {
    case 'GET':
        if ($_GET['action'] === 'getAllCreneaux') {
            echo json_encode(getAllCreneaux());
        }
        break;
    case 'POST':
        if ($_GET['action'] === 'createCreneaux') {
            $data = json_decode(file_get_contents('php://input'), true);
            echo json_encode(createCreneaux($data['classes_id'], $data['cours_id'], $data['jour'], $data['heure_debut'], $data['heure_fin'], $data['salle']));
        }
        break;
    case 'PUT':
        if ($_GET['action'] === 'updateCreneaux') {
            $data = json_decode(file_get_contents('php://input'), true);
            echo json_encode(updateCreneaux($data['classes_id'], $data['cours_id'], $data['jour'], $data['heure_debut'], $data['heure_fin'], $data['salle']));
        }
        break;
    case 'DELETE':
        if ($_GET['action'] === 'deleteCreneaux') {
            echo json_encode(deleteCreneaux($_GET['id']));
        }
        break;
}

switch ($serverMethod) {
    case 'GET':
        if ($_GET['action'] === 'getAllCours') {
            echo json_encode(getAllCours());
        }
        break;
    case 'POST':
        if ($_GET['action'] === 'createCreneaux') {
            $data = json_decode(file_get_contents('php://input'), true);
            echo json_encode(createCours($data['nom'], $data['code']));
        }
        break;
    case 'PUT':
        if ($_GET['action'] === 'updateCours') {
            $data = json_decode(file_get_contents('php://input'), true);
            echo json_encode(updateCours($data['id'], $data['nom'], $data['code']));
        }
        break;
    case 'DELETE':
        if ($_GET['action'] === 'deleteCours') {
            echo json_encode(deleteCours($_GET['id']));
        }
        break;
}

switch ($serverMethod) {
    case 'GET':
        if ($_GET['action'] === 'getAllClasses') {
            echo json_encode(getAllClasses());
        }
        break;
    case 'POST':
        if ($_GET['action'] === 'createClasses') {
            $data = json_decode(file_get_contents('php://input'), true);
            echo json_encode(createClasses($data['nom'], $data['annee_scolaire']));
        }
        break;
    case 'PUT':
        if ($_GET['action'] === 'updateClasses') {
            $data = json_decode(file_get_contents('php://input'), true);
            echo json_encode(updateClasses($data['id'], $data['nom'], $data['annee_scolaire']));
        }
        break;
    case 'DELETE':
        if ($_GET['action'] === 'deleteClasses') {
            echo json_encode(deleteClasses($_GET['id']));
        }
        break;
}