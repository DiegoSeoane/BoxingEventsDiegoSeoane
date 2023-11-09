<br>
<table class="tabbox">
    <thead>
        <tr>
            <th>Boxers</th>
            <th>Wins</th>
            <th>Losses</th>
            <th>Draws</th>
            <th>DNI</th>
        </tr>
    </thead>
    <tbody>
        <?php        
            $boxerList = $oper->boxerList();            
            foreach ($boxerList as $boxer) {
                echo '<tr>
                <td>' . $boxer->getName(). ' ' . $boxer->getSurname() .'</td>
                <td>' . $boxer->getWins() . '</td>
                <td>' . $boxer->getLosses() . '</td>
                <td>' . $boxer->getDraws() . '</td>
                <td>' . $boxer->getDNI() . '</td>
                </tr>';
            }
        ?>
    </tbody>
</table>