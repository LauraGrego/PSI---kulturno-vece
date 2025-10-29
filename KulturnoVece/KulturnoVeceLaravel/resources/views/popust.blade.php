<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="style.css" rel="stylesheet">
    <title>Popust</title>
</head>
<body id="bodyDesavanja">
<div id="header">
    <nav id="navigacija">
        <a href="" class="deo" id="alogo">
            <img src="slike/logo.jpg" alt="Logo" id="logo">
        </a>
        <a href="index2.php" class="deo">Početna </a>
        <a href="desavanja2.php" class="deo">Dešavanja</a>
        <a href="kontakt2.php" class="deo">Utisci i kontakt</a>
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
    </nav>
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
            <tr>
                <td>10</td>
                <td>2%</td>
            </tr>
            <tr class="active-row">
                <td>20</td>
                <td>5%</td>
            </tr>
            <tr>
                <td>40</td>
                <td>10%</td>
            </tr>
            <tr class="active-row">
                <td>50</td>
                <td>15%</td>
            </tr>
            <tr>
                <td>60</td>
                <td>17%</td>
            </tr>
            <tr class="active-row">
                <td>70+</td>
                <td>20%</td>
            </tr>

            </tbody>
        </table>
    </div>
</div>

</body>
</html>
