# Soutenance Pigier - Gestion des soutenances

Application web de gestion des soutenances de mémoire pour un centre de formation (Pigier). Elle centralise les étudiants, les filières, les professeurs, les jurys, les mémoires, les soutenances et les procès-verbaux (PV).

## Fonctionnalités

- Connexion par email/mot de passe, avec quatre niveaux d'accès définis sur le compte (`admin`, `Directeur_des_Etudes`, `Coordonateur`, `Assistant_Directeur_des_Etudes`)
- Gestion des étudiants : création, modification, suppression, consultation
- Gestion des filières et niveaux d'étude
- Gestion des professeurs et de leur grade
- Composition des jurys (président, examinateur, rapporteur) et affectation de professeurs
- Suivi des mémoires (thème, nombre de pages, date de dépôt) et des soutenances (date, heure, salle)
- Génération de la fiche de procès-verbal par étudiant

## Stack technique

- PHP 8.1+ / Laravel 10
- MySQL
- Blade + Bootstrap (template SB Admin 2) pour l'interface
- Vite + Tailwind pour les assets front

## Installation locale

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Renseigner les accès MySQL dans `.env` (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`), puis créer la base :

```sql
CREATE DATABASE gestion_soutenance CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

Lancer les migrations et les données de départ :

```bash
php artisan migrate --seed
```

Un compte administrateur est créé par le seeder :

- Email : `admin.admin@gmail.com`
- Mot de passe : `2410njkl@Rty`

Compiler les assets et démarrer le serveur :

```bash
npm run build
php artisan serve
```

L'application est alors disponible sur `http://127.0.0.1:8000`.

## Structure des données

| Entité | Description |
|---|---|
| `Etudiant` | Rattaché à une filière, un professeur, un jury, un mémoire et une soutenance |
| `Filiere` | Intitulé et niveau de formation |
| `Professeur` | Nom, prénom, grade |
| `Jurys` | Président, examinateur, rapporteur, liste de professeurs rattachés |
| `Memoire` | Thème, pagination, date de dépôt, jury associé |
| `Soutenance` | Date, heure et salle |
| `PV` | Procès-verbal lié à un jury |

## Tests

```bash
php artisan test
```
