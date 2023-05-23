<?php
class LoginUser {
    private $user;
    private $pass;
    private $usernameBd = "root";
    private $passwordBd = "";
    private $idUser;

    public function setUser_pass($u, $p) {
        $this->user = $u;
        $this->pass = $p;
    }

    public function existLogin() {
        return $this->searchUser();
    }

    public function getUserDatas() {
        if($this->idUser == "") return;
        try {
            $db = new PDO('mysql:host=localhost;dbname=login', $this->usernameBd, $this->passwordBd);
            //$query = $db->prepare("SELECT * from tbLogin where cdLogin = '" . $this->idUser . "';");
            $query = $db->prepare("SELECT * from tbLogin where cdLogin = :idUser;");
            $query->bindParam('idUser', $this->idUser, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }
        catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
            return;
        }
        
    }

    private function searchUser() {
        try {
            $db = new PDO('mysql:host=localhost;dbname=login', $this->usernameBd, $this->passwordBd);
            //$query = $db->prepare("SELECT * from tbLogin where nmLogin = '$this->user' and senha = '$this->pass';");
            $query = $db->prepare("SELECT * from tbLogin where nmLogin = :user and senha = :pass;");
            $query->bindParam('user', $this->user, PDO::PARAM_STR);
            $query->bindParam('pass', $this->pass, PDO::PARAM_STR);
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_ASSOC);
            if($query->rowCount() > 0) {
                $this->idUser = $data[0]['cdLogin'];
                return true;
            }
            else return false;
        }
        catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
            return;
        }
    }
}