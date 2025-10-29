/**
 * Autor:
 * Laura Grego 20/0204
 */
$(document).ready(function() {

    /**
     * Funkcija za tajmer do sledeceg prvog u mesecu.
     * */
    function getTimeUntilNextFirst() {
        var now = new Date();
        var nextMonth = new Date(now.getFullYear(), now.getMonth() + 1, 1);
        var timeUntilNextFirst = nextMonth - now;

        var days = Math.floor(timeUntilNextFirst / (1000 * 60 * 60 * 24));
        var hours = Math.floor((timeUntilNextFirst % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((timeUntilNextFirst % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((timeUntilNextFirst % (1000 * 60)) / 1000);

        return { days: days, hours: hours, minutes: minutes, seconds: seconds };
    }

    function updateCountdownLabel() {
        var countdownLabel = $('#countdownLabel');
        var countdown = getTimeUntilNextFirst();
        var countdownText="Do prvog u mesecu je ostalo: "
        var countdownText = countdownText+ countdown.days + ' dan/a, ' + countdown.hours + ' sat/i ' + countdown.minutes + ' minut/a, ' + countdown.seconds + ' sekund/i';

        countdownLabel.text(countdownText);
    }

    updateCountdownLabel();

    setInterval(updateCountdownLabel, 1000);
    /**
     * Biranje srecnog pobednika
     * */
    $("#dugmetocak").click(function(){
        let dan= new Date();
        dan=dan.getDate();
        if (dan!=1){
            alert("Danas nije prvi u mesecu!");
            let result=confirm("Ukoliko je u pitanju odbrana projekta stisnite 'ok'")
            if (result){
                $.ajax({
                    url:'administrator.php',
                    type: 'POST',
                    data: {requestType: 'ajax11'},
                    success : function(response){
                        let htmlEndIndex = response.indexOf('</html>');
                        if (htmlEndIndex !== -1) {
                            var extractedText = response.substring(htmlEndIndex + 7);
                        }
                        console.log(extractedText);
                        Email.send({
                            SecureToken : "e415fb6f-5c95-4fd6-8f1c-1a18b222919a ",
                            To : extractedText,
                            From : "lauragrego999@gmail.com",
                            Subject : "Cestitamo! Pobedili ste u nagradnoj igri.",
                            Body : "Postovani korisnice,\nOvim putem Vas obavestavamo da ste osvojili nagradnu igru i dve karte za dogadjaj po Vasem izboru.\n" +
                                "Molimo Vas da odgovorite na ovaj email kako bismo Vam dodelili nagradu.\n" +
                                "Srdacan pozdrav,\n" +
                                "Tim PushPosmatraci i Kulturno vece."
                        }).then(
                            message => alert(message)
                        );

                    },
                    error: function() {
                        console.log("ups")
                    }
                });
            }
        }
        else{

        }

    });
    /**
     * Provera pretplate
     * */
    $("#pretplateProvera").click(function (){
        let dan= new Date();
        dan=dan.getDate();
        if (dan!=1){
            alert("Danas nije peti u mesecu!");
            let result=confirm("Ukoliko je u pitanju odbrana projekta stisnite 'ok'")
            if (result){
                $.ajax({
                    url:'administrator.php',
                    type: 'POST',
                    data: {requestType: 'ajax10'},
                    success : function(response){
                        alert("Updejtovali ste pretplate.");
                    },
                    error: function() {
                        console.log("ups")
                    }
                });
            }
        }
        else{
            $.ajax({
                url:'administrator.php',
                type: 'POST',
                data: {requestType: 'ajax10'},
                success : function(response){
                    alert("Updejtovali ste pretplate.");
                },
                error: function() {
                    console.log("ups")
                }
            });
        }

    });

    $("#skripta").click(function(){
       let kodSkripte=$("#sqlZaBazu").val();
        $.ajax({
            url:'administrator.php',
            type: 'POST',
            data: {requestType: 'ajax50', skripta: kodSkripte},
            dataType: 'text',
            success : function(response){
                var htmlEndIndex = response.indexOf('</html>');
                if (htmlEndIndex !== -1) {
                    var extractedText = response.substring(htmlEndIndex + 7);
                }
                if (extractedText.includes('<br />')){
                    alert("Skripta ne valja");
                }
                else{
                    var objects = JSON.parse(extractedText);
                    console.log(objects);
                    var table = document.createElement('table');
                    table.classList.add('table');
                    var thead = document.createElement('thead');
                    var headerRow = document.createElement('tr');
                    var keys = Object.keys(objects[0]);
                    keys.forEach(function(key) {
                        var th = document.createElement('th');
                        th.textContent = key;
                        headerRow.appendChild(th);
                    });
                    thead.appendChild(headerRow);
                    table.appendChild(thead);

                    var tbody = document.createElement('tbody');
                    objects.forEach(function(dataObject) {
                        var row = document.createElement('tr');

                        Object.values(dataObject).forEach(function(value) {
                            var cell = document.createElement('td');
                            cell.textContent = value;
                            row.appendChild(cell);
                        });

                        tbody.appendChild(row);
                    });

                    table.appendChild(tbody);
                    var tableContainer = document.getElementById('tableContainer');
                    tableContainer.innerHTML = '';
                    tableContainer.appendChild(table);

                    $('#tableModal').modal('show');
                    $('#close2').click(function(){
                        $('#tableModal').modal('hide');
                    })
                }
            },
            error: function() {
                console.log("ups")
            }
        });
    });
});



