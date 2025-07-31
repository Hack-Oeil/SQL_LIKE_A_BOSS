<?php
 
namespace App\Controller;

use Yoop\AbstractController;

class HomeController extends AbstractController
{
    public function print() 
    {  
        $user = $this->getUser();
        if($user) {
            if($this->isSecretData($user->getUsername(),'a64b8a3c1f21b3')) {
                $flag = $this->getFlag();
            }
        }
        return $this->render('home', ['flag' => $flag??null]);
    }

    public function auth() 
    {
        // si authentifié on ne peut plus venir ici
        if($this->isAuthenticated()) return $this->redirectToRoute("/"); 
        return $this->render('auth');
    }

    public function authProcess() 
    {
        // si authentifié on ne peut plus venir ici
        if($this->isAuthenticated()) return $this->redirectToRoute("/"); 

        if(sizeof($_POST)) {
            if(!empty($_POST['username']) && is_string($_POST['username']) &&
                !empty($_POST['password']) && is_string($_POST['password'])
            ) {
                $pdo =  $this->getRepository('User')->getPDO();
                $statement = $pdo->prepare(
                    'SELECT * FROM `user` WHERE `username` LIKE ? AND `password` LIKE ?'
                );
                $statement->execute([$_POST['username'], $_POST['password']]);
                $statement->setFetchMode(\PDO::FETCH_CLASS, 'App\Entity\User');
                $user = $statement->fetch();
                /* $user = $this->getRepository('User')->query(
                    'SELECT * FROM `user` WHERE `username` LIKE "'.$_POST['username'].'" AND `password` LIKE "'.$_POST['password'].'"'
                ); */
                if($user) {
                    $this->connectUser($user);
                    return $this->redirectToRoute("/"); 
                }
            }
        } 
        return $this->render('auth', ["error" => "Echec d'authentification."]);        
    }


    public function forgot_password() 
    {
        // si authentifié on ne peut plus venir ici
        if($this->isAuthenticated()) return $this->redirectToRoute("/"); 

        return $this->render('forgot_password');
    }

    public function profil() 
    {
        // si non authentifié on redirige vers la page de connexion
        if(!$this->isAuthenticated()) return $this->redirectToRoute("/connexion"); 
        $user = $this->getUser();
        //$user = $this->getRepository('User')->findOneBy(["id" => (int) $_GET['id']]);
        return $this->render('profil', ["user" => $user]);
    }

    public function deconnect() 
    {
        unset($_SESSION["user"]);
        $this->redirectToRoute("/"); 
    }

}