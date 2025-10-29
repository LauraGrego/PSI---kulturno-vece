<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                  <a href="index.php" class="deo">Početna </a>
                </div>

              </div>
              <div class="col-sm">
                <div class="probica">
                <a href="desavanja.php.php" class="deo">Dešavanja</a>
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
                  <div class="dropdown-content">
                    <a href="login.php" class="probica" >Prijava korisnika</a>
                  </div>
                </div>
          </div>
        </div>
    <section class = "mainRegister">
        <div class="form-login container" id="problem">
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
</body>
</html>


<?php
error_reporting(E_ALL & ~E_WARNING);
/**
 * Autori:
 * Laura Grego 20/0204
 * Lara Stevanovic 20/0620

 */
// Assuming you have established a PDO database connection
$ime = $_POST['name'] ?? null;
$prezime = $_POST['surname'] ?? null;
$email = $_POST['mail'] ?? null;
$korisnickoIme = $_POST['username'] ?? null;
$lozinka = $_POST['password'] ?? null;
if ($ime!=null and $prezime!=null and $email!=null and $korisnickoIme!=null && $lozinka!=null ){
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
     * fja za proveru jedinstvenosti korisnickog imena
     */
    $sql = "SELECT dbo.fProveraKorIme(?) AS result";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(1, $korisnickoIme, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC)['result'];
    if ($result==-1){
        $response=1;
        echo $response;
    }
    else{
        /**
         * fja za proveru jedinstvenosti mejla
         */
        $sql = "SELECT dbo.fProveraMail(?) AS result";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(1, $email, PDO::PARAM_STR);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC)['result'];
        if ($result==-1){
            $response=2;
            echo $response;
        }
        else{
            /**
             * fja za dodavanje novog korisnika u bazu, izvrsavanje upita InsertKorisnik
             */
            $sql = "EXEC dbo.InsertKorisnik @Ime=?, @Prezime=?, @Email=?, @KorisnickoIme=?, @Lozinka=?";

            $stmt = $pdo->prepare($sql);

            $stmt->bindParam(1, $ime) ;
            $stmt->bindParam(2, $prezime) ;
            $stmt->bindParam(3, $email);
            $stmt->bindParam(4, $korisnickoIme) ;
            $stmt->bindParam(5, $lozinka);


            $stmt->execute();

            $stmt = null;
            $pdo = null;
            $response=0;
            echo 9;
        }
    }


}



?>

