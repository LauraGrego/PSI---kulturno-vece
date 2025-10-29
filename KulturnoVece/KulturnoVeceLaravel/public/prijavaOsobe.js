var objList=[];

/**
 * Autori:
 * Laura Grego 20/0204
 * Tijana Kamberovic 20/0283
 * */
function prijava() {
    let ime = localStorage.getItem("korisnickoIme");
    let lozinka = localStorage.getItem("lozinka");
    let currentPage = window.location.pathname;
    let requestUrl = "";
    if (currentPage === "index.php") {
        requestUrl = 'index.php';
    } else if (currentPage === "desavanja.php") {
        requestUrl = 'desavanja.php';
    } else if (currentPage === "kontakt.php") {
        requestUrl = 'kontakt.php';
    }
    if(!ime || !lozinka) {
        window.location.href = "login.php";
    } else {
        sessionStorage.setItem("mail",ime);
        $.ajax({
            url:requestUrl,
            type: 'POST',
            data: {username: ime, password: lozinka, requestType: 'ajax2'},
            success : function(response){
                response=response[response.length-1];
                if (response == 4 || response == 5)
                    window.location.replace("login.php");
                else if (response==0) {window.location.replace("index2.php"); sessionStorage.setItem("tip","korisnik");}
                else if (response==1) {window.location.replace("index3.php"); sessionStorage.setItem("tip","moderator");}
                else if (response==2) {window.location.replace("index4.php"); sessionStorage.setItem("tip","administrator");}
            },
            error: function() {
                console.log("ups")
            }
        });
    }
}

