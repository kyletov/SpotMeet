<?php

    interface ActivityDAOInterface {

        public static function createActivity($activityInfo);

        public static function userJoinActivity($user, $activity);

        public static function getActivityById($id);

        public static function searchActivity($user, $name);

        public static function editActivity($user, $activityInfo);

        public static function notifyChange($user, $activityInfo);

    }

?>
