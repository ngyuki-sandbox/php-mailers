<?php
namespace App\LaminasMailer;

use Laminas\Mail\MessageFactory;
use Laminas\Mime\Message;
use Laminas\Mime\Mime;
use Laminas\Mime\Part;

require __DIR__ . '/vendor/autoload.php';

$config = require __DIR__ . '/../config.php';

$mail = MessageFactory::getInstance();
$mail->setEncoding('UTF-8');
$mail->setFrom($config['from'], '送信元');
$mail->setTo($config['to'], '宛先');
$mail->setReplyTo($config['replyTo'], '返信先');

$mail->setSubject('サブジェクト');

$text = new Part('laminas-mail から送信しました');
$text->type = Mime::TYPE_TEXT;
$text->charset = 'utf-8';
$text->encoding = Mime::ENCODING_QUOTEDPRINTABLE;

$image = new Part(fopen(__DIR__ . '/../orig.jpg', 'r'));
$image->type = 'image/jpeg';
$image->filename = '画像.jpg';
$image->disposition = Mime::DISPOSITION_ATTACHMENT;
$image->encoding = Mime::ENCODING_BASE64;

$body = new Message();
$body->setParts([$text, $image]);

$mail->setBody($body);

echo $mail->toString();
