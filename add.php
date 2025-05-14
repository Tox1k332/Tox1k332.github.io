<?php
require_once './config/db.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $ingredients = mysqli_real_escape_string($conn, $_POST['ingredients']);
    $tags = mysqli_real_escape_string($conn, $_POST['tags']);
    

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }
        
        $fileName = uniqid() . '_' . basename($_FILES['image']['name']);
        $targetPath = $uploadDir . $fileName;
        

        $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $fileType = $_FILES['image']['type'];
        
        if (in_array($fileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {

                $sql = "INSERT INTO dishes (name, description, ingredients, tags, image_path) 
                        VALUES ('$name', '$description', '$ingredients', '$tags', '$targetPath')";
                
                if (mysqli_query($conn, $sql)) {
                    header('Location: index.php'); 
                    exit;
                } else {
                    $error = "Ошибка при добавлении блюда: " . mysqli_error($conn);
                }
            } else {
                $error = "Ошибка при загрузке изображения";
            }
        } else {
            $error = "Недопустимый тип файла. Разрешены только JPEG, PNG и GIF.";
        }
    } else {
        $error = "Ошибка при загрузке изображения";
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Добавить блюдо</title>
    <link rel="stylesheet" href="./style.css">
</head>
<body>
    <div class="admin-container">
        <h1>Добавить новое блюдо</h1>
        
        <?php if (isset($error)): ?>
            <div class="error"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>
        
        <form method="POST" enctype="multipart/form-data" class="dish-form">
            <div class="form-group">
                <label>Название блюда:</label>
                <input type="text" name="name" required>
            </div>
            
            <div class="form-group">
                <label>Описание:</label>
                <textarea name="description" required></textarea>
            </div>
            
            <div class="form-group">
                <label>Ингредиенты (через запятую):</label>
                <textarea name="ingredients" required></textarea>
            </div>
            
            <div class="form-group">
                <label>Теги (через запятую):</label>
                <input type="text" name="tags" required>
            </div>
            
            <div class="form-group">
                <label>Изображение:</label>
                <input type="file" name="image" accept="image/*" required>
            </div>
            
            <button type="submit" class="submit-btn">Добавить блюдо</button>
        </form>
    </div>
</body>
</html>