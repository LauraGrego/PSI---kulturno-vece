<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="prijavaOsobe.js"></script>
    <script src="restart.js"></script>
  <link  href="style.css" rel="stylesheet">
  <link rel="stylesheet" media="mediatype and|not|only (expressions)" href="print.css">
  <title>Početna</title>
</head>
<body>
  <div class="container">

      <div id="header1" class="row">
          <div class="col-sm">
              <a href="index.php" class="deo" id="alogo">
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
                  <a href="#" onclick="prijava()" class="deo" >Prijavi se</a>
              </div>
          </div>
      </div>
  </div>
    <div class="row" id = "kontejner">
      <div class="col-sm-12">
        <h1 class="naziv text-center"> &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;KULTURNO VEČE </h1>
      </div>
      <ul class="cb-slideshow">
        <li>
          <span>Image 01</span>
        </li>
        <li>
          <span>Image 02</span>
        </li>
        <li>
          <span>Image 03</span>
        </li>
        <li>
          <span>Image 04</span>
        </li>
      </ul>
    </div>
  </div>
</body>
</html>


<?php
error_reporting(E_ALL & ~E_WARNING);
/**
 * Autori:
 * Laura Grego 20/0204
 * Lara Stevanovic 20/0620
 */
$username = $_POST['username'];
$password = $_POST['password'];

$host = 'DESKTOP-GRI63NU';
$dbname = 'kulturnovece';

try {
    $pdo = new PDO("sqlsrv:Server=$host;Database=$dbname");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    die();
}

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
