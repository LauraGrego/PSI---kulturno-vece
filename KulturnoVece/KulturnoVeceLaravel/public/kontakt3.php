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
  <div id="header" class="row">
    <div class="col-sm">
      <a href="" class="deo1" id="alogo">
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
          <!-- <div id="div3" ></div> -->

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
  </div>

</body>
</html>
