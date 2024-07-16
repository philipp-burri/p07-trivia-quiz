<?php
include '../utils/db.php';

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


<form action="assets/logik.php" method="post">
        <label for="">Thema:</label>
        <select id="categories" name="categories">
            <option value="animals">Animals</option>
            <option value="history">History</option>
            <option value="geography">Geography</option>
            <option value="football">Football</option>

        </select>

        <button type="submit">Senden</button>
    </form>


<!-- <div class="dropdown-menu">

<div class="container">
        <h2>Select a Category</h2>
        <form action="questions.php" method="get">
            <input type="hidden" name="category" value="geography">
            <button type="submit" class="category-button">Geography</button>
        </form>
        <form action="questions.php" method="get">
            <input type="hidden" name="category" value="history">
            <button type="submit" class="category-button">History</button>
        </form>
        <form action="questions.php" method="get">
            <input type="hidden" name="category" value="science">
            <button type="submit" class="category-button">Science</button>
        </form>
 
    </div>
</div>
 -->
</body>
</html>