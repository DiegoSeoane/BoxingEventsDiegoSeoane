<br>
<table class="tabbox">
    <thead>
        <tr>
            <th>Name</th>
            <th>Fights</th>
            <th>Spectators</th>
        </tr>
    </thead>
    <tbody>
        <?php        
            $eventList = $oper->eventList();            
            foreach ($eventList as $event) {
                echo '<tr>
                <td>' . $event->getEventName() .'</td>
                <td>' . $event->getFight() . '</td>
                <td>' . $event->getSpectators() . '</td>
                </tr>';
            }
        ?>
    </tbody>
</table>