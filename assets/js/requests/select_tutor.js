const button = document.getElementById('elegir');
button.addEventListener('click', function() {
    const tutorRadios = document.querySelectorAll('input[type="radio"][name="tutor"]');
    let selectedValue;
    tutorRadios.forEach(radio => {
        if (radio.checked) {
            selectedValue = radio.value;
        }
    });
    if (selectedValue) {
        swal({
            title: "Confirmación",
            text: "¿Estás seguro de que deseas seleccionar a este tutor?",
            icon: "success",
            buttons: true,
            dangerMode: true,
        }).then((confirm) => {
            if (confirm) {
                // Code to execute when the user confirms the tutor selection
                // Add your logic here
            } else {
                // Code to execute when the user cancels the tutor selection
                // Add your logic here
            }
        });
    } else {
        swal("Error", "Please select a tutor", "error");
    }
});
