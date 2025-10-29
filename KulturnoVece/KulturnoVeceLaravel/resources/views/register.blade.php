<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="proveraPodataka.js"></script>
    <link href=" style.css" rel="stylesheet">
    <title>Registracija</title>
</head>
<body id="regBody">
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
                <a href="index1.php" class="deo">Početna </a>
            </div>

        </div>
        <div class="col-sm">
            <div class="probica">
                <a href="desavanja1.php" class="deo">Dešavanja</a>
            </div>
        </div>
        <div class="col-sm">
            <div class="probica">
                <a href="kontakt1.php" class="deo">Utisci i kontakt</a>
            </div>
        </div>
        <div class="col-sm-1">
            <div class="probica">
            </div>
        </div>
        <div class="col-sm">
            <div class="dropdown">
                <h1 id="dropdownH"><img src="slike/user.jpg" alt="user?" id="userSlika"></h1>
                <button class="dropbtn">Prijavi se</button>
                <div class="dropdown-content">
                    <a href="login.php" class="navA">Prijava korisnika</a>
                    <a href="prijavaModerator.php" class="navA">Prijava kao moderator</a>
                    <a href="prijavaAdmin.php" class="navA">Prijava kao admin</a>
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
                <div class="greska-box row">
                    <div class="col-sm" id="greskeUpis">
                        <span class="icon" id="imeGreska" ></span>
                    </div>
                </div>
                <div class="input-box row">
                    <div class="col-sm">
                        <label>Ime</label>
                        <span class="icon" ></span>
                        <ion-icon name="person-outline"></ion-icon>
                    </div>
                    <div class="col-sm">
                        <input type="name" id="imeReg">
                    </div>
                </div>
                <div class="greska-box row">
                    <div class="col-sm" id="greskeUpis">
                        <span class="icon" id="prezimeGreska" ></span>
                    </div>
                </div>
                <div class="input-box row">
                    <div class="col-sm">
                        <label>Prezime</label>
                        <span class="icon" ></span>
                        <ion-icon name="person-outline"></ion-icon>
                    </div>
                    <div class="col-sm">
                        <input type="name" id="prezimeReg">
                    </div>
                </div>
                <div class="greska-box row">
                    <div class="col-sm" id="greskeUpis">
                        <span class="icon" id="korisnickoImeGreska" ></span>
                    </div>
                </div>
                <div class="input-box row">
                    <div class="col-sm">
                        <label>Korisnicko Ime</label>
                        <span class="icon" ></span>
                        <ion-icon name="person-outline"></ion-icon>
                    </div>
                    <div class="col-sm">
                        <input type="name" id="korisnickoImeReg">
                    </div>
                </div>
                <div class="greska-box row">
                    <div class="col-sm" id="greskeUpis">
                        <span class="icon" id="mejlGreska" ></span>
                    </div>
                </div>
                <div class="input-box row">
                    <div class="col-sm">
                        <label>Email</label>
                        <span class="icon" ></span>
                        <ion-icon name="mail-outline"></ion-icon>
                    </div>
                    <div class="col-sm">
                        <input type="email" id="mejlReg">
                    </div>
                </div>
                <div class="greska-box row">
                    <div class="col-sm" id="greskeUpis">
                        <span class="icon" id="lozinkaGreska" ></span>
                    </div>
                </div>
                <div class="input-box row">
                    <div class="col-sm">
                        <label>Lozinka</label>
                        <span class="icon" ></span>
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </div>
                    <div class="col-sm">
                        <input type="password"  id="lozinkaReg" style="-webkit-text-security: circle;"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                        <button type="submit" class="reg-btn" onclick="registrujSe()">Registruj se</button>
                    </div>
                </div>
            </form>

        </div>
    </section>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</div>
</body>
</html>


<!-- <a href="registerProcess.html" id="regTekst"></a> -->
