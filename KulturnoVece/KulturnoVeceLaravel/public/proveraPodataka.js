let flag1=1;

/**
 * Autori:
 * Laura Grego 20/0204
 * Lara Stevanovic 20/0620
 * */
function registrujSe() {
    /**
     * uzimanje unetih podataka iz forme za registraciju korisnika
     */
    document.getElementById("mejlGreska").innerHTML = "";
    document.getElementById("lozinkaGreska").innerHTML = "";
    document.getElementById("imeGreska").innerHTML = "";
    document.getElementById("prezimeGreska").innerHTML = "";
    document.getElementById("korisnickoImeGreska").innerHTML = "";
    let ime = document.getElementById("imeReg").value;
    let mejl = document.getElementById("mejlReg").value;
    let lozinka = document.getElementById("lozinkaReg").value;
    let prezime = document.getElementById("prezimeReg").value;
    let korisnickoIme = document.getElementById("korisnickoImeReg").value;
    /**
     * ispisivanje odgovarajucih poruka za pogresno unete podatke
     */
   if (/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.\w+$/.test(mejl) == false) {
    document.getElementById("mejlGreska").innerHTML = "Pogrešan mejl";
    flag1=0;
   }

   if(/^.{6,}$/.test(lozinka) == false) {
    document.getElementById("lozinkaGreska").innerHTML = "Pogrešna lozinka";
       flag1=0;

   }

   if(/^\w+$/.test(ime) == false) {
    document.getElementById("imeGreska").innerHTML = "Niste uneli ime";
       flag1=0;

   }

   if(/^\w+$/.test(prezime) == false && /^\w+@[a-z]+\.\w+$/.test(mejl) == false)  {
    document.getElementById("prezimeGreska").innerHTML = "Niste uneli prezime";
       flag1=0;

   }
   if(/^\w+$/.test(korisnickoIme) == false) {
    document.getElementById("korisnickoImeGreska").innerHTML = "Niste uneli korisnicko ime";
       flag1=0;

   }
   if (    flag1==1) {
       sessionStorage.setItem("mail",mejl);
       sessionStorage.setItem("tip","korisnik");
       $.ajax({
           url:'register.php',
           type: 'POST',
           data: {username: korisnickoIme, password: lozinka, name: ime, surname: prezime, mail:mejl},
           success : function(response){
               var htmlEndIndex = response.indexOf('</html>');
               if (htmlEndIndex !== -1) {
                   var extractedText = response.substring(htmlEndIndex + 7);
               }
               if (extractedText==1 || extractedText=="1"){
                   console.log("greskica");
                   $("#korisnickoImeGreska").html("Korisnicko ime je zauzeto") ;
               }
               else if(extractedText==2 || extractedText=="2"){
                   $("#mejlGreska").html("Postoji nalog za ovaj email") ;
               }
               else{
                   window.location.replace("registerProcess.php");
               }


           },
           error: function() {
               console.log("ups")
           }
       });

    }
}



function ulogujSe() {
    let flagic=0;
    document.getElementById("greskaLog").innerHTML = "";
    let mejl = document.getElementById("mejl1").value;
    let lozinka = document.getElementById("lozinka1").value;
    if (/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.\w+$/.test(mejl) == false) {
        document.getElementById("greskaLog").innerHTML = "Pogrešan mejl ili lozinka";
    }
    else if(/^.{6,}$/.test(lozinka) == false) {
        document.getElementById("greskaLog").innerHTML =  "Pogršsan mejl ili lozinka";
    }
    else {
        sessionStorage.setItem("mail",mejl);
        $.ajax({
            url:'login.php',
            type: 'POST',
            data: {username: mejl, password: lozinka},
            success : function(response){
                response=response[response.length-1];
                if (response == 4 || response == 5)
                    $("#greskaLog").html("Pogrešan mejl ili lozinka") ;
                else {
                    let isChecked = $('#pamcenje').prop('checked');
                    if (isChecked) {
                        localStorage.setItem("korisnickoIme",mejl);
                        localStorage.setItem("lozinka",lozinka);
                    }
                    if (response==0) {window.location.replace("index2.php"); sessionStorage.setItem("tip","korisnik");}
                    else if (response==1) { window.location.replace("index3.php"); sessionStorage.setItem("tip","moderator");}
                    else if (response==2) { window.location.replace("index4.php"); sessionStorage.setItem("tip","administrator");}

                }

            },
            error: function() {
                console.log("ups")
            }
        });
    }
}


function sifraZab(){

    let mejl = document.getElementById("mejl1").value;
    if (mejl!=""){
        localStorage.setItem("privremeno",mejl);
        Email.send({
            SecureToken : "e415fb6f-5c95-4fd6-8f1c-1a18b222919a ",
            To : mejl,
            From : "lauragrego999@gmail.com",
            Subject : "Zaboravljena lozinka",
            Body : "Postovani korisnice,/n" +
                "Udjite u link da biste promenili svoju sifru." +
                "<a href='http://127.0.0.1:8000/promenaLozinke.php'>here</a> /n"+
                "Tim PushPosmatraci i Kulturno vece."
        }).then(
            message => alert(message)
        );
        windows.replace("zaboravljenaLozinka.php")
    }
    else{
        alert("Unesite mail pa kliknite na link ponovo.")
    }

}
