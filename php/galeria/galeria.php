<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styl.css">
    
    <title>Galeria</title>
</head>
<body>
    <header>
        <h1>Zdjęcia</h1>
    </header>
    <section class="lewy">
        <h2>Tematy zdjęć</h2>
        <ol>
            <li>Zwierzęta</li>
            <li>Krajobrazy</li>
            <li>Miasta</li>
            <li>Przyroda</li>
            <li>Samochody</li>
        </ol>
    </section>
    <section class="mid">
        <?php
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $dbname = 'galeria';
        $conn = mysqli_connect($host, $user, $pass, $dbname);

        $kw2 = mysqli_query($conn, 'SELECT `tytul`, `plik`, `polubienia`, `autorzy`.`imie`, `autorzy`.`nazwisko` FROM `zdjecia` 
        JOIN `autorzy` ON `zdjecia`.`autorzy_id` = `autorzy`.`id` ORDER BY `autorzy`.`nazwisko` ASC;');
        while($row = mysqli_fetch_array($kw2)){
            echo '<section class="blok">';
            echo     '<img src="'.$row['plik'].'" alt="zdjęcie">';
            echo '<h3>"'.$row['tytul'].'"</h3>';


            if($row['polubienia']>40){
                echo '<p> Autor: '.$row["imie"].' '.$row["nazwisko"].'. Wiele osób polubiło ten obraz </p>';
            }
            else{
                echo '<p> Autor: "'.$row['imie'].'" "'.$row['nazwisko'].'" </p>';
            }
            
            echo ' <a href="'.$row['plik'].'" downland>Pobierz</a> </section>';
        }
    ?>
    </section>

    <section class="prawy">
        <h2>Najbardziej lubiane</h2>
        <?php
        
        $kw1 = mysqli_query($conn, 'SELECT `tytul`, `plik` FROM `zdjecia` WHERE `polubienia` >= 100;');
        while($row = mysqli_fetch_array($kw1)){
        echo '<img src="'.$row['plik'].'" alt="'.$row['tytul'].'">';}
        $conn = mysqli_close($conn);
        ?>
        <strong>Zobacz wszystkie nasze zdjęcia</strong>
        
    </section>
    <footer>
        <h5>Stronę wykonał: </h5>
    </footer>
    
</body>
</html>