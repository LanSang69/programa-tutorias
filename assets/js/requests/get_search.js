let searchInput = document.getElementById('search');

searchInput.addEventListener('input', function(event) {
    let searchData = event.target.value; // Get the value from the input
    search(searchData);
  });

  window.addEventListener('load', function() {
    search('');
  });
  
  function search(data) {
    $.ajax({
      type: 'POST',
      url: '../assets/php/tutores/get_tutors.php',
      data: { searchData: data },
      dataType: 'json',
      success: function(response) {
        if (response.success) {
          let tutores = response.tutores;
          let tbody = document.getElementById('result');
          tbody.innerHTML = '';
  
          if (Array.isArray(tutores)) {
            tutores.forEach(tutor => {
              let row = document.createElement('tr');
  
              let nombreCell = document.createElement('td');
              nombreCell.textContent = tutor.nombre;
              row.appendChild(nombreCell);
  
              let cupoCell = document.createElement('td');
              cupoCell.textContent = tutor.cupo;
              row.appendChild(cupoCell);
  
              let buttonCell = document.createElement('td');
              let radioButton = document.createElement('input');
              radioButton.type = 'radio';
              radioButton.name = 'tutor';
              radioButton.value = tutor.id;
              buttonCell.appendChild(radioButton);
              row.appendChild(buttonCell);
  
              tbody.appendChild(row);
            });
          } else {
            console.error("Tutors is not an array");
          }
        } else {
          swal('Error!', response.message, 'error');
        }
      }
    });
  }
  