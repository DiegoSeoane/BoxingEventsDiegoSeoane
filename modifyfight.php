<div class="boxerMenu">
    <a href="index.php?load=editfight">Edit Fight</a>
    <a href="index.php?load=addfight">Add Fight</a>
</div>
<br><br>
<form action="index.php?load=modifyfight" method="post" class="addBoxerForm">
    <h1>Modify Fight</h1><br>
    <label for="idblue">Blue Corner</label><br>
    <input type="text" id="idblue" name="blue">
    <br>
    <br>
    <label for="idred">Red Corner</label><br>
    <input type="text" id="idred" name="red"><br>
    <br>
    <label for="idwinner">Winner</label><br>
    <input type="text" id="idwinner" name="winner"><br>
    <br><br>
    <button type="submit" name="submit">Add</button>
</form>

<?php
if (isset($_COOKIE['fightid'])) {

    if (isset($_POST['submit'])) {
        $fightid = $_COOKIE['fightid'];
        try {
            $oper = new Operations();
            $fight = new Fight();
            $fight->setFightID($fightid);
            $fight->setBlueCorner($_POST['blue']);
            $fight->setRedCorner($_POST['red']);
            $fight->setWinner($_POST['winner']);
            $oper->updateFight($fight);
        } catch (PDOException $th) {
            $th->getMessage();
        }
    }
} else {
    echo 'ID no encontrado';
}
?>