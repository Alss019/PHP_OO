<?php
session_start();
$url = parse_url($_SERVER['REQUEST_URI']);
//test soit l'url a une route sinon on renvoi à la racine 
$path = isset($url['path']) ? $url['path'] : '/';
include './view/view_menu.php';
//test de la valeur $path dans l'URL et import de la ressource 
    switch($path){
        //route /routing/addUser -> ./controler/controler_add_user.php 
        case $path === "/projet/addArticle":
        include './controller/controller_article.php';
        break;
        case $path === "/projet/showArticle":
            include './controller/controller_afficher.php';
        break;
        case $path === "/projet/modifArticle":
            include './controller/controller_modif.php';
            break;
        case $path === "/projet/suppArticle":
            include './controller/controller_supp.php';
            break;
        case $path === "/projet/addutil":
            include './controller/controller_util.php';
            break;
        case $path === "/projet/connect":
            include './controller/controller_connect.php';
            break;
        case $path === "/projet/deco":
            include './controller/controller_deco.php';
            break;
        case $path === "/projet/listeUtil":
            include './controller/controller_afficher_util.php';
            break;
        }
?>