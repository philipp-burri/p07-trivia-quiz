<?php
include 'assets/logik.php';
if (!isset($_SESSION)) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="header.css">   
    <link rel="stylesheet" href="style.css">
</head>

<body>
<?php include '../utils/header.php' ?>
<div class="quiz-container">
    <div class="question">
        <h2 class="question-title"><?php echo htmlspecialchars($questionText); ?></h2>
    </div>


    <form id="quizForm" method="post">
        <div class="answer-container">
            <?php foreach ($answer_keys as $key): ?>
                <div class="answer">
                    
                    <input type="radio" name="answer" id="answer<?php echo strtoupper($key); ?>" value="<?php echo $key; ?>" required>
                    <label id="label<?php echo strtoupper($key); ?>" for="answer<?php echo strtoupper($key); ?>"><?php echo htmlspecialchars($shuffled_answers[$key]); ?></label>
                </div>
            <?php endforeach; ?>    
        </div>
        <input type="hidden" id= "correctAnswer" value="<?php echo $singlequestion['correct_answer']; ?>">
    </form>
</div>

<?php include '../utils/footer.php'; ?>



<script>

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
</script>
</body>
</html>