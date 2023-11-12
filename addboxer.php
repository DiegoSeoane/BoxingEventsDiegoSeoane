<div class="boxerMenu">
    <a href="index.php?load=editboxer">Edit Boxer</a>
    <a href="index.php?load=addboxer">Add Boxer</a>
</div>

<br>
<form method="post" action="index.php?load=addboxer" class="addBoxerForm">

    <h1>Add a new boxer</h1><br>
    <label for="idDNI">DNI</label><br>
    <input type="text" id="idDNi" name="dni">
    <br>
    <br>
    <label for="idName">Name</label><br>
    <input type="text" id="idName" name="name"><br>
    <br>
    <label for="idSurname">Surname</label><br>
    <input type="text" id="idSurname" name="surname"><br>
    <br>
    <label for="idWins">Wins</label><br>
    <input type="text" id="idWins" name="wins"><br>
    <br>
    <label for="idLosses">Losses</label><br>
    <input type="text" id="idLosses" name="losses"><br>
    <br>
    <label for="idDraws">Draws</label><br>
    <input type="text" id="idDraws" name="draws"><br>
    <br><br>
    <button type="submit" name="submit">Add</button>
</form>
<?php
function display()
{
    try {
        $oper = new Operations();
        $boxer = new Boxer();
        $boxer->setDNI($_POST['dni']);
        $boxer->setName($_POST['name']);
        $boxer->setSurname($_POST['surname']);
        $boxer->setWins($_POST['wins']);
        $boxer->setLosses($_POST['losses']);
        $boxer->setDraws($_POST['draws']);        
        $numRow = $oper->addBoxer($boxer);
        if ($numRow == 1) {
            echo '<p>Added successfully</p>';
        } else {
            echo '<p>Error</p>';
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
if (isset($_POST['submit'])) {
    display();
}
?>