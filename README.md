# README: Gestion des Employés

## **Description du Projet**
Ce projet est une application de gestion des ressources humaines avec trois modules principaux :

1. **Module Utilisateurs** :
   - Gestion des utilisateurs avec deux rôles : Admin et User.
   - Les admins peuvent créer, modifier et supprimer des utilisateurs.
   - Les utilisateurs avec le rôle "User" n’ont pas accès à ce module.

2. **Module Authentification** :
   - Permet aux utilisateurs de se connecter avec un login et un mot de passe.
   - Gestion des sessions pour sécuriser l'accès aux modules.

3. **Module Employés** :
   - Annuaire des employés de l’entreprise.
   - Les admins ont un accès complet (CRUD : Créer, Lire, Mettre à jour, Supprimer).
   - Les utilisateurs avec le rôle "User" ont uniquement un accès en lecture.

## **Technologies Utilisées**
- **Frontend** :
  - AdminLTE 2 (HTML5, jQuery, Bootstrap).
- **Backend** :
  - PHP 7 avec le framework CodeIgniter 3.
- **Base de Données** :
  - MySQL géré avec PhpMyAdmin.
- **Serveur Local** :
  - XAMPP.

## **Installation et Lancement**
1. **Configurer l’environnement local** :
   - Installer XAMPP.
   - Copier les fichiers du projet dans le dossier `htdocs` ou lancer le serveur PHP avec la commande :
     ```bash
     php -S localhost:8000
     ```

2. **Importer ou migrer la base de données** :
   - Option 1 : Ouvrir PhpMyAdmin.
     - Créer une nouvelle base de données.
     - Importer le fichier `database.sql` fourni dans l'archive.
   - Option 2 : Utiliser la commande de migration de CodeIgniter :
     ```bash
     php index.php migrate/latest
     ```

3. **Accéder à l’application** :
   - Si les fichiers sont dans `htdocs`, accéder à l’application via `http://localhost/nom_du_projet`.
   - Si vous utilisez la commande `php -S`, accéder à l’application via `http://localhost:8000`.

## **Livrables**
- Code source du projet.
- Fichier SQL pour la base de données.
- Vidéo de démonstration expliquant le fonctionnement du projet.

## **Démonstration Vidéo**
Une vidéo de démonstration est incluse pour illustrer le fonctionnement des différents modules.

## **Remarque Importante**
Dans le Module Employés, les permissions du rôle "User" n’étaient pas claires dans les consignes. Pour les besoins des tests, j’ai permis aux utilisateurs avec le rôle "User" d’effectuer des opérations CRUD (Créer, Lire, Mettre à jour, Supprimer) sur les employés. Cela peut être ajusté selon les besoins.

## **Contact**
Si vous avez des questions ou des retours, vous pouvez me contacter via cet email :
[**example.email@test.com**](mailto:aitelhajmarouane00@gmail.com).

Merci pour votre attention et l’opportunité de participer à ce test.

