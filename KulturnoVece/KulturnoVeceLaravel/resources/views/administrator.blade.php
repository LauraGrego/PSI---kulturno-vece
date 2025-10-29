<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <script src="obavestenja.js"></script>
    <title>Administrator</title>
</head>
<body id="kontaktB">
<div class="container">
    <div id="header" class="row">
        <div class="col-sm">
            <a href="index4.php" class="deo" id="alogo">
                <img src="slike/logo.jpg" alt="Logo" id="logo">
            </a>
        </div>
        <div class="col-sm-1">
            <div class="probica">
            </div>
        </div>
        <div class="col-sm">
            <div class="probica">
                <a href="index4.php" class="deo">Početna </a>
            </div>

        </div>
        <div class="col-sm">
            <div class="probica">
                <a href="desavanja4.php" class="deo">Dešavanja</a>
            </div>
        </div>
        <div class="col-sm">
            <div class="probica">
                <a href="kontakt4.php" class="deo">Utisci i kontakt</a>
            </div>
        </div>
        <div class="col-sm-1">
            <div class="probica">
            </div>
        </div>
        <div class="col-sm">
            <div class="dropdown">
                <h1 id="dropdownH"><img src="slike/adminLogo.png" alt="user?" id="userSlika"></h1>
                <button class="dropbtn">Moj nalog</button>
                <div class="dropdown-content">
                    <a href="mojNalog3.php">Izmene naloga</a>
                    <a href="dodajKorisnika.php">Dodaj korisnika</a>
                    <a href="administrator.php">Administratorski panel</a>
                    <a href="index.php">Odjava</a>
                </div>
            </div>
        </div>
    </div>
    <!-- <div id="div3" ></div> -->
    <div class="row" id="prveraPretplata">
        <div class="row">
            <button onclick="proveriPretplate()">Proveri pretplate</button>
        </div>
    </div>
    <div class="row" id="divSQL">
        <div class="row" id="redKom" >
            <p id="pristupBazi">Unesite SQL skriptu za pregled baze</p>
            <textarea name="sqlZaBazu" class="col-sm-12" id="comments1" style="font-family:sans-serif;font-size:1.2em; font-size: small;">
        </textarea>
        </div>
    </div>
    <div id="divSaKoms">
        <div class="row">
            <h1 id="naslovKom" class="col-sm-12">Komentari:</h1>
        </div>
        <div id="kom" class="row">
            <div class="col-sm-2 osoba" >
                <h1 id="slikaH"> <img src="slike/user.jpg" alt="user?" id="slika"></h1>
                <h1 id="pera" >Pera Perić</h1>
            </div>
            <div class="col-sm-8" id="divKom">
                <div  id="divOdl"> Odlično, sve pohvale!</div>
            </div>
            <div class="col-sm-2"  id="brisanjeKom"><button class="brisiKom" onclick="brisanjeKomentara()">Obriši komentar</button></div>
        </div>
        <div id="kom" class="row">
            <div class="col-sm-2 osoba">
                <h1 id="slikaH"> <img src="slike/user.jpg" alt="user?" id="slika"></h1>
                <h1 id="pera" >Ana Marković</h1>
            </div>
            <div class="col-sm-8" id="divKom">
                <div  id="divOdl"> Uživanje je koristiti vaš sajt.</div>
            </div>
            <div class="col-sm-2"  id="brisanjeKom"><button class="brisiKom" onclick="brisanjeKomentara()">Obriši komentar</button></div>
        </div>
        <div id="kom" class="row">
            <div class="col-sm-2 osoba">
                <h1 id="slikaH"> <img src="slike/user.jpg" alt="user?" id="slika"></h1>
                <h1 id="pera" >Nikola Nikolić</h1>
            </div>
            <div class="col-sm-8" id="divKom">
                <div  id="divOdl"> Nikad nema mesta da rezervišem predstavu!</div>
            </div>
            <div class="col-sm-2" id="brisanjeKom"><button class="brisiKom" onclick="brisanjeKomentara()">Obriši komentar</button></div>
        </div>
    </div>


</body>
</html>
