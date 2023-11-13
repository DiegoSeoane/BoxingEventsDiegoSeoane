<?php
    session_start();
?>
<div class="boxerMenu">
    <a href="index.php?load=editevent">Edit Event</a>
    <a href="index.php?load=addevent">Add Event</a>
</div>
<br>
<form action="index.php?load=modifyevent" method="post" class="addBoxerForm">
    <h1>Modify Event</h1><br>
    <label for="evname">Name</label><br>
    <input type="text" id="evname" name="evname" value="<?php echo $_SESSION['eventname']?>">
    <br>
    <br>
    <label for="nfights">Number of Fights</label><br>
    <input type="text" id="nfights" name="nfights" value="<?php echo $_SESSION['nfight']?>"><br>
    <br>
    <label for="specs">Spectators</label><br>
    <input type="text" id="specs" name="specs" value="<?php echo $_SESSION['specs']?>"><br>
    <br><br>
    <button type="submit" name="submit">Modify</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_COOKIE['eventid'])) {
        if (isset($_POST['submit'])) {
            $eventid = $_COOKIE['eventid'];
            try {
                $oper = new Operations();
                $event = new Event();
                $event->setEventID($eventid);
                $event->setEventname($_POST['evname']);
                $event->setFights($_POST['nfights']);
                $event->setSpectators($_POST['specs']);
                $oper->updateEvent($event);
                echo '<p class="success">Modified</p>';
            } catch (PDOException $th) {
                $th->getMessage();
            }
        }
    } else {
        echo '<p class="failed">ID not found</p>';
    }
}
?>