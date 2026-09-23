<?php

require_once __DIR__ . '/../connexion/db.php';
require_once __DIR__ . '/../functions/creneaux.php';
require_once __DIR__ . '/../functions/cours.php';
require_once __DIR__ . '/../functions/classes.php';

$serverMethod = $_SERVER['REQUEST_METHOD'];

$uri = explode("/", trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), "/"));
$URL = end($uri);

$endpoints = ['creneaux', 'cours', 'classes'];

if (!in_array($URL, $endpoints)) {
    http_response_code(404);
    echo json_encode(['error' => 'Not Found']);
    exit;
}

switch ($serverMethod) {
    case 'GET':
        http_response_code(200);
        if ($URL === 'creneaux') {
            echo json_encode(getAllCreneaux());
        }
        break;
    case 'POST':
        if ($URL === 'creneaux') {
            http_response_code(201);
            $data = json_decode(file_get_contents('php://input'), true);
            echo json_encode(createCreneaux($data['classe_id'], $data['cours_id'], $data['jour'], $data['heure_debut'], $data['heure_fin'], $data['salle']));
        }
        break;
    case 'PUT':
        if ($URL === 'creneaux') {
            $data = json_decode(file_get_contents('php://input'), true);
            echo json_encode(updateCreneaux($data['id'], $data['classe_id'], $data['cours_id'], $data['jour'], $data['heure_debut'], $data['heure_fin'], $data['salle']));
        }
        break;
    case 'DELETE':
        if ($URL === 'creneaux') {
            http_response_code(204);
            deleteCreneaux($_GET['id']);
        }
        break;
}

switch ($serverMethod) {
    case 'GET':
        http_response_code(200);
        if ($URL === 'cours' && isset($_GET['classe'])) {
            echo json_encode(getCoursByClasse($_GET['classe']));
        } else if ($URL === 'cours') {
            echo json_encode(getAllCours());
        }
        break;
    case 'POST':
        if ($URL === 'cours') {
            http_response_code(201);
            $data = json_decode(file_get_contents('php://input'), true);
            echo json_encode(createCours($data['nom'], $data['code']));
        }
        break;
    case 'PUT':
        if ($URL === 'cours') {
            $data = json_decode(file_get_contents('php://input'), true);
            echo json_encode(updateCours($data['id'], $data['nom'], $data['code']));
        }
        break;
    case 'DELETE':
        if ($URL === 'cours') {
            http_response_code(204);
            deleteCours($_GET['id']);
        }
        break;
}

switch ($serverMethod) {
    case 'GET':
        http_response_code(200);
        if ($URL === 'classes') {
            echo json_encode(getAllClasses());
        }
        break;
    case 'POST':
        if ($URL === 'classes') {
            http_response_code(201);
            $data = json_decode(file_get_contents('php://input'), true);
            echo json_encode(createClasses($data['nom'], $data['annee_scolaire']));
        }
        break;
    case 'PUT':
        if ($URL === 'classes') {
            $data = json_decode(file_get_contents('php://input'), true);
            echo json_encode(updateClasses($data['id'], $data['nom'], $data['annee_scolaire']));
        }
        break;
    case 'DELETE':
        if ($URL === 'classes') {
            http_response_code(204);
            deleteClasses($_GET['id']);
        }
        break;
}