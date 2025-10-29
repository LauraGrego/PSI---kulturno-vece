var objList;
let promenaSl="";
/**
 * Autori:
 * Laura Grego 20/0204
 * Lara Stevanovic 20/0620
 */
$(document).ready(function() {
    /**
     * fja za dinamicko popunjavanje informacija o korisniku na stranici moj nalog
     * */
    let currentPage = window.location.pathname;
    let requestUrl = "";
    if (currentPage=="/mojNalog.php") requestUrl="mojNalog.php"
    if (currentPage=="/mojNalog2.php")requestUrl="mojNalog2.php"
    if (currentPage=="/mojNalog3.php")requestUrl="mojNalog3.php"
    let mail=sessionStorage.getItem("mail");
    $.ajax({
        url:requestUrl,
        type: "POST",
        data: { mail: mail, ajaxr: 1},
        success: function(response) {
            var htmlEndIndex = response.indexOf('</html>'); // Find the index of the closing </html> tag
            if (htmlEndIndex !== -1) {
                var extractedText = response.substring(htmlEndIndex + 7); // Extract the text after the </html> tag (7 is the length of the closing tag)

            }
            var objects = JSON.parse(extractedText);
            objList=objects;
            let slikaZaSad=objList[0][Object.keys(objList[0])[9]];
            if (slikaZaSad<3) slikaZaSad ="slike/user.jpg";
            let imageElement2 = document.getElementById("profilnaSlika");
            imageElement2.src = slikaZaSad;
            let ime=objList[0][Object.keys(objList[0])[4]];
            let prezime=objList[0][Object.keys(objList[0])[5]];
            let imeprezime=ime+" "+prezime;
            $("#labelaIme").html(imeprezime);
            let korime=objList[0][Object.keys(objList[0])[0]];
            $("#korisnickoIme1").html(korime);
            let mejlce=objList[0][Object.keys(objList[0])[3]];
            $("#email1").html(mejlce);
            let tip=sessionStorage.getItem("tip");
            $("#prijava1").html(tip);

        },
        error: function() {
            console.log("Error.");
        }
    });
    /**
     * fja za promenu slike korisnika samo na stranici da bi korisnik imao uvid kako bi slika izgledala
     */
    $('#urlSlike').change(function() {
        var formData = new FormData();
        formData.append('profileImage', $('#urlSlike')[0].files[0]);
        $.ajax({
            url: requestUrl,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                let novaslika="slike2/";
                let tmp=formData.get('profileImage');
                tmp=tmp.name;
                tmp=tmp.substring(tmp.lastIndexOf('/') + 1);
                novaslika+=tmp;
                let imageElement3 = document.getElementById("profilnaSlika");
                imageElement3.src=novaslika;
                promenaSl=novaslika;
            },
            error: function() {
                console.log('Error uploading image.');
            }
        });
    });

    $("#potvrdaSlike").click(function(){
        $.ajax({
            url:'mojNalog.php',
            type: 'POST',
            data: {ajaxr: 2, mail: mail, put: promenaSl},
            success: function(response) {
                window.location.replace("index2.php");
            },
            error: function() {
                console.log('Error uploading image.');
            }
        });

    });
    $("#sifradugmee").click(function(){
        let mejlce=sessionStorage.getItem("mail");
        localStorage.setItem("privremeno",mejlce);
        windows.location.replace("promenaLozinke.php");
    })
});

