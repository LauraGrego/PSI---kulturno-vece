<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href=" style.css" rel="stylesheet">
    <title>Registracija</title>
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
                <a href="index.php">Odjava</a>
            </div>
        </div>
    </div>
</div>
<section class = "mainRegister">
    <div class="form-login container">
        <div class="row">
            <h1 id="registracija">Registracija</h1>
        </div>
        <form action="#">
            <div class="input-box row">
                <div class="col-sm">
                    <label>Ime</label>
                    <span class="icon" ></span>
                    <ion-icon name="person-outline"></ion-icon>
                </div>
                <div class="col-sm">
                    <input type="name">
                </div>
            </div>
            <div class="input-box row">
                <div class="col-sm">
                    <label>Prezime</label>
                    <span class="icon" ></span>
                    <ion-icon name="person-outline"></ion-icon>
                </div>
                <div class="col-sm">
                    <input type="name">
                </div>
            </div>
            <div class="input-box row">
                <div class="col-sm">
                    <label>Korisnicko Ime</label>
                    <span class="icon" ></span>
                    <ion-icon name="person-outline"></ion-icon>
                </div>
                <div class="col-sm">
                    <input type="name">
                </div>
            </div>
            <div class="input-box row">
                <div class="col-sm">
                    <label>Email</label>
                    <span class="icon" ></span>
                    <ion-icon name="mail-outline"></ion-icon>
                </div>
                <div class="col-sm">
                    <input type="email">
                </div>
            </div>
            <div class="input-box row">
                <div class="col-sm">
                    <label>Lozinka</label>
                    <span class="icon" ></span>
                    <ion-icon name="lock-closed-outline"></ion-icon>
                </div>
                <div class="col-sm">
                    <input type="password" style="-webkit-text-security: star;" />
                </div>
            </div>
            <div class="input-box row">
                <div class="col-sm">
                    <label>Privilegije</label>
                    <span class="icon" ></span>
                    <ion-icon name="person-outline"></ion-icon>
                </div>
                <div class="col-sm">
                    <select name="" id="privilegije">
                        <option value="korisnik">Korisnik</option>
                        <option value="moderator">Moderator</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-sm">
                    <button type="submit" class="reg-btn"><a href="registerProcess.php" id="regTekst">Registruj</a></button>
                </div>
            </div>
        </form>

    </div>
</section>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
