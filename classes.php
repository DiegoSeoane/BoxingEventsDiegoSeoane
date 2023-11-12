<?php
    class Boxer{
        private $dni;
        private $name;
        private $surname;
        private $wins;
        private $losses;
        private $draws;

        public function getDni() {
                return $this->dni;
        }

        public function setDni($dni): self {
                $this->dni = $dni;
                return $this;
        }

        public function getName() {
                return $this->name;
        }

        public function setName($name): self {
                $this->name = $name;
                return $this;
        }

        public function getSurname() {
                return $this->surname;
        }

        public function setSurname($surname): self {
                $this->surname = $surname;
                return $this;
        }

        public function getWins() {
                return $this->wins;
        }

        public function setWins($wins): self {
                $this->wins = $wins;
                return $this;
        }

        public function getLosses() {
                return $this->losses;
        }

        public function setLosses($losses): self {
                $this->losses = $losses;
                return $this;
        }

        public function getDraws() {
                return $this->draws;
        }

        public function setDraws($draws): self {
                $this->draws = $draws;
                return $this;
        }
    }

    class Fight{
        private $fightID;
        private $blueCorner;
        private $redCorner;
        private $winner;

        public function getFightID() {
                return $this->fightID;
        }

        public function setFightID($fightID): self {
                $this->fightID = $fightID;
                return $this;
        }

        public function getBlueCorner() {
                return $this->blueCorner;
        }

        public function setBlueCorner($blueCorner): self {
                $this->blueCorner = $blueCorner;
                return $this;
        }

        public function getRedCorner() {
                return $this->redCorner;
        }

        public function setRedCorner($redCorner): self {
                $this->redCorner = $redCorner;
                return $this;
        }

        public function getWinner() {
                return $this->winner;
        }

        public function setWinner($winner): self {
                $this->winner = $winner;
                return $this;
        }
    }
    class Event{
        private $eventID;
        private $eventname;
        private $fight;
        private $spectators;

        /**
         * Get the value of eventID
         */ 
        public function getEventID()
        {
                return $this->eventID;
        }

        /**
         * Set the value of eventID
         *
         * @return  self
         */ 
        public function setEventID($eventID)
        {
                $this->eventID = $eventID;

                return $this;
        }

        /**
         * Get the value of eventname
         */ 
        public function getEventname()
        {
                return $this->eventname;
        }

        /**
         * Set the value of eventname
         *
         * @return  self
         */ 
        public function setEventname($eventname)
        {
                $this->eventname = $eventname;

                return $this;
        }

        /**
         * Get the value of spectators
         */ 
        public function getSpectators()
        {
                return $this->spectators;
        }

        /**
         * Set the value of spectators
         *
         * @return  self
         */ 
        public function setSpectators($spectators)
        {
                $this->spectators = $spectators;

                return $this;
        }

        /**
         * Get the value of fights
         */ 
        public function getFights()
        {
                return $this->fight;
        }

        /**
         * Set the value of fights
         *
         * @return  self
         */ 
        public function setFights($fight)
        {
                $this->fight = $fight;

                return $this;
        }
}
?>