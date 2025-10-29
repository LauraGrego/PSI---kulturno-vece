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
    <link href="style.css" rel="stylesheet">
    <title>Dešavanja</title>
</head>
<body id="bodyDesavanja">
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
    <div class="row" id="okvir">
        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-3">
            <div class="poljePretrage" id="datumDog">
                <label id="tipDogadjaja"  form="tip">Datum događaja:</label>
                <input type="date" name="" id="datum" ">
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-3">
            <div class="poljePretrage" id="tipDog">
                <label id="tipDogadjaja"  form="tip">Tip događaja:</label>
                <select name="tip" id="moraID">
                    <option value="Sve">Sve</option>
                    <option value="Film">Film</option>
                    <option value="Predstava">Predstava</option>
                    <option value="Stand up show">Stand up show</option>
                    <option value="Koncert">Koncert</option>
                    <option value="Izložba">Izložba</option>
                    <option value="Ostalo">Ostalo</option>
                </select>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-3">
            <div class="poljePretrage" id="tipDog">
                <label id="tipDogadjaja"  form="tip">Lokacija događaja:</label>
                <select name="tip" id="loka">
                    <option value="Sve">Sve</option>
                    <option value="Novi Beograd">Novi Beograd</option>
                    <option value="Zemun">Zemun</option>
                    <option value="Zvezdara">Zvezdara</option>
                    <option value="Palilula">Palilula</option>
                    <option value="Voždovac">Voždovac</option>
                    <option value="Vračar">Vračar</option>
                    <option value="Stari grad">Stari grad</option>
                    <option value="Savski venac">Savski venac</option>
                    <option value="Čukarica">Čukarica</option>
                </select>
            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-3">
            <input type="search" placeholder="Pretraži" id="search-field" />
            <button type="submit" class="search-button" id="lupica">
                <img src="slike/pokusaj.png">
            </button>
        </div>
    </div>
    <div class="row" id="desavanja">
        <ul class="row" id="listaDesavanja">
        </ul>
    </div>
</div>
</body>
</html>



<?php

/**
 * Autori:
 * Laura Grego 20/0204
 * Tijana Kamberovic 20/0283
*/

error_reporting(E_ALL & ~E_WARNING);

$username = $_POST['username'] ?? null;
$password = $_POST['password'] ?? null ;
$requestType=$_POST['requestType'] ?? null;
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
 * Fja za dinamicki ispis desavanja koja se dohvataju iz baze
 *
 */
if ($requestType=='ajax1'){
    $query="SELECT * FROM dbo.fIspisDesavanja()";
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
/**
 * Fja za otvaranje odgovarajuce stranice u zavisnosti od uloge korisnika
 *
 */
if ($requestType=='ajax2'){
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
}


?>
