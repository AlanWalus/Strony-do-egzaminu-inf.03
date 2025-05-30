
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl5.css">
    <title>Port Lotniczy</title>
</head>
<body>
    <header>
        <section class="baner1"><img src="zad5.png" alt="logo lotnisko"></section>
        <section class="baner2"><h1>Przyloty</h1></section>
        <section class="baner3">
            <h3>przydatne linki</h3>
            <a href="kwerendy.txt" target="_blank">Pobierz…</a>
        </section>
    </header>
    <main>
        <table>
            <tr>
                <th>czas</th>
                <th>kierunek</th>
                <th>numer rejsu</th>
                <th>status</th>
            </tr>
            <?php 
            $conn = mysqli_connect('localhost', 'root', '', 'egzamin');
  
                $kw1 = mysqli_query($conn, 'SELECT `czas`, `kierunek`, `nr_rejsu`, `status_lotu` FROM `przyloty` ORDER BY `czas` ASC;');
                while($row = mysqli_fetch_array($kw1)){
                    echo '<tr>
            <td>'.$row["czas"].'</td>
            <td>'.$row["kierunek"].'</td>
            <td>'.$row["nr_rejsu"].'</td>
            <td>'.$row["status_lotu"].'</td>
                    </tr>';
                }
                $conn = mysqli_close($conn);
            ?>

        </table>
    </main>
    <footer>
        <section class="stopka1">
            <?php 
                if(isset($_COOKIE['ciasteczko'])){
                    echo '<p><em>Witaj ponownie na stronie lotniska</em></p>';
                }
                else{
                    setcookie('ciasteczko', 1, TIME()+7200);
                    echo '<p><b>Dzień dobry! Strona lotniska używa ciasteczek</b></p>';
                }
            ?>
        </section>
        <section class="stopka2">
            Autor:
        </section>
    </footer>
    
</body>
</html>