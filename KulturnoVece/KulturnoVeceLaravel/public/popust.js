/**
 * Autor:
 * Laura Grego 20/0204
 * */
$(document).ready(function() {
    /**
     * funkcija za izracunavanje popusta dosadasnjeg
     * */
    let mail=sessionStorage.getItem("mail");
    $.ajax({
        url: "popust.php",
        type: 'POST',
        data: {mail: mail},
        dataType: 'text',
        success: function(response) {
            var htmlEndIndex = response.indexOf('</html>');
            if (htmlEndIndex !== -1) {
                var extractedText = response.substring(htmlEndIndex + 7);
            }
            let stringic=$("#popustS").text();
            let brk=parseInt(extractedText);
            if (brk<10) stringic+=" 0%.";
            else if (brk<20) stringic+=" 2%.";
            else if (brk<40) stringic+=" 5%.";
            else if (brk<50) stringic+=" 10%.";
            else if (brk<60) stringic+=" 15%.";
            else if (brk<70) stringic+=" 17%.";
            else stringic+=" 20%. Čestitamo ostvarili ste maksimalan popust!";
            $("#popustS").text(stringic);

        },
        error: function() {
            console.log("Error.");
        }
    });
})
