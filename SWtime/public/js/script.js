// Obtener referencias a los elementos HTML
var searchInput = document.getElementById('search-input');
var suggestionsContainer = document.getElementById('suggestions-container');

// Escuchar el evento de entrada de texto
searchInput.addEventListener('input', function() {
    var searchTerm = searchInput.value.trim();

    // Enviar solicitud al servidor
    if (searchTerm !== '') {
        fetchSuggestions(searchTerm)
            .then(function(suggestions) {
                // Mostrar las sugerencias devueltas por el servidor
                showSuggestions(suggestions);
            });
    } else {
        // Limpiar las sugerencias si el campo de entrada está vacío
        clearSuggestions();
    }
});

// Realizar una solicitud al servidor para obtener las sugerencias
function fetchSuggestions(searchTerm) {
    return fetch('suggestions.php', {
        method: 'POST',
        body: JSON.stringify({ term: searchTerm })
    })
    .then(function(response) {
        return response.json();
    });
}

// Mostrar las sugerencias en el contenedor
function showSuggestions(suggestions) {
    suggestionsContainer.innerHTML = '';

    var ul = document.createElement('ul');
    suggestionsContainer.appendChild(ul);

    suggestions.forEach(function(suggestion) {
        var li = document.createElement('li');
        li.textContent = suggestion;
        ul.appendChild(li);

        // Agregar un manejador de eventos para el clic en la sugerencia
        li.addEventListener('click', function() {
            searchInput.value = suggestion;
            clearSuggestions();
        });
    });

    suggestionsContainer.style.display = 'block';
}

// Limpiar el contenedor de sugerencias
function clearSuggestions() {
    suggestionsContainer.innerHTML = '';
    suggestionsContainer.style.display = 'none';
}
