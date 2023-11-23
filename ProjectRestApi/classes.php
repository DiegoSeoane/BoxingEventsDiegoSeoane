<?php

class Boxer implements JsonSerializable{
        private $dni;
        private $name;
        private $surname;
        private $wins;
        private $losses;
        private $draws;

        public function jsonSerialize(): mixed{
                return [
                    'DNI' => $this->getDni(),
                    'Name' => $this->getName(),
                    'Surname' => $this->getSurname(),
                    'Wins' => $this->getWins(),
                    'Losses' => $this->getLosses(),
                    'Draws' => $this->getDraws(),
                ];
            }
        public function getDni()
        {
                return $this->dni;
        }

        public function setDni($dni): self
        {
                $this->dni = $dni;
                return $this;
        }

        public function getName()
        {
                return $this->name;
        }

        public function setName($name): self
        {
                $this->name = $name;
                return $this;
        }

        public function getSurname()
        {
                return $this->surname;
        }

        public function setSurname($surname): self
        {
                $this->surname = $surname;
                return $this;
        }

        public function getWins()
        {
                return $this->wins;
        }

        public function setWins($wins): self
        {
                $this->wins = $wins;
                return $this;
        }

        public function getLosses()
        {
                return $this->losses;
        }

        public function setLosses($losses): self
        {
                $this->losses = $losses;
                return $this;
        }

        public function getDraws()
        {
                return $this->draws;
        }

        public function setDraws($draws): self
        {
                $this->draws = $draws;
                return $this;
        }
}
