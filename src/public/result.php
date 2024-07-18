<?php
session_start();
include 'assets/logik.php';

// Holen der Variablen aus der Session
$amount = isset($_SESSION['amount']) ? $_SESSION['amount'] : 0;
$points = isset($_SESSION['points']) ? $_SESSION['points'] : 0;

// Berechnung des Verhältnisses
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
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz Resultat</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include '../utils/header.php' ?>
<div  class="quiz-container3">
    <div class="quiz-container1">
        <h1>Quiz Resultat</h1>
        <br>
        
        <h3>Dein Ergebnis</h3>
        <h5><?php echo $points; ?>  von <?php echo $amount; ?> möglichen Punkten</h5>
    </div>

    <div class="quiz-container2">
        <img src="<?php echo $result_image; ?>" alt="Ergebnis">
        <div class= "quiz-container4">
            <h4><?php echo $result_text; ?></h4>
            <a href="index.php" class="btn">Noch einmal versuchen</a>
        </div>
    </div>

</div>


<?php include '../utils/footer.php'; ?>
</body>
</html>
