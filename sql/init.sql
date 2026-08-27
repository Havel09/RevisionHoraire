CREATE DATABASE IF NOT EXISTS horaire_eleve
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;

USE horaire_eleve;

DROP TABLE IF EXISTS creneaux;
DROP TABLE IF EXISTS cours;
DROP TABLE IF EXISTS classes;

CREATE TABLE classes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) NOT NULL UNIQUE,
    annee_scolaire VARCHAR(9)  NOT NULL
);

CREATE TABLE cours (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(20)  NOT NULL,
    nom VARCHAR(120) NOT NULL
);

CREATE TABLE creneaux (
    id INT AUTO_INCREMENT PRIMARY KEY,
    classes_id INT NOT NULL,
    cours_id INT NOT NULL,
    jour ENUM ('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi'),
    heure_debut TIME NOT NULL,
    heure_fin TIME NOT NULL,
    salle VARCHAR(20) NOT NULL

    CONSTRAINT fk_creneaux_classes
        FOREIGN KEY (classes_id) REFERENCES classes(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE

    CONSTRAINT fk_creneaux_cours
        FOREIGN KEY (cours_id) REFERENCES cours(id)
        ON DELETE RESTRICT
        ON UPDATE CASCADE
);