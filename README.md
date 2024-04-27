
```sh
du -sh *
# 4.9M    laminas-mail
# 672K    phpmailer
# 2.7M    symfony-mailer
```

```console
php mail.php | jq -n --rawfile a /dev/stdin '{Data:$a}' > mail.json
aws ses send-raw-email --cli-binary-format raw-in-base64-out --raw-message file://mail.json
```
