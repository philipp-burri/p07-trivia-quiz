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
    <title>Quiz</title>
    <link rel="stylesheet" href="header.css">   
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="/assets/img/favicon-32x32.png">
</head>

<body>
<?php include '../utils/header.php' ?>
<div class="main-content">

<?php

if ($type== 'fail' && $amount== 1){
    failMessage();
} else {
    questionTemplate($questionText, $answer_keys, $shuffled_answers, $singlequestion);
}

?>
</div>

<?php include '../utils/footer.php'; ?>



<script src="assets/js/question.js"></script>
</body>
</html>