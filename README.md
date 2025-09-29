# module-connexion

Module Connexion
Ce projet est une application web simple permettant de gérer des utilisateurs avec des fonctionnalités d'inscription, de connexion, de gestion de profil, et une interface d'administration réservée à l'utilisateur "admin".

Fonctionnalités principales

Page d'accueil (index.php)

Présente le site et propose des liens vers les pages d'inscription, de connexion, et d'administration (si l'utilisateur est connecté en tant qu'admin).
Affiche un message de bienvenue personnalisé si l'utilisateur est connecté.

Inscription (inscription.php)

Permet à un utilisateur de s'inscrire en fournissant un login, un prénom, un nom, un mot de passe, et une confirmation de mot de passe.
Les données sont validées et insérées dans la base de données.
Une fois inscrit, l'utilisateur est redirigé vers la page de connexion.
Connexion (connexion.php)

Permet à un utilisateur de se connecter en saisissant son login et son mot de passe.
Si les informations sont correctes, une session est créée pour l'utilisateur, et il est redirigé vers la page d'accueil.
Si l'utilisateur est "admin", il aura accès à la page d'administration.
Gestion du profil (profil.php)

Permet à un utilisateur connecté de modifier son prénom, son nom, et éventuellement son mot de passe.
Les informations actuelles de l'utilisateur sont pré-remplies dans le formulaire.
Les modifications sont enregistrées dans la base de données.
Administration (admin.php)

Accessible uniquement à l'utilisateur "admin".
Affiche une liste de tous les utilisateurs présents dans la base de données (ID, login, prénom, nom).
Protège l'accès aux utilisateurs non-admins en les redirigeant vers la page d'accueil.
Déconnexion (logout.php)

Permet à un utilisateur de se déconnecter en détruisant sa session.
Redirige l'utilisateur vers la page d'accueil après la déconnexion.
Structure des fichiers
Fichiers principaux :
index.php : Page d'accueil.
inscription.php : Formulaire d'inscription.
connexion.php : Formulaire de connexion.
profil.php : Gestion du profil utilisateur.
admin.php : Interface d'administration.
logout.php : Déconnexion de l'utilisateur.
Fichiers de configuration :
config.php : Contient la configuration de la connexion à la base de données.
Fichiers de style :
style.css : Contient les styles CSS pour un design épuré et moderne.
Base de données :
moduleconnexion.sql : Script SQL pour créer la base de données et la table utilisateurs.
Base de données
Structure de la table utilisateurs :
Utilisateur "admin" par défaut :
Un utilisateur "admin" est créé par défaut pour accéder à la page d'administration :

Instructions d'installation
Importer la base de données :

Ouvrez phpMyAdmin.
Importez le fichier moduleconnexion.sql pour créer la base de données et la table utilisateurs.
Configurer la connexion à la base de données :

Vérifiez les paramètres dans le fichier config.php :
Lancer le projet :

Placez tous les fichiers dans le dossier www de WAMP (par exemple : module-connexion).
Accédez au projet via votre navigateur : http://localhost/module-connexion.
Fonctionnement global
Inscription :

Un utilisateur s'inscrit via inscription.php.
Les données sont insérées dans la table utilisateurs.
Connexion :

L'utilisateur se connecte via connexion.php.
Une session est créée pour l'utilisateur.
Gestion du profil :

L'utilisateur peut modifier ses informations via profil.php.
Administration :

L'utilisateur "admin" peut accéder à admin.php pour voir la liste des utilisateurs.
Déconnexion :

L'utilisateur peut se déconnecter via logout.php.
Notes importantes
Sécurité :

Les mots de passe sont hashés avec password_hash() avant d'être stockés dans la base de données.
Les pages sensibles (profil.php, admin.php) sont protégées par des vérifications de session.
Améliorations possibles :

Ajouter la possibilité de supprimer ou modifier des utilisateurs depuis la page d'administration.
Ajouter des validations côté client (JavaScript) pour améliorer l'expérience utilisateur.
