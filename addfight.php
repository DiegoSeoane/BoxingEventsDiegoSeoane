<div class="boxerMenu">
    <a href="index.php?load=editfight">Edit Fight</a>
    <a href="index.php?load=addfight">Add Fight</a>
</div>
<br>
<form method="post" action="index.php?load=addfight" class="addBoxerForm">

    <h1>Add a new fight</h1><br>
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
function display()
{
    try {
        $oper = new Operations();
        $fight = new Fight();
        $fight->setBlueCorner($_POST['blue']);
        $fight->setRedCorner($_POST['red']);
        $fight->setWinner($_POST['winner']);
        $numRow = $oper->addFight($fight);
        if ($numRow == 1) {
            echo '<p class="success">Added successfully</p>';
        } else {
            echo '<p class="failed">Error</p>';
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['submit'])) {
        display();
    }
}
?>