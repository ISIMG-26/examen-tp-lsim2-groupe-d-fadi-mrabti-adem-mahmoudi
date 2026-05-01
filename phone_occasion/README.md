# Phone Occasion

Mini-projet web dynamique pour vendre et acheter des telephones occasion.

## Technologies utilisees

- HTML
- CSS
- JavaScript
- AJAX
- PHP
- MySQL

## Fonctionnalites

- Affichage des annonces dans la page d'accueil
- Inscription et connexion des utilisateurs
- Ajout d'une annonce avec photo du telephone
- Modification et suppression des annonces
- Page details pour chaque telephone
- Recherche par modele
- Filtrage par marque et etat
- Tri des annonces par prix
- Bouton Clear pour vider les filtres
- Validation JavaScript des formulaires

## Base de donnees

La base de donnees utilise deux tables principales :

- `users` : contient les informations des utilisateurs
- `produits` : contient les informations des annonces

Chaque annonce contient :

- le modele du telephone
- la description
- le prix
- la marque
- l'etat
- le telephone du vendeur
- la photo
- l'utilisateur qui a ajoute l'annonce

## Pages principales

- `index.php` : page d'accueil et affichage des annonces
- `details.php` : details d'une annonce
- `register.php` : inscription
- `login.php` : connexion
- `add_product.php` : ajout d'une annonce
- `profile.php` : annonces de l'utilisateur connecte
- `edit_product.php` : modification d'une annonce

## Installation

1. Copier le dossier `phone_occasion` dans `C:\wamp64\www`
2. Demarrer WampServer
3. Importer le fichier `database.sql` dans phpMyAdmin pour creer la base `phone_occasion_db`
4. Ouvrir le projet dans le navigateur :

```text
http://localhost/phone_occasion
```

## Auteur

FADI MRABTI
ADEM MAHMOUDI

## Equipe

- Section : LSIM 2 (D)
- Membres :
  - FADI MRABTI
  - ADEM MAHMOUDI

