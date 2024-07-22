<?php
if (!isset($_SESSION)) {
    session_start();
}


function questioenIdandIndex($type, $amount, $dbConnection){
    // Falls noch keine QuestionId in der Session existiert wird diese aus der DB ausgelesen (und in ein eindimensionales Array gewandelt) und in der Session hinterlegt

if (!isset($_SESSION['questionIds'])){
    if ($type != 'mixed'){
    $query = "SELECT id FROM questions WHERE type = '$type' ORDER BY RAND() LIMIT $amount";
    }else{
    $query = "SELECT id FROM questions WHERE type != 'fail' ORDER BY RAND() LIMIT $amount";
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

return ['questionIndex' => $questionIndex, 
        'questionId' => $questionId
        ];

}

function singlequestionID($questionId, $dbConnection){
    if ($questionId != null){
$query = "SELECT * FROM questions WHERE id = $questionId";
$stmt = $dbConnection->prepare($query);
$stmt->execute();
$singlequestion = $stmt->fetch(PDO::FETCH_ASSOC);
return $singlequestion;
}
}

function setPoints(){
if (!isset($_SESSION['points'])) {
    $_SESSION['points']= 0;   
}
$points= $_SESSION['points'];
return $points;
}

function questionAmount($amount, $singlequestion){
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
}

function shuffleAnswers($singlequestion) {
    if ($singlequestion) {
        $questionText = htmlspecialchars($singlequestion['question']);
        $answers = [
            'a' => htmlspecialchars($singlequestion['answer_a']),
            'b' => htmlspecialchars($singlequestion['answer_b']),
            'c' => htmlspecialchars($singlequestion['answer_c']),
            'd' => htmlspecialchars($singlequestion['answer_d']),
        ];
    
        // Antworten mischen
        $answer_keys = array_keys($answers);
        shuffle($answer_keys);

        // Gemischte Antworten neu zuordnen
        $shuffled_answers = [];
        foreach ($answer_keys as $key) {
            $shuffled_answers[$key] = $answers[$key];
        }
        
        return [
            'answers' => $answers,
            'questionText' => $questionText,
            'shuffled_answers' => $shuffled_answers,
            'answer_keys' => $answer_keys
        ];
    }
    return null;
}

function calculatAndSetResult($amount, $points){
    $ratio = $amount > 0 ? $points / $amount : 0;

    $result_image = '';
    $result_text = '';
    
    // Bestimmen des Ergebnisses basierend auf dem Verhältnis
    if ($ratio >= 0 && $ratio < 0.3333) {
        $result_image = '/assets/img/traurig.jpeg';
        $result_text = 'Leider hast du weniger als ein Drittel der Fragen richtig beantwortet. Versuche es noch einmal!';
    } elseif ($ratio >= 0.3333 && $ratio < 0.6667) {
        $result_image = '/assets/img/mittel.jpeg';
        $result_text = 'Du hast ein Drittel bis zwei Drittel der Fragen richtig beantwortet. Gut gemacht!';
    } else {
        $result_image = '/assets/img/happy.jpeg';
        $result_text = 'Herzlichen Glückwunsch! Du hast mehr als zwei Drittel der Fragen richtig beantwortet!';
    }

    return [
        'result_image' => $result_image,
        'result_text' => $result_text
    ];
}


function questionTemplate($questionText, $answer_keys, $shuffled_answers, $singlequestion){
    echo 
    '<div class="quiz-container">
        <div class="question">
            <h2 class="question-title">' . htmlspecialchars($questionText) . '</h2>
        </div>
        <form id="quizForm" method="post">
            <div class="answer-container">';
                    foreach ($answer_keys as $key) {
                        echo 
                        '<div class="answer">
                            <input  type="radio" 
                                    name="answer" 
                                    id="answer' . strtoupper($key) . '" 
                                    value="' . $key . '" required>
                            <label  id="label' . strtoupper($key) . '" 
                                    for="answer' . strtoupper($key) . '"
                                    >' . htmlspecialchars($shuffled_answers[$key]) . '</label>
                        </div>';
                    }
    echo 
            '</div>
            <input  type="hidden" 
                    id="correctAnswer" 
                    value="' . $singlequestion['correct_answer'] . '">
        </form>
    </div>';
}

function resultPage($points, $amount, $result_image, $result_text){
    echo '
    <div class="quiz-container1">
        <h1>Quiz Resultat</h1>
        <br>
        <h3>Dein Ergebnis</h3>
        <h5>' . $points . ' von ' . $amount . ' möglichen Punkten</h5>
    </div>
    
    <div class="quiz-container2">
        <img src="' . $result_image . '" alt="Ergebnis">
        <div class="quiz-container4">
            <h4>' . $result_text . '</h4>
            <a href="index.php" class="btn">Noch einmal versuchen</a>
        </div>
    </div>';
}

function failMessage(){
    echo '  <div>
                <h1 style="position: absolute; 
                    top: 20%; left: 50%; 
                    transform: translate(-50%, -50%);">
                    OOOPS! Da ist wohl etwas schief gelaufen
                </h1>
                <p  style="position: absolute; 
                    top: 40%; left: 50%; 
                    transform: translate(-50%, -50%); 
                    text-align: center;">
                    Bitte gehe zurück auf die Startseite und beginne das Quiz von vorn
                </p>
            </div>
            <img    src="/assets/img/traurig.jpeg" 
                    alt="emoji traurig" 
                    style="position: absolute; 
                    top: 65%; left: 50%; 
                    transform: translate(-50%, -50%);">';
}




