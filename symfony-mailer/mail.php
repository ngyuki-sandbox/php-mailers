<?php
namespace App\SymfonyMailer;

use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

require __DIR__ . '/vendor/autoload.php';

$config = require __DIR__ . '/../config.php';

$mail = new Email();

$mail->from(new Address($config['from'], '送信元'));
$mail->to(new Address($config['to'], '宛先'));
$mail->replyTo(new Address($config['replyTo'], '返信先'));

$mail->subject('サブジェクト');
$mail->text('symfony-mailer から送信しました');

$mail->attachFromPath(__DIR__ . '/../orig.jpg', '画像.jpg');

echo $mail->toString();
