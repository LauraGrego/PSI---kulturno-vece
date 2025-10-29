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
    <script src="nalog.js"></script>
  <link href="style.css" rel="stylesheet">
  <script src="obavestenja.js"></script>
  <title>Izmena naloga</title>
</head>
<body id="loginBody">

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
    <div class="okvirIzmene">
        <div class="smestanjeIzmene">
            <div id="zaSliku">
                <div id="slikaKorisnika">
                    <div id="prs">
                        <div class="imeIprezime">
                            <p id="labelaIme"> Ime Prezime</p>
                        </div>
                        <img src="slike/user.jpg" alt="slika" id="profilnaSlika">
                    </div>
                    <div id="promeniSliku">
                        Promeni sliku profila:&nbsp <input type="file" id="urlSlike" name="profileImage">
                    </div>
                    <div class="podaci">
                        <div class="prijavljenKao" id="prijava">
                            <p>Prijavljeni ste kao : </p>
                        </div>
                        <div class="prijavljenKao" id="korisnickoIme">
                            <p>Vaše korisničko ime: </p>
                        </div>
                        <div class="prijavljenKao" id="email">
                            <p> Vaše e-mail : </p>
                        </div>
                    </div>
                    <div class="podaci">
                        <div class="prijavljenKao" id="prijava1">
                            korisnik
                        </div>
                        <div class="prijavljenKao" id="korisnickoIme1">
                            username
                        </div>
                        <div class="prijavljenKao" id="email1">
                            mail@gmail.com
                        </div>
                    </div>
                    <div id="promeniSifru">
                        <button type="submit" class="dugmiciNalog" onclick="promenaSifre() " id="sifradugmee">Promeni šifru profila</a> </button>
                    </div>
                    <div class="dugmiciPromene">
                        <div id="potvrdiPromene">
                            <button type="submit" class="dugmiciNalog" id="potvrdaSlike">Potvrdi</a> </button>
                        </div>
                        <div id="ponistiPromene">
                            <button type="submit" class="dugmiciNalog" >Poništi</a> </button>
                        </div>
                    </div>

                </div>


            </div>
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
$mail = $_POST['mail'] ?? null;
$ajaxr=$_POST['ajaxr'] ?? null;
$host = 'DESKTOP-GRI63NU';
$dbname = 'kulturnovece';
if ($ajaxr==1){
    /**
     * fja za uzimanje podataka o korisniku za njegov nalog
     */
    try {
        $pdo = new PDO("sqlsrv:Server=$host;Database=$dbname");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        die();
    }

    $query="SELECT * FROM Korisnik JOIN Slika on Korisnik.IdSlike=Slika.IdSlike WHERE Korisnik.Email = :email";
    $statement = $pdo->prepare($query);
    $statement->bindValue(':email', $mail, PDO::PARAM_STR);
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
else if($ajaxr==2){
    /**
     * fja za postavljanje nove slike korisnika, izvrsavanje upita PromeniSlikuProfila u bazi
     **/
    try {
        $pdo = new PDO("sqlsrv:Server=$host;Database=$dbname");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        die();
    }
    $putDoSlike=$_POST['put'] ?? null;
    $sql = "EXEC dbo.PromeniSlikuProfila @novPut = :novPut, @mejl = :mejl";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':novPut', $putDoSlike, PDO::PARAM_STR);
    $stmt->bindParam(':mejl', $mail, PDO::PARAM_STR);
    $stmt->execute();
    if ($stmt->errorCode() !== '00000') {
        $errorInfo = $stmt->errorInfo();
        echo "Error executing stored procedure: " . $errorInfo[2];
    } else {
        echo "Stored procedure executed successfully.";
    }
}
else{

    $slika = $_FILES['profileImage'] ?? null;
    $targetDir = 'slike2/'; // Specify the target folder where the image will be saved
    $put=$slika['name'];
    $targetFile = $targetDir.basename($put);
    $uploadSuccess = move_uploaded_file($slika['tmp_name'], $targetFile);
    if ($uploadSuccess) {
        echo 'Image uploaded successfully.';
    } else {
        echo 'Error uploading image.';
    }

}

?>
