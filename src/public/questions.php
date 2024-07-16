<?php
include '../utils/db.php';
include 'assets/logik.php';



$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['answer'])) {


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
            <div class="answer">
                <input type="radio" name="answer" id="answerA" value="a" required>
                <label for="answerA"><?php echo htmlspecialchars($answerA); ?></label>
            </div>
            <div class="answer">
                <input type="radio" name="answer" id="answerB" value="b" required>
                <label for="answerB"><?php echo htmlspecialchars($answerB); ?></label>
            </div>
            <div class="answer">
                <input type="radio" name="answer" id="answerC" value="c" required>
                <label for="answerC"><?php echo htmlspecialchars($answerC); ?></label>
            </div>
            <div class="answer">
                <input type="radio" name="answer" id="answerD" value="d" required>
                <label for="answerD"><?php echo htmlspecialchars($answerD); ?></label>
            </div>
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