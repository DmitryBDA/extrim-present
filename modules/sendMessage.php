<?php
header("Location: /");

//подключить файл отправки в телеграмм бот
include $_SERVER['DOCUMENT_ROOT'] . "/modules/telegram/sendMessageTelegram.php";
//данные из пост запроса
$user = $_POST['name'] ." : ". $_POST['email'];
//функции отправки сообщения
mail($user, $_POST['subject'], $_POST['message']);
//вызов функции отправки сообщения в телеграмм бот
message_to_telegram('new letter');
//переход на главную страницу
?>