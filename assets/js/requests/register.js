document.getElementById('register-form').addEventListener('submit', function(event) {
    event.preventDefault();

    var formData = $(this).serialize();

    $.ajax({
        type: 'POST',
        url: '../assets/php/seeData.php', 
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                console.log(response.message);
                // Replace \n with <br> for displaying in SweetAlert
                var formattedMessage = response.message.replace(/\n/g, "<br>");
                Swal.fire({
                    title: "¿Son correctos los datos?",
                    html: formattedMessage, // Use html instead of text for multiline support
                    icon: "success",
                    showCancelButton: true,
                    cancelButtonText: "Cancelar",
                    confirmButtonText: "Si, confirmar",
                    buttonsStyling: false,
                    customClass: {
                        cancelButton: 'bc',
                        confirmButton: 'bs'
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        register(formData); // Pass the formData to the register function
                    }
                });
            } else {
                swal({
                    title: '¡Error!',
                    text: response.message,
                    icon: 'error',
                    button: {
                        className: 'bc'
                      }
                });
            }
        },    
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            swal('Error!', 'Error al procesar, intenta de nuevo', 'error'); // Show an error message using SweetAlert
        }
    });
});

function register(formData){
    $.ajax({
        type: 'POST',
        url: '../assets/php/register.php', 
        data: formData,
        dataType: 'json',
        success: function(response) {
            if (response.success) {
    
                swal({
                    title: 'Bienvenido!',
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
}