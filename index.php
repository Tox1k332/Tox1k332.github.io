<?php
session_start();
$is_auth = isset($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>EatGramm</title>
</head>
<body>
    
<header class="header">
    <div class="header_container">
        <div class="logo">EatGramm</div>
        <div class="header_menu">
            <div class="home"><a href="./index.php">Главная</a></div>
            <div class="all"><a href="./all_food.php">Все блюда</a></div>
        </div>
        <div class="burger" id="burger">
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="mobile_menu" id="mobileMenu">
            <a href="./index.php">Главная</a>
            <a href="./all_food.php">Все блюда</a>
        </div>
        <div class="profile" id="loginBtn">
    <?= $is_auth ? 'Профиль' : 'Войти' ?>
</div>
    </div>
</header>

    <main class="main">
        <div class="main_container">
            <section class="found">
                <div class="found_text">
                    EatGramm - это веб-сервис для подбора разлизных блюд по ингредиентам, которые вы хотите приготовить, ну или которые у вас есть :)
                </div>
                <div class="search_container">
                    <form class="search_form" action="/search" method="GET">
                        <button type="submit"><img src="./image/image 1.png" class="search-btn" alt="Поиск"></button>
                        <input type="text" name="query" placeholder="Введите название ингредиента" class="search_input">
                        <a href="#"><img src="./image/image 2.png" alt="lupa"></a>
                    </form>
                    <a href="#"><img src="./image/logo 2.png" alt=""></a>
                </div>
            </section>
        </div>
    </main>

    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h4>Авторизация</h4>
            <form id="loginForm" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Пароль:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="submit-btn">Вход</button>
                <div class="register-link">Нет аккаунта?    
                    <a href="./register.php" id="registerLink">Зарегистрироваться</a>
                </div>
            </form>
        </div>
    </div>

    <a href="./add.php"><button class="add_btn">Добавить блюдо</button></a>


    <footer class="footer">
        <div class="footer_container">
            <div class="footer_content">Copyright © Kosolapov Danil</div>
        </div>
    </footer>

    <script src="./script.js"></script>
    
    <script>
    document.getElementById('loginForm').ad6dEventListener('submit', async function(e) {
    e.preventDefault();
    
    const formData = new FormData(this);
    
    try {
        const response = await fetch('./auth/login_handler.php', {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if (result.success) {
            document.getElementById('loginModal').style.display = 'none';
            document.getElementById('loginBtn').textContent = 'Профиль';
            if (document.querySelector('.logout-link')) {
                document.querySelector('.logout-link').style.display = 'inline';
            }

            location.reload();
        } else {
            alert(result.message || 'Ошибка авторизации');
        }
    } catch (error) {
        console.error('Ошибка:', error);
        alert('Произошла ошибка при отправке запроса');
    }
});
</script>
</body>
</html>

<?php if ($is_auth): ?>
    <a href="/logout.php" class="logout-link">Выйти</a>
<?php endif; ?>