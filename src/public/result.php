<?php

include 'assets/logik.php';


?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punkte Anzeige</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="style.css">
    <style>
      
        
    </style>
</head>
<body>
<?php include '../utils/header.php' ?>

<div class="quiz-container">
    <h1>Quiz Resultat</h1>
    <h4>Dein Ergebnis</h4>
    <p><?php echo isset($_SESSION['points']) ? $_SESSION['points'] : 0; ?> Punkte</p>
</div>



      

<?php include '../utils/footer.php'; ?>
</body>
</html>
