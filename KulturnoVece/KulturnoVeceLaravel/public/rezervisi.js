$(document).ready(function (){
    /**
     * Autor:
     * Laura Grego 20/0204
     * */

    let opisTekst=sessionStorage.getItem("opisText");
    let mail=sessionStorage.getItem("mail");
    $("#trlababalan").click(function(){
        let checkbox = document.getElementById('slaganje');
        if (checkbox.checked) {
            let vlasnikKarticeInput = document.getElementById('vlasnikkartice');
            let vlasnikKarticeValue = vlasnikKarticeInput.value;

            const regex = /^[A-Za-z]+\s[A-Za-z]+$/;
            if (regex.test(vlasnikKarticeValue)) {
                let cvvInput = document.getElementById('cvvK');
                let cvvValue = cvvInput.value;

                let regex = /^\d{3}$/;
                if (regex.test(cvvValue)) {
                    let brojKarticeInput = document.getElementById('brojKartice');
                    let brojKarticeValue = brojKarticeInput.value;

                    let regex = /^\d+$/;
                    if (regex.test(brojKarticeValue)) {
                        let monthsSelect = document.getElementById('months');
                        let yearsSelect = document.getElementById('years');

                        let currentYear = parseInt(new Date().getFullYear());
                        let currentMonth = parseInt(new Date().getMonth() + 1); // Month is zero-based, so adding 1

                        let selectedYear = parseInt(yearsSelect.value);
                        let selectedMonth = parseInt(monthsSelect.value);

                        if (selectedYear < currentYear || (selectedYear === currentYear && selectedMonth < currentMonth)) {
                            $.ajax({
                                url: "rezervisiIuplati.php",
                                type: 'POST',
                                data: {mail: mail, opis: opisTekst},
                                dataType: 'text',
                                success: function(response) {
                                    var htmlEndIndex = response.indexOf('</html>');
                                    if (htmlEndIndex !== -1) {
                                        var extractedText = response.substring(htmlEndIndex + 7);
                                    }
                                    alert("Kupili ste kartu!");
                                },
                                error: function() {
                                    console.log("Error.");
                                }
                            });
                        } else {
                            alert("Istekla Vam je kartica :(");
                        }


                    } else {
                        alert("Pogrešan broj kartice");
                    }

                } else {
                    alert("Pogrešan CVV");
                }

            } else {
                alert("Pogrešan unos za vlasnika kartice");
            }

        }
        else{
            alert("Niste se složili sa uslovima plaćanja");
        }
    })

})
