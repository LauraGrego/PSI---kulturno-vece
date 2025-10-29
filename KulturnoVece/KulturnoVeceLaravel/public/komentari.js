/**
 * Autori:
 * Laura Grego 20/0204
 * Tijana Kamberovic 20/0283
 */

$(document).ready(function() {
    const kontaktDiv = document.getElementById('kontaktDiv');

    kontaktDiv.addEventListener('mouseenter', () => {
        kontaktDiv.style.visibility = 'hidden';
    });

    let mail=sessionStorage.getItem("mail");
    $("#btnKom").click(function(){
        /**
         * fja za uzimanje podataka iz forme za novi komentar
         */
        let tekstKom=$("#comments").val();
        console.log(tekstKom+" "+mail)
        $.ajax({
            url: "kontakt2.php",
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
    /**
     * fja za dimanicko dodavanje novog komentara na stranicu sa komentarima
     */
    $.ajax({
        url: "kontakt2.php",
        type: 'POST',
        data: {ajaxr: 'ajax5'},
        dataType: 'text',
        success: function (response) {
            var htmlEndIndex = response.indexOf('</html>');
            if (htmlEndIndex !== -1) {
                var extractedText = response.substring(htmlEndIndex + 7);
            }
            var komentari = JSON.parse(extractedText);
            console.log(komentari);
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

                    let commentText = $("<div></div>").addClass("comment-text").text(kom[i][Object.keys(kom[i])[3]]);
                    okvirKI.append(commentText);

                    noviKom.append(okvirKI);
                    elListe.append(noviKom);
                    listaKomentara.append(elListe);
                }
            }
        },
        error: function () {
            console.log("Ups, something went wrong.");
        }
    });



})

