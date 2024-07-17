

    // alle radio buttons werden im Formular ausgewählt.
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('quizForm');
    const radioButtons = form.querySelectorAll('input[type="radio"]');
    // change event listener wird hinzugefügt, formular wird automatisch abgesendet wenn antwort ausgewählt wird.
    radioButtons.forEach(function(radio) {
        radio.addEventListener('change', function() {
            form.submit();
        });
    });
});

