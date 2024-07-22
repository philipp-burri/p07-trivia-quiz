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

if (isset($_SESSION['type']) && isset($_SESSION['amount'])) {
   
    $type = $_SESSION['type'];
    $amount= $_SESSION['amount'];
}else {
    $type= 'fail';
    $amount= 1;
}

// setzt die Returnwerte von 'questioenIdandIndex' als array in $returnquestioenIdandIndex

$returnquestioenIdandIndex= questioenIdandIndex($type, $amount, $dbConnection);

// Liest die einzelnen Werte aus dem Array aus und setzt sie in die Variabeln
$questionId= $returnquestioenIdandIndex['questionId'];
$questionIndex= $returnquestioenIdandIndex['questionIndex'];

//Wählt ein einzelne Frage anhand der ID und setzt diese in de Variabel
$singlequestion= singlequestionID($questionId, $dbConnection);

// Setzt die Variabel Points
$points= setPoints();

// Zählt die richtigen Antworten und bestimmt die ANzahl der Fragen
questionAmount($amount, $singlequestion);

// Setzt die ANtwortmöglichkeiten je Frage in eine zufällige Reihenfolge (Speichert die Returnwerte in einem Array)
$returnShuffledAnswers= shuffleAnswers($singlequestion);

// Setzt die Daten aus dem Array in einzelne Variabeln
$shuffled_answers= $returnShuffledAnswers['shuffled_answers'];
$answer_keys= $returnShuffledAnswers['answer_keys'];
$questionText= $returnShuffledAnswers['questionText'];
$answers= $returnShuffledAnswers['answers'];

//Berechnet den Anteil korrekt beantwortete Fragen und bestimmt das passende Anzeigebild
$returnResult= calculatAndSetResult($amount, $points);

// setzt die Bilder aus dem Array in einzelne Variabeln
$result_image= $returnResult['result_image'];
$result_text= $returnResult['result_text'];