<?php
include('classes.php');
    class Operations{
        private $conn;
        function openConnection(){            
            $server = 'localhost';
            $user = 'boxeruser';            
            $dbname = 'boxingevents';
            $pass = 'abc123.';
            $this->conn = new PDO("mysql:host=$server;dbname=$dbname", $user, $pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        function closeConnection(){
            $this->conn = null;
        }
        function __construct()
        {
            $this->openConnection();
        }
    
        //Boxer Operations

        function addBoxer(Boxer $boxer){
            $this->conn->beginTransaction();
            $statement = $this->conn->prepare('insert into Boxer(dni, name, surname, wins, losses, draws) 
            values(?,?,?,?,?,?)');
            $dni= $boxer->getDni();
            $name= $boxer->getName();
            $surname= $boxer->getSurname();
            $wins= $boxer->getWins();
            $losses= $boxer->getLosses();
            $draws= $boxer->getDraws();
            $statement->execute([$dni,$name,$surname,$wins,$losses,$draws]);
            $numRows = $statement->rowCount();
            $this->conn->commit();
            return $numRows;
            
        }
        function getBoxer($dni){
            $query = $this->conn->prepare('select dni, name, surname, wins, losses, draws from Boxer where dni = ?');
            $query->execute([$dni]);
            $box = $query->fetchObject('Boxer');
            return $box;
        }
        function deleteBoxer($dni){            
            echo $dni;
            $query = $this->conn->prepare('delete from Boxer where dni = ?');
            $query->execute([$dni]);            
            $deletedRows= $query->rowCount();
            return $deletedRows;
        }
        function updateBoxer(Boxer $boxer){
            $query = $this->conn->prepare('update Boxer set name = ?, surname = ?, wins = ?, losses = ?, draws = ? where dni = ?');
            $query->execute([$boxer->getName(),$boxer->getSurname(),$boxer->getWins(),$boxer->getLosses(),$boxer->getDraws(),$boxer->getDni()]);            
            $updated= $query->rowCount();
            return $updated;
        }
    
        function boxerList(){            
            $query = $this->conn->prepare('select dni, name, surname, wins, losses, draws from Boxer');
            $query->execute();
            $boxerList = array();
            while ($boxer = $query->fetchObject('Boxer')) {
                $boxerList[]=$boxer;
            }
            return $boxerList;
        }
        //Fight Operations

        function addFight(Fight $fight){
            $this->conn->beginTransaction();
            $statement = $this->conn->prepare('insert into Fight(blueCorner, redCorner, winner) 
            values(?,?,?)');
            $blue= $fight->getBlueCorner();
            $red= $fight->getRedCorner();
            $winner= $fight->getWinner();
            $statement->execute([$blue,$red,$winner]);
            $numRows = $statement->rowCount();
            $this->conn->commit();
            return $numRows;
        }
        function getFight($id){
            $query = $this->conn->prepare('select blueCorner, redCorner, winner from Fight where fightID = ?');
            $query->execute([$id]);
            $fight = $query->fetchObject('Fight');
            return $fight;
        }
        function deleteFight($id){
            $query = $this->conn->prepare('delete from Fight where fightID=?');
            $query->execute([$id]);
            $deletedRows= $query->rowCount();
            return $deletedRows;
        }
        function updateFight(Fight $fight){
            $query = $this->conn->prepare('update Fight set blueCorner = ?, redCorner = ?, winner = ? where fightID = ?');
            $query->excecute([$fight->getBlueCorner(),$fight->getRedCorner(),$fight->getWinner(), $fight->getFightID()]);            
            $updated= $query->rowCount();
            return $updated;
        }
        function fightList(){            
            $query = $this->conn->prepare('select fightID, blueCorner, redCorner, winner from Fight');
            $query->execute();
            $fightList = array();
            while ($fight = $query->fetchObject('Fight')) {
                $fightList[]=$fight;
            }
            return $fightList;
        }

        //Event Operations

        function addEvent(Event $event){
            $this->conn->beginTransaction();
            $statement = $this->conn->prepare('insert into Event(eventname, fight, spectators) 
            values(?,?,?)');
            $name= $event->getEventName();
            $fights= $event->getFights();
            $spectators= $event->getSpectators();
            $statement->execute([$name,$fights,$spectators]);
            $numRows = $statement->rowCount();
            $this->conn->commit();
            return $numRows;
        }
        function getEvent($eventID){
            $query = $this->conn->prepare('select eventID, eventname, fight, spectators from Event where eventID = ?');
            $query->execute([$eventID]);            
            $event = $query->fetchObject('Event');
            return $event;
        }
        function deleteEvent($id){
            $query = $this->conn->prepare('delete from Fight where eventID=?');
            $query->execute([$id]);
            $deletedRows= $query->rowCount();
            return $deletedRows;
        }
        function updateEvent(Event $event){
            $query = $this->conn->prepare('update Event set eventname = ?, fight = ?, spectators = ? where eventID = ?');
            $query->excecute([$event->getEventName(),$event->getFights(),$event->getSpectators(), $event->getEventID()]);            
            $updated= $query->rowCount();
            return $updated;
        }
        function eventList(){            
            $query = $this->conn->prepare('select eventID, eventname, fight ,spectators from Event');            
            $query->execute();
            $eventList = array();
            while ($event = $query->fetchObject('Event')) {
                $eventList[]=$event;                
            }            
            return $eventList;
        }  
    }
?>