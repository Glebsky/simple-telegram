![logo](https://i.ibb.co/Vv58qTS/simple-Telegram.png "Simple Telegram")
[![Latest Stable Version](http://poser.pugx.org/glebsky/simple-telegram/v)](https://packagist.org/packages/glebsky/simple-telegram) [![Total Downloads](http://poser.pugx.org/glebsky/simple-telegram/downloads)](https://packagist.org/packages/glebsky/simple-telegram) [![Latest Unstable Version](http://poser.pugx.org/glebsky/simple-telegram/v/unstable)](https://packagist.org/packages/glebsky/simple-telegram) [![License](http://poser.pugx.org/glebsky/simple-telegram/license)](https://packagist.org/packages/glebsky/simple-telegram)
![PHP](https://img.shields.io/badge/php-%3E%3D7.0-8892bf.svg)
[![CodeFactor](https://www.codefactor.io/repository/github/glebsky/simple-telegram/badge)](https://www.codefactor.io/repository/github/glebsky/simple-telegram)
[![StyleCI](https://github.styleci.io/repos/398185849/shield?branch=master)](https://github.styleci.io/repos/398185849?branch=master)
<p align="center">
    ✉️ 📄 🖼️ 🎧 => 🤖 => 😊
</p>
<p align="center">
    A simple way to send messages to the user through the telegram bot.
</p>

---
<p align="center">
    [
        <a href="https://core.telegram.org/bots/api">Telegram Bot Documentation</a> |
        <a href="https://core.telegram.org/bots/api#sendphoto">Supported formats</a>
    ]
</p>

## About
This is a simple class that will allow you to easily send messages, documents, photos, audio to users. The library is specially designed to have fewer dependencies.

## Installation
The library can be installed using the composer:
```bash
сomposer install glebsky/simple-telegram
```
Or you can take a ready-made class from the `src` folder since there are no dependencies.
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

Submission methods return `true` on successful submission and `false` on failure

```php
$telegram->sendMessage('Test Message'); // true or false
$telegram->sendDocument(__DIR__.'/demo.txt','Document Caption'); // true or false
$telegram->sendPhoto(__DIR__.'/photo.jpg','Photo Caption'); // true or false
$telegram->sendAudio(__DIR__.'/audio.mp3','Audio Caption'); // true or false
```

