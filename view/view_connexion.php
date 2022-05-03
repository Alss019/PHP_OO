<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./asset/css/style.css">
    <title>Connexion</title>
</head>
<body>
<div class="container mt-3" id="connexion">
    <div class="mb-3">
        <h1>Se connecter</h1>
        <form action="" method="post">
            <p>Saisir votre mail:<input type="email" name="mail_util" 
                pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" 
                class="form-control" required placeholder="saisir son email"></p>
            <p>Saisir votre mot de passe:<input type="password" class="form-control" name="mdp_util" placeholder="saisir son password" required></p>
            <p><input type="checkbox" value="Admin" name="admin"> Admin</p> 
            <p><input type="submit" value="Connexion" class="btn btn-primary" name="connexion"></p>
        </form>
    </div>
</div>
    <p id="error"></p>
    <script src="./asset/script/script.js"></script>
</body>
</html>