<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once "lib/db_connection.php";
    require_once "ActivityDAOInterface.php";
    require_once "Activity.php";

    class ActivityDAO implements ActivityDAOInterface {

        public static function createActivity($activityInfo){
            $sql = "INSERT INTO activities(name,location,startTime,endTime,creator,participants,maxParticipants,active,description)
                    VALUES (?,?,?,?,?,?,?,?,?);";

            $conn = db_connect();

            $ps = $conn->prepare($sql);

            $ret = $ps->execute([$activityInfo["name"],
                          $activityInfo["location"],
                          $activityInfo["startTime"],
                          $activityInfo["endTime"],
                          $activityInfo["creator"],
                          $activityInfo["participants"],
                          $activityInfo["maxParticipants"],
                          $activityInfo["active"],
                          $activityInfo["description"]]);

            return $ret;
        }

        public static function userJoinActivity($user, $activity)
        {
            $activitySql = "UPDATE activities SET participants = (participants+1) WHERE id=?;";
            $participantSql = "INSERT INTO participants(activity_id,utorid) VALUES(?, ?);";

            $conn = db_connect();

            $conn->beginTransaction();

            try
            {
                $ps = $conn->prepare($activitySql);
                $ps->execute([$activity["id"]]);

                $ps = $conn->prepare($participantSql);
                $ps->execute([$activity["id"], $user["utorid"]]);

                $conn->commit();
                return true;
            } catch(Exception $e) {
                echo $e->getMessage();
                $conn->rollBack();
                return false;
            }
        }

        public static function getActivityById($id){
            $sql = "SELECT * FROM activities WHERE id=?;";

            $conn = db_connect();

            $ps = $conn->prepare($sql);

            $ret = $ps->execute([$id]);

            if($ret){
                return new Activity($ps->fetch());
            }

            return null;
        }

        public static function searchActivity($user, $name)
        {
            $sql = "SELECT * FROM activites WHERE name=?;";

            $conn = db_connect();

            $ps = $conn->prepare($sql);

            $ret = $ps->execute([$name]);

            if($ret) {
                $results = $ps->fetchAll();
                $retArray = [];

                foreach($results as $result){
                    array_push($retArray, new Activity($result));
                }

                return $retArray;
            }

            // Implement suggestions
            // And return the suggestions.
            return null;
        }

        public static function editActivity($user, $activityInfo)
        {
            $findActivitySql = "SELECT * FROM activities WHERE id=?;";
            $updateActivitySql = "UPDATE activities SET name=?, location=?, startTime=?, endTime=?,
                                 participants=?, maxParticipants=?, active=?, description=?
                                 WHERE id=?;";

            $conn = db_connect();

            $ps = $conn->prepare($findActivitySql);

            $ret = $ps->execute($activityInfo["id"]);

            if ($ret) {
                $ps = $conn->prepare($findActivitySql);

                $queryArgs = [
                      $activityInfo["name"],
                      $activityInfo["location"],
                      $activityInfo["startTime"],
                      $activityInfo["endTime"],
                      $activityInfo["participants"],
                      $activityInfo["maxParticipants"],
                      $activityInfo["active"],
                      $activityInfo["description"],
                      $activityInfo["id"]
                    ];

                $ret = $ps->execute($queryArgs);
            }

            return $ret;

        }

        public static function notifyChange($user, $activityInfo)
        {

        }
    }

?>
