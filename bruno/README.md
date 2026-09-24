# Collection Bruno — RevisionHoraire API

Collection [Bruno](https://www.usebruno.com/) pour tester l'API du site Revision Horaire.

## Prérequis

- Lancer le site complet (Apache + MySQL) via Docker :
  ```bash
  docker compose up -d
  ```
- Le site est alors disponible sur **`http://localhost:8080`**
  et l'API sur **`http://localhost:8080/api/...`**.

## Utilisation

1. Ouvrir Bruno (ou VS Code / JetBrains avec l'extension Bruno).
2. Menu **File → Open Collection**, puis sélectionner le dossier `bruno/` de ce projet.
3. Exécuter les requêtes dans l'ordre logique : d'abord créer des données (POST),
   puis les lister (GET), les modifier (PUT) et les supprimer (DELETE).

## Points d'entrée

| Méthode | URL                          | Description                               |
|---------|------------------------------|-------------------------------------------|
| GET     | `/api/cours`                 | Lister tous les cours                     |
| GET     | `/api/cours?classe=...`      | Lister les cours d'une classe             |
| POST    | `/api/cours`                 | Créer un cours                            |
| PUT     | `/api/cours`                 | Modifier un cours                         |
| DELETE  | `/api/cours?id=...`          | Supprimer un cours                        |
| GET     | `/api/classes`               | Lister toutes les classes                 |
| POST    | `/api/classes`               | Créer une classe                          |
| PUT     | `/api/classes`               | Modifier une classe                       |
| DELETE  | `/api/classes?id=...`        | Supprimer une classe                      |
| GET     | `/api/creneaux`              | Lister tous les créneaux                  |
| POST    | `/api/creneaux`              | Créer un créneau                          |
| PUT     | `/api/creneaux`              | Modifier un créneau                       |
| DELETE  | `/api/creneaux?id=...`       | Supprimer un créneau                      |

## Notes

- Les URLs propres (`/api/cours`, etc.) sont servies par le fichier
  `api/.htaccess` qui redirige vers `api/index.php` (Apache).
- Les corps des requêtes POST / PUT sont en JSON (`Content-Type: application/json`).
- `jour` est une valeur parmi : `lundi`, `mardi`, `mercredi`, `jeudi`, `vendredi`.
- Les heures s'écrivent au format `HH:MM:SS` (ex. `08:05:00`).
- Les DELETE renvoient un statut `204 No Content` (pas de corps de réponse).