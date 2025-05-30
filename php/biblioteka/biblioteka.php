<!DOCTYPE html>
<html lang="pl">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Biblioteka publiczna</title>
        <?php
            $dbhost = "localhost";
            $dbuser = "root";
            $dbpassword = "";
            $dbname = "biblioteka1";

            $conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
            $conn = mysqli_close($conn);
        ?>
    </head>
    <header>
        <h1>Biblioteka w Książkowicach Wielkich</h1>
    </header>
        <section id="lewy">
            <h3>Polecamy dzieła autorów:</h3>
            <ol>
                <?php
                    $conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
                    $kwerenda1 = "SELECT `imie`, `nazwisko` FROM `autorzy` ORDER BY `nazwisko` ASC;";
                    $wynik1 = mysqli_query($conn,$kwerenda1,);
                    while($row = mysqli_fetch_assoc($wynik1)){
                        echo "<li>";
                        echo $row["imie"]." ".$row["nazwisko"];
                        echo "</li>";
                    }
                    $conn = mysqli_close($conn);
                ?>
            </ol>
        </section>
        <section id="srodkowy">
            <h3>ul. Czytelnicza 25, Książkowice&nbsp;Wielkie</h3>
            <a href="mailto: sekretariat@biblioteka.pl"><p>Napisz do nas</p></a>
            <img src="biblioteka.png" alt="książki">
        </section>
        <section id="prawy1">
            <h3>Dodaj czytelnika</h3>
            <form method="POST" action="biblioteka.php">
                <label for="imie">imie: </label>
                <input type="text" id="imie" name="imie"><br><br>
                <label for="nazwisko">nazwisko: </label>
                <input type="text" id="nazwisko" name="nazwisko"><br><br>
                <label for="symbol">symbol: </label>
                <input type="number" id="symbol" name="symbol"><br><br>
                
                <input type="submit" name="form_submit" value="Dodaj">

            </form>

        </section>
        <section id="prawy2">
            <?php
                $conn = new mysqli($dbhost, $dbuser, $dbpassword, $dbname);
                $imie = $_POST['imie'];
                $nazwisko = $_POST['nazwisko'];
                $kod = $_POST['symbol'];

                echo "Czytelnik ".$imie." ".$nazwisko." został(a) dodany do bazy danych";
                $kwerenda2 = 'INSERT INTO czytelnicy (id, imie, nazwisko, kod) VALUES (null, "'.$imie.'","' .$nazwisko.'","' .$kod.'");';
                $wynik2 = mysqli_query($conn,$kwerenda2);   
                $conn = mysqli_close($conn);

            ?>
        </section>

    <footer>
        <p>Projekt strony: tak</p>
    </footer>
</html>