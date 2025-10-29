<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="retriveSlika.js"></script>
    <script src="pretplatiKor.js"></script>
    <link href=" style.css" rel="stylesheet">
    <script src="obavestenja.js"></script>
    <title>Pretplata</title>
</head>
<body id="regBody">
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
    <div id="zaPretplatuDiv">
        Za samo 800 dinara mesečno, postani naš VIP korisnik,
            ostvari mnoge beneficije, kao što su: <br>
            <ul id="trebaTip">
                <li>Ostvarivanje popusta</li>
                <li>Učestvovanje u nagradnoj igri</li>
                <li>I još mnoge druge</li>
              </ul>
        <br>
        Ne zaboravite, morate se pretplatiti svakog meseca!
    </div>
    <div id="novi">
      <div class="container" id="divZaPretplatu2">
        <div class="row">
           <h1 class="col-sm">Pretplati se</h1>
        </div>
        <div class="first_row row">
          <div class="owner col-sm-6">
            <h3>Vlasnik kartice</h3>
            <div class="input_field">
              <input type="text" id="vlasnikkartice">
            </div>
          </div>
          <div class="CVV col-sm-6">
            <h3>CVV</h3>
            <div class="input_field">
              <input type="password" id="cvvK">
            </div>
          </div>
        </div>
        <div class="second_row row">
          <div class="card-number col-sm-12">
            <h3>Broj kartice</h3>
            <div class="input_field">
              <input type="text" id="brojKartice">
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
          <input type="checkbox" id="slaganje"/><label>
            Slažem se sa uslovima plaćanja.
          </label>
        </div>
      </div class="row">
      <button type="submit" class="login-btn2" id="potvrPret">Potvrdi</button>
      </div>
    </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>
</html>
<?php
error_reporting(E_ALL & ~E_WARNING);
/**
*Autor:
 * Laura Grego 20/0204
 */
$host = 'DESKTOP-GRI63NU';
$dbname = 'kulturnovece';
try {
    $pdo = new PDO("sqlsrv:Server=$host;Database=$dbname");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    die();
}

$mail = $_POST['mail'] ?? null;
$sql = "SELECT Pretplacen FROM dbo.Korisnik WHERE Email = :mail";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);
$pretplacen = $result['Pretplacen'];
if ($pretplacen==0) {
    try {
        // Prepare the SQL statement with named parameters
        $sql = "EXEC dbo.procPretplati @mail = :mail";
        $stmt = $pdo->prepare($sql);

        // Bind the input values to the named parameters
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);

        // Execute the statement
        $stmt->execute();

        echo "Komentar successfully added.";
    } catch (PDOException $e) {
        echo "Error executing stored procedure: " . $e->getMessage();
    }
}
else{
    echo 2;
}
?>
