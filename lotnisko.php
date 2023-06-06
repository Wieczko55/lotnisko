<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Port Lotniczy</title>
    <link rel="stylesheet" href="styl5.css">
</head>
<body>
    <div id ="banery">
        <header id="ba1"><img src="zad5.png" alt="logo lotnisko"></header>
        <header id="ba2"><h1>Przyloty</h1></header>
        <header id="ba3"><h3>przydatne linki </h3>
            <a href="kwerendy.txt" target = "_blank">Pobierz...</a>
        
    </header>
    </div>
    <main>
        <table>
            <tr>
                <th>Czas</th>
                <th>Kierunek</th>
                <th>numer rejsu</th>
                <th>status</th>
            </tr>
        <?php
        $polaczenie = mysqli_connect("localhost","root","","lotnisko");
        $sql = "SELECT czas,kierunek,nr_rejsu,status_lotu FROM przyloty ORDER BY czas asc";
        $wynik = mysqli_query($polaczenie, $sql);
        while ($r = mysqli_fetch_row($wynik)) {
            echo  "<tr>";
            echo  "<td>".$r[0]."</td>";
            echo  "<td>".$r[1]."</td>";
            echo  "<td>".$r[2]."</td>";
            echo  "<td>".$r[3]."</td>";
            echo  "</tr>";
        }
        ?>
        </table>
    </main>
    <div id="stop">
        <footer id="fe1">
            <?php
            if(isset($_COOKIE["odwiedzil"]))
            {
                echo "<p>"."<i>"."Witaj ponownie na stronie lotniska"."</i>"."</p>";
            }
            else
            {
            setcookie("odwiedzil",1,time()+7200,"/");
            
                echo "<p>"."<b>"."Dzień dobry strona używa ciasteczek"."</b>"."</p>";
            }
            ?>
        </footer>
        <footer id="fe2">Autor: 000000000</footer>
    </div>
    <?php
    mysqli_close($polaczenie);
    ?>
</body>
</html>
