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
                    <a href="index.php#collections">КОЛЛЕКЦИИ</a>
                </li>
                <li class="menu1-item">
                    <a href="index.php#about">О НАС</a>
                </li>
                <li class="menu1-item">
                    <a href="index.php#advantages">ПРЕИМУЩЕСТВА</a>
                </li>
            </ul>
        </nav>
        <div class="logo">
            <center>
                <a href="index.php"><img src="images/logo.png" alt="logo"></a>
            </center>
        </div>
        <nav class="menu2">
            <ul>
                <li class="menu2-item">
                    <a href="index.php#application">ОСТАВИТЬ ЗАЯВКУ</a>
                </li>
                <li class="menu2-item">
                    <a href="index.php#contacts">КОНТАКТЫ</a>
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

<section class="coll" id="coll">
    <div class="container">
        <?php
        $id = $_POST['id_col'];
        $con = mysqli_connect("localhost", "root", "root", "liara");
        if (!$con) {
            echo("Ошибка!");
        }
        $sqll = "SELECT * FROM collection where id='$id'";
        $resultt = mysqli_query($con, $sqll);
        $data = mysqli_fetch_array($resultt);
        $name = $data["name"];
        ?>
        <h2 class="sub-title"><?= $name ?></h2>
        <div class="coll-items">
        <?php
        $conn = mysqli_connect("localhost", "root", "root", "liara");
        $sql = "SELECT * FROM goods where id_collection='$id'";
        $result = mysqli_query($conn, $sql);
        foreach ($result as $row):
        ?>
            <div class="coll-item">
                <div class="coll-item-image">
                    <img src="images/m<?= $row['vendor_code'] ?><?= $row['color'] ?>.png" alt="Image <?= $row['vendor_code'] ?>">
                </div>
                <div class="coll-item-title">
                    МОДЕЛЬ <?= $row["vendor_code"] ?>
                </div>
                <div class="coll-item-info">
                    <div class="coll-item-point">
                        <div>Состав: <?= $row["material"] ?></div>
                        <div>Размерный ряд: <?= $row["size"] ?></div>
                        <div>Цвет: <?= $row["color"] ?></div>
                        <div>Цена по запросу</div>
                    </div>
                </div>
                <div class="coll-item-action">
                    <button class="button coll-button" id="<?= $row["id"] ?>">ЗАКАЗАТЬ</button>
                </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
</section>

<footer class="footer" id="contacts">
    <div class="container">
        <h2 class="sub-title">КОНТАКТЫ</h2>
        <div class="f-item">
            <div class="f-buttons">
                <button class="button" type="submit" id="con-action" onclick="document.location='index.php/#application'">Оставить заявку</button>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>    
<script>
    $('.coll-button').click(function () {//клип на кнопку
        var id = $(this).attr('id'); //получаем id этой кнопки
            $.ajax({//передаем ajax-запросом данные
                type: "POST", //метод передачи данных
                url: 'addtocart.php',//php-файл для обработки данных
                data: {id_tov: id},//передаем наши данные
                success: function(data) {
                    var id = data.id; // предположим, что id приходит в ответе сервера
                    $('.bag-item[id="'+id+'"]').css('display', 'none');
                    alert('Товар добавлен в корзину.');
                }
            });
    });
</script>
</body>
</html>