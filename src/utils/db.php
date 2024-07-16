<?php

$db_host = getenv("DB_HOST");
$db_name = getenv("DB_NAME");
$db_user = getenv("DB_USER");
$db_pass = getenv("DB_PASSWORD");

try {
$dbConnection = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";
} catch (PDOException $e) {
echo $e->getMessage();

}
$type="animals";

$query = 'SELECT * FROM questions WHERE type = :type ORDER BY RAND() LIMIT 1';
$stmt = $dbConnection->prepare($query);
$stmt->bindParam(':type', $type, PDO::PARAM_STR);
$stmt->execute();
$question = $stmt->fetch(PDO::FETCH_ASSOC);


//foreach loop probieren
if ($question) {
$questionText = htmlspecialchars($question['question']);
$answerA = htmlspecialchars($question['answer_a']);
$answerB = htmlspecialchars($question['answer_b']);
$answerC = htmlspecialchars($question['answer_c']);
$answerD = htmlspecialchars($question['answer_d']);
}
?>
