/**
 * Autor:
 * Laura Grego 20/0204
 * */
$(document).ready(function() {
    $("dugmePotvrda").click(function(){
       let loz1=doucment.getElementById("lozinka11") ;
       let loz2=doucment.getElementById("lozinka12") ;
       if (loz1.length<6){
           document.getElementById("greskaLog11").innerHTML="Neodgovarajuca lozinka."
       }
       else if(loz1!=loz2){
           document.getElementById("greskaLog11").innerHTML= "Lozinke se ne podudaraju."
       }
       else{
           let mail=localStorage.getItem("privremeno");
           $.ajax({
               url:'promenaLozinke.php',
               type: 'POST',
               data: {novalozinka: loz1, mejl: mail},
               success : function(response){
                   localStorage.removeItem("privremeno");
                   alert("Lozinka je promenjena");
                   windows.location.replace("login.php");
               },
               error: function() {
                   console.log("ups")
               }
           });
       }

    });
});