$(document).ready(function(){
    let currentPage = window.location.pathname;
    let requestUrl = "";
    if (currentPage=="desavanja.php") requestUrl="desavanja.php"
    if (currentPage=="desavanja2.php") requestUrl="desavanja2.php"
    $.ajax({
        url:requestUrl,
        type: 'POST',
        data: {requestType: 'ajax1'},
        dataType: 'text',
        success : function(response){
            var htmlEndIndex = response.indexOf('</html>'); // Find the index of the closing </html> tag
            if (htmlEndIndex !== -1) {
                var extractedText = response.substring(htmlEndIndex + 7); // Extract the text after the </html> tag (7 is the length of the closing tag)

            }
            var objects = JSON.parse(extractedText);
            objList=objects;
            let desavanja=objects; //izvuci listu desavanja
            //desavanje strukt ima: putanja do slike, vrsta dog, lokacija, datum i vreme, cena, opis
            let listaDesavanja = $("#listaDesavanja");
            prikaziDesavanja(desavanja);


            function prikaziDesavanja(des) {
                /**
                 * funkcija koja dinamicki dodaje desavanja na stranicu
                 * */
                for(let i = 0; i < des.length; i++) {
                    if (des[i][Object.keys(des[i])[7]]=="1") continue;
                    let el =  $("<li></li>");
                    let dodaj = $("<div></div>");
                    $(dodaj).attr("class","dogadjaj").attr("id",i);
                    $(dodaj).attr("name",i);
                    let slika = $("<img>");
                    $(slika).attr("class","slikaDogadjaja").attr("src", des[i][Object.keys(des[i])[6]]).attr("align", "left").attr("alt", "slikaDogadjaja");
                    $(dodaj).append(slika);
                    let info = $("<p></p>");
                    $(info).attr("class","infoODogadjaju");
                    let dv=des[i][Object.keys(des[i])[1]];
                    let dvo= {
                        godina: dv.slice(0,4),
                        mesec: dv.slice(5,7),
                        dan: dv.slice(8,10),
                        sat: dv.slice(11,13),
                        minut: dv.slice(14,16)
                    }
                    let dvs=dvo.dan+"."+dvo.mesec+"."+dvo.godina+". "+dvo.sat+":"+dvo.minut+"h";
                    $(info).html(
                        des[i][Object.keys(des[i])[0]] +
                        "<br>" +
                        "Lokacija: " +
                        des[i][Object.keys(des[i])[4]] +
                        "<br>" +
                        "Datum i vreme: " +
                        dvs +
                        "<br>" +
                        "Cena ulaznice: " +
                        des[i][Object.keys(des[i])[3]] +
                        " RSD <br>" +
                        "Opis: " +
                        des[i][Object.keys(des[i])[2]]
                    );
                    dodaj.append(info);
                    let rezervisi = $("<button></button>");
                    rezervisi.on("click", function() {

                        let opisText = des[i][Object.keys(des[i])[2]];

                        sessionStorage.setItem("opisText", opisText);
                    });
                    rezervisi.attr("class","rezervisi");
                    let link = $("<a></a>");
                    if (sessionStorage.getItem("mail")!=null) link.attr("href", "rezervisiIuplati.php");
                    else link.attr("href", "login.php");
                    link.text("Rerzerviši");
                    rezervisi.append(link);
                    dodaj.append(rezervisi);
                    el.append(dodaj);
                    listaDesavanja.append(el);
                }
            }

            //document.getElementById("datum").addEventListener("blur",filterDatum);
            $("#datum").change(function (){

                let datumStr=document.getElementById("datum");
                datumStr=datumStr.value;
                for (let i=0; i<objList.length;i++){
                    let id="#"+i;;
                    let d=objList[i][Object.keys(objList[i])[1]].slice(0,10);
                    if (datumStr!=d){
                        $(id).hide();
                    }
                    else  $(id).show();
                    if (datumStr=="")  $(id).show();

                }
            });

            $("#moraID").change(function(){
                let tip=$("#moraID").val();
                if (tip=="Sve"){
                    for (let i=0; i<objList.length;i++){
                        let id="#"+i;
                        $(id).show();
                    }
                }
                if (tip=="Film"){
                    for (let i=0; i<objList.length;i++){
                        let id="#"+i;
                        let d=objList[i][Object.keys(objList[i])[0]].slice(0,4);
                        if (d!="Film"){
                            $(id).hide();
                        }
                        else  $(id).show();
                    }
                }
                if (tip=="Predstava"){
                    for (let i=0; i<objList.length;i++) {
                        let id = "#" + i;
                        let d = objList[i][Object.keys(objList[i])[0]];
                        if (d != "Predstava") {
                            $(id).hide();
                        } else $(id).show();
                    }
                }
                if (tip=="Stand up show"){
                    for (let i=0; i<objList.length;i++) {
                        let id = "#" + i;
                        let d = objList[i][Object.keys(objList[i])[0]];
                        if (d != "Stand up show") {
                            $(id).hide();
                        } else $(id).show();
                    }
                }
                if (tip=="Koncert"){
                    for (let i=0; i<objList.length;i++) {
                        let id = "#" + i;
                        let d = objList[i][Object.keys(objList[i])[0]];
                        if (d != "Opera" && d!="Koncert klasicne muzike") {
                            $(id).hide();
                        } else $(id).show();
                    }

                }
                if (tip=="Izložba"){
                    for (let i=0; i<objList.length;i++) {
                        let id = "#" + i;
                        let d = objList[i][Object.keys(objList[i])[0]];
                        if (d != "Izložba") {
                            $(id).hide();
                        } else $(id).show();
                    }
                }
                if (tip=="Ostalo"){
                    for (let i=0; i<objList.length;i++) {
                        let id = "#" + i;
                        let d = objList[i][Object.keys(objList[i])[0]];
                        if (d != "Ostalo") {
                            $(id).hide();
                        } else $(id).show();
                    }
                }
            });
            $("#loka").change(function(){
                let tip=$("#loka").val();
                if (tip=="Sve"){
                    for (let i=0; i<objList.length;i++){
                        let id="#"+i;
                        $(id).show();
                    }
                }
                if (tip=="Novi Beograd"){
                    for (let i=0; i<objList.length;i++){
                        let id="#"+i;;
                        let d=objList[i][Object.keys(objList[i])[4]];
                        if (d!="Novi Beograd"){
                            $(id).hide();
                        }
                        else  $(id).show();
                    }
                }
                if (tip=="Zemun"){
                    for (let i=0; i<objList.length;i++){
                        let id="#"+i;;
                        let d=objList[i][Object.keys(objList[i])[4]];
                        if (d!="Zemun"){
                            $(id).hide();
                        }
                        else  $(id).show();
                    }
                }
                if (tip=="Zvezdara"){
                    for (let i=0; i<objList.length;i++) {
                        let id = "#" + i;
                        let d = objList[i][Object.keys(objList[i])[4]];
                        if (d != "Zvezdara") {
                            $(id).hide();
                        } else $(id).show();
                    }
                }
                if (tip=="Palilula"){
                    for (let i=0; i<objList.length;i++) {
                        let id = "#" + i;
                        let d = objList[i][Object.keys(objList[i])[4]];
                        if (d != "Palilula") {
                            $(id).hide();
                        } else $(id).show();
                    }
                }
                if (tip=="Vodždovac" || tip=="Vozdovac"){
                    for (let i=0; i<objList.length;i++) {
                        let id = "#" + i;
                        let d = objList[i][Object.keys(objList[i])[4]];
                        if (d != "Vodždovac" && d!="Vozdovac") {
                            $(id).hide();
                        } else $(id).show();
                    }

                }
                if (tip=="Vračar" || tip=="Vracar"){
                    for (let i=0; i<objList.length;i++) {
                        let id = "#" + i;
                        let d = objList[i][Object.keys(objList[i])[4]];
                        if (d != "Vračar" && d!="Vracar") {
                            $(id).hide();
                        } else $(id).show();
                    }
                }
                if (tip=="Savski Venac"){
                    for (let i=0; i<objList.length;i++) {
                        let id = "#" + i;
                        let d = objList[i][Object.keys(objList[i])[4]];
                        if (d != "Savski Venac") {
                            $(id).hide();
                        } else $(id).show();
                    }
                }
                if (tip=="Čukarica" || tip=="Cukarica"){
                    for (let i=0; i<objList.length;i++) {
                        let id = "#" + i;
                        let d = objList[i][Object.keys(objList[i])[4]];
                        if (d != "Čukarica" && d!="Cukarica") {
                            $(id).hide();
                        } else $(id).show();
                    }
                }
                if (tip=="Stari grad"){
                    for (let i=0; i<objList.length;i++) {
                        let id = "#" + i;
                        let d = objList[i][Object.keys(objList[i])[4]];
                        if (d != "Stari grad") {
                            $(id).hide();
                        } else $(id).show();
                    }
                }
            });

            $("#lupica").click(function(){
                let rec=" ";
                rec+=$("#search-field").val();
                rec=rec.toLowerCase();

                for (let i=0; i<objList.length;i++){
                    let id = "#" + i;
                    let opis = objList[i][Object.keys(objList[i])[2]];
                    opis=opis.toLowerCase();
                    if (opis.includes(rec)) $(id).show();
                    else $(id).hide();
                }

            });


        },
        error: function() {
            console.log("ups");
        }
    });
});



