<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once "lib/db_connection.php";
    require_once "UserDAOInterface.php";
    require_once "User.php";

    class UserDAO implements UserDAOInterface {

        public static function createUser($userInput){
            $hashedPassword = hash('md5',$userInput["password"]);

            $sql = "INSERT INTO users(utorid,password,email,name,dateOfBirth) VALUES (?,?,?,?,?);";

            $conn = db_connect();

            $ps = $conn->prepare($sql);
            $ret = $ps->execute([$userInput["utorid"],
                          $hashedPassword,
                          $userInput["email"],
                          $userInput["name"],
                          $userInput["dateOfBirth"]]);

            return $ret;
        }

        public static function resetPassword($utorid, $password){
            // TODO: Implement resetPassword by sending an email
        }

        public static function login($utorid, $password){
            $hashedPassword = hash('md5',$password);

            $sql = "SELECT * FROM users WHERE utorid=? AND password=?;";

            $conn = db_connect();

            $ps = $conn->prepare($sql);
            $ret = $ps->execute([$utorid,$hashedPassword]);

            if($ret){
                $results = $ps->fetchAll();
                if(count($results) == 1){
                    unset($results["password"]);
                    return new User($results[0]);
                }
            }
            return null;
        }

        public static function getActivities($userid)
        {
            $query = "SELECT activity_id FROM participants WHERE utorid=?;";

            $conn = db_connect();

            $ps = $conn->prepare($query);

            $ret = $ps->execute([$userid]);

            if ($ret) {
                return $ps->fetchAll();
            }
            return null;
        }

        /*
        $inputs = ["utorid" => "Hey",
                    "password" => "computer",
                    "email" => "jas@jas.ca",
                    "name" => "Jas",
                    "dateOfBirth" => "01/01/2011"];

        var_dump($inputs);

        UserDAO::createUser($inputs);
        */


        // var_dump(UserDAO::login("Hey","computer"));

    }

?>
