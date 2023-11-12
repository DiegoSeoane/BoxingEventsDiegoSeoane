<div class="boxerMenu">
    <a href="index.php?load=editboxer">Edit Boxer</a>
    <a href="index.php?load=addboxer">Add Boxer</a>
</div>
<br><br>
<form action="index.php?load=modifyboxer" method="post" class="addBoxerForm">
    <h1>Modify boxer</h1><br>
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
    <button type="submit" name="submit">Modify</button>
</form>

<?php
    if(isset($_COOKIE['dniboxer'])){
    
    if (isset($_POST['submit'])) {
            $dniboxer = $_COOKIE['dniboxer'];
    try {
        $oper = new Operations();
        $boxer = new Boxer();
        $boxer->setDni($dniboxer);
        $boxer->setName($_POST['name']);
        $boxer->setSurname($_POST['surname']);
        $boxer->setWins($_POST['wins']);
        $boxer->setLosses($_POST['losses']);
        $boxer->setDraws($_POST['draws']);
        $oper->updateBoxer($boxer);
        echo '<p class="success">Modified</p>';
    } catch (PDOException $th) {
        $th->getMessage();
    }
    }
}else{
    echo '<p class="failed">ID not found</p>';
}
?>