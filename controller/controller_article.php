
<?php
    //import
    include './utils/connectBdd.php';
    include './model/model_article.php';
    include './view/view_article.php';
    //test
    if(isset($_POST['nom_article']) AND isset($_POST['prix_article']) AND 
    $_POST['nom_article'] != "" AND $_POST['prix_article'] !=""){
        $article = new Article($_POST['nom_article'], $_POST['prix_article']);
        $article->addArticleV2($bdd);
        echo '
        <div class="container">
        <div class="alert alert-succes" role="alert">
        l\'article '.$article->getNomArticle().' à été ajouté
        </div>
        </div>';
    }
    else{
        echo '
        <div class="container">
        <div class="alert alert-warning" role="alert" style:"text-align:center">
        Veuillez remplir les champs du formulaire
        </div>
        </div>';
    }
?>