<?php

require_once 'config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: connexion.php');
    exit();
}

$error = '';
$success = '';

$stmt = $bdd->prepare("SELECT * FROM utilisateurs WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $prenom = trim($_POST['prenom']);
    $nom = trim($_POST['nom']);
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if (empty($prenom) || empty($nom)) {
        $error = "Le prénom et le nom sont obligatoires.";
    } elseif (!empty($new_password) && $new_password !== $confirm_password) {
        $error = "Les mots de passe ne correspondent pas.";
    } else {
        if (!empty($new_password)) {
         
            $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $bdd->prepare("UPDATE utilisateurs SET prenom = ?, nom = ?, password = ? WHERE id = ?");
            $result = $stmt->execute([$prenom, $nom, $hashedPassword, $_SESSION['user_id']]);
   } else {
            
            $stmt = $bdd->prepare("UPDATE utilisateurs SET prenom = ?, nom = ? WHERE id = ?");
            $result = $stmt->execute([$prenom, $nom, $_SESSION['user_id']]);
        }

        if ($result) {
            $_SESSION['user_prenom'] = $prenom;
            $_SESSION['user_nom'] = $nom;
            $success = "Profil mis à jour avec succès !";
        } else {
            $error = "Erreur lors de la mise à jour.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Profil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <h1>Mon Profil</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="logout.php">Déconnexion</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h2>Modifier mon profil</h2>
        <?php if ($error): ?>
                <p class="error"><?= htmlspecialchars($error) ?></p>
        <?php endif; ?>
        <?php if ($success): ?>
            <p class="success"><?= htmlspecialchars($success) ?></p>
        <?php endif; ?>
        <form method="POST">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($user['prenom']) ?>" required>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($user['nom']) ?>" required>
            <label for="new_password">Nouveau mot de passe :</label>
            <input type="password" id="new_password" name="new_password" placeholder="Laisser vide pour ne pas changer">
            <label for="confirm_password">Confirmer le nouveau mot de passe :</label>
            <input type="password" id="confirm_password" name="confirm_password">
            <button type="submit">Mettre à jour</button>
        </form>
    </main>
</body>
</html>