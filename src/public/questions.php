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
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f0f0f0;
        color: #333;
    }
    h1 {
        color: #2c3e50;
        text-align: center;
        margin-bottom: 30px;
    }
    .quiz-container {
        background-color: #ffffff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .question {
        font-weight: bold;
        font-size: 18px;
        margin-bottom: 20px;
        color: #2c3e50;
    }

    .answer {
        margin-bottom: 10px;
    }
    .answer input[type="radio"] {
        display: none;
    }
    .answer label {
        display: block;
        padding: 10px 15px;
        background-color: #ecf0f1;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .answer label:hover {
        background-color: #d5dbdb;

        background-color: #3498db;
        color: white;
    }
    .message {
        margin-top: 20px;
        font-weight: bold;
        text-align: center;
        padding: 10px;
        border-radius: 4px;
    }
    .message.correct {
        background-color: #2ecc71;
        color: white;
    }
    .message.incorrect {
        background-color: #e74c3c;
        color: white;
    }
    button[type="submit"] {
        display: block;
        width: 100%;
        padding: 10px;
        margin-top: 20px;
        background-color: #2980b9;
        color: white;
        border: none;
        border-radius:uestions.php
    button[type="submit"]:hover {
        background-color: #3498db;
    }}
</style>
</head>
<?php


?>

<body>

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