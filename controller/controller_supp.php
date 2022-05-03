<?php
include './utils/connectBdd.php';
include './model/model_article.php';
include './view/view_afficher.php';

if(isset($_GET['id'])){
    $article = new Article(null,null);
    $article->setIdArticle($_GET['id']);    
    $article->deleteProduit($bdd);
    echo "<p>Suppression de $value</p>";
    header('Location:/projet/showArticle');
    }
else{
    echo "<p style=text-align:center;>Veuillez cocher un ou plusieurs produit à supprimer</p>";
}
?>
