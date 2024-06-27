const button = document.getElementById('elegir');
button.addEventListener('click', function() {
    const tutorRadios = document.querySelectorAll('input[type="radio"][name="tutor"]');
    let selectedRadio = null;

    tutorRadios.forEach(radio => {
        if (radio.checked) {
            selectedRadio = radio;
        }
    });

    if (selectedRadio) {
        const selectedText = selectedRadio.parentElement.parentElement.querySelector('td:first-child').textContent.trim();

        Swal.fire({
            title: "Confirmación",
            text: "¿Estás seguro de que deseas seleccionar a " + selectedText + " como tu tutor?",
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
                console.log(selectedRadio.value); 
                insert_tutor(selectedRadio.value); 
            }
        });
    } else {
        Swal.fire("Error", "Por favor selecciona un tutor", "error");
    }
});


function insert_tutor(tutor_id) {
    $.ajax({
        type: 'POST',
        url: '../assets/php/tutores/insert_tutor.php',
        data: { tutor_id: tutor_id },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                console.log(response)
                Swal.fire({
                    title: "¡No olvides imprimir tu ficha de tutoría!",
                    icon: "info",
                    showCancelButton: false,
                    confirmButtonText: "Impirimir PDF",
                    buttonsStyling: false,
                    customClass: {
                        confirmButton: 'bs'
                    }
                }).then(function() {
                    window.location.href = '../assets/php/PDF/acuseRegistro.php';
                });
            } else {
                Swal.fire('Error!', response.message, 'error');
            }
        },
        error: function(xhr, status, error) {
            console.error(xhr.responseText);
            Swal.fire('Error!', 'Error al procesar, intenta de nuevo', 'error');
        }
    });
}

