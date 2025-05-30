<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Poziomy rzek</title>
    <link rel="stylesheet" href="styl.css">

</head>
<body>
    <header class="header1">
        <img src="obraz1.png" alt="Mapa Polski">
    </header>
    <header class="header2">
        <h1>Rzeki w województwie
            dolnośląskim</h1>
    </header>
    <menu>
        <form method="POST" action="">
        <input type="radio" name="radjo" id="1" value="1"> <label for="1">Wszystkie</label>
        <input type="radio" name="radjo" id="2" value="2"> <label for="2">Ponad stan ostrzegawczy</label>
        <input type="radio" name="radjo" id="3" value="3"> <label for="3">Ponad stan alarmowy</label>
        <input type="submit" value="Pokaż">
        </form>
    </menu>
    <section class="lewy">
        <h3>Stany na dzień 2022-05-05</h3>
        <table>
            <tr>
                <th>Wodomierz</th>
                <th>Rzeka</th>
                <th>Ostrzegawczy</th>
                <th>Alarmowy</th>
                <th>Aktualny</th>
                </tr>
                <?php 
                $host = 'localhost';
                $user = 'root';
                $pass = '';
                $dbname = 'rzeki';
                $conn = mysqli_connect($host, $user, $pass, $dbname);
                 if(isset($_POST['radjo'])){
                $radjo = $_POST['radjo'];

                if($radjo == '1'){
                    $kw2 = mysqli_query($conn, 'SELECT `nazwa`, `rzeka`, `stanOstrzegawczy`, `stanAlarmowy`, `pomiary`.`stanWody` FROM `wodowskazy` JOIN `pomiary` ON `wodowskazy`.`id` = `pomiary`.`wodowskazy_id` WHERE `pomiary`.`dataPomiaru` = "2022-05-05";');
                    while($row = mysqli_fetch_array($kw2)){
                        echo '<tr>';
                        echo '<td>"'.$row['nazwa'].'"</td>';
                        echo '<td>"'.$row['rzeka'].'"</td>';
                        echo '<td>"'.$row['stanOstrzegawczy'].'"</td>';
                        echo '<td>"'.$row['stanAlarmowy'].'"</td>';
                        echo '<td>"'.$row['stanWody'].'"</td>';
                        echo '</tr>';
                    }}
                    if($radjo == '2'){
                        $kw3 = mysqli_query($conn, 'SELECT `nazwa`, `rzeka`, `stanOstrzegawczy`, `stanAlarmowy`, `pomiary`.`stanWody` FROM `wodowskazy` JOIN `pomiary` ON `wodowskazy`.`id` = `pomiary`.`wodowskazy_id` WHERE `pomiary`.`dataPomiaru` = "2022-05-05" AND `pomiary`.`stanWody` > `stanOstrzegawczy`;');
                        while($row = mysqli_fetch_array($kw3)){
                            echo '<tr>';
                            echo '<td>"'.$row['nazwa'].'"</td>';
                            echo '<td>"'.$row['rzeka'].'"</td>';
                            echo '<td>"'.$row['stanOstrzegawczy'].'"</td>';
                            echo '<td>"'.$row['stanAlarmowy'].'"</td>';
                            echo '<td>"'.$row['stanWody'].'"</td>';
                            echo '</tr>';
                        }
                    }
                        if($radjo == '3'){
                            $kw5 = mysqli_query($conn, 'SELECT `nazwa`, `rzeka`, `stanOstrzegawczy`, `stanAlarmowy`, `pomiary`.`stanWody` FROM `wodowskazy` JOIN `pomiary` ON `wodowskazy`.`id` = `pomiary`.`wodowskazy_id` WHERE `pomiary`.`dataPomiaru` = "2022-05-05" AND `pomiary`.`stanWody` > `stanAlarmowy`;');
                            while($row = mysqli_fetch_array($kw5)){
                                echo '<tr>';
                                echo '<td>"'.$row['nazwa'].'"</td>';
                                echo '<td>"'.$row['rzeka'].'"</td>';
                                echo '<td>"'.$row['stanOstrzegawczy'].'"</td>';
                                echo '<td>"'.$row['stanAlarmowy'].'"</td>';
                                echo '<td>"'.$row['stanWody'].'"</td>';
                                echo '</tr>';
                            }              
                }}
                ?>

        </table>
    </section>
    <section class="prawy">
        <h3>Informacje</h3>
        <ul>
            <li>Brak ostrzeżeń o burzach
                z gradem</li>
            <li>Smog w mieście Wrocław</li>
            <li>Silny wiatr w Karkonoszach</li>
        </ul>
        <h3>Średnie stany wód</h3>
        <?php
         $kw4 = mysqli_query($conn, 'SELECT `dataPomiaru`, AVG(`stanWody`) FROM `pomiary` GROUP BY `dataPomiaru`;');
        while($row = mysqli_fetch_array($kw4)){
            echo ''.$row['dataPomiaru'].' : '.$row['AVG(`stanWody`)'].' <br><br>';
            
        }$conn = mysqli_close($conn);
?>
         <a href="https://komunikaty.pl">Dowiedz się więcej</a>
         <img src="obraz2.jpg" alt="rzeka">


    </section>
    <footer>
        <p>Stronę wykonał: </p>
    </footer>

</body>
</html>