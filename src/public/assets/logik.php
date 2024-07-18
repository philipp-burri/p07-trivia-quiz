<?php
include '../utils/db.php';
include '../utils/functions.php';
if (!isset($_SESSION)) {
    session_start();
}


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

$returnquestioenIdandIndex= questioenIdandIndex($type, $amount, $dbConnection);

$questionId= $returnquestioenIdandIndex['questionId'];
$questionIndex= $returnquestioenIdandIndex['questionIndex'];


$singlequestion= singlequestionID($questionId, $dbConnection);

$points= setPoints();

questionAmount($amount, $singlequestion);


$returnShuffledAnswers= shuffleAnswers($singlequestion);

$shuffled_answers= $returnShuffledAnswers['shuffled_answers'];
$answer_keys= $returnShuffledAnswers['answer_keys'];
$questionText= $returnShuffledAnswers['questionText'];
$answers= $returnShuffledAnswers['answers'];

$returnResult= calculatAndSetResult($amount, $points);

$result_image= $returnResult['result_image'];
$result_text= $returnResult['result_text'];