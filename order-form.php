<?php
session_start(); // сначала нужно начать сессию, перед использованием сессионных переменных

$name = $_POST['name'];
$phone = $_POST['phone'];
$mail = $_POST['mail'];
$ITN = $_POST['ITN'];
$city = $_POST['city'];

$conn = mysqli_connect("localhost", "root", "root", "liara");
if (!$conn) {
    die("Ошибка подключения к БД: " . mysqli_connect_error());
}

$sql_city = mysqli_query($conn, "SELECT id FROM city WHERE name='$city'");
$row = mysqli_fetch_assoc($sql_city);
$id_city = $row['id'];

$sql_client = mysqli_query($conn, "SELECT id FROM client WHERE name='$name' and phone='$phone' and email='$mail' and ITN='$ITN' and id_city='$id_city'");
if (mysqli_num_rows($sql_client) > 0) {
    $row = mysqli_fetch_assoc($sql_client);
    $id_client = $row['id'];
} else {
    $sql = "INSERT INTO client (id_city, name, ITN, phone, email) VALUES ('$id_city', '$name', '$ITN', '$phone', '$mail')";
    if (mysqli_query($conn, $sql)) {
        $id_client = mysqli_insert_id($conn);
        echo "Запись успешно добавлена!";
    } else {
        echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// теперь нужно проитерировать товары в корзине и вычислить общую сумму всего заказа
$temp = $_SESSION['cart'];
$sum = 0;
foreach ($temp as $id => $kol) {
    $sql_sum = "SELECT price FROM goods WHERE id='$id'";
    $result = mysqli_query($conn, $sql_sum);
    while ($row = mysqli_fetch_assoc($result)) {
        $sum += $row['price'] * $kol;
}
}

// теперь нужно добавить заказ в БД
$orders_date = date("Y-m-d");
$sql = "INSERT INTO orders (id_client, orders_date, sum) VALUES ('$id_client', '$orders_date', '$sum')";

if (mysqli_query($conn, $sql)) {
echo "Заказ успешно оформлен!";
} else {
echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
}

//теперь нужно добавить товары каждого заказа в БД
if (mysqli_query($conn, $sql)) {
    $id_orders = mysqli_insert_id($conn); // получаем id_orders, сгенерированный последним запросом INSERT
    echo "Заказ успешно оформлен!";
    foreach ($temp as $id => $kol) {
        $id_goods=$id;
        $count=$kol;
        $total_price = 0; // обнуляем значение для каждого товара
        $sql_goods = "SELECT price FROM goods WHERE id='$id'";
        $result = mysqli_query($conn, $sql_goods);

        while ($row = mysqli_fetch_assoc($result)) {
            $total_price = $row['price'] * $kol;
        }

        $sql_goods="INSERT INTO orders_goods (id_goods, id_orders, total_price, count) VALUES ('$id_goods', '$id_orders', '$total_price', '$count')";
       
        if (mysqli_query($conn, $sql_goods)) {
            echo "Запись успешно добавлена!";
        } else {
            echo "Ошибка: " . $sql_goods . "<br>" . mysqli_error($conn);
        }
    }
} else {
    echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
}

//формируем сообщение-заказ на почту
$message_post="ФИО: " . $name . ". E-mail: " . $mail . ". Телефон: " . $phone . ". ИНН: " . $ITN . ". Город: " . $city . "\n\nЗаказ №19. Сумма: " . $sum . ".\n\n";

foreach ($temp as $id => $kol) {
    $sql_order = "SELECT * FROM goods WHERE id='$id'";
    $result = mysqli_query($conn, $sql_order);
    while ($row = mysqli_fetch_assoc($result)) {
        $message_post .= "Модель " . $row['vendor_code'] . " в количестве " . $kol . ".\n";
    }
}

if (mail("modaliara@yandex.ru", "Заказ с сайта", $message_post.$message_order, "From: iwannaspotify@yandex.ru \r\n")) {
    echo '<script language="javascript">';
    echo 'alert("Сообщение успешно отправлено!")';
    echo '</script>';

    mysqli_close($conn);
    header('Location: order-success.php'); // перенаправляем на страницу успешного оформления заказа
    } else {
    echo '<script language="javascript">';
    echo 'alert("При отправке сообщения возникли ошибки.")';
    echo '</script>';

    header('Location: order.php');
}

//mysqli_close($conn);
//header('Location: order-success.php'); // перенаправляем на страницу успешного оформления заказа
?>
