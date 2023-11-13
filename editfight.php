<div class="boxerMenu">
    <a href="index.php?load=editfight">Edit Fight</a>
    <a href="index.php?load=addfight">Add Fight</a>
</div>
<br><br>
<form method="post" action="index.php?load=editfight" class="dniInp">
    <label for="fightid">Insert Fight ID</label> <br> <br>
    <input type="text" name="fightid" id="fightid">
    <button type="submit" name="submit">Search</button>
    <button type="submit" name="delete">Delete</button>
</form>
<?php
session_start();
$oper->closeConnection();
function display()
{
    $numRow = 0;
    try {
        $oper = new Operations();
        $numRow = $oper->deleteFight($_POST['fightid']);
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
    if ($numRow == 1) {
        echo '<p class="success">Eliminated</p>';
    } else {
        echo '<p class="success">ID not found</p>';
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['delete'])) {
        display();
        $fight = $oper->getFight($_POST['fightid']);
    }
    if (isset($_POST['submit'])) {
        $oper->openConnection();
        $fightid = $_POST['fightid'];
        setcookie('fightid', $fightid);
        $fight = $oper->getFight($_POST['fightid']);
        $_SESSION['blue'] = $fight->getBlueCorner();
        $_SESSION['red'] = $fight->getRedCorner();
        $_SESSION['winner'] = $fight->getWinner();
        if ($fight != null) {
            echo '<br><table class="tabbox"> 
            <thead>
                <tr>
                    <th>Blue Corner</th>
                    <th>Red Corner</th>
                    <th>Winner</th>
                 </tr>
            </thead>
                <tbody>
                <tr>
                    <td>' . $fight->getBlueCorner() . '</td>
                    <td>' . $fight->getRedCorner() . '</td>
                    <td>' . $fight->getWinner() . '</td>
                </tr>
                        
            </tbody>
            </table>
            <div class="modifyForm">
                    <form method="post" action="index.php?load=modifyfight" class="modifyForm">
                        <button type="submit">Modify</button>
                    </form>
                </div>
        <br>
        ';
        } else {
            echo '<p class="failed">Fight not found</p>';
        }
    }
}

?>