<p align="center">
<img width="400px" src="https://i.ibb.co/CB6WHk6/tg-logo.png">
</p>
<p align="center">
    ✉️ 📄 🖼️ 🎧 => 🤖 => 😊
</p>
<p align="center">
    A simple way to send messages to the user through the telegram bot.
</p>

---

## About
This is a simple class that will allow you to easily send messages, documents, photos, audio to users.

## Installation
The library can be installed using the composer:
```bash
сomposer install glebsky/simple-telegram
```
## How to use
Add in use section:
```php
use Glebsky\SimpleTelegram\SimpleTelegram;
```
And add your SimpleTelegram To your code section to send messages:
```php
$botTokent = '132312455234:DSQWDQWQWEZCZXKGWETJHSOASDZXC_s';
$chat_id = '123456789'
$telegram = new SimpleTelegram($botTokent,$chat_id);

$telegram->sendMessage('Test Message');
$telegram->sendDocument(__DIR__.'/demo.txt','Document Caption');
$telegram->sendPhoto(__DIR__.'/photo.jpg','Photo Caption');
$telegram->sendAudio(__DIR__.'/audio.mp3','Audio Caption');
```
>Please note that the path to the file must be specified absolute.

Вы можете изменить адресата или получить текущего адресата (chat_id)
```php
$telegram->setRecipient('123456789')
$telegram->getRecipient() // 123456789
```
Также Вы можете и не указывать получателя при инциализации класса, это можно сделать и позже перед отправкой.
```php
$botTokent = '132312455234:DSQWDQWQWEZCZXKGWETJHSOASDZXC_s';
$telegram = new SimpleTelegram($botTokent);

$chat_id = '123456789'
$telegram->setRecipient($chat_id);

$telegram->sendMessage('Test Message');
```
Или вы можете комбинировать запросы
```php
$telegram = new SimpleTelegram($botTokent);

$chat_id = '123456789'
$telegram->setRecipient($chat_id)->sendPhoto(__DIR__.'/photo.jpg','Photo Caption');
```

Методы отправки возвращают `true` в случае успешной отправки и `false` в случае неудачи

```php
$telegram->sendMessage('Test Message'); // true or false
$telegram->sendDocument(__DIR__.'/demo.txt','Document Caption'); // true or false
$telegram->sendPhoto(__DIR__.'/photo.jpg','Photo Caption'); // true or false
$telegram->sendAudio(__DIR__.'/audio.mp3','Audio Caption'); // true or false
```

