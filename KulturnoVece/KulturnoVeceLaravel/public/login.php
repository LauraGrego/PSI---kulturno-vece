<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://smtpjs.com/v3/smtp.js"></script>

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
                <div class="probica">
                    <a href="login.php" class="deo" >Prijavi se</a>
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
                          <input type="checkbox" id="pamcenje"/> Zapamti me</label>
                        <a href="#" class="forgot col-sm" onclick="sifraZab()">Zaboravljena lozinka?</a>
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



</body>
</html>


<?php
/**
 * Autori:
 * Laura Grego 20/0204
 * Lara Stevanovic 20/0620
 */
$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null;

$host = 'DESKTOP-GRI63NU';
$dbname = 'kulturnovece';

try {
    $pdo = new PDO("sqlsrv:Server=$host;Database=$dbname");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    die();
}
/**
 * fja za proveru uloge korisnika prilikom prijavljivanja, izvrsavanjem upita fProveraKredencijala()
 */
$sql = "SELECT dbo.fProveraKredencijala(?, ?) AS result";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(1, $username, PDO::PARAM_STR);
$stmt->bindParam(2, $password, PDO::PARAM_STR);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC)['result'];
if($result==-1) $result=4;
if ($result==-2) $result=5;
$role=$result;
echo $role;
?>
