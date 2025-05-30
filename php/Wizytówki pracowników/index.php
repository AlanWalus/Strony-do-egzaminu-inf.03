<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <title>Sekretariat</title>
        <link rel="stylesheet" href="styl.css">
    </head>
    <body>
        <section class="lewy" id="lewy">
            <h1>Akta Pracownicze</h1>
            <?php 
                $dbserver ='localhost';
                $dbuser = 'root';
                $dbpass = '';
                $dbname = 'firma';
                $conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
                $kwerenda1 = 'SELECT `imie`, `nazwisko`, `adres`, `miasto`, `czyRODO`, `czyBadania` FROM `pracownicy` WHERE id = 2;';
                $wynik1 = mysqli_query($conn, $kwerenda1);
                $row = mysqli_fetch_array($wynik1);
                echo '<h3>dane</h3>';
                echo '<p>"'.$row['imie'].'" "'.$row['nazwisko'].'"</p>';
                echo '<hr>';
                echo '<h3>adres</h3>';
                echo '<p>"'.$row['adres'].'" "'.$row['miasto'].'"</p>';
                echo '<hr>';
                if ($row['czyRODO'] == '1') {
                    echo '<p>RODO: podpisano</p>';}
                elseif ($row['czyRODO'] == '0') {
                    echo '<p>RODO: niepodpisano</p>';}
                    if ($row['czyBadania'] == '1') {
                        echo '<p>Badania: aktualne</p>';}
                    elseif ($row['czyBadania'] == '0') {
                        echo '<p>Badania: nieaktualne</p>';}
               $conn = mysqli_close($conn);
            ?>
            <hr> <!-- linia horyzontalna -->
            <h3>Dokumenty pracownika</h3>
            <a href="cv.txt">Pobierz</a>
            <h1>Liczba zatrudnionych pracowników</h1>
                <p><?php
                $conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
                $kwerenda2 = 'SELECT COUNT(*) FROM `pracownicy` WHERE 1;';
                $wynik2 = mysqli_query($conn, $kwerenda2);
                $row = mysqli_fetch_array($wynik2);
                echo $row['COUNT(*)'];


                $conn = mysqli_close($conn);
                ?>
                </p>
            </section>
            
            <section class="prawy"id="prawy">
            <?php
            $conn = mysqli_connect($dbserver, $dbuser, $dbpass, $dbname);
            $kwerenda3 = "SELECT `id`, `imie`, `nazwisko` FROM `pracownicy` WHERE id = 2;";
            $wynik3 = mysqli_query($conn, $kwerenda3);
            $row = mysqli_fetch_array($wynik3);
            $obraz_id = $row['id'];
            echo '<img src="'.$obraz_id.'.jpg" alt="pracownik">'; 
            echo '<h2>"'.$row['imie'].'" "'.$row['nazwisko'].'"</h2>';

            $kwerenda4 = 'SELECT `pracownicy`.`id`, `stanowiska`.`nazwa`, `stanowiska`.`opis` FROM `pracownicy` 
            JOIN `stanowiska` ON `pracownicy`.`stanowiska_id` = `stanowiska`.`id` WHERE `pracownicy`.`id` = 2;';
            $wynik4 = mysqli_query($conn, $kwerenda4);
            $row = mysqli_fetch_array($wynik4);
            echo '<h4>"'.$row['nazwa'].'"<h4>';
            echo '<h5>"'.$row['opis'].'"<h5>';
            $conn = mysqli_close($conn);
            ?>
        </section>
        <footer>
            <p>Autorem aplikacji jest: </p>
            <ul>
                <li>skontaktuj się</li>
                <li>poznaj naszą firmę</li>
            </ul>
        </footer>

    </body>
</html>

