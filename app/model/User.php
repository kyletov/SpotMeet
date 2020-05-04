<?php

    class User {

        private $utorid;
        private $name;
        private $dateOfBirth;
        private $dateJoined;

        public function __construct($userInfoArray){
            $this->utorid = $userInfoArray["utorid"];
            $this->name = $userInfoArray["name"];
            $this->dateOfBirth = $userInfoArray["dateofbirth"];
            $this->dateJoined = $userInfoArray["datejoined"];
        }

        public function getName(){
            return $this->name;
        }

        public function getUtorid(){
            return $this->utorid;
        }

        public function getDateOfBirth(){
            return $this->dateOfBirth;
        }

        public function getDateJoined(){
            return $this->dateJoined;
        }

        public function getActivites() {
            return UserDAO::getActivities($this->utorid);
        }

    }



?>
