<?php
    //phpinfo();
   // echo ("Заявка принята");
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $mail=$_POST['mail'];

    //echo $name.$phone.$mail;

    $name=htmlspecialchars($name);
    $phone=htmlspecialchars($phone);
    $mail=htmlspecialchars($mail);

    $name=urldecode($name);
    $phone=urldecode($phone);
    $mail=urldecode($mail);

    $name=trim($name);
    $phone=trim($phone);
    $mail=trim($mail);

    //echo $name.$phone.$mail;

    $conn = mysqli_connect("localhost", "root", "root", "liara");
    if(!$conn){
        die("Ошибка подключения к БД: " . mysqli_connect_error());
    }
    $sql="insert into request (name, phone, email) values ('$name', '$phone', '$mail')";
    if (mysqli_query($conn, $sql)) {
        echo "Запись успешно добавлена!";
    } else {
            echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);


   if (mail("modaliara@yandex.ru", "Заявка с сайта", "ФИО: ".$name.". E-mail: ".$mail.". Телефон: ".$phone,"From: iwannaspotify@yandex.ru \r\n"))
    {     //echo "сообщение успешно отправлено";
        echo '<script language="javascript">';
        echo 'alert("Сообщение успешно отправлено!")';
        echo '</script>';
    } else {
        //echo "при отправке сообщения возникли ошибки";
        echo '<script language="javascript">';
        echo 'alert("При отправке сообщения возникли ошибки.")';
        echo '</script>'; 
    }
   header('Location: index.php#application');
?>