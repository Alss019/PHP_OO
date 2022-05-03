<?php
    //test si connecté
    if(isset($_SESSION['connexion'])){

        if(isset($_POST['admin'])){
echo '
<nav class="navbar navbar-expand" style="background-color: rgb(71, 203, 255)">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbar">
        <div class="navbar-nav me-auto mb-2">
            <a class="nav-link active" aria-current="page" href="/projet/addArticle">Ajouter Article</a>
            <a class="nav-link active" aria-current="page" href="/projet/showArticle">Liste des Articles</a>
            <a class="nav-link active" aria-current="page" href="/projet/addutil">Ajouter Utilisateur</a>
            <a class="nav-link active" aria-current="page" href="/projet/listeUtil">Liste Utilisateur</a>
            <a class="nav-link active " aria-current="page" href="/projet/deco" id="deco">Déconnexion</a>
            </div>
        </div>
    </div>
</nav>';
}
else{
echo '
<nav class="navbar navbar-expand" style="background-color: rgb(71, 203, 255)">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbar">
        <div class="navbar-nav me-auto mb-2">
            <a class="nav-link active" aria-current="page" href="/projet/addArticle">Ajouter Article</a>
            <a class="nav-link active" aria-current="page" href="/projet/showArticle">Liste des Articles</a>
            <a class="nav-link active" aria-current="page" href="/projet/addutil">Ajouter Utilisateur</a>
            <a class="nav-link active me-2" aria-current="page" href="/projet/deco" id="deco">Déconnexion</a>
            </div>
        </div>
    </div>
</nav>';
    }
}
    else{

    echo'
    <nav class="navbar navbar-expand" style="background-color: rgb(71, 203, 255)">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="/projet/addutil">Ajouter Utilisateur</a>
            <a class="nav-link active" aria-current="page" href="/projet/connect" >Connexion</a>
            </div>
        </div>
    </div>
</nav>';
    }
?> 