<?php
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
        $mail->Username = 'tulish2001@gmail.com'; // Ваш Gmail
        $mail->Password = 'fnmv vjel ofnp awqp'; // Пароль приложения Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = 465;

        // Получатель и отправитель
        $mail->setFrom($email, $name);
        $mail->addAddress('tulish2001@gmail.com', "admin"); // Ваш email для получения

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
        //echo json_encode(["message" => "Ваше сообщение успешно отправлено. Спасибо за вашу обратную связь!"]);
        echo "Thanks for your message. We will contact you soon.";
    } catch (Exception $e) {
        //echo json_encode(["message" => "Произошла ошибка при отправке сообщения: {$mail->ErrorInfo}"]);
        echo "There is some error with sending the request, please try again later, or send direct message to example@gmail.com.";
    }
} else {
    echo "Недопустимый метод запроса.";
}
