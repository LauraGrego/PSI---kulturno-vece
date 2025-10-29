/**
 * Autor: Laura Grego 20/0204
 */
$(document).ready(function() {

    let email = sessionStorage.getItem("mail");
    // Make an AJAX request to the PHP script
    if (currentPage="index2.php")requestUrl="index2.php"
    if (currentPage="index3.php")requestUrl="index3.php"
    if (currentPage="index4.php")requestUrl="index4.php"
    $.ajax({
        url: "index2.php",
        type: "POST",
        data: { mail: email},
        success: function(response) {
            var htmlEndIndex = response.indexOf('</html>');
            if (htmlEndIndex !== -1) {
                var extractedText = response.substring(htmlEndIndex + 7);

            }
            let imagePath = extractedText;
            if (imagePath<3) imagePath ="slike/user.jpg"
            let imageElement = document.getElementById("userSlika");
            imageElement.src = imagePath;
        },
        error: function() {
            console.log("Error retrieving image path.");
        }
    });
});
