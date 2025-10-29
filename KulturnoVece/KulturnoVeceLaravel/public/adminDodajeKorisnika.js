/**
 * Autor:
 * Laura Grego 20/0204
* */



$(document).ready(function() {
    /**
     * Prikupljanje elemenata iz forme
     * */
    let $formaElem = $("#problemForma");
    let $selectElement = $("#privilegije");
    let $brTelefonaa = $("#brTelefonaa");
    $selectElement.on("change", function() {
        let selectedValue = $selectElement.val();
        if (selectedValue === "admin") {
            $formaElem.css("height", "80%");
            $brTelefonaa.removeAttr("hidden");
        } else {
            $formaElem.css("height", "70%");
            $brTelefonaa.attr("hidden", "true");
        }
    });

    $("#regTekstAdm").on("click", function(e) {
        e.preventDefault();
        let ime = $("#imeAdm").val();
        let mejl = $("#emailAdm").val();
        let lozinka = $("#lozAdm").val();
        let prezime = $("#prezAdm").val();
        let korisnickoIme = $("#korImeAdm").val();
        let flag1=1;
        /**
        * Provere
         */
        if (!/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.\w+$/.test(mejl)) {
            alert("Pogrešan email.");
            flag1 = 0;
        }

        if(/^.{6,}$/.test(lozinka) == false) {
            alert("Lozinka je loše dužine.");
            flag1=0;

        }
        if (ime=="" || mejl=="" || lozinka=="" || prezime=="" || korisnickoIme==""){
            flag1=0;
            alert("Niste uneli sve podatke");
        }
        let brtel;
        if ($selectElement.val()=="admin" && $("#brTelAdm").val()==""){
            flag1=0;
            alert("Niste uneli sve podatke2");
        }
        else if ($selectElement.val()=="admin"){
            if (!/^\d+$/.test($("#brTelAdm").val())){alert("Broj telefona nije ispravan"); flag1=0;}
            else {
                if ($("#brTelAdm").val().length!=9 && $("#brTelAdm").val().length!=10){
                    alert("Broj telefona nije ispravan"); flag1=0;
                }
                else{
                    brtel=parseInt($("#brTelAdm").val());
                }
            }

        }
        else{
            brtel=0;
        }
        if (flag1==1){
            $.ajax({
                url:'dodajKorisnika.php',
                type: 'POST',
                data: {ajaxr: 'ajax1',username: korisnickoIme, password: lozinka, name: ime, surname: prezime, mail:mejl, tip:$selectElement.val(), tel: brtel},
                success : function(response){
                    var htmlEndIndex = response.indexOf('</html>');
                    if (htmlEndIndex !== -1) {
                        var extractedText = response.substring(htmlEndIndex + 7);
                    }
                    console.log(extractedText);
                    if (extractedText==1 || extractedText=="1"){
                        console.log("greskica");
                        alert("Korisnicko ime je zauzeto") ;
                    }
                    else if(extractedText==2 || extractedText=="2"){
                        alert("Postoji nalog za ovaj email") ;
                    }
                    else{
                        alert("Uspešno ste dodali korisnika!")
                    }


                },
                error: function() {
                    console.log("ups")
                }
            });
        }
    });
});
