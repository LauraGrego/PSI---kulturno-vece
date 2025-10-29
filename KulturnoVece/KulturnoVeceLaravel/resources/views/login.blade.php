<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="proveraPodataka.js"></script>
    <link href="style.css" rel="stylesheet">
    <title>Prijava</title>
</head>
<body id="loginBody">
<div class="container">

    <div id="header" class="row">
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
    <div class = "mainLog" >
        <div class="form-box container">
            <div class="row">
                <h1>Prijava</h1>
            </div>
            <form class="row" id ="formaLogin" action="#">
                <div class="input-box row">
                    <div class="col-sm" id="greskeUpis">
                        <span class="icon" id="greskaLog" ></span>
                    </div>
                </div>
                <div class="input-box row">
                    <div class="col-sm">
                        <label>Email</label>
                        <ion-icon name="mail-outline"></ion-icon>
                    </div>
                    <div class="col-sm">
                        <input type="email" id="mejl1">
                    </div>
                </div>
                <div class="input-box row">
                    <div class="col-sm">
                        <label>Lozinka</label>
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </div>
                    <div class="col-sm">
                        <input type="password"  id="lozinka1" style="-webkit-text-security: circle;" />
                    </div>

                </div>
                <div class="rememberMe row">
                    <label class="col-sm">
                        <span class="icon" ></span>
                        <input type="checkbox" /> Zapamti me</label>
                    <a href="zaboravljenaLozinka.php" class="forgot col-sm" >Zaboravljena lozinka?</a>
                </div>

                <div class="dugmence row">
                    <!-- <div class="col-sm-4"></div> -->
                    <div class="col-sm" id="dugmePrijava">
                        <button type="submit" class="login-btn" onclick="ulogujSe()">Prijavi se</button>
                    </div>

                    <!-- <div class="col-sm-4"></div> -->
                </div>
                <div class="login-reg row">
                    <p> Nemaš nalog? <a href="register.php" id="registrujse">Registruj se</a></p>

                </div>
            </form>

        </div>
    </div>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</div>

</body>
</html>
