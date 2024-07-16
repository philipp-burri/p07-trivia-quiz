<?php
include '../utils/db.php';



$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['answer'])) {


}
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
    h1 {
        color: #2c3e50;
        text-align: center;
        margin-bottom: 30px;
    }
    .quiz-container {
        background-color: #ffffff;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    .question {
        font-weight: bold;
        font-size: 18px;
        margin-bottom: 20px;
        color: #2c3e50;
    }
    .answer-container {
    }
    .answer {
        margin-bottom: 10px;
    }
    .answer input[type="radio"] {
        display: none;
    }
    .answer label {
        display: block;
        padding: 10px 15px;
        background-color: #ecf0f1;
        border-radius: 4px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    .answer label:hover {
        background-color: #d5dbdb;
    }
    .answer input[type="radio"]:checked + label {
        background-color: #3498db;
        color: white;
    }
    .message {
        margin-top: 20px;
        font-weight: bold;
        text-align: center;
        padding: 10px;
        border-radius: 4px;
    }
    .message.correct {
        background-color: #2ecc71;
        color: white;
    }
    .message.incorrect {
        background-color: #e74c3c;
        color: white;
    }
    button[type="submit"] {
        display: block;
        width: 100%;
        padding: 10px;
        margin-top: 20px;
        background-color: #2980b9;
        color: white;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    button[type="submit"]:hover {
        background-color: #3498db;
    }
</style>
</head>


<body>

</body>
</html>