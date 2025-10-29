function prijava() {
    let ime = localStorage.getItem("korisnickoIme");
    let lozinka = localStorage.getItem("lozinka");
    if(!ime || !lozinka) {
        window.location.href = "login.php";
    } else {
        $.ajax({
            url:'index.php',
            type: 'POST',
            data: {username: ime, password: lozinka},
            success : function(response){
                if (response == 4 || response == 5)
                    window.location.href = "login.php";
                else if (response==0) window.location.href="index2.php"
                else if (response==1) window.location.href = "index3.php";
                else if (response==2) window.location.href = "index4.php";
                if (response!=4 && response!=5) sessionStorage.setItem("mail",ime);
            },
            error: function() {
                console.log("ups")
            }
        });
    }
}


