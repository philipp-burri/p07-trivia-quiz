<?php


if (!isset($_SESSION)) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['categories']){
    $_SESSION['type'] = $_POST['categories'];
}header("Location: ../questions.php");
}

include '../utils/db.php';
$type = $_SESSION['type'];

$query = 'SELECT * FROM questions WHERE type = :type ORDER BY RAND() LIMIT 1';
$stmt = $dbConnection->prepare($query);
$stmt->bindParam(':type', $type, PDO::PARAM_STR);
$stmt->execute();
$question = $stmt->fetch(PDO::FETCH_ASSOC);


//foreach loop probieren
if ($question) {
$questionText = htmlspecialchars($question['question']);
$answerA = htmlspecialchars($question['answer_a']);
$answerB = htmlspecialchars($question['answer_b']);
$answerC = htmlspecialchars($question['answer_c']);
$answerD = htmlspecialchars($question['answer_d']);
}
?>
