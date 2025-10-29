<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="resources/js/prijavaOsobe.js"></script>
    <link href="style.css" rel="stylesheet">
    <title>Utisci i kontakt</title>
</head>
<body id="kontaktB">
<div class="container">

    <div id="header1" class="row">
        <div class="col-sm">
            <a href="" class="deo" id="alogo">
                <img src="slike/logo.jpg" alt="Logo" id="logo">
            </a>
        </div>
        <div class="col-sm-1">
            <div class="probica">
            </div>
        </div>
        <div class="col-sm">
            <div class="probica">
                <a href="index.php" class="deo">Početna </a>
            </div>

        </div>
        <div class="col-sm">
            <div class="probica">
                <a href="desavanja.php" class="deo">Dešavanja</a>
            </div>
        </div>
        <div class="col-sm">
            <div class="probica">
                <a href="kontakt.php" class="deo">Utisci i kontakt</a>
            </div>
        </div>
        <div class="col-sm-1">
            <div class="probica">
            </div>
        </div>

        <div class="col-sm">
            <div class="probica">
                <a href="#" onclick="prijava()" class="deo" >Prijavi se</a>
            </div>
        </div>
    </div>
    <div class="row" id="div4">
        <div class="row" id="redKom" >
        <textarea name="comments" class="col-sm-12" id="comments" style="font-family:sans-serif;font-size:1.2em; font-size: small;">
        </textarea>
        </div>
        <div class="row" id="btnKomRed">
            <div class="col-sm-6"></div>
            <button id="btnKom"><a href="login.php" id="prijaviZaKom"> Ostavi komentar </a></button>
        </div>
    </div>
    <div class="row" id="kontaktDiv">
        <a href="mailto:gl200204d@student.etf.bg.ac.rs?subject = Feedback&body = Message"  class="col-sm-12"  id="konaktirajte" >Kontaktirajte nas!</a>
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
        </div>
        <div id="kom" class="row">
            <div class="col-sm-2 osoba">
                <h1 id="slikaH"> <img src="slike/user.jpg" alt="user?" id="slika"></h1>
                <h1 id="pera" >Ana Marković</h1>
            </div>
            <div class="col-sm-8" id="divKom">
                <div  id="divOdl"> Uživanje je koristiti vaš sajt.</div>
            </div>

        </div>
        <div id="kom" class="row">
            <div class="col-sm-2 osoba">
                <h1 id="slikaH"> <img src="slike/user.jpg" alt="user?" id="slika"></h1>
                <h1 id="pera" >Nikola Nikolić</h1>
            </div>
            <div class="col-sm-8" id="divKom">
                <div  id="divOdl"> Nikad nema mesta da rezervišem predstavu!</div>
            </div>

        </div>
    </div>
</div>


</body>
</html>

