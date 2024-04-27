<?php
namespace App\PHPMailer;

use PHPMailer\PHPMailer\PHPMailer;

require __DIR__ . '/vendor/autoload.php';

$config = require __DIR__ . '/../config.php';

$mail = new PHPMailer(true);

$mail->CharSet = PHPMailer::CHARSET_UTF8;
$mail->Encoding = PHPMailer::ENCODING_QUOTED_PRINTABLE;

$mail->setFrom($config['from'], '送信元');
$mail->addAddress($config['to'], '宛先');
$mail->addReplyTo($config['replyTo'], '返信先');

$mail->Subject = 'サブジェクト';
$mail->Body    = 'phpmailer から送信しました';

$mail->addAttachment(__DIR__ . '/../orig.jpg', '画像.jpg');

$mail->preSend();
echo $mail->getSentMIMEMessage();
