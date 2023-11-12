<br>
<table class="tabbox">
    <thead>
        <tr>
            <th>Name</th>
            <th>Number of<br>Fights</th>
            <th>Spectators</th>
        </tr>
    </thead>
    <tbody>
        <?php                    
            $eventList = $oper->eventList();            
            foreach ($eventList as $event) {
                echo '<tr>
                <td>' . $event->getEventName() .'</td>
                <td>' . $event->getFights() . '</td>
                <td>' . $event->getSpectators() . '</td>
                </tr>';
            }
        ?>
    </tbody>
</table>
<div class="editInList">
<a href="index.php?load=editevent">Edit Events</a>
</div>