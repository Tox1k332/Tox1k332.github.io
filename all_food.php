<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>all_food</title>
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
</div>
    </div>
</header>

    <main class="main">
        <div class="main_container">
            <section class="food">
                <div class="food_cards">
                    <div class="main_card">
                        <div class="main_card_title">Популярное блюдо по вашему/им ингредиенту/там</div>
                        <img src="./image/image 3.png" style="width: 100%;" alt="food">
                        <div class="main_card_subtitle">
                            Хинка́ли (груз. ხინკალი) — блюдо грузинской кухни из горных областей Пшави, Мтиулети и Хевсурети в Грузии, получившее распространение в других районах Кавказа и по всему бывшему СССР.
                        </div>
                        <div class="main_card_ingredients" style="font-weight: 700;">Ингредиенты :</div>
                        <div class="main_card_ingredients">
                            • 500 грамм пшеничной муки • 300 мл воды • 250 грамм телятины • 250 грамм говядины • 100 грамм сала • 1 луковица• 2 зубчика чеснока • кинза • базилик• соль, черный перец, специи — по вкусу
                        </div>
                            <div class="hot_tags">
                                <div class="hot_tag">#телятина</div>
                                <div class="hot_tag">#лук</div>
                                <div class="hot_tag">#говядина</div>
                                <div class="hot_tag">#мука</div>
                                <div class="hot_tag">#чеснок</div>
                            </div>
                        </div>

                    </div>
                    <div class="other_cards">
                        <div class="other_card">
                            <div class="other_card_title">Говядина "Веллингтон"</div>
                            <img src="./image/image 4.png" class="other_food" alt="food">
                        </div>
                        <div class="other_card">
                            <div class="other_card_title">Говядина по-английски</div>
                            <img src="./image/image 5.png" class="other_food" alt="food">
                        </div>
                        <div class="other_card">
                            <div class="other_card_title">Говядина в пиве</div>
                            <img src="./image/image.png" class="other_food" alt="food">
                        </div>
                        <div class="other_card">
                            <div class="other_card_title">Говядина с бобами и кукурузой по-мексикански</div>
                            <img src="./image/image (1).png" class="other_food" alt="food">
                        </div>
                        <div class="other_card">
                            <div class="other_card_title">Говядина тушеная с луком и катофелем</div>
                            <img src="./image/image (2).png" class="other_food" alt="food">
                        </div>
                        <div class="other_card">
                            <div class="other_card_title">Говядина с морковным кофитюром и желе из капусты</div>
                            <img src="./image/image (3).png" class="other_food" alt="food">
                        </div>
                        
                    </div>
            </section>
        </div>
    </main>

    <footer class="footer">
        <div class="footer_container">
            <div class="footer_content">Copyright © Kosolapov Danil</div>
        </div>
    </footer>

    <script src="./script.js"></script>
    
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

</body>
</html>