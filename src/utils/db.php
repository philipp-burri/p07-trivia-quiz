<?php
// echo "<p>hellooooo from db.php!</p>";

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

try {

    // hier definieren wir das SQL statement.
    $sqlCreateTable = "CREATE TABLE IF NOT EXISTS `users` (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(255) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    // löschen die Tabelle wieder
    $sqlDeleteTable = "DROP TABLE IF EXISTS users";


    // Verändert die Tabelle und fügt eine neue Spalte "avatar" hinzu.
    $sqlAlterTable = "ALTER TABLE `users` ADD COLUMN `avatar` VARCHAR(255) NULL AFTER `email`";


    $command = null;

    switch ($command) {
        case "CREATE TABLE":
            $sql = $sqlCreateTable;
            break;
        case "DROP TABLE":
            $sql = $sqlDeleteTable;
            break;
        case "ALTER TABLE":
            $sql = $sqlAlterTable;
            break;
        default:
            $sql = null;
    }
    if ($sql) {
        // exec führt das SQL statment oben aus.
        $dbConnection->exec($sql);
    } else {
        echo "No SQL command was executed";
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}

function addUser($username, $password, $email, $conn)
{
    // hole die Datenbankverbindung als Parameter
    $dbConnection = $conn;

    // hash Funktion um das Passwort zu verschlüsseln (https://www.php.net/manual/de/function.password-hash.php)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    try {
        // prüfe ob der User bereits existiert
        $sqlUserExists = "SELECT COUNT(*) FROM users WHERE username = :username";
        $statment = $dbConnection->prepare($sqlUserExists);
        $statment->bindParam(':username', $username);
        $statment->execute();
        $result = $statment->fetchColumn();

        // wenn der User bereits existiert, führe den weiteren Code in der Funktion nicht aus.
        if ($result > 0) {
            echo "User already exists";
            return;
        }

        // wenn der User nicht existiert, füge ihn hinzu.
        $sql = "INSERT INTO users (username, password, email) VALUES (:username, :password, :email)";
        $statment = $dbConnection->prepare($sql);
        $statment->bindParam(':username', $username);
        $statment->bindParam(':password', $hashed_password);
        $statment->bindParam(':email', $email);
        $statment->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

addUser("UserTwoThree", "123456", "test@email.ch", $dbConnection);