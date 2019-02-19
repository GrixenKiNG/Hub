<?php
 
/* Задаем переменные */
$name = htmlspecialchars($_POST["name"]);
$email = htmlspecialchars($_POST["email"]);
$tel = htmlspecialchars($_POST["tel"]);
$website = htmlspecialchars($_POST["website"]);
$message = htmlspecialchars($_POST["message"]);
$bezspama = htmlspecialchars($_POST["bezspama"]);
 
/* Ваш адрес и тема сообщения */
$address = "J.A.R.V.I.S-000@yandex.ru";
$sub = "Сообщение с сайта портфолио";
 
/* Формат письма */
$mes = "Сообщение с сайта портфолио.\n
Имя отправителя: $name 
Электронный адрес отправителя: $email
Телефон отправителя: $tel
Текст сообщения:
$message";
 
 
if (empty($bezspama)) /* Оценка поля bezspama - должно быть пустым*/
{
/* Отправляем сообщение, используя mail() функцию */
$from  = "From: $name <$email> \r\n Reply-To: $email \r\n";
if (mail($address, $sub, $mes, $from)) {
 header('Refresh: 5; URL=http://biznessystem.ru');
 echo '<head>
    <meta http-equiv="Content-Type" content="svyaz.html; charset=utf-8" /></head>
    <body>Письмо отправлено</body>';}
else {
 header('Refresh: 5; URL=http://biznessystem.ru');
 echo '<head>
    <meta http-equiv="Content-Type" content="svyaz.html; charset=utf-8" /></head>
    <body>Письмо не отправлено</body>';}
}
exit; /* Выход без сообщения, если поле bezspama заполнено спам ботами */
?>