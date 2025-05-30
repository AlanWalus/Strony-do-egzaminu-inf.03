<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Motocykle</title>
    <link rel="stylesheet" href="styl.css">
    <img src="motor.png" alt="motocykl" class="motocykl">
</head>
<body>
    <header>
        <h1>Motocykle - moja pasja</h1>
    </header>
    <section class="lewy">
        <h2>Gdzie pojechać?</h2>
        <dl>
            <?php
                    $server = "localhost";
                    $user = "root";
                    $pass = "";
                    $dbname = "motory";
                    $conn = mysqli_connect($server, $user, $pass, $dbname);
            
            $kw2 = 'SELECT `nazwa`, `opis`, `poczatek`, `zdjecia`.`zrodlo` 
            FROM `wycieczki` JOIN `zdjecia` ON `wycieczki`.`zdjecia_id` = `zdjecia`.`id`;';
            $wynik2 = mysqli_query($conn, $kw2);
            while($row = mysqli_fetch_array($wynik2)){
                echo '<dt>'.$row['nazwa'].' rozpoczyna się w '.$row['poczatek'].' 
                <a href="'.$row['zrodlo'].'".jpg>zobacz zdjęcie</a></dt>';
                echo '<dd>'.$row['opis'].'</dd>'; }

            ?>
        </dl>
    </section>
    <section class="prawy1">
        <h2>Co kupić?</h2>
        <ol>
            <li>Honda CBR125R</li>
            <li>Yamaha YBR125</li>
            <li>Honda VFR800i</li>
            <li>Honda CBR1100XX</li>
            <li>BMW R1200GS LC</li>
        </ol>
    </section>
    <section class="prawy2">
        <h2>Statystyki</h2>
        <p>Wpisanych wycieczek: <?php
            $kw3 = 'SELECT COUNT(*) AS liczba FROM `wycieczki`;';
            $wynik3 = mysqli_query($conn, $kw3);
            $row = mysqli_fetch_array($wynik3);
            echo $row['liczba'];
            $conn = mysqli_close($conn)
            ?>
        </p>
        <p>Użytkowników forum: 200</p>
        <p>Przesłanych zdjęć: 1300</p>
    </section>
    <footer><p>Stronę wykonał: </p></footer>
</body>
</html>


