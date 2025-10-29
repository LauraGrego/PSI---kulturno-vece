<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="retriveSlika.js"></script>
    <script src="dodavanjeDesavanja.js"></script>
    <title>Izmena desavanja</title>
</head>
<body id="bodyNovoDesavanje">
    <div id="header" class="row">
        <div class="col-sm">
          <a href="index3.php" class="deo1" id="alogo">
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
                            <select name="tip" id="odabirTipa">
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
                    <h6 id="ostaloDesavanja">Naziv:&nbsp <input type="text" id="nazivDes"></h6>
                    <h6 id="ostaloDesavanja">Lokacija:&nbsp <input type="text" id="lokDes"></h6>
                    <h6 id="ostaloDesavanja">Vreme:&nbsp <input type="text" id="vrDes"></h6>
                    <h6 id="ostaloDesavanja">Cena ulaznice:&nbsp <input type="text" id="cenaDes"></h6>
                    <h6 id="ostaloDesavanja">
                        <div id="slikaDesavanja">
                            Slika:&nbsp <input type="file" id="urlSlike" name="profileImage">
                        </div>

                    </h6>
                </div>
                <h6 id="ostaloDesavanjaOpis">Opis:&nbsp&nbsp&nbsp <textarea name="opis" id="opis" style="font-family:sans-serif;font-size:1.2em; font-size: small;">
                </textarea></h6>
                <div id="dugmeObjavi">
                    <button type="submit" class="objavi-btn"><a href="#">Objavi novo dešavanje</a></button>
                </div>
            </div>


        </div>

    </div>
</body>
</html>


<?php
//error_reporting(E_ALL & ~E_WARNING);
/**
 * Autori:
 * Laura Grego 20/0204
 * Tijana Kamberovic 20/0283
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
if ($_POST['requestType']=='ajax1'){
    /**
    * Ubacivanje podataka u bazu.
     */
    $slika = $_FILES['profileImage'] ?? null;
    $targetDir = 'slike2/'; // Specify the target folder where the image will be saved
    $put=$slika['name'];
    $targetFile = $targetDir.basename($put);
    $uploadSuccess = move_uploaded_file($slika['tmp_name'], $targetFile);

    $tip=$_POST['tip'] ?? null;
    $datumVreme=$_POST['datumVreme'] ?? null;
    $naziv=$_POST['naziv'] ?? null;
    $lokacija=$_POST['lokacija'] ?? null;
    $opis=$_POST['opis'] ?? null;
    $put=$_POST['put'] ?? null;
    $cena=$_POST['cena'] ?? null;
    $sql = "EXEC dbo.ModeratorDodajeDesavanje @tip = :tip, @datumvreme = :datumvreme, @naziv = :naziv, @lokacija = :lokacija, @cena = :cena, @put = :put, @opis = :opis";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':tip', $tip);
    $stmt->bindParam(':datumvreme', $datumVreme);
    $stmt->bindParam(':naziv', $naziv);
    $stmt->bindParam(':lokacija', $lokacija);
    $stmt->bindParam(':cena', $cena);
    $stmt->bindParam(':put', $put);
    $stmt->bindParam(':opis', $opis);
    $stmt->execute();

// Check for errors
    if ($stmt->errorCode() !== '00000') {
        $errorInfo = $stmt->errorInfo();
        echo "Error executing procedure: " . $errorInfo[2];
    } else {
        echo "Procedure executed successfully.";
    }
}

?>

