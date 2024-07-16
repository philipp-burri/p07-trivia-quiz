<?php
if (!isset($_SESSION)) {
    session_start();
}

include '../utils/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['categories']){
    $_SESSION['type'] = $_POST['categories'];
}header("Location: ../questions.php");
}

$type = $_SESSION['type'];

if (!isset($_SESSION['question_id'])){
$query = "SELECT id FROM questions WHERE type = '$type' ORDER BY RAND() LIMIT 10";
$stmt = $dbConnection->prepare($query);
$stmt->execute();
$question = $stmt->fetchAll(PDO::FETCH_ASSOC);
$questionIds = array_column($question, 'id');
$_SESSION['question_id']= "$questionIds[0]";
}

$idcount= 0;

$query = "SELECT * FROM questions WHERE id = '$questionIds[$idcount]'";
$stmt = $dbConnection->prepare($query);
$stmt->execute();
$singlequestion = $stmt->fetch(PDO::FETCH_ASSOC);

if ($singlequestion) {
    $questionText = htmlspecialchars($singlequestion['question']);
    $answerA = htmlspecialchars($singlequestion['answer_a']);
    $answerB = htmlspecialchars($singlequestion['answer_b']);
    $answerC = htmlspecialchars($singlequestion['answer_c']);
    $answerD = htmlspecialchars($singlequestion['answer_d']);
}