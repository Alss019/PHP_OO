<?php
include './utils/connectBdd.php';
include './model/model_article.php';
include './view/view_modif.php';


if(isset($_POST["valider"])){

    if(isset($_GET['id']) AND $_GET['id'] != ''){
        if(isset($_POST['nom_article']) AND isset($_POST['prix_article']) AND 
        $_POST['nom_article'] !='' AND $_POST['prix_article'] !=''){
            $article = new Article($_POST['nom_article'], $_POST['prix_article']);
            $article ->setIdArticle($_GET['id']);
            $article->updateArticle($bdd);
            echo '<div class="container">
            <div class="alert alert-success" style=text-align:center role="alert">
            '.$_POST['nom_article'].' a été ajouter a la BDD</div>
            </div>';
            echo '<script>
            setTimeout(()=>{
            document.location.href="/projet/showArticle"; 
            }, 1500);</script>';
        }
        else{
            echo'<div class="container">
        <div class="alert alert-warning" style=text-align:center role="alert">
        Veuillez remplir les champs du formulaire
        </div>
        </div>';
        }
    }
    // else{
    //     header('Location:controller_afficher?error');
    // } 
}    
?>