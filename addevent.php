<div class="boxerMenu">
    <a href="index.php?load=editevent">Edit Event</a>
    <a href="index.php?load=addevent">Add Event</a>
</div>
<br>
<form method="post" action="index.php?load=addevent" class="addBoxerForm">

    <h1>Add a new Event</h1><br>
    <label for="evname">Name</label><br>
    <input type="text" id="evname" name="evname">
    <br>
    <br>
    <label for="nfights">Number of Fights</label><br>
    <input type="text" id="nfights" name="nfights"><br>
    <br>
    <label for="specs">Spectators</label><br>
    <input type="text" id="specs" name="specs"><br>
    <br><br>
    <button type="submit" name="submit">Add</button>
</form>
<?php
function display()
{
    try {
        $oper = new Operations();
        $event = new Event();
        $event->setEventname($_POST['evname']);
        $event->setFights($_POST['nfights']);
        $event->setSpectators($_POST['specs']);
        $numRow = $oper->addEvent($event);
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