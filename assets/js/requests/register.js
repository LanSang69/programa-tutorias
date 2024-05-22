document.getElementById('register-form').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
        type: 'POST',
        url: '../assets/php/register.php', 
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                swal({
                    title: 'Bienvenido!',
                    text: response.message,
                    icon: 'success'
                }).then(function() {
                    window.location.href = '../index.html';
                });
            } else {
                swal('Error!', response.message, 'error');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            swal('Error!', 'Error al procesar, intenta de nuevo', 'error'); // Show an error message using SweetAlert
        }
    });
});
