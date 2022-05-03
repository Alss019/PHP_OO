 <?php
class Utilisateur{
            /*-----------------------------------------
                        ATTRIBUTS
        ----------------------------------------*/
        protected $id_util;
        protected $nom_util;
        protected $prenom_util;
        protected $mail_util;
        protected $mdp_util;
        /*-----------------------------------------
                        CONSTRUCTEUR
        ----------------------------------------*/
        public function __construct($nom, $prenom, $mail, $mdp){
            $this->nom_util = $nom;
            $this->prenom_util = $prenom;
            $this->mail_util = $mail;
            $this->mdp_util = $mdp;
        }
        public function getIdUtil():int{
            return $this->id_util;
        }
        public function getNomUtil():string{
            return $this->nom_util;
        }
        public function getPrenomUtil():string{
            return $this->prenom_util;
        }
        public function getMailUtil():string{
            return $this->mail_util;
        }
        public function getMdpUtil():string{
            return $this->mdp_util;
        }
        public function setIdUtil($id):void{
            $this->id_util = $id;
        }
        public function setNomUtil($nom):void{
            $this->nom_util = $nom;
        }
        public function setPrenomUtil($prenom):void{
            $this->prenom_util = $prenom;
        }
        public function setMailUtil($mail):void{
            $this->mail_util = $mail;
        }
        public function setMdpUtil($mdp):void{
            $this->mdp_util = $mdp;
        }

    public function addUtil($bdd):void{
        $nom = $this->getNomUtil();
        $prenom = $this->getPrenomUtil();
        $mail = $this->getMailUtil();
        $mdp = $this->getMdpUtil();
        try{
            $req = $bdd->prepare('INSERT INTO utilisateur(nom_util, prenom_util, mail_util, mdp_util) 
            VALUES(:nom_util, :prenom_util, :mail_util, :mdp_util)');
            $req->execute(array(
                'nom_util' => $nom,
                'prenom_util' =>$prenom,
                'mail_util' =>$mail,
                'mdp_util' =>$mdp,
                ));
        }
        catch(Exception $e)
        {
            //affichage d'une exception en cas d’erreur
            die('Erreur : '.$e->getMessage());
        }
    }
    public function getUtilByMail($bdd):array{
        try{
            $req = $bdd->prepare('SELECT * FROM utilisateur 
            WHERE mail_util=:mail_util');
            $req->execute(array(
                'mail_util' => $this->getMailUtil(),
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
}
?>