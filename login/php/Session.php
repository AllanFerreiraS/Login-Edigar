<?php
    class Session {
        private $username;
        private $password;

        public function startSession() {
            session_start();
            if(!$this->exist()) return;
            $this->username = $_SESSION['user'];
            $this->password = $_SESSION['pass'];
        }

        public function createSession($u, $p) {
            session_start();
            $_SESSION['user'] = $u;
            $_SESSION['pass'] = $p;
        }

        public function destroySession (){
            if(!$this->exist()) return;
            unset($_SESSION['user']);
            unset($_SESSION['pass']);
        }

        public function getUsername() {
            if(!$this->exist()) return;
            else return $this->username;
        }
        
        public function getPassword() {
            if(!$this->exist()) return;
            else return $this->password;
        }

        public function exist() {
            if(!isset($_SESSION['user'])) return false;
            else return true;
        }
    }
?>