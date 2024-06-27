document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
        type: 'POST',
        url: '../assets/php/login.php', 
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                swal({
                    title: '¡Bienvenido!',
                    icon: 'success',
                    button: {
                        className: 'bs'
                      }
                }).then(function() {
                    window.location.href = '../assets/php/CRUD/index.php';
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
