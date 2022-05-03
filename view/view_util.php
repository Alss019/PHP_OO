<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./asset/css/style.css">
    <title>Ajouter Utilisateur</title>
</head>
<body>
<div class="container mt-3">
    <div class="mb-3">
      <h1>Ajouter Utilisateur</h1>
      <form action="" method="post">
        <p>Nom: <input type="text" class="form-control" name="nom_util"></p>
        <p>Prénom:<input type="text" class="form-control" name="prenom_util"></p>
        <p>Mail: <input type="email" class="form-control" name="mail_util" 
            pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" required></p>
        <p>Mot de passe :<input type="password" class="form-control" name="mdp_util" required></p>
        <p><input type="checkbox" value="admin" name="admin"> Admin</p> 
        <input class="btn btn-primary" type="submit" name="valider" value="Ajouter">
      </form>
    </div>
  </div>
</body>
</html>