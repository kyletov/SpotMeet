<?php

    interface UserDAOInterface {

        public static function createUser($userInput);

        public static function resetPassword($utorid, $password);

        public static function login($utorid, $password);

        public static function getActivities($userid);
    }

?>
