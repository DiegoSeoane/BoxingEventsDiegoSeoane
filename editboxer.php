    <div class="boxerMenu">
        <a href="index.php?load=editboxer">Edit Boxer</a>
        <a href="index.php?load=addboxer">Add Boxer</a>
    </div>
    <br><br>
    <form method="post" action="index.php?load=editboxer" class="dniInp">
        <label for="dni">Insert Boxer's DNI</label> <br> <br>
        <input type="text" name="dni" id="iddni">
        <button type="submit" name="submit">Buscar</button>
        <button type="submit" name="delete">Delete</button>
    </form>
    <?php
    function display()
    {
        $numRow = 0;
        try {
            $oper = new Operations();
            $numRow = $oper->deleteBoxer($_POST['dni']);  
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
        if ($numRow == 1) {
            echo '<p class="success">Eliminated</p>';
        } else {
            echo '<p class="success">Error</p>';
        }
    }

    if (isset($_POST['delete'])) {
        display();
        $boxer = $oper->getBoxer($_POST['dni']);
    }
    if (isset($_POST['submit'])) {
        $boxer = $oper->getBoxer($_POST['dni']);
        echo '<br><table class="tabbox"> 
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
                <tr>
                        <td>' . $boxer->getName() . ' ' . $boxer->getSurname() . '</td>
                        <td>' . $boxer->getWins() . '</td>
                        <td>' . $boxer->getLosses() . '</td>
                        <td>' . $boxer->getDraws() . '</td>
                        <td>' . $boxer->getDNI() . '</td>
                        </tr>
                        
            </tbody>
            </table>
            <div class="modifyForm">
                    <form method="post" action="index.php?load=modifyboxer" class="modifyForm">
                        <button type="submit">Modify</button>
                    </form>
                </div>
        <br>
        ';
    
    }
    

    ?>