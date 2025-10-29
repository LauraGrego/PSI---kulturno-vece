<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="resources/js/prijavaOsobe.js"></script>
    <link href="style.css" rel="stylesheet">
    <title>Dešavanja</title>
</head>
<body id="bodyDesavanja">
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
    <div class="row" id="okvir">
        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-3">
            <div class="poljePretrage" id="datumDog">
                <label id="tipDogadjaja"  form="tip">Datum događaja:</label>
                <input type="date" name="" id="datum">
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-3">
            <div class="poljePretrage" id="tipDog">
                <label id="tipDogadjaja"  form="tip">Tip događaja:</label>
                <select name="tip" id="">
                    <option value="Sve">Sve</option>
                    <option value="Film">Film</option>
                    <option value="Predstava">Predstava</option>
                    <option value="Stand up show">Stand up show</option>
                    <option value="Koncert">Koncert</option>
                    <option value="Izložba">Izložba</option>
                    <option value="Ostalo">Ostalo</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-3">
            <div class="poljePretrage" id="tipDog">
                <label id="tipDogadjaja"  form="tip">Lokacija događaja:</label>
                <select name="tip" id="">
                    <option value="Sve">Sve</option>
                    <option value="Novi Beograd">Novi Beograd</option>
                    <option value="Zemun">Zemun</option>
                    <option value="Zvezdara">Zvezdara</option>
                    <option value="Palilula">Palilula</option>
                    <option value="Voždovac">Voždovac</option>
                    <option value="Vračar">Vračar</option>
                    <option value="Stari grad">Stari grad</option>
                    <option value="Savski venac">Savski venac</option>
                    <option value="Čukarica">Čukarica</option>
                </select>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-3">
            <input type="search" placeholder="Pretraži" id="search-field" />
            <button type="submit" class="search-button">
                <img src="slike/pokusaj.png">
            </button>
        </div>
    </div>
    <div class="row" id="desavanja">
        <ul class="row">
            <li>
                <div class="dogadjaj">
                    <img align="left" src="slike/bioJoskopjpg.jpg" alt="bioJoskopjpg" class="slikaDogadjaja">
                    <p class="infoODogadjaju">
                        Film: Avatar: Put vode <br>
                        Lokacija: Bioskop Fontana <br>
                        Datum: 28.3.2023. <br>
                        Vreme: 20:00h <br>
                        Cena ulaznice: 600rsd <br>
                        Opis: Akcija, Avantura, Naučna-fantastika | 190 min <br> <br>
                        <button class="rezervisi">
                            <a href="login.php">Rezerviši</a>
                        </button>
                    </p>
                </div>

            </li>
            <li>
                <div class="dogadjaj">
                    <img align="left" class="slikaDogadjaja" src="slike/koncert.jpg" alt="koncert">
                    <div class="rasprodat">
                        <p>RASPRODATO</p>
                    </div>
                    <p class="infoODogadjaju">
                        Koncert klasične muzike <br>
                        Lokacija: Kolarčeva zadužbina, mala sala <br>
                        Datum: 2.4.2023. <br>
                        Vreme: 19:00h <br>
                        Cena ulaznice: 500rsd <br>
                        Opis: Na programu su dela J.S.Bacha, A.Vivaldia, F.Kreislera

                    </p>


                </div>

            </li>
            <li>
                <div class="dogadjaj">
                    <img align="left" src="slike/stendap.jpg" alt="stendap" class="slikaDogadjaja">
                    <p class="infoODogadjaju">
                        Stand up show <br>
                        Lokacija: Bitef Art Cafe <br>
                        Datum: 11.4.2023. <br>
                        Vreme: 17:00h <br>
                        Cena: 200rsd  <br>
                        Opis: Dođi i skupi hrabrosti da staneš na binu! <br> <br>
                        <button class="rezervisi">
                            <a href="login.php">Rezerviši</a>
                        </button>
                    </p>
                </div>
            </li>

        </ul>
    </div>
</div>
</body>
</html>
