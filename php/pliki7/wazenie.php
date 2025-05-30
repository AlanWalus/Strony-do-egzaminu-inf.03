<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    <title>Ważenie samochodów ciężarowych</title>
</head>
<body>
    <header>
        <section class="baner1"><h1>Ważenie pojazdów we Wrocławiu</h1></section>
        <section class="baner2">
            <img src="obraz1.png" alt="waga"> 
        </section>
    </header>
    <main>
    <section class="lewy">
        <h2>Lokalizacje wag</h2>
        <ol>
            <?php
            $conn = mysqli_connect('localhost', 'root', '', 'wazenietirow');

            $kw2 = mysqli_query($conn, 'SELECT `ulica` FROM `lokalizacje`;');
            echo '<ol>';
            while($row = mysqli_fetch_array($kw2)){

                echo '<li> ulica '.$row['ulica'].'</li>';
            }
            echo '</ol>';
            ?>
        </ol>
        <h2>Kontakt</h2>
        <a href="mailto:wazenie@wroclaw.pl">napisz</a>
    </section>
    <section class="srodkowy">
        <h2>Alerty</h2>
        <table>
            <tr>
            <th>rejestracja</th>
            <th>ulica</th>
            <th>waga</th>
            <th>dzień</th>
            <th>czas</th>
        </tr>
        <?php
        $kw4 = mysqli_query($conn, 'SELECT `rejestracja`, `lokalizacje`.`ulica`, `waga`, `dzien`, `czas`  FROM `wagi` JOIN lokalizacje ON `wagi`.`lokalizacje_id` = `lokalizacje`.`id` WHERE `waga` > 5;');
        while($row = mysqli_fetch_array($kw4)){
            echo '<tr> <td>'.$row['rejestracja'].'</td> <td>'.$row['ulica'].'</td> 
            <td>'.$row['waga'].'</td> <td>'.$row['dzien'].'</td> <td>'.$row['czas'].'</td></tr>';
            
        }
        ?>
        </table>
        <?php
            $kw3 = mysqli_query($conn, 'INSERT INTO `wagi` (`id`, `lokalizacje_id`, `waga`, `rejestracja`, `dzien`, `czas`) VALUES (NULL, 5, FLOOR(RAND()*(10-1+1)+1), "DW12345", CURRENT_DATE(), CURRENT_TIME());');

            header("refresh: 10;");
            $conn = mysqli_close($conn);
        ?>

    </section>
    <section class="prawy">
        <img src="obraz2.jpg" alt="tir">
    </section>
</main>
    <footer>
        <p>Stronę wykonał: 0000</p>
    </footer>
    
</body>
</html>

