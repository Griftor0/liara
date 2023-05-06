<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Liara Moda</title>
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

<header class="header">
    <div class="container">
        <nav class="menu1">
            <ul>
                <li class="menu1-item">
                    <a href="index.html#collections">КОЛЛЕКЦИИ</a>
                </li>
                <li class="menu1-item">
                    <a href="index.html#about">О НАС</a>
                </li>
                <li class="menu1-item">
                    <a href="index.html#advantages">ПРЕИМУЩЕСТВА</a>
                </li>
            </ul>
        </nav>
        <div class="logo">
            <center>
                <a href="index.html"><img src="images/logo.png" alt="logo"></a>
            </center>
        </div>
        <nav class="menu2">
            <ul>
                <li class="menu2-item">
                    <a href="index.html#application">ОСТАВИТЬ ЗАЯВКУ</a>
                </li>
                <li class="menu2-item">
                    <a href="index.html#contacts">КОНТАКТЫ</a>
                </li>
                <li class="menu2-item">
                    <div class="wrap">
                        <form action="" autocomplete="on">
                          <input id="search" name="search" type="text" placeholder="Что ищете?">
                          <input id="search_submit" value="Researcher" type="submit">
                        </form>
                    </div>                
                </li>
                <li>
                    <div class="bag">
                        <form action="bag.php" autocomplete="on">
                          <input id="bag_submit" value="ToBag" type="submit">
                        </form>
                    </div>                
                </li>
            </ul>
        </nav>
    </div>
</header>

<section class="order" id="order">
    <div class="container">
        <h2 class="sub-title">ОФОРМЛЕНИЕ ЗАКАЗА</h2>
        <div class="order-title">
        БЛАГОДАРИМ ЗА ОФОРМЛЕНИЕ ЗАКАЗА!
        </div>
        <div class="order-items">
            <div class="order-item">
                <div class="order-text">
                Ваш заказ отправлен нашему менеджеру и будет рассмотрен в ближайшее время. 
                </div>
                <div class="order-text">
                Мы свяжемся с Вами для уточнения деталей и оформления доставки. Ожидайте ответа!
                </div>   
            </div>
            <div class="order-item">
            </div>
            <div class="order-buttons">
                        <button class="button" type="submit" id="order-action" onclick="document.location='index.php'">На главную</button>
                        <button class="button" type="submit" id="order-action" onclick="document.location='index.php#contacts'">Контакты</button>
                        <button class="button" type="submit" id="order-action" onclick="document.location='index.php#collections'">Коллекции</button>
            </div>
        </div>
    </div>
</section>

<footer class="footer" id="contacts">
    <div class="container">
        <h2 class="sub-title">КОНТАКТЫ</h2>
        <div class="f-item">
            <div class="f-buttons">
                <button class="button" type="submit" id="con-action" onclick="document.location='index.html/#application'">Оставить заявку</button>
                <button class="button" type="submit" id="con-action" onclick="document.location='https://2gis.ru/directions/points/%7C37.752172%2C55.719576%3B4504235282609057?m=60.32518%2C56.950069%2F5'">Как проехать</button>    
                <button class="button" type="submit" id="con-action" onclick="document.location='policy/privacy.txt'">Конфиденциальность</button>    
            </div>
        </div>
        <div class="f-item">
            <div class="con-text">
                <div>+7 915 093-43-18</div>
                <div>ㅤ</div>
                <div>info@liaramoda.ru</div>
                <div>ㅤ</div>
                <div>Москва, улица Стахановская, 18/2</div>
                <div>ㅤ</div>
                <div>ИНН 7721827128</div>
                <div>ㅤ</div>
                <div>Расчетный счет 40702810338000065196</div>
                <div>ㅤ</div>
            </div>
        </div>
        <div class="f-item">
            <div class="f-end">
                <div>© 2023   ООО «Статус».   Все права защищены</div>
            </div>
        </div>
    </div>
</footer>

<script src="scripts/script.js"></script>
</body>
</html>