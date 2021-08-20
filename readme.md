<p align="center">
<img alt="Simple Telegram" width="400px" src="https://i.ibb.co/CB6WHk6/tg-logo.png">
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

You can change the addressee or get the current addressee (chat_id)
```php
$telegram->setRecipient('123456789')
$telegram->getRecipient() // 123456789
```
Also, you can choose not to specify the receiver when initializing the class; this can be done later before sending.
```php
$botTokent = '132312455234:DSQWDQWQWEZCZXKGWETJHSOASDZXC_s';
$telegram = new SimpleTelegram($botTokent);

$chat_id = '123456789'
$telegram->setRecipient($chat_id);

$telegram->sendMessage('Test Message');
```
Or you can combine queries
```php
$telegram = new SimpleTelegram($botTokent);

$chat_id = '123456789'
$telegram->setRecipient($chat_id)->sendPhoto(__DIR__.'/photo.jpg','Photo Caption');
```

Submission methods return `true` on successful submission and` false` on failure

```php
$telegram->sendMessage('Test Message'); // true or false
$telegram->sendDocument(__DIR__.'/demo.txt','Document Caption'); // true or false
$telegram->sendPhoto(__DIR__.'/photo.jpg','Photo Caption'); // true or false
$telegram->sendAudio(__DIR__.'/audio.mp3','Audio Caption'); // true or false
```

