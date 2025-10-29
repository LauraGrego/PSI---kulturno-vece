$(document).ready(function() {
    const kontaktDiv = document.getElementById('kontaktDiv');

    kontaktDiv.addEventListener('mouseenter', () => {
        kontaktDiv.style.visibility = 'hidden';
    });
    /**
     * Autor:
     * Laura Grego 2020/0204
     * */
    var buttons = document.getElementsByClassName('obrisiKom');
    let mail=sessionStorage.getItem("mail");
    $("#btnKom").click(function(){
        let tekstKom=$("#comments").val();
        console.log(tekstKom+" "+mail)
        $.ajax({
            url: "kontakt4.php",
            type: 'POST',
            data: {ajaxr: 'ajax9', tekst: tekstKom, mail: mail},
            dataType: 'text',
            success: function(response) {
                console.log(response);
            },
            error: function() {
                console.log("Error.");
            }
        });
    });
    $.ajax({
        url: "kontakt4.php",
        type: 'POST',
        data: {ajaxr: 'ajax5'},
        dataType: 'text',
        success: function (response) {
            var htmlEndIndex = response.indexOf('</html>');
            if (htmlEndIndex !== -1) {
                var extractedText = response.substring(htmlEndIndex + 7);
            }
            var komentari = JSON.parse(extractedText);
            dodajKomentar(komentari);

            function dodajKomentar(kom) {
                let listaKomentara = $("#listaKomentara");
                for (let i = 0; i < kom.length; i++) {
                    let elListe = $("<li></li>");
                    let ime = kom[i][Object.keys(kom[i])[0]];
                    let prezime = kom[i][Object.keys(kom[i])[1]];
                    let korIme = ime + " " + prezime;

                    let noviKom = $("<div></div>");
                    noviKom.attr("class", "row komentar");
                    let okvirS = $("<div></div>").attr("class", "col-sm-2 osoba");
                    let slika = $("<img>");
                    slika.attr("id", "slikaK").attr("alt", "user?");
                    if (kom[i][Object.keys(kom[i])[2]] == null) slika.attr("src", "slike/user.jpg");
                    else slika.attr("src", kom[i][Object.keys(kom[i])[2]]);
                    okvirS.append(slika);
                    noviKom.append(okvirS);

                    let okvirKI = $("<div></div>").attr("class", "col-sm-10");
                    let korImeElement = $("<h4></h4>").text(korIme);
                    okvirKI.append(korImeElement);

                    let commentText = $("<div></div>").addClass("comment-text").text(kom[i][Object.keys(kom[i])[3]])
                    commentText.attr("id","komt"+i);
                    okvirKI.append(commentText);
                    let obrisiButton = $("<button></button>").text("Obriši").addClass("obrisiKom");
                    obrisiButton.attr("id","obrKombut"+i);
                    obrisiButton.css("z-index", "1001");
                    obrisiButton.prop("disabled", false);

                    okvirKI.append(obrisiButton)
                    okvirKI.css({
                        position: "relative",
                        zIndex: "9999"
                    });
                    noviKom.append(okvirKI);
                    elListe.append(noviKom);
                    listaKomentara.append(elListe);

                }
                buttons = document.getElementsByClassName('obrisiKom');

                for (let i=0; i<buttons.length;i++){
                    buttons[i].addEventListener('click', function() {
                        let idOb=this.id;
                        let numericPart = idOb.replace('obrKombut', '');
                        let infoId="komt"+numericPart;
                        let opis=$("#"+infoId).text();
                        let opisText = opis;
                        console.log(opisText);
                        $.ajax({
                            url: 'kontakt4.php',
                            type: 'POST',
                            data: {
                                requestType: 'ajax22',
                                opis: opisText,
                            },
                            success: function(response) {
                                location.reload();
                            },
                            error: function(xhr, status, error) {
                                console.error('Request error:', error);
                            }
                        });
                    });
                }

            }
        },
        error: function () {
            console.log("Ups, something went wrong.");
        }
    });



})

