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
    <script src="popust.js"></script>
    <link href="style.css" rel="stylesheet">
    <title>Popust</title>
</head>
<body id="bodyDesavanja">
<div id="header" class="row">
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
<div id="okvirP">
    <div id="tabelaDiv">
        <table class="styled-table" style="text-align:center;">
            <thead>
            <tr>
                <th>Broj kupljenih karata</th>
                <th>Ostvaren popust u procentima</th>
            </tr>
            </thead>
            <tbody>
            <tr class="passive-row">
                <td>10</td>
                <td>2%</td>
            </tr>
            <tr class="active-row">
                <td>20</td>
                <td>5%</td>
            </tr>
            <tr class="passive-row">
                <td>40</td>
                <td>10%</td>
            </tr>
            <tr class="active-row">
                <td>50</td>
                <td>15%</td>
            </tr>
            <tr class="passive-row">
                <td>60</td>
                <td>17%</td>
            </tr>
            <tr class="active-row">
                <td>70+</td>
                <td>20%</td>
            </tr>

            </tbody>
        </table>
        <span class="bg-light" id="popustS" style="font-family:Arial, Helvetica, sans-serif; position: relative; top:20%;">Vaš ostvaren popust je: </span>
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
* Uzimanje Broja kupljenih karata iz baze
 */
$mejl = $_POST['mail'] ?? null;
$sql = "SELECT BrojKupljenihKarata FROM dbo.Korisnik WHERE Email = :mail";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);
$brojKupljenihKarata = $result['BrojKupljenihKarata'];
if ($brojKupljenihKarata==0) echo 0;
else echo $brojKupljenihKarata;
?>
