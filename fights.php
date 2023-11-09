<br>
<table class="tabbox">
    <thead>
        <tr>
            <th>Blue Corner</th>
            <th>Red Corner</th>
            <th>Winner</th>
        </tr>
    </thead>
    <tbody>
        <?php        
            $fightList = $oper->fightList();            
            foreach ($fightList as $fight) {
                echo '<tr>
                <td>' . $fight->getBlueCorner() .'</td>
                <td>' . $fight->getRedCorner() . '</td>
                <td>' . $fight->getWinner() . '</td>
                </tr>';
            }
        ?>
    </tbody>
</table>