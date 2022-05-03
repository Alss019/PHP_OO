<?php
    class Administrateur extends Utilisateur{
        protected $activate;

        public function addAdmin($bdd):void{
            $nom = $this->getNomUtil();
            $prenom = $this->getPrenomUtil();
            $mail = $this->getMailUtil();
            $mdp = $this->getMdpUtil();
            try{
                $req = $bdd->prepare('INSERT INTO Administrateur(nom_admin, prenom_admin, mail_admin, mdp_admin) 
                VALUES(:nom_admin, :prenom_admin, :mail_admin, :mdp_admin)');
                $req->execute(array(
                    'nom_admin' => $nom,
                    'prenom_admin' =>$prenom,
                    'mail_admin' =>$mail,
                    'mdp_admin' =>$mdp,
                    ));
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
        public function getAdminByMail($bdd):array{
            try{
                $req = $bdd->prepare('SELECT * FROM Administrateur 
                WHERE mail_admin=:mail_admin');
                $req->execute(array(
                    'mail_admin' => $this->getMailUtil(),
                    ));
                $data = $req->fetchAll(PDO::FETCH_ASSOC);
                return $data;
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
        public function showAllUtil($bdd):array{
            try{
                $req = $bdd->prepare('SELECT * FROM utilisateur');
                $req->execute();
                $data = $req->fetchAll(PDO::FETCH_OBJ);
                return $data;
            }
            catch(Exception $e)
            {
                //affichage d'une exception en cas d’erreur
                die('Erreur : '.$e->getMessage());
            }
        }
    } 
?>