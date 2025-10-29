<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href=" style.css" rel="stylesheet">
    <script src="obavestenja.js"></script>
    <title>Rezervacija</title>
</head>
<body id="regBody">
<div id="header1" class="row">
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
                <a href="nagradnaIgra.php">Nagradna igra</a>
                <a href="popust.php">Ostvaren popust</a>
                <a href="index.php">Odjava</a>
            </div>
        </div>
    </div>
</div>
<div id="novi">
    <div class="container" id="divZaPretplatu2">
        <div class="row">
            <h1 class="col-sm">Rezerviši i uplati</h1>
        </div>
        <div class="first_row row">
            <div class="owner col-sm-6">
                <h3>Vlasnik kartice</h3>
                <div class="input_field">
                    <input type="text">
                </div>
            </div>
            <div class="CVV col-sm-6">
                <h3>CVV</h3>
                <div class="input_field">
                    <input type="password">
                </div>
            </div>
        </div>
        <div class="second_row row">
            <div class="card-number col-sm-12">
                <h3>Broj kartice</h3>
                <div class="input_field">
                    <input type="text">
                </div>
            </div>
        </div>
        <div class="third-row row">
            <div class="col-sm-6">
                <h3>Datum isteka</h3>
                <div class="selection">
                    <div class="date">
                        <select name="months" id="months">
                            <option value="Jan">Jan</option>
                            <option value="Feb">Feb</option>
                            <option value="Mar">Mar</option>
                            <option value="Apr">Apr</option>
                            <option value="May">Maj</option>
                            <option value="Jun">Jun</option>
                            <option value="Jul">Jul</option>
                            <option value="Aug">Avg</option>
                            <option value="Sep">Sep</option>
                            <option value="Oct">Okt</option>
                            <option value="Nov">Nov</option>
                            <option value="Dec">Dec</option>
                        </select>
                        <select name="years" id="years">
                            <option value="2020">2027</option>
                            <option value="2019">2026</option>
                            <option value="2018">2025</option>
                            <option value="2017">2024</option>
                            <option value="2016">2023</option>
                            <option value="2015">2022</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="cards col-sm-6">
                <img src="slike/mc.png" alt="">
                <img src="slike/vi.png" alt="">
                <img src="slike/pp.png" alt="">
            </div>
        </div>
        <div class="cekiraj row">
            <div class="col-sm">
                <input type="checkbox" /><label>
                    Slažem se sa uslovima plaćanja.
                </label>
            </div>
        </div>
        <div class="row">
        <button type="submit" class="login-btn2" onclick="potvrdaRez()">Potvrdi</button>
    </div>
</div>
</div>

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
