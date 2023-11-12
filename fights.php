<br>
<table class="tabbox">
    <thead>
        <tr>
            <th>Blue Corner</th>
            <th>Red Corner</th>
            <th>Winner</th>
            <th>ID</th>
        </tr>
    </thead>
    <tbody>
        <?php        
            $fightList = $oper->fightList();                  
            foreach ($fightList as $fight) {
                $blueCorner = $fight->getBlueCorner();
                $redCorner = $fight->getRedCorner();                
                $blue = $oper->getBoxer($blueCorner);
                $red = $oper->getBoxer($redCorner);
                echo '<tr>
                <td>' . $blue->getName() . ' '. $blue->getSurname() . '</td>
                <td>' . $red->getName() . ' '. $red->getSurname() . '</td>
                <td>' . $fight->getWinner() . '</td>
                <td>' . $fight->getFightID() . '</td>
                </tr>';
            }
            /*cambiar en base de datos as peleas a int, sen foreing key*/
        ?>
    </tbody>
</table>
<div class="editInList">
<a href="index.php?load=editfight">Edit Fights</a>
</div>