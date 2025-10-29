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
    <script src="komentarAdmin.js"></script>
    <link href="style.css" rel="stylesheet">
    <script src="obavestenja.js"></script>
    <title>Utisci i kontakt</title>
</head>
<body id="kontaktB">
  <div class="container" >
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
          <h1 id="naslovKom" class="col-sm-12">Komentari:</h1>
      </div>
      <div id="divSaKoms">
          <ul id="listaKomentara">

          </ul>

      </div>
      <div id="kontaktDiv" class="position-fixed bottom-0 end-0 p-2" style="background-color: #f8f9fa; color: #000; font-size: 12px; z-index: 9999;">
          <a href="mailto:gl200204d@student.etf.bg.ac.rs?subject=Feedback&body=Message" id="konaktirajte">Kontaktirajte nas!</a>
      </div>
  </div>


</body>
</html>

<?php
/**
* Autor:
 * Laura Grego 20/0204
 */
error_reporting(E_ALL & ~E_WARNING);

$ajaxr=$_POST['ajaxr'] ?? null;
$ajaxr2=$_POST['requestType'] ?? null;
$host = 'DESKTOP-GRI63NU';
$dbname = 'kulturnovece';
try {
    $pdo = new PDO("sqlsrv:Server=$host;Database=$dbname");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    die();
}
 if($ajaxr=="ajax5"){
    $query="SELECT * FROM dbo.DohvatiKomentareZaIspis()";
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
 if ($ajaxr2=='ajax22'){
     $opis=$_POST['opis'] ?? null;
     $query = "UPDATE dbo.Komentar SET obrisan = 1 WHERE Tekst = :opis";
     $statement = $pdo->prepare($query);
     $statement->bindParam(':opis', $opis);
     if ($statement->execute()) {
         echo "Update successful";
     } else {
         echo "Update failed";
     }
 }
?>
