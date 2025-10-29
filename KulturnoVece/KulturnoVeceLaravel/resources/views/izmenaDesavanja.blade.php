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
    <title>Izmena desavanja</title>
</head>
<body id="bodyNovoDesavanje">
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
            <a href="index3.php" class="deo">Početna </a>
        </div>

    </div>
    <div class="col-sm">
        <div class="probica">
            <a href="desavanja3.php" class="deo">Dešavanja</a>
        </div>
    </div>
    <div class="col-sm">
        <div class="probica">
            <a href="kontakt3.php" class="deo">Utisci i kontakt</a>
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
                <a href="mojNalog2.php">Izmene naloga</a>
                <a href="izmenaDesavanja.php">Dodaj dešavanje</a>
                <a href="index.php">Odjava</a>
            </div>
        </div>
    </div>
</div>
<div class = "dodavanjeDesavanja">
    <div class="podaciDogadjaja">
        <div class="opisDesavanja">
            <div id="nasDesavanja">
                <h1 id="naslovDesavanje">Dodaj novo dešavanje</h1>
            </div>
            <div class="okruzitiDesavanja">
                <h6>
                    <div>
                        <h6 id="ostaloDesavanja">Tip događaja:&nbsp&nbsp
                            <select name="tip" id="">
                                <option value="Sve">Sve</option>
                                <option value="Film">Film</option>
                                <option value="Predstava">Predstava</option>
                                <option value="Stand up show">Stand up show</option>
                                <option value="Koncert">Koncert</option>
                                <option value="Izložba">Izložba</option>
                                <option value="Ostalo">Ostalo</option>
                            </select>
                        </h6>
                    </div>
                </h6>
                <h6 id="ostaloDesavanja">
                    <div>
                        <h6 id="ostaloDesavanja">Datum događaja:&nbsp&nbsp
                            <input type="date" name="" id="datum">
                        </h6>
                    </div>
                </h6>
                <h6 id="ostaloDesavanja">Naziv:&nbsp <input type="text"></h6>
                <h6 id="ostaloDesavanja">Lokacija:&nbsp <input type="text"></h6>
                <h6 id="ostaloDesavanja">Vreme:&nbsp <input type="text"></h6>
                <h6 id="ostaloDesavanja">Cena ulaznice:&nbsp <input type="text"></h6>
                <h6 id="ostaloDesavanja">
                    <div id="slikaDesavanja">
                        Slika:&nbsp <input type="file">
                    </div>

                </h6>
            </div>
            <h6 id="ostaloDesavanjaOpis">Opis:&nbsp&nbsp&nbsp <textarea name="opis" id="opis" style="font-family:sans-serif;font-size:1.2em; font-size: small;">
                </textarea></h6>
            <div id="dugmeObjavi">
                <button type="submit" class="objavi-btn" onclick="novoDesavanje()"><a href="index3.php">Objavi novo dešavanje</a></button>
            </div>
        </div>


    </div>

</div>
</body>
</html>
