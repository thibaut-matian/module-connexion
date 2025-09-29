<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil - Module Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <h1>Bienvenue sur notre site</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <?php if (isset($_SESSION['user_login'])): ?>
                    <?php if ($_SESSION['user_login'] === 'admin'): ?>
                        <li><a href="admin.php">Administration</a></li>
                    <?php else: ?>
                        <li><a href="profil.php">Mon Profil</a></li>
                    <?php endif; ?>
                    <li><a href="logout.php">Déconnexion</a></li>
                <?php else: ?>
                    <li><a href="inscription.php">Inscription</a></li>
                    <li><a href="connexion.php">Connexion</a></li>
                <?php endif; ?>
            </ul>
        </nav>
    </header>
    <main>
        <section>
            <h2>Présentation</h2>
            <p>Ce site permet de gérer les utilisateurs avec des fonctionnalités d'inscription, de connexion, et d'administration.</p>
        </section>
    </main>
</body>
</html>