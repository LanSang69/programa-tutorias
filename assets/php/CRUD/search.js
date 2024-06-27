const inputField = document.getElementById('input');
inputField.addEventListener('input', function() {
    sendRequest();
});

window.addEventListener('load', function() {
    if (inputField.value === '') {
        sendRequest();
    }
});

function sendRequest() {
    const inputValue = inputField.value;
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'live_search.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onload = function() {
        if (xhr.status === 200) {
            const response = xhr.responseText;
            const searchResultsContainer = document.getElementById('search-results');
            searchResultsContainer.innerHTML = response;
        }
    };
    xhr.send('input=' + inputValue);
}