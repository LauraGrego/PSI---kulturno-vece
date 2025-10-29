let rnd;
let tocak;
/**
 * Autori:
 * Tijana Kamberovic 20/0283
 * Laura Grego 20/0204
 */
/**
 * fja za okretanje tocka za nagradnu igru
 */
window.onload=function(){
    tocak = document.getElementById("tocak");
    //let tocak = document.querySelector(".container");
    //let dugme = document.getElementById("okreni");

    rnd = Math.ceil(Math.random() * 10000);
}

function okreciSe() {
    tocak.style.transform = "rotate(" + rnd + "deg)";
    rnd += Math.ceil(Math.random() * 10000);
    let mail=sessionStorage.getItem("mail");
    $.ajax({
        url:'nagradnaIgra.php',
        type: 'POST',
        data: {mail: mail},
        success : function(response){
            var htmlEndIndex = response.indexOf('</html>');
            if (htmlEndIndex !== -1) {
                var extractedText = response.substring(htmlEndIndex + 7);
            }
            if (extractedText=="2" || extractedText==2){
                window.location.replace("PretplatiSe.php");
            }
            console.log(response);
        },
        error: function() {
            console.log("ups")
        }
    });
}
