<?php
include('classes.php');
    class Operations{
        private PDO $conn;
        public function __construct(Database $database)
        {
            $this->conn = $database->getConnection();
        }

        function closeConnection(){
            $this->conn = null;
        }

        function addBoxer(array $data){
            $sql = "INSERT INTO Boxer (dni, name, surname, wins, losses, draws) 
            VALUES(:dni, :name, :surname, :wins, :losses, :draws)";

            $stmt = $this->conn->prepare($sql);
            
            $stmt->bindValue(":dni", $data["dni"], PDO::PARAM_STR);
            $stmt->bindValue(":name", $data["name"], PDO::PARAM_STR);
            $stmt->bindValue(":surname", $data["surname"], PDO::PARAM_STR);
            $stmt->bindValue(":wins", $data["wins"], PDO::PARAM_INT);
            $stmt->bindValue(":losses", $data["losses"], PDO::PARAM_INT);
            $stmt->bindValue(":draws", $data["draws"], PDO::PARAM_INT);            
    
            $stmt->execute();
    
            return $this->conn->lastInsertId();       
        } 
        function getBoxer($dni)
        {
            $sql = "SELECT * FROM Boxer WHERE dni = :dni";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindValue(":dni", $dni, PDO::PARAM_STR);
            $stmt->execute();
            $data = $stmt->fetch(PDO::FETCH_ASSOC);               
            return $data;
        } 
        function deleteBoxer($dni){
            $sql = "DELETE FROM Boxer
                    WHERE dni = :dni";
    
            $stmt = $this->conn->prepare($sql);
    
            $stmt->bindValue(":dni", $dni, PDO::PARAM_STR);
    
            $stmt->execute();
    
            return $stmt->rowCount();
        }
        function updateBoxer(array $current, $new):int{
            $sql = "UPDATE Boxer
            SET name = :name, surname = :surname, wins = :wins, losses = :losses, draws = :draws
            WHERE dni = :dni";            
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(":dni", $new["dni"] ?? $current["dni"], PDO::PARAM_STR);
        $stmt->bindValue(":name", $new["name"] ?? $current["name"], PDO::PARAM_STR);
        $stmt->bindValue(":surname", $new["surname"] ?? $current["surname"], PDO::PARAM_STR);
        $stmt->bindValue(":wins", $new["wins"] ?? $current["wins"], PDO::PARAM_INT);
        $stmt->bindValue(":losses", $new["losses"] ?? $current["losses"], PDO::PARAM_INT);
        $stmt->bindValue(":draws", $new["draws"] ?? $current["draws"], PDO::PARAM_INT);

        $stmt->execute();

        return $stmt->rowCount();
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
    }
?>