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
<div class="main-content">;
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
</div>

<?php include '../utils/footer.php'; ?>



<script src="assets/js/question.js"></script>
</body>
</html>