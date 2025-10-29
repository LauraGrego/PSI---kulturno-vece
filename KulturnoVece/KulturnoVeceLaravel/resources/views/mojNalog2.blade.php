<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <script src="obavestenja.js"></script>
    <title>Izmena naloga</title>
</head>
<body id="loginBody">

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
            <a href="index3.html" class="deo">Početna </a>
        </div>

    </div>
    <div class="col-sm">
        <div class="probica">
            <a href="desavanja3.html" class="deo">Dešavanja</a>
        </div>
    </div>
    <div class="col-sm">
        <div class="probica">
            <a href="kontakt3.html" class="deo">Utisci i kontakt</a>
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
                <a href="mojNalog2.html">Izmene naloga</a>
                <a href="izmenaDesavanja.html">Dodaj dešavanje</a>
                <a href="index.html">Odjava</a>
            </div>
        </div>
    </div>
</div>
<div class="okvirIzmene">
    <div class="smestanjeIzmene">
        <div class="container" id="zaSliku">
            <div class="container" id="slikaKorisnika">
                <div class="row" id="prs">
                    <div class="imeIprezime col-sm">
                        <p id="labelaIme"> Ime Prezime</p>
                    </div>
                    <div class="col-sm">
                        <img src="slike/user.jpg" alt="slika" id="profilnaSlika">
                    </div>

                </div>
                <div class="row" id="promeniSliku">
                    <div class="col-sm-12">
                        Promeni sliku profila:&nbsp
                    </div>
                    <div class="col-sm-12">
                        <input type="file" id="urlSlike">
                    </div>

                </div>
                <div class="podaci container">
                    <div class="prijavljenKao row" id="prijava">
                        <p>Prijavljeni ste kao : </p>
                    </div>
                    <div class="prijavljenKao row" id="korisnickoIme">
                        <p>Vaše korisničko ime: </p>
                    </div>
                    <div class="prijavljenKao row" id="email">
                        <p> Vaše e-mail : </p>
                    </div>
                </div>
                <div class="podaci container">
                    <div class="prijavljenKao row" id="prijava1">
                        <p>korisnik</p>

                    </div>
                    <div class="prijavljenKao row" id="korisnickoIme1">
                        <p>username</p>
                    </div>
                    <div class="prijavljenKao row" id="email1">
                        <p>mail@gmail.com</p>

                    </div>
                </div>
                <div id="promeniSifru">
                    <button type="submit" class="dugmiciNalog" onclick="promenaSifre()">Promeni šifru profila</a> </button>
                </div>
                <div class="dugmiciPromene">
                    <div id="potvrdiPromene">
                        <button type="submit" class="dugmiciNalog" onclick="promenaSifre()">Potvrdi</a> </button>
                    </div>
                    <div id="ponistiPromene">
                        <button type="submit" class="dugmiciNalog" onclick="promenaSifre()">Poništi</a> </button>
                    </div>
                </div>

            </div>


        </div>
    </div>

</div>
</body>
</html>
