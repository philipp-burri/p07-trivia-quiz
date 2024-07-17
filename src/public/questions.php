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
        <h2><?php echo htmlspecialchars($questionText); ?></h2>
    </div>


    <form id="quizForm" method="post">
        <div class="answer-container">
        <div class="answer-container">
            <?php foreach ($answer_keys as $key): ?>
                <div class="answer">
                    
                    <input type="radio" name="answer" id="answer<?php echo strtoupper($key); ?>" value="<?php echo $key; ?>" required>
                    <label for="answer<?php echo strtoupper($key); ?>"><?php echo htmlspecialchars($shuffled_answers[$key]); ?></label>

                </div>
            <?php endforeach; ?>    
        </div>
    </form>
</div>


<script>
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
</script>
</body>
</html>