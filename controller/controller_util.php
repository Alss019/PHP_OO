<?php
include './utils/connectBdd.php';
include './model/model_util.php';
include './model/model_administrateur.php';
include './view/view_util.php';

$msg = "";
// /*---------------------------------------
//             TESTS ET LOGIQUE
// ---------------------------------------*/
//test si le bouton submit à été cliqué
if(isset($_POST['valider'])){

    if(!empty($_POST['nom_util']) AND !empty($_POST['prenom_util']) AND
    !empty($_POST['mail_util']) AND !empty($_POST['mdp_util'])){
    //récupération d'un utilisateur dans $user
        if(isset($_POST['admin'])){
            $admin = new Administrateur($_POST['nom_util'],$_POST['prenom_util'],$_POST['mail_util'],$_POST['mdp_util']);
            $admin->setMdpUtil(password_hash($admin->getMdpUtil(),PASSWORD_DEFAULT));
            $mail = $admin->getUtilByMail($bdd);
            if(empty($mail)){
                $admin->addAdmin($bdd);
                
                $msg ='
                <div class="container">
                    <div class="alert alert-success" role="alert"> 
                    Le compte '.$admin->getMailUtil().' a ete creer </div>
                    </div>';

                echo '
                <script>
                    refresh(1500, "/projet/addutil");
                </script>';
            }
            else{
                $util = new Utilisateur($_POST['nom_util'],$_POST['prenom_util'],$_POST['mail_util'],$_POST['mdp_util']);
                $util->setMdpUtil(password_hash($util->getMdpUtil(),PASSWORD_DEFAULT));
                $mail = $util->getUtilByMail($bdd);
                //test si l'utilisateur existe
                if(empty($mail)){
                    $util->addUtil($bdd);
                    $msg = '
                    
                    <div class="container">
                    <div class="alert alert-success" role="alert"> 
                    Le compte '.$util->getMailUtil().' a ete creer </div>
                    </div>';
                    echo '<script>
                    refresh(1500, "/projet/addutil");
                    </script>';
                }
                else{
                    //message erreur le compte existe déja
                    $message = '
                    <div class="container">
                    <div class="alert alert-danger" role="alert">
                    Les informations sont incorrectes
                    </div>
                    </div>';
                }
            }
            // else{
            //     $msg = '
            //     <div class="container">
            //     <div class="alert alert-info" role="alert">
            //     Veuillez compléter tous les champs du formulaire
            //     </div>
            //     </div>';  //message erreur veuillez compléter les champs de formulaire
            // }
        }
}
}
//test si on à pas cliqué sur ajouter
else{
$msg = '    <div class="container">
<div class="alert alert-success" role="alert">
Cliquez sur ajouter pour créer un compte utilisateur
</div>
</div>';
}
//affichage des erreurs
echo $msg;

?>