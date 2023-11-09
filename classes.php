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
        private $eventName;
        private Fight $fight;
        private $spectators;

        public function getEventName() {
                return $this->eventName;
        }

        public function setEventName($eventName): self {
                $this->eventName = $eventName;
                return $this;
        }

        /**
         * Get the value of fight
         *
         * @return Fight
         */
        public function getFight(): Fight {
                return $this->fight;
        }

        /**
         * Set the value of fight
         *
         * @param Fight $fight
         *
         * @return self
         */
        public function setFight(Fight $fight): self {
                $this->fight = $fight;
                return $this;
        }

        public function getSpectators() {
                return $this->spectators;
        }

        public function setSpectators($spectators): self {
                $this->spectators = $spectators;
                return $this;
        }

        /**
         * Get the value of eventID
         */
        public function getEventID() {
                return $this->eventID;
        }

        /**
         * Set the value of eventID
         */
        public function setEventID($eventID): self {
                $this->eventID = $eventID;
                return $this;
        }
    }
?>