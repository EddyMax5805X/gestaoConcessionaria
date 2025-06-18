<?php 
    class User {
        private $id;
        private $name;
        private $surname;
        private $username;
        private $email;
        private $password;

        public function __construct($id, $name, $surname, $username, $email, $password) {
            $this->id = $id;
            $this->name = $name;
            $this->surname = $surname;
            $this->username = $username;
            $this->email = $email;
            $this->password = password_hash($password, PASSWORD_DEFAULT);
        }
        
        public function getId() {
            return $this->id;
        }
        public function getName() {
            return $this->name;
        }
        public function getSurname() {
            return $this->surname;
        }
        public function getUsername() {
            return $this->username;
        }
        public function getEmail() {
            return $this->email;
        }
        public function getPassword() {
            return $this->password;
        }
        public function setName($name) {
            $this->name = $name;
        }
        public function setSurname($surname) {
            $this->surname = $surname;
        }
        public function setUsername($username) {
            $this->username = $username;
        }
        public function setEmail($email) {
            $this->email = $email;
        }
        public function setPassword($password) {
            $this->password = password_hash($password, PASSWORD_DEFAULT);
        }
    }
?>