<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <title>Predloženo za Vas</title>
</head>
<body id="bodyDesavanja">
<div class="container">
    <div id="header" class="row">
        <div class="col-sm">
            <a href="" class="deo1" id="alogo">
                <img src="slike/logo.jpg" alt="Logo" id="logo">
            </a>
        </div>
        <div class="col-sm-1">
            <div class="probica">
            </div>
        </div>
        <div class="col-sm">
            <div class="probica">
                <a href="index2.php" class="deo">Početna </a>
            </div>

        </div>
        <div class="col-sm">
            <div class="probica">
                <a href="desavanja2.php" class="deo">Dešavanja</a>
            </div>
        </div>
        <div class="col-sm">
            <div class="probica">
                <a href="kontakt2.php" class="deo">Utisci i kontakt</a>
            </div>
        </div>
        <div class="col-sm-1">
            <div class="probica">
            </div>
        </div>

        <div class="col-sm">
            <div class="dropdown">
                <h1 id="dropdownH"><img src="slike/user.jpg" alt="user?" id="userSlika"></h1>
                <button class="dropbtn">Moj nalog</button>
                <div class="dropdown-content">
                    <a href="mojNalog.php">Izmene naloga</a>
                    <a href="PretplatiSe.php">Pretplata</a>
                    <a href="predlozeno.php">Predloženo za vas</a>
                    <a href="nagradnaIgra.php">Nagradna igra</a>
                    <a href="popust.php">Ostvaren popust</a>
                    <a href="index.php">Odjava</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row" id="okvir">
        <h1 style="color: white; text-align: center;"> Pošto volite opere...</h1>
    </div>
    <div class="row" id="desavanja">
        <ul >
            <li class="row">
                <div class="dogadjaj">
                    <img align="left" src="slike/seviljski-berberin.jpg" alt="bioJoskopjpg" class="slikaDogadjaja">
                    <p class="infoODogadjaju">
                        Opera: Seviljski berberin <br>
                        Lokacija: Narodno pozorište <br>
                        Datum: 14.4.2023. <br>
                        Vreme: 18:00h <br>
                        Cena ulaznice: 1500rsd <br>
                        Opis: Seviljski berberin je komična opera u dva čina italijanskog kompozitora Đoakina Rosinija. <br>
                        <button class="rezervisi">
                            <a href="rezervisiIuplati.php">Rezerviši</a>
                        </button>
                    </p>
                </div>

            </li>
            <li class="row">
                <div class="dogadjaj">
                    <img align="left" class="slikaDogadjaja" src="slike/karmen.jpg" alt="koncert">
                    <p class="infoODogadjaju">
                        Opera: Karmen <br>
                        Lokacija: Madlenianum <br>
                        Datum: 22.4.2023. <br>
                        Vreme: 19:00h <br>
                        Cena ulaznice: 1600rsd <br>
                        Opis: Karmen je francuska opera od četiri čina koju je napisao Žorž Bize. <br>
                        <button class="rezervisi">
                            <a href="rezervisiIuplati.php">Rezerviši</a>
                        </button>

                    </p>


                </div>

            </li>
            <li class="row">
                <div class="dogadjaj">
                    <img align="left" src="slike/travijata.jpg" alt="stendap" class="slikaDogadjaja">
                    <p class="infoODogadjaju">
                        Opera: Travijata <br>
                        Lokacija: Narodno pozorište <br>
                        Datum: 25.4.2023. <br>
                        Vreme: 19:30h <br>
                        Cena: 1200rsd  <br>
                        Opis: Travijata je opera u tri čina italijanskog kompozitora Đuzepea Verdija. <br>
                        <button class="rezervisi">
                            <a href="rezervisiIuplati.php">Rezerviši</a>
                        </button>
                    </p>
                </div>
            </li>

        </ul>
    </div>
</div>
</body>
</html>
