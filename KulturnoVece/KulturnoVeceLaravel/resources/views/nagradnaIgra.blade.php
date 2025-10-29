<!DOCTYPE html>
<html id="htmlNagradna" lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="nagradna.js"></script>
    <title>Nagradna Igra</title>
</head>
<body id="bodyNagradna">
<div id="header" class="row">
    <div class="col-sm">
        <a href="index2.php" class="deo1" id="alogo">
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
<div class="nagradaPodaci">
    <span id="naslovIgre">Nagradna igra</span>
    <!--<h1 id="naslovIgre">Nagradna Igra</h1>-->
    <div id="nagrada">

        <!--
          <h4 id="opisIgre">za april 2023.</h4>
        -->

        <!--
          <button id="ucestvovanje"><a href="ucestvovanjeNagradna.html">Učestvuj</a></button>
        -->

        <div id="tocak" class="container">
            <div class="jedan">Učestvuj u igri</div>
            <div class="dva">20. - 30.04.2023.</div>
            <div class="tri">2x ulaznice po izboru</div>
            <div class="cetiri">Jedan nasumičan dobitnik</div>
            <div class="pet">Izvlačenje prvog u mesecu</div>
            <div class="sest">Srećno!</div>
        </div>
        <!--<span class="izmedju"></span>-->
        <button id="okreni" onclick="okreciSe()">igraj</button>
    </div>

    <!--
    <div id="opisOIgri">
      <h1 class="igraNaslov">Trajanje:</h1>
      <h5 class="igraOpis">20.04.2023. - 30.04.2023.</h5>
      <h1 class="igraNaslov">Nagrade:</h1>
      <h5 class="igraOpis">2x ulaznice po izboru</h5>
      <h1 class="igraNaslov">Opis:</h1>
      <h5 class="igraOpis">Pravo učešća nagradnoj igri imaju sva punoletna fizička lica - državljani Republike Srbije koji imaju prebivalište na teritoriji Republike Srbije.
      <br>Pravo učešća nemaju lica zaposlena kod priređivača ili bilo kojeg drugog pravnog lica koje učestvuje u organizovanju i sprovođenju ove nagradne igre, kao ni njihovi članovi uže porodice.</h5>
      <h1 class="igraNaslov">Izbor dobitnika:</h1>
      <h5 class="igraOpis">Dobitnik će biti izvučen nasumično 01.05.2023.</h5>
    </div>
    -->

</div>
</body>
</html>
