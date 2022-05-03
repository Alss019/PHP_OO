<?php
    include './utils/connectBdd.php';
    include './model/model_article.php';
    include './view/view_afficher.php';
    
    $article = new Article(null, null);

    $tab = $article->showAllArticle($bdd);
    foreach($tab as $value){
        echo 
        '<li class="li-grid list-group-item" id="liste" ">
            <span>'.$value->nom_article.'</span>
            <span>'.$value->prix_article.'€</span>
            <span><a href="/projet/suppArticle?id='.$value->id_article.'">❌</a></span>
            <span><a href="/projet/modifArticle?id='.$value->id_article.'">🖍</a></span>
        </li>';
    }
    echo '</ul>
    </form>'
?>  