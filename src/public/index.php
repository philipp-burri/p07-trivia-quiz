<?php
// Einbinden der Datenbankverbindung und Definition von prettyPrint
include '../utils/db.php';

function prettyPrint($a) {
echo '<pre>';
print_r($a);
echo '</pre>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Quiz</title>
<link rel="stylesheet" href="assets/css/style.css">
<style>
    
body {
font-family: Arial, sans-serif;
background-color: #E6E6FA;
margin: 0;
padding: 0;
}

.quiz-container {
max-width: 600px;
margin: 0 auto;
padding: 20px;
border: 1px solid #ccc;
border-radius: 5px;
background-color: #fff;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.question {
font-size: 18px;
margin-bottom: 20px;
}

.answers {
display: grid;
grid-template-columns: 1fr 1fr;
gap: 10px;
}

.answer {
padding: 10px;
border: 1px solid #ddd;
border-radius: 5px;
cursor: pointer;
}

.answer:hover {
background-color: #f0f0f0;
}
</style>
</head>

<body>
    <div class="quiz-container">
    <div class="question">
        <h2><?php echo $questionText; ?></h2>
    </div>

<!-- foreach probieren -->
    <div class="answers">
        <div class="answer"><?php echo $answerA; ?></div>
        <div class="answer"><?php echo $answerB; ?></div>
        <div class="answer"><?php echo $answerC; ?></div>
    <div class="answer"><?php echo $answerD; ?></div>
    </div>
</div>
</body>
</html>