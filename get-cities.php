<?php
// Получаем выбранную страну
$selectedCountry = $_GET["country"];

// Выполняем запрос к БД для получения списка городов
$conn = mysqli_connect("localhost", "root", "root", "liara");
if (!$conn) {
    die("Ошибка подключения к БД: " . mysqli_connect_error());
}
$city_result = mysqli_query($conn, "SELECT name FROM city WHERE id_country = (SELECT id FROM country WHERE name = '$selectedCountry')");
$city_data = mysqli_fetch_all($city_result, MYSQLI_ASSOC);

// Возвращаем список городов в формате JSON
echo json_encode(array_column($city_data, "name"));
?>