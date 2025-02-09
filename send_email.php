<?php
//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\Exception;
//
//require 'vendor/autoload.php'; // Подключаем PHPMailer
//
//if ($_SERVER["REQUEST_METHOD"] === "POST") {
//    // Получение и очистка данных из формы
//    $name = htmlspecialchars(trim($_POST['name']));
//    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
//    $message = htmlspecialchars(trim($_POST['message']));
//    $subject = htmlspecialchars(trim($_POST['subject']));
//
//    if (!$name || !$email || !$message) {
//        echo "Пожалуйста, заполните все поля корректно.";
//        exit;
//    }
//
//    $mail = new PHPMailer(true);
//    $mail->CharSet = 'UTF-8';
//    try {
//        // Настройки SMTP для вашего почтового сервера
//        $mail->isSMTP();
//        $mail->Host = 'smtp.gmail.com'; // Ваш SMTP-сервер
//        $mail->SMTPAuth = true;
//        $mail->Username = 'jantexportou@gmail.com';      // Имя пользователя (email)
//        $mail->Password = 'howq gmup ievx wuet';   // Пароль от почтового ящика
//        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;      // Используем шифрование SSL/TLS
//        $mail->Port = 465;                              // Порт SMTP
//
//        // Настройка отправителя
//        // Рекомендуется использовать адрес, совпадающий с учетной записью SMTP,
//        // так как многие серверы не разрешают подделку отправителя.
//        $mail->setFrom($email, $name);
//        // Если хотите, чтобы в письме был указан email пользователя в качестве ответа, можно добавить:
//        $mail->addReplyTo($email, $name);
//
//        // Получатель письма (вы можете указать несколько адресов, если требуется)
//        $mail->addAddress('jantexport@gmail.com', "Администратор");
//
//        // Формат письма HTML
//        $mail->isHTML(true);
//        $mail->Subject = $subject;
//
//        // Формирование HTML-контента письма
//        $mail->Body = "
//<!DOCTYPE html>
//<html lang='ru'>
//<head>
//    <meta charset='UTF-8'>
//    <style>
//        body {
//            font-family: Arial, sans-serif;
//            background-color: #f4f4f9;
//            color: #333;
//            margin: 0;
//            padding: 0;
//        }
//        .container {
//            padding: 20px;
//            max-width: 600px;
//            margin: 0 auto;
//            background-color: #ffffff;
//            border: 1px solid #ddd;
//            border-radius: 5px;
//            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
//        }
//        .header {
//            text-align: center;
//            margin-bottom: 20px;
//        }
//        .footer {
//            text-align: center;
//            margin-top: 30px;
//            font-size: 12px;
//            color: #888;
//        }
//        .info {
//            margin-bottom: 10px;
//            padding: 10px;
//            background: #f9f9f9;
//            border-radius: 3px;
//        }
//    </style>
//</head>
//<body>
//    <div class='container'>
//        <div class='header'>
//            <h2>Новое сообщение с сайта</h2>
//        </div>
//        <div class='info'>
//            <strong>Name:</strong> $name
//        </div>
//        <div class='info'>
//            <strong>Email:</strong> $email
//        </div>
//        <div class='info'>
//            <strong>Message:</strong>
//            <p>$message</p>
//        </div>
//        <div class='footer'>
//            Ответить можно по указанному адресу электронной почты.
//        </div>
//    </div>
//</body>
//</html>
//";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Устанавливаем заголовки для JSON-ответа
//header("Content-Type: application/json");

require 'vendor/autoload.php'; // Подключает PHPMailer

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));
    $subject = htmlspecialchars(trim($_POST['subject']));

    if (!$name || !$email || !$message) {
        echo "Пожалуйста, заполните все поля корректно.";
        exit;
    }

    $mail = new PHPMailer(true);
    try {
        // Настройки SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // SMTP-сервер Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'jantexportou@gmail.com'; // Ваш Gmail
        $mail->Password = 'howq gmup ievx wuet'; // Пароль приложения Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Получатель и отправитель
        $mail->setFrom($email, $name);
        $mail->addAddress('jantexportou@gmail.com', "admin"); // Ваш email для получения

// Содержимое письма
        $mail->isHTML(true); // Указываем, что содержимое письма - это HTML
        $mail->Subject = $subject; //тема письма

// HTML-контент сообщения
        $mail->Body = "
<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset='UTF-8'>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #888;
        }
        .info {
            margin-bottom: 10px;
            padding: 10px;
            background: #f9f9f9;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2>Новое сообщение с сайта</h2>
        </div>
        <div class='info'>
            <strong>Имя:</strong> $name
        </div>
        <div class='info'>
            <strong>Email:</strong> $email
        </div>
        <div class='info'>
            <strong>Сообщение:</strong>
            <p>$message</p>
        </div>
        <div class='footer'>
            The reply to this email address is the right address.
        </div>
    </div>
</body>
</html>
";
//        $mail->addAttachment('/path/to/file.pdf', 'ИмяФайла.pdf');
        $mail->addReplyTo($email, 'email of reporter');
//        $mail->addEmbeddedImage('/path/to/image.jpg', 'image_cid', 'Название изображения');
//        $mail->Body = '<img src="cid:image_cid" />';


        $mail->send();

        // Отправка подтверждения пользователю
        $confirmationMail = new PHPMailer(true);
        $confirmationMail->isSMTP();
        $confirmationMail->Host = 'smtp.gmail.com';
        $confirmationMail->SMTPAuth = true;
        $confirmationMail->Username = 'jantexportou@gmail.com';
        $confirmationMail->Password = 'howq gmup ievx wuet';
        $confirmationMail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $confirmationMail->Port = 465;

        $confirmationMail->setFrom('jantexportou@gmail.com', 'Jantexport OU');
        $confirmationMail->addAddress($email, $name);

        $confirmationMail->isHTML(true);
        $confirmationMail->Subject = 'Confirmation of Your Message';
        $confirmationMail->Body = "
<!DOCTYPE html>
<html lang='ru'>
<head>
    <meta charset='UTF-8'>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 20px;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #888;
        }
        .info {
            margin-bottom: 10px;
            padding: 10px;
            background: #f9f9f9;
            border-radius: 3px;
        }
    </style>
</head>
<body>
    <div class='container'>
        <div class='header'>
            <h2>Thank you for contacting us</h2>
        </div>
        <div class='info'>
            <strong>Dear $name,</strong>
            <p>Thank you for reaching out to us. We have received your message and will get back to you shortly.</p>
        </div>
        <div class='footer'>
            Best regards,<br>Jantexport OU
        </div>
    </div>
</body>
</html>
";
        $confirmationMail->send();
        echo "Thank you for your message. We will contact you soon.";
        header('Location: index.php?status=success');


    } catch (Exception $e) {
        echo $e->getMessage();
        header('Location: index.php?status=error');
        echo "There was an error sending your message. Please try again or email us directly.";
    }
} else {
    echo "Недопустимый метод запроса.";
}
?>