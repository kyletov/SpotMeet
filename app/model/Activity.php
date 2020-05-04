<?php

    class Activity {

        private $id;
        private $name;
        private $location;
        private $startTime;
        private $endTime;
        private $creator;
        private $participants;
        private $maxParticipants;
        private $active;
        private $description;

        public function __construct($activityInfo){
            $this->id = $activityInfo["id"];
            $this->name = $activityInfo["name"];
            $this->location = $activityInfo["location"];
            $this->startTime = $activityInfo["starttime"];
            $this->endTime = $activityInfo["endtime"];
            $this->creator = $activityInfo["creator"];
            $this->participants = $activityInfo["participants"];
            $this->maxParticipants = $activityInfo["maxparticipants"];
            $this->active = $activityInfo["active"];
            $this->description = $activityInfo["description"];
        }

        public function getId(){
            return $this->id;
        }

        public function getName(){
            return $this->name;
        }

        public function getLocation(){
            return $this->location;
        }

        public function getstartTime(){
            return $this->startTime;
        }

        public function getEndtime(){
            return $this->endTime;
        }

        public function getCreator(){
            return $this->creator;
        }

        public function getParticipants(){
            return $this->participants;
        }

        public function getMaxparticipants(){
            return $this->maxParticipants;
        }

        public function getActive(){
            return $this->active;
        }

        public function getDescription(){
            return $this->description;
        }


    }




?>
