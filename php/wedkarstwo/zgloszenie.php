<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <?php
        $host = 'localhost';
        $user = 'root';
        $password = '';
        $dbname = 'wedkarstwo';
    $conn = new mysqli($host, $user, $password, $dbname);

    $Lowisko = $_POST['Lowisko'];
    $Data = $_POST['Data'];
    $Sedzia = $_POST['Sedzia'];
    $sql = "INSERT INTO `zawody_wedkarskie` (`id`, `Karty_wedkarskie_id`, `Lowisko_id`, `data_zawodow`, `sedzia`)
        VALUES (NULL, '2', '$Lowisko', '$Data', '$Sedzia')";
    $query = mysqli_query($conn, $sql);
    $conn -> close();
        ?>
    </body>
</html>
