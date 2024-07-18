<?php
if (!isset($_SESSION)) {
    session_start();
}

include '../utils/db.php';

// Fragt ab ob dir Kategorie im Post hinterlegt ist, speichert diese in der Session und leitet den User aus die Fragen Seite weiter..

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST['categories']){
    $_SESSION['type'] = $_POST['categories'];
    if ($_POST['amount']){
        $_SESSION['amount'] = $_POST['amount'];
    }
}header("Location: ../questions.php");
}
// Setzt dir Kategorie aus der Session in die Type Variabel
$type = $_SESSION['type'];
$amount= $_SESSION['amount'];

// Falls noch keine QuestionId in der Session existiert wird diese aus der DB ausgelesen (und in ein eindimensionales Array gewandelt) und in der Session hinterlegt
if (!isset($_SESSION['questionIds'])){
    if ($type != 'mixed'){
    $query = "SELECT id FROM questions WHERE type = '$type' ORDER BY RAND() LIMIT $amount";
    }else{
    $query = "SELECT id FROM questions ORDER BY RAND() LIMIT $amount";
    }
$stmt = $dbConnection->prepare($query);
$stmt->execute();
$question = $stmt->fetchAll(PDO::FETCH_ASSOC);
$questionIds = array_column($question, 'id');
$_SESSION['questionIds']= $questionIds;
}
$questionIds= $_SESSION['questionIds'];

if (!isset($_SESSION['questionIndex'])){
    $_SESSION['questionIndex'] = 0;
}


$questionIndex = $_SESSION['questionIndex'];


$questionId= $questionIds[$questionIndex];


$query = "SELECT * FROM questions WHERE id = $questionId";
$stmt = $dbConnection->prepare($query);
$stmt->execute();
$singlequestion = $stmt->fetch(PDO::FETCH_ASSOC);

if (!isset($_SESSION['points'])) {
    $_SESSION['points']= 0;   
}

$amountIndex= $amount- 2;
if (isset($_POST['answer'])) {
    $_SESSION['answer']= $_POST['answer'];
    $_SESSION['correctAnswer']= $singlequestion['correct_answer'];
    $givenAnswer= $_SESSION['answer'];
    $correctAnswer= $_SESSION['correctAnswer'];
    if ($givenAnswer== $correctAnswer){
        $_SESSION['points']+= 1;
    }
    
    if ($_SESSION['questionIndex'] <= $amountIndex){
    $_SESSION['questionIndex'] ++;     
    }else{
        header("Location: ../result.php");
    }
}


if ($singlequestion) {
    $questionText = htmlspecialchars($singlequestion['question']);
    $answers = [
        'a' => htmlspecialchars($singlequestion['answer_a']),
        'b' => htmlspecialchars($singlequestion['answer_b']),
        'c' => htmlspecialchars($singlequestion['answer_c']),
        'd' => htmlspecialchars($singlequestion['answer_d']),
    ];

    // Antworten mischen
    $shuffled_answers = $answers;
    $answer_keys = array_keys($shuffled_answers);
    shuffle($answer_keys);
}
