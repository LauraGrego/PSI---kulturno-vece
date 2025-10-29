<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="retriveSlika.js"></script>
  <link href="style.css" rel="stylesheet">
  <title>Početna</title>
</head>
<body>
  <div class="container">

    <div id="header1" class="row">
          <div class="col-sm">
            <a href="index2.php" class="deo1" id="alogo">
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
  <div class="container" id = "kontejner">
    <h1 class="naziv"> KULTURNO VEČE </h1>
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

</body>
</html>

<?php
/**
 * Autori:
 * Laura Grego 20/0204
 * Lara Stevanovic 20/0620
 */
error_reporting(E_ALL & ~E_WARNING);
$mejl = $_POST['mail'] ?? null ;
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
 * fja za ucitavanje slike prijavljenog korisnika
 */
$query = "SELECT Putanja FROM Slika JOIN Korisnik ON Slika.idSlike = Korisnik.idSlike WHERE Korisnik.Email = :email";
$stmt = $pdo->prepare($query);
$stmt->bindValue(':email', $mejl, PDO::PARAM_STR);
$stmt->execute();
$imagePath = $stmt->fetchColumn();
echo $imagePath;
?>
