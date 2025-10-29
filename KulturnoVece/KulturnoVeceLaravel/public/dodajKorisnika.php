<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="retriveSlika.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="adminDodajeKorisnika.js"></script>
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
                <a href="administrator.php">Administratorski panel</a>
            <a href="index.php">Odjava</a>
            </div>
          </div>
    </div>
  </div>
    <section class = "mainRegister"  id="problemForma">
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
                      <input type="name" id="imeAdm">
                    </div>
                </div>
                <div class="input-box row">
                  <div class="col-sm">
                    <label>Prezime</label>
                    <span class="icon" ></span>
                    <ion-icon name="person-outline"></ion-icon>
                  </div>
                  <div class="col-sm">
                    <input type="name" id="prezAdm">
                  </div>
              </div>
                <div class="input-box row">
                  <div class="col-sm">
                    <label>Korisnicko Ime</label>
                    <span class="icon" ></span>
                    <ion-icon name="person-outline"></ion-icon>
                  </div>
                  <div class="col-sm">
                    <input type="name" id="korImeAdm">
                  </div>
                </div>
                <div class="input-box row">
                  <div class="col-sm">
                    <label>Email</label>
                    <span class="icon" ></span>
                    <ion-icon name="mail-outline"></ion-icon>
                  </div>
                  <div class="col-sm">
                    <input type="email" id="emailAdm">
                  </div>
                </div>
                <div class="input-box row">
                  <div class="col-sm">
                    <label>Lozinka</label>
                    <span class="icon" ></span>
                    <ion-icon name="lock-closed-outline"></ion-icon>
                  </div>
                  <div class="col-sm">
                    <input type="password" style="-webkit-text-security: circle;" id="lozAdm"/>
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
                <div class="input-box row" id="brTelefonaa" hidden>
                    <div class="col-sm">
                        <label>Broj telefona</label>
                        <span class="icon" ></span>
                        <ion-icon name="call-outline"></ion-icon>
                    </div>
                    <div class="col-sm">
                        <input type="text" id="brTelAdm" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm">
                      <button type="submit" class="reg-btn"><a href="#" id="regTekstAdm">Registruj</a></button>
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
/**
 * Autor:
 * Laura Grego 20/0204
 * */
    error_reporting(E_ALL & ~E_WARNING);

    $host = 'DESKTOP-GRI63NU';
    $dbname = 'kulturnovece';
    try {
        $pdo = new PDO("sqlsrv:Server=$host;Database=$dbname");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        die();
    }

    $ime = $_POST['name'] ?? null;
    $prezime = $_POST['surname'] ?? null;
    $email = $_POST['mail'] ?? null;
    $korisnickoIme = $_POST['username'] ?? null;
    $lozinka = $_POST['password'] ?? null;
    $tip=$_POST['tip'] ?? null;
    $ajaxR=$_POST['ajaxr'] ?? null;
    $brtel=$_POST['tel'] ?? null;
    if ($ajaxR=='ajax1'){
        /**
         * Fja koja proverava da li je korisnicko ime zauzeto
         * */
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
             * Fja koja proverava da li je email vec iskoriscen
             * */
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
                 * Fja koja dodaje korisnika u bazu kao vrstu korisnika koju je administrator dodelio
                 * */
                $sql = "EXEC dbo.InsertKorisnik @Ime=?, @Prezime=?, @Email=?, @KorisnickoIme=?, @Lozinka=?";

                $stmt = $pdo->prepare($sql);

                $stmt->bindParam(1, $ime) ;
                $stmt->bindParam(2, $prezime) ;
                $stmt->bindParam(3, $email);
                $stmt->bindParam(4, $korisnickoIme) ;
                $stmt->bindParam(5, $lozinka);


                $stmt->execute();

                if ($tip=="korisnik") echo 9;
                else if ($tip=="moderator"){
                    $sql = "INSERT INTO dbo.Moderator (KorisnickoIme) VALUES (?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(1, $korisnickoIme);
                    $stmt->execute();
                    echo 9;

                }
                else if ($tip=="admin"){
                    $sql = "INSERT INTO dbo.Administrator (KorisnickoIme, BrojTelefona) VALUES (?, ?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(1, $korisnickoIme);
                    $stmt->bindParam(2, $brtel);
                    $stmt->execute();
                    echo 9;

                }
            }
        }


        $stmt = null;
        $pdo = null;
    }
?>
