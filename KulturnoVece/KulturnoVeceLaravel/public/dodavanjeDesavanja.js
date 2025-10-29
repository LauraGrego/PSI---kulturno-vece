/**
 * Autori:
 * Laura Grego 20/0204
 */
$(document).ready(function() {
    let flg=0;
    $("#dugmeObjavi").click(function(){
        /**
         * dohvatanje podataka o desavanju iz forme
         */
       let tip=$("#odabirTipa").val();
       let datumvreme=$("#datum").val();
       let naziv=$("#nazivDes").val();
       let lok=$("#lokDes").val();
       let vreme=$("#vrDes").val();
       let cena=$("#cenaDes").val();
       datumvreme+=" "+vreme+":00";
       let opis=$("#opis").val();
        /**
         * pravljenje html elemenata sa datim podacima
         */
        var formData = new FormData();
        formData.append('profileImage', $('#urlSlike')[0].files[0]);
        formData.append('tip',tip);
        formData.append('datumVreme',datumvreme);
        formData.append('naziv',naziv);
        formData.append('lokacija',lok);
        formData.append('opis',opis);
        formData.append('cena',cena);
        formData.append('requestType','ajax1');
        if (tip=="Sve" || !$('#urlSlike')[0].files[0] || vreme=="" || lokacija=="" || cena=="" || opis==""){
            flg=1;
        }
        else{
            /**
             * dohvatanje slike desavanja i pravljenje putanje do slike
             */
            let tmpp='slike2/';
            let tmpp2=formData.get('profileImage').name;
            tmpp2=tmpp2.substring(tmpp2.lastIndexOf('/') + 1);
            tmpp=tmpp+tmpp2;
            formData.append('put',tmpp);
            console.log(tmpp);
        }
        if (flg==1){
            alert("Niste dobro uneli podatke");
        }
        else{
            /**
             * slanje podataka php stranici za izmenu desavanja
             */
            $.ajax({
                url: 'izmenaDesavanja.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log(response);
                    windows.replace("desavanja3.php");
                },
                error: function() {
                    console.log('Error doing.');
                }
            });
        }

    });
});
