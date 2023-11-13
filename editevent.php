<div class="boxerMenu">
    <a href="index.php?load=editevent">Edit Event</a>
    <a href="index.php?load=addevent">Add Event</a>
</div>
<br>
<form method="post" action="index.php?load=editevent" class="dniInp">
    <label for="eventid">Insert Event ID</label> <br> <br>
    <input type="text" name="eventid" id="eventid">
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
        $numRow = $oper->deleteEvent($_POST['eventid']);
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
    if ($numRow == 1) {
        echo '<p class="success">Eliminated</p>';
    } else {
        echo '<p class="failed">ID not found</p>';
    }
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['delete'])) {
        display();
        $event = $oper->getEvent($_POST['eventid']);
    }
    if (isset($_POST['submit'])) {
        $oper->openConnection();
        $eventid = $_POST['eventid'];
        setcookie('eventid', $eventid);
        $event = $oper->getEvent($_POST['eventid']);
        $_SESSION['eventname'] = $event->getEventname();
        $_SESSION['nfight'] = $event->getFights();
        $_SESSION['specs'] = $event->getSpectators();
        if ($event != null) {
            echo '<br><table class="tabbox"> 
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Number of Fights</th>
                    <th>Spectators</th>
                    <th>ID</th>
                 </tr>
            </thead>
                <tbody>
                <tr>
                    <td>' . $event->getEventname() . '</td>
                    <td>' . $event->getFights() . '</td>
                    <td>' . $event->getSpectators() . '</td>
                    <td>' . $event->getEventID() . '</td>
                </tr>                        
            </tbody>
            </table>
            <div class="modifyForm">
                    <form method="post" action="index.php?load=modifyevent" class="modifyForm">
                        <button type="submit">Modify</button>
                    </form>
                </div>
        <br>
        ';
        } else {
            echo '<p class="failed">Event not found</p>';
        }
    }
}


?>