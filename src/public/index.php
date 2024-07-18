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
        <label class="index-label" for="categories">Auswahl Thema:</label><br>
        <select id="categories" name="categories">
            <option value="mixed">All Categories</option>
            <option value="animals">Animals</option>
            <option value="football">Football</option>
            <option value="geography">Geography</option>            
            <option value="history">History</option>

        </select>

        <label class="index-label" for="amount">Anzahl Fragen:</label><br>
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