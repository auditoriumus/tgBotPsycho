<?php

$form_name = $_POST['contact__form_name'];
$form_email = $_POST['contact__form_email'];
$form_phone = $_POST['contact__form_phone'];
$form_message = $_POST['contact__form_message'];

$subject = "=?utf-8?B?".base64_encode("Сообщение с сайта mycoding.ru")."?=";
$headers = "From: $form_email\r\nReply-to: $form_email\r\nContent-type: text/plain; charset=utf-8\r\n";

$success = mail("um_2005@mail.ru", $subject, $form_message, $headers);
echo $success;