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
    <script src="komentari.js"></script>
    <link href="style.css" rel="stylesheet">
    <title>Utisci i kontakt</title>
</head>
<body id="kontaktB">
<div class="container">

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
    <!-- <div id="div3" ></div> -->
    <div class="row" id="div4">
        <div class="row" id="redKom" >
        <textarea name="comments" class="col-sm-12" id="comments" style="font-family:sans-serif;font-size:1.2em; font-size: small;">
        </textarea>
        </div>
        <div class="row" id="btnKomRed">
            <div class="col-sm-6"></div>
            <button id="btnKom"><a href="#" id="prijaviZaKom"> Ostavi komentar </a></button>
        </div>
    </div>
    <div class="row">
        <h1 id="naslovKom" class="col-sm-12">Komentari:</h1>
    </div>
    <div id="divSaKoms">


    </div>
    <div class="row" id="kontaktDiv">
        <a href="mailto:gl200204d@student.etf.bg.ac.rs?subject = Feedback&body = Message"  class="col-sm-12"  id="konaktirajte" >Kontaktirajte nas!</a>
    </div>
</div>
</div>


</body>
</html>

<?php
$mail = $_POST['mail'] ?? null;
$ajaxr=$_POST['ajaxr'] ?? null;
$host = 'DESKTOP-GRI63NU';
$dbname = 'kulturnovece';
try {
    $pdo = new PDO("sqlsrv:Server=$host;Database=$dbname");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
    die();
}
if ($ajaxr=="ajax9"){
    $tekstKom=$_POST['tekst'] ?? null;
    try {
        // Prepare the SQL statement with named parameters
        $sql = "EXEC dbo.DodajKomentar @mail = :mail, @Tekst = :tekst";
        $stmt = $pdo->prepare($sql);

        // Bind the input values to the named parameters
        $stmt->bindParam(':mail', $mail, PDO::PARAM_STR);
        $stmt->bindParam(':tekst', $tekstKom, PDO::PARAM_STR);

        // Execute the statement
        $stmt->execute();

        echo "Komentar successfully added.";
    } catch (PDOException $e) {
        echo "Error executing stored procedure: " . $e->getMessage();
    }
}
else if($ajaxr=="ajax5"){
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
?>
