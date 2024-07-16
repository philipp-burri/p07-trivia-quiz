<?php
if (!isset($_SESSION)) {
    session_start();
}
function prettyPrint($a){
    echo '<pre>';
    print_r($a);
    echo '</pre>';
}

/* prettyPrint($_POST['categories']); */

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


?>
