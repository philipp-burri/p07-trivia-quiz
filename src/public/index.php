<?php
include '../utils/db.php';
if (!isset($_SESSION)) {
    session_start();
}

prettyPrint($_SESSION);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quiz</title>
    <style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f0f0f0;
        color: #333;
    }
</style>
</head>


<body>



<form action="assets/logik.php" method="post">
        <label for="">Thema:</label>
        <select id="categories" name="categories">
            <option value="animals">Animals</option>
            <option value="history">History</option>
            <option value="geography">Geography</option>
            
        </select>

        <button type="submit">Senden</button>
    </form>


</body>
</html>