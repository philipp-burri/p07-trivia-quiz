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

<div class="dropdown-menu">
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
</div>


</body>
</html>