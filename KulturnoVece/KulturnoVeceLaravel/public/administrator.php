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
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="adminPanel.js"></script>
    <link href="style.css" rel="stylesheet">
    <script src="obavestenja.js"></script>
    <title>Administrator</title>
</head>
<body id="kontaktB">
  <div class="container">
    <div id="header" class="row">
          <div class="col-sm">
            <a href="index4.php" class="deo" id="alogo">
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

    <div class="row">
        <div class="col-6">
            <div class="row" style="margin-top: 40%">
                <label id="countdownLabel" class="d-inline-block">;</label>
                <button type="submit" class="btn btn-outline-secondary btn-sm btn-rounded btn-sm" id="dugmetocak">Izvucite srećnog dobitnika!</button>
            </div>
            <div class="row">
                <img class="img-fluid bigger-image" src="slike/lw.png" id="slikatocka">
            </div>
        </div>
        <div class="col-6" id="prveraPretplata">
            <div class="row">
                <button class="btn btn-outline-secondary btn-sm btn-rounded btn-sm" id="pretplateProvera">Proveri pretplate</button>
            </div>
            <div class="row" id="divSQL">
                <div class="row" id="redKom" >
                    <p id="pristupBazi">Unesite SQL skriptu za pregled baze</p>
                    <textarea id="sqlZaBazu" class="form-control moja" rows="4" style="font-family:sans-serif;font-size:1.2em; font-size: small;">"SELECT TABLE_NAME
FROM INFORMATION_SCHEMA.TABLES
WHERE TABLE_TYPE = 'BASE TABLE' AND TABLE_CATALOG='kulturnovece'"</textarea>
                </div>
            </div>
            <div class="row" id="nbt">
                <div class="col-md-6">
                    <button class="btn btn-outline-secondary btn-sm btn-rounded btn-sm" id="skripta">Pokreni skriptu</button>
                </div>

            </div>
        </div>

    </div>

      <div class="modal" id="tableModal" tabindex="-1" role="dialog">
          <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title">Rezultat:</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="close2">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                  <div class="modal-body">
                      <div id="tableContainer"></div>
                  </div>
              </div>
          </div>
      </div>


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
/**
 * Fja za updateovanje pretplate
 */
$ajaxR=$_POST['requestType'] ?? null;
if ($ajaxR=='ajax10'){
    $sql="EXEC dbo.CheckAndUpdateSubscriptions";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    echo 2;
}
else if ($ajaxR=='ajax11'){
    /**
     * Fja za nagradnu igru
     */
    $sql="SELECT Email from dbo.VratiUcesnikeIgre()";

    $result = $pdo->query($sql);

    $emails = $result->fetchAll(PDO::FETCH_COLUMN);

    $randomEmail = null;
    if (!empty($emails)) {
        $randomIndex = array_rand($emails);
        $randomEmail = $emails[$randomIndex];
    }
    $sql="UPDATE dbo.Korisnik set NagradnaIgra=0 where NagradnaIgra=1";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    echo $randomEmail;
}
else if ($ajaxR=='ajax50'){
    $query=$_POST['skripta'] ?? null;
    $statement = $pdo->prepare($query);
    $statement->execute();
    $results = $statement->fetchAll(PDO::FETCH_ASSOC);
    $objects = [];
    foreach ($results as $row) {
        $object = new stdClass();
        foreach ($row as $key => $value) {
            $object->$key = $value;
        }
        $objects[] = $object;
    }

    $jsonData = json_encode($objects);
    header('Content-Type: application/json');
    echo $jsonData;

}

?>
