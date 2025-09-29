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
  