$(document).ready(function() {
    $.ajax({
        url: '../assets/php/permission2.php', // Change this to the path of your PHP script
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            if (response.status === 'error') {
                Swal.fire({
                    title: 'Error!',
                    text: response.message,
                    icon: 'error'
                }).then(function() {
                    window.location.href = '../index.html';
                });
            } else if (response.status === 'success') {
                Swal.fire({
                    title: 'Bienvenido!',
                    text: response.message,
                    icon: 'success'
                });

                // Display additional information
                $('#content').append('<div class="mb-4"><h1>' + response.message + '</h1></div>');
                $('#content').append('<div class="alert alert-info"><p>Correo: ' + response.email + '</p></div>');
            }
        }
    });
});
