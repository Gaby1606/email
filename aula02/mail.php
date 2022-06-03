<?php
    require_once 'PHPMailer/src/PHPMailer.php';
    require_once 'PHPMailer/src/SMTP.php';
    require_once 'PHPMailer/src/Exception.php';
    require_once 'config.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;

    function send($assunto, $mensagem){
        try {
            $mail = new PHPMailer(true);
            $mail->setLanguage('en');
            $mail->isSMTP();
            $mail->SMTPAuth = true;
            $mail->SMTPDebug = 1;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Host = 'tls://smtp.gmail.com';
            $mail->Username = EMAIL_ORIGEM;
            $mail->Password = SENHA_EMAIL;
            $mail->Port = 465;
            $mail->setFrom(EMAIL_ORIGEM);
            $mail->addAddress(DESTINO_EMAIL);
            $mail->addReplyTo(DESTINO_EMAIL);
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = $assunto;
            $mail->Body = $mensagem;
            $mail->send();
            return true;
        }catch (Exception $e) {
            return false;
        }
    }
