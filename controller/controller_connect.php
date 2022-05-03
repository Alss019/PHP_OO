<?php
    include './utils/connectBdd.php';
    include './model/model_util.php';
    include './model/model_administrateur.php';
    include './view/view_connexion.php';

    $msg = "";
    if(isset($_GET['deco'])){
        $msg= "Déconnecté";
    }
    if(isset($_POST['connexion'])){

        if(!empty($_POST['mail_util']) AND !empty($_POST['mdp_util'])){

            if(isset($_POST['admin'])){
            $admin = new Administrateur("", "", $_POST['mail_util'], $_POST['mdp_util']);
            //récup de l'utilisateur
            $test = $admin->getAdminByMail($bdd);
            //test si l'utilisateur existe
            if(!empty($test)){
                $hash = $test[0]['mdp_admin'];
                $password = password_verify($_POST['mdp_util'], $hash);
                if($password){
                    $msg = 'Connecté';
                    $_SESSION['connexion'] = true;
                    $_SESSION['id'] = $test[0]['id_admin'];
                    $_SESSION['nom'] = $test[0]['nom_admin'];
                    $_SESSION['mail'] = $test[0]['mail_admin'];

                    $msg = '<div class="container">
                    <div class="alert alert-success" role="alert">
                    Connecté
                    </div>
                    </div';
                    echo '<script>
                    setTimeout(()=>{
                    document.location.href="/projet/showArticle"; 
                    }, 500);</script>';
                }
                else{
                    //message d'erreur
                    $msg = '
                    <div class="container">
                    <div class="alert alert-warning" role="alert">
                    Les informations sont incorrectes
                    </div>
                    </div>';
                    // echo '<script>
                    //     refresh(1500, "./connect.php");
                    // </script>';
                }
            }
        }




            else{
            //récup super globale post
            $util = new Utilisateur("", "", $_POST['mail_util'], $_POST['mdp_util']);
            //récup de l'utilisateur
            $test = $util->getUtilByMail($bdd);
            //test si l'utilisateur existe
            if(!empty($test)){
                $hash = $test[0]['mdp_util'];
                $password = password_verify($_POST['mdp_util'], $hash);
                if($password){
                    $msg = 'Connecté';
                    $_SESSION['connexion'] = true;
                    $_SESSION['id'] = $test[0]['id_util'];
                    $_SESSION['nom'] = $test[0]['nom_util'];
                    $_SESSION['mail'] = $test[0]['mail_util'];

                    $msg = '<div class="container">
                    <div class="alert alert-success" role="alert">
                    Connecté
                    </div>
                    </div';
                    echo '<script>
                    setTimeout(()=>{
                    document.location.href="/projet/showArticle"; 
                    }, 500);</script>';
                }
                else{
                    //message d'erreur
                    $msg = '
                    <div class="container">
                    <div class="alert alert-warning" role="alert">
                    Les informations sont incorrectes
                    </div>
                    </div>';
                    // echo '<script>
                    //     refresh(1500, "./connect.php");
                    // </script>';
                }
            }
            //test si l'utilisateur n'existe pas
            else{
                //message d'erreur
                $msg = '
                <div class="container">
                <div class="alert alert-danger" role="alert">
                l\'utilisateur n\'existe pas
                </div>
                </div>';
                echo '<script>
                    refresh(1500, "./connect.php");
                </script>';
            }
        }
    }
        //test champs de formulaire vides ou incomplets
        else{
            //message d'erreur
            $msg = '
            <div class="container">
            <div class="alert alert-warning" role="alert">
            Veuillez remplir le  formulaire
            </div>
            </div>';
            // echo '<script>
            //     refresh(1500, "./connect.php");
            // </script>';
        }
    }


    //sinon (bouton submit non cliqué)
    else{
        $msg = '
        <div class="container">
        <div class="alert alert-warning" role="alert">
        Saisir vos informations de connexion
        </div>
        </div>';
    }
    /*---------------------------------------
                GESTION DES ERREURS
    ---------------------------------------*/
    //affichage des messages d'erreur en JS
    echo $msg;
    
    // '<script>
    //     //affiche le message d\'erreur 
    //     setMessage("'.$msg.'");
    //     //affiche la page sélectionnée dans le menu
    //     urlStyle();  
    // </script>'
?>