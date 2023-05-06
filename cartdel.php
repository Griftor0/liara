<?php
/*$id = $_POST['id_tov'];//получаем id
session_start(); //стартуем сессию
$temp = $_SESSION['cart']; //переносим сессию во временную переменную
   if ($temp){
       unset ($temp[$id]);//удаляем запись
      }
$_SESSION['cart'] = $temp; //сохраняем сессию
*/

/*$id = $_POST['id_tov'];//получаем id
session_start(); //стартуем сессию
$temp = $_SESSION['cart']; //переносим сессию во временную переменную
if ($temp){
unset($temp[$id]);//удаляем запись
}
$_SESSION['cart'] = $temp; //сохраняем сессию

// возвращаем информацию об измененной корзине
$count = 0;
$total_price = 0;
foreach ($_SESSION['cart'] as $id => $quantity) {
$conn = mysqli_connect("localhost", "root", "root", "liara");
$sql = "SELECT * FROM goods where id='$id'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_assoc($result)){
$count += $quantity;
$total_price += $row['price'] * $quantity;
}
}
$response = array(
'count' => $count,
'total_price' => $total_price
);
echo json_encode($response);
*/

$id = $_POST['id_tov'];//получаем id
session_start(); //стартуем сессию
$temp = $_SESSION['cart']; //переносим сессию во временную переменную
if ($temp){
    unset($temp[$id]);//удаляем запись
}
$_SESSION['cart'] = $temp; //сохраняем сессию
?>