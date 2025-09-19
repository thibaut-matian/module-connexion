<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
</head>
<body>
    <form method="POST" action="traitement.php">
    <label for="nom">Votre nom</label>
    <input type="text" id="nom" name="nom" placeholder="Entrez votre nom">
    <br />
    <label for="prenom">Votre prenom</label>
    <input type="text" id="prenom" name="prenom" placeholder="Entrez votre prenom">
    <br />
    <label for="pseudo">Votre pseudo</label>
    <input type="text" id="pseudo" name="pseudo" placeholder="Entrez votre pseudo">
    <br />
    <label for="email">Votre e-mail</label>
    <input type="text" id="email" name="email" placeholder="Entrez votre e-mail">
    <br />
    <label for="pass">Votre mot de passe</label>
    <input type="text" id="password" name="pass" placeholder="Entrez votre mot de passe" required>
    <br />
    <input type="submit" value="M'inscrire" name="ok">
    


    </form>
</body>
</html>