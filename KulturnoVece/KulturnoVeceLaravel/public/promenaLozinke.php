<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="promenaLozinke.js"></script>
    <link href=" style.css" rel="stylesheet">
    <title>Lozinka</title>
</head>
<body style="background-image: url(slike/soft.jpg);">
<header></header>
<div>
    <div class = "mainLog" >
        <div class="form-box container">
            <div class="row">
                <h1>Promena lozinke</h1>
            </div>
            <form class="row" id ="formaLogin" action="#">
                <div class="input-box row">
                    <div class="col-sm" id="greskeUpis11">
                        <span class="icon" id="greskaLog11" ></span>
                    </div>
                </div>
                <div class="input-box row">
                    <div class="col-sm">
                        <label>Nova lozinka</label>
                        <ion-icon name="mail-outline"></ion-icon>
                    </div>
                    <div class="col-sm">
                        <input type="password" id="lozinka11" style="-webkit-text-security: circle;"">
                    </div>
                </div>
                <div class="input-box row">
                    <div class="col-sm">
                        <label>Potvrda lozinke</label>
                        <ion-icon name="lock-closed-outline"></ion-icon>
                    </div>
                    <div class="col-sm">
                        <input type="password"  id="lozinka12" style="-webkit-text-security: circle;" />
                    </div>

                </div>

                <div class="dugmence row">
                    <!-- <div class="col-sm-4"></div> -->
                    <div class="col-sm" id="dugmePromena">
                        <button type="submit" class="login-btn" ">Potvrdi</button>
                    </div>

                    <!-- <div class="col-sm-4"></div> -->
                </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>
<?php
error_reporting(E_ALL & ~E_WARNING);
/**
* Autor:
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
$mejl = $_POST['mejl'] ?? null;
$loz=$_POST['novalozinka'] ?? null;
$sql = "UPDATE dbo.Korisnik SET Lozinka=: loz where Email = :mejl";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':mail', $mejl, PDO::PARAM_STR);
$stmt->bindParam(':loz', $loz, PDO::PARAM_STR);
$stmt->execute();

?>
