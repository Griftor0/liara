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
                    <a href="col.php">КОЛЛЕКЦИИ</a>
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
                        <form action="http://google.com/search" autocomplete="on" target="_blank">
                          <input id="search" name="search" type="text" placeholder="Что ищете?">
                         <!-- <input type="search" name="q"> NEW -->
                          <input type="hidden" name="as_sitesearch" value="http://127.0.0.1:5500"><!-- NEW -->
                          <input id="search_submit" value="Researcher" type="submit">
                        </form>
                    </div>                
                </li>
                <li>
                    <div class="bag">
                        <form action="bag.php" autocomplete="on">
                          <input id="bag_submit" value="ToBag" type="submit">
                          <span class="badge basker_kol"></span>
                        </form>
                    </div>                
                </li>
            </ul>
        </nav>
    </div>
</header>

<?php
    $conn = mysqli_connect("localhost", "root", "root", "liara");
    if(!$conn){
        die("Ошибка подключения к БД: " . mysqli_connect_error());
    }
?>

<section class="collection" id="collections">
    <div class="container">
        <h2 class="sub-title">КОЛЛЕКЦИИ</h2>
        <div class="col-items">
        <?php $sql = "SELECT * FROM collection";
            $result = mysqli_query($conn, $sql);
            foreach($result as $row):
            ?> 
            <div class="col-item">
                <div class="col-item-image">
                    <img src="images/col<?=$row['id']?>.png" alt="Image <?=$row['id']?>">
                </div>
                <div class="col-item-title">
                    <?echo $row["name"];?>
                </div>
                <div class="col-item-info">
                    <div class="col-item-point">
                        <div><?echo $row["descr"];?></div>
                    </div>
                </div>
                <div class="col-item-action">
                    <button class="button col-button" id="<?=$row['id']?>">ПРОСМОТРЕТЬ</button>
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
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>    
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('.col-button').click(function () {
        var id = $(this).attr('id');
        $.ajax({
            type: "POST",
            url: 'collection.php',
            data: {id_col: id},
            success: function (response) {
                $('body').html(response);
            }
        });
        return false;
    });
</script>
