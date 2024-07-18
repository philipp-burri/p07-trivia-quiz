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
