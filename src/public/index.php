<?php
include '../utils/db.php';
if (!isset($_SESSION)) {
    session_start();
}

session_unset();
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="style.css">

</head>


<body>

<?php include '../utils/header.php' ?>

<div style="margin-top: 150px; font-size: 40px;">
    <h1 class="index-title">Trivia Quiz</h1>
</div>
<div class="dropdown-menu">
<form action="assets/logik.php" method="post">
        <label for="categories"><p class= "index-label">Auswahl Thema:<p></label><br>
        <select id="categories" name="categories">
            <option value="mixed">Alle Kategorien</option>
            <option value="animals">Tiere</option>
            <option value="football">Fussball</option>
            <option value="geography">Geographie</option>            
            <option value="history">Geschichte</option>

        </select>

        <label class="index-label" for="amount"><p class= "index-label">Anzahl Fragen:</p></label><br>
        <select id="amount" name="amount">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
            <option value="20">20</option>
        </select>

        <button type="submit">Starten</button>
    </form>
</div>

<?php  include '../utils/footer.php'; ?>
</body>
</html>