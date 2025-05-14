<?php
$servername = "MySQL-8.4";
$username = "root";
$password = ""; 
$dbname = "smackthat";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if ($conn === false) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

echo "";


$result = mysqli_query($conn, "SHOW TABLES LIKE 'users'");
if (mysqli_num_rows($result) == 0) {
    $sql = "CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    )";
    
    if (!mysqli_query($conn, $sql)) {
        die("Ошибка создания таблицы: " . mysqli_error($conn));
    }
}

$result = mysqli_query($conn, "SHOW TABLES LIKE 'dishes'");
if (mysqli_num_rows($result) == 0) {
    $sql = "CREATE TABLE dishes (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description TEXT NOT NULL,
        ingredients TEXT NOT NULL,
        tags VARCHAR(255) NOT NULL,
        image_path VARCHAR(255) NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    
    if (!mysqli_query($conn, $sql)) {
        die("Ошибка создания таблицы: " . mysqli_error($conn));
    }
}
?>