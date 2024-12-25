<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Подключает PHPMailer

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = filter_var(trim($_POST['email']), FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars(trim($_POST['message']));

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
        $mail->isHTML(false);
        $mail->Subject = 'Новая заявка на обратную связь'; //тема письма
        $mail->Body = "Имя: $name\nEmail: $email\nСообщение:\n$message";
        $mail->AltBody = "Имя: $name\nEmail: $email\nСообщение: $message";
//        $mail->addAttachment('/path/to/file.pdf', 'ИмяФайла.pdf');
//        $mail->addReplyTo('replyto@example.com', 'Имя Ответчика');
//        $mail->addEmbeddedImage('/path/to/image.jpg', 'image_cid', 'Название изображения');
//        $mail->Body = '<img src="cid:image_cid" />';


        $mail->send();
        echo "Ваше сообщение успешно отправлено. Спасибо за вашу обратную связь!";
    } catch (Exception $e) {
        echo "Произошла ошибка при отправке сообщения: {$mail->ErrorInfo}";
    }
} else {
    echo "Недопустимый метод запроса.";
}
