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

<?
//ниже чьто-то
// session_start();
// $temp=$_SESSION['cart'];
// // echo "<pre>";
// // print_r($tem);
// // echo "</pre>";
// foreach($temp as $id=>$kol){
//     $conn = mysqli_connect("localhost", "root", "root", "liara");
//         $sql = "SELECT * FROM goods where id='$id'";
//         $result = mysqli_query($conn, $sql);
//         while ($row = mysqli_fetch_assoc($result)){
            
//         }
// }

$conn = mysqli_connect("localhost", "root", "root", "liara");
    if(!$conn){
        die("Ошибка подключения к БД: " . mysqli_connect_error());
    }
    $coun_result = mysqli_query($conn, "select * from country;");
    $coun_data = mysqli_fetch_array($coun_result);

    function getCities($id_coun, $conn) {
        $city_result = mysqli_query($conn, "SELECT * FROM city WHERE id_country='$id_coun';");
        while ($row = mysqli_fetch_array($city_result)) {
            echo "<option>{$row['name']}</option>";
        }
    }
?>

<section class="order" id="order">
    <div class="container">
        <h2 class="sub-title">ОФОРМЛЕНИЕ ЗАКАЗА</h2>
        <div class="order-title">
        МИНИМАЛЬНАЯ СУММА ЗАКУПА — 50.000 ₽.
        </div>
        <div class="order-items">   
            <div class="order-item">
            <form action="order-form.php" class="order-form" method="POST">
                <input type="text" class="order-input" id="name" name="name" placeholder="ФИО*">
                <input type="text" class="order-input" id="phone" name="phone" placeholder="Телефон*">
                <input type="text" class="order-input" id="mail" name="mail" placeholder="E-mail*">
                <input type="text" class="order-input" id="ITN" name="ITN" placeholder="ИНН*">
                <select class="order-input" id="country" name="country" placeholder="Страна доставки*"
                        onchange="getCities(this.value, <?php echo json_encode($conn); ?>)">
                    <option selected value="Страна доставки*" disabled>Страна доставки*</option>
                    <?php foreach ($coun_result as $row): ?>
                        <option><?php echo $row["name"]; ?></option>
                    <?php endforeach; ?>
                </select>
                <select class="order-input" id="city" name="city" placeholder="Город доставки*">
                    <option selected value="Город доставки*" disabled>Город доставки*</option>
                </select>
                <button class="button" type="submit" id="order-action">Отправить заявку</button>
            </form>
                <div class="order-text">
                   Нажимая на кнопку, вы соглашаетесь на <a href="policy/privacy.txt"> обработку персональных данных. </a>
                </div>
            </div>
            <div class="order-item">
            </div>
            <div class="order-buttons">
                    <button class="button" type="submit" id="order-action" onclick="document.location='bag.php'">Состав заказа</button>
                    <button class="button" type="submit" id="order-action" onclick="document.location='index.php'">На главную</button>
            </div>
        </div>

    </div>
</section>

<footer class="footer" id="contacts">
    <div class="container">
        <h2 class="sub-title">КОНТАКТЫ</h2>
        <div class="f-item">
            <div class="f-buttons">
                <button class="button" type="submit" id="con-action" onclick="document.location='index.html#application'">Оставить заявку</button>
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
<script>
    // Получаем ссылки на выпадающие списки
    var countrySelect = document.getElementById("country");
    var citySelect = document.getElementById("city");

    // Функция для обновления списка городов
    function updateCitySelect() {
        // Получаем выбранную страну
        var selectedCountry = countrySelect.value;
        // Очищаем список городов
        citySelect.innerHTML = '<option selected value="Город доставки*" disabled>Город доставки*</option>';
        // Если выбрана страна, загружаем соответствующие города
        if (selectedCountry != "Страна доставки*") {
            var xhr = new XMLHttpRequest();
            xhr.open("GET", "get-cities.php?country=" + selectedCountry);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    // Добавляем полученные города в список
                    var cities = JSON.parse(xhr.responseText);
                    cities.forEach(function(city) {
                        var option = document.createElement("option");
                        option.text = city;
                        citySelect.add(option);
                    });
                }
            };
            xhr.send();
        }
    }

    // Обновляем список городов при выборе страны
    countrySelect.addEventListener("change", updateCitySelect);
</script>
</body>
</html>