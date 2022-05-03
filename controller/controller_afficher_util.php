<?php
    include './utils/connectBdd.php';
    include './model/model_util.php';
    include './model/model_administrateur.php';
    include './view/view_afficher.php';
    
    $util = new Administrateur(null, null,null, null);

    $tab = $util->showAllArticle($bdd);
    foreach($tab as $value){
        echo 
        '<li class="li-grid list-group-item" id="liste" ">
            <span>'.$value->nom_util.'</span>
            <span>'.$value->prenom_util.'€</span>
            <span><a href="/projet/suppArticle?id='.$value->id_util.'">❌</a></span>
            <span><a href="/projet/modifArticle?id='.$value->id_util.'">🖍</a></span>
        </li>';
    }
    echo '</ul>
    </form>'
?>  