<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Boxing Events</title>
</head>

<body>
    <header>
        <nav>
            <a href="index.php"><img src="https://plaam.s3.eu-central-1.amazonaws.com/despliegues/fgboxeo/logos/fgboxeo-logo.png" alt="logoFederacion" class="logoFederacion"></a>
            <a href="index.php?load=edit" class="headernav">Edit</a>
            <a href="index.php?load=boxers" class="headernav">Boxer List</a>
            <a href="index.php?load=fights" class="headernav">Fight List</a>
            <a href="index.php?load=events" class="headernav">Event List</a>
        </nav>
    </header>

    <?php
    include_once('operations.php');
    $oper = new Operations();

    try {
        if (isset($_GET['load'])) {
            $load = $_GET['load'];
            switch ($load) {
                case 'edit':
                    include('edit.php');
                    break;
                case 'boxers':
                    include('boxers.php');
                    break;
                case 'fights':
                    include('fights.php');
                    break;
                case 'events':
                    include('events.php');
                    break;
                case 'editboxer':
                    include('editboxer.php');
                    break;
                case 'getboxer':
                    include('getboxer.php');
                    break;
                case 'deleteboxer':
                    include('deleteboxer.php');
                    break;
                case 'modifyboxer':
                    include('modifyboxer.php');
                    break;
                case 'addboxer':
                    include('addboxer.php');
                    break;
            }
        }
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    } catch (Exception $ex) {
        echo $ex->getMessage();
    } finally {
        $oper->closeConnection();
    }
    ?>
</body>

</html>