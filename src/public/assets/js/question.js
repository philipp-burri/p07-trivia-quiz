document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('quizForm');
    const radioButtons = form.querySelectorAll('input[type="radio"]');
    
    radioButtons.forEach(function(radio) {
        radio.addEventListener('change', function() {
            // Funktion zur Überprüfung der Antwort aufrufen
            checkAnswer();

            // Formular absenden
            setTimeout(() => form.submit(), 500);
        });
    });

    function checkAnswer() {
        const selectedAnswer = document.querySelector('input[name="answer"]:checked');
        
        if (selectedAnswer) {
            const selectedValue = selectedAnswer.value; // Wert des ausgewählten Radio-Buttons
            
            // Wert der korrekten Antwort aus einem versteckten Input-Feld
            const correctAnswer = document.getElementById('correctAnswer').value;
            
            // Selektiere das Label, das mit dem ausgewählten Radio-Button verknüpft ist
            const labelForSelected = document.querySelector(`label[for="${selectedAnswer.id}"]`);

            // Überprüfe, ob das Label gefunden wurde
            if (labelForSelected) {
                // Vergleiche den Wert des ausgewählten Radio-Buttons mit dem korrekten Wert
                if (selectedValue === correctAnswer) {
                    labelForSelected.classList.add('correct');
                    labelForSelected.classList.remove('incorrect');
                } else {
                    labelForSelected.classList.add('incorrect');
                    labelForSelected.classList.remove('correct');
                }
            }
        } else {
            console.log('Kein Radio-Button ausgewählt.');
        }
    }
});

