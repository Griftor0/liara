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

<?php session_start();
        $tem=$_SESSION['cart'];
        if (empty($tem)){
            unset($_SESSION['cart']);}   
        ?>
        <?php
        if (!isset($_SESSION['cart'])):?>
            <h2 class="non-sub-title">Ваша корзина пуста.</h2>
        <?php else :?>

<section class="in_bag" id="in_bag">
    <div class="container">
        <h2 class="sub-title">КОРЗИНА</h2>
        <div class="bag-items">
            <?php $temp=$_SESSION['cart'];
            foreach($temp as $id=>$kol):
                $conn = mysqli_connect("localhost", "root", "root", "liara");
                $sql = "SELECT * FROM goods where id='$id'";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)):
                ?>
                <div class="bag-item" id="<?=$id?>">
                    <div class="bag-item-image">
                        <img src="images/m<?= $row['vendor_code'] ?><?= $row['color'] ?>.png" alt="Coat" class="bag-item-image">
                    </div>
                    <div class="bag-item-title">
                        МОДЕЛЬ <?= $row['vendor_code'] ?>
                    </div>
                    <div class="bag-item-info">
                        <div class="bag-item-point">
                            Кол-во линеек: <input type="number" class="count-product" id="<?=$id?>" value="<?=$kol?>"><br>
                        </div>
                    </div>
                    <div class="bag-item-action">
                        <br><button class="button bag-button" id="<?=$id?>">Удалить</button>
                    </div>
                </div>
            <?php endwhile; ?>
            <?php endforeach; ?>
        </div>
        <div class="bag-action">
            <button class="button" type="submit" id="button-order" onclick="document.location='order.php'">Оформить заказ</button>
        </div>
    </div>
</section>

<?php endif; ?> 

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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>    
<script>
    //изменение количества
        $('.count-product').change(function () { //изменение содержимого инпута     
        var col = $(this).val(); //получаем количество
        if (col<1){ col = 1; $(this).val(1); } //если ввели меньше 1 установим 1
        var id = $(this).attr('id'); //получаем id товара
            $.ajax({//аякс-запрос
                type: "POST",//метод
                url: 'cartamount.php',//куда передаем
                data: {col_tov: col, id_tov: id},//данные
                success: function() {//получаем результат
                //тут можно пересчитать сумму
                    }
            });
        });

        //удаление товара
        $('.bag-button').click(function () { //клик на кнопку
        var id = $(this).attr('id'); //получаем id товара
        $.ajax({//аякс-запрос
            type: "POST",//метод
            url: 'cartdel.php',//куда передаем
            data: {id_tov: id},//данные
            success: function(data) {//получаем результат
                $('div.bag-item#'+id).css('display', 'none');//скрываем строку таблицы
                location.reload();
            }
        });
        });
</script>
<script src="scripts/script.js"></script>
</body>
</html>