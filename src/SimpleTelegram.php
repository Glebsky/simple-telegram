<?php

namespace Glebsky\SimpleTelegram;

class SimpleTelegram
{
    private $botToken;
    private $recipient;

    public function __construct(string $botToken, $recipient = null)
    {
        $this->botToken = $botToken;
        $this->recipient = $recipient;
    }

    public function getRecipient()
    {
        return $this->recipient;
    }

    public function setRecipient($recipient)
    {
        if (!is_numeric($recipient)) {
            throw new \Exception('Recipient must be a valid ID.');
        }
        $this->recipient = $recipient;

        return $this;
    }

    public function sendMessage(string $msg)
    {
        $textChunks = str_split(urlencode($msg), 4096);

        foreach ($textChunks as $textChunk) {
            $result = file_get_contents("https://api.telegram.org/bot$this->botToken/sendMessage?chat_id=$this->recipient&text=$textChunk");
        }

        if ($result !== false) {
            return true;
        }

        return false;
    }

    public function sendDocument(string $localPath, string $caption = '')
    {
        $MULTIPART_BOUNDARY = '--------------------------'.microtime(true);
        $FORM_FIELD = 'document';

        $header = 'Content-Type: multipart/form-data; boundary='.$MULTIPART_BOUNDARY;

        $filename = realpath($localPath);

        if (!file_exists($filename)) {
            return false;
        }

        $file_contents = file_get_contents($filename);

        $content = '--'.$MULTIPART_BOUNDARY."\r\n".
            'Content-Disposition: form-data; name="'.$FORM_FIELD.'"; filename="'.basename($filename)."\"\r\n".
            "Content-Type: application/zip\r\n\r\n".
            $file_contents."\r\n";

        $content .= '--'.$MULTIPART_BOUNDARY."\r\n".
            "Content-Disposition: form-data; name=\"caption\"\r\n\r\n".
            "$caption\r\n";

        $content .= '--'.$MULTIPART_BOUNDARY."\r\n".
            "Content-Disposition: form-data; name=\"chat_id\"\r\n\r\n".
            "$this->recipient\r\n";

        $content .= '--'.$MULTIPART_BOUNDARY."--\r\n";

        $context = stream_context_create([
            'http' => [
                'method'  => 'POST',
                'header'  => $header,
                'content' => $content,
            ],
        ]);

        $url = "https://api.telegram.org/bot$this->botToken/sendDocument?chat_id=$this->recipient";
        $result = file_get_contents($url, false, $context);

        if ($result !== false) {
            return true;
        }

        return false;
    }

    public function sendPhoto(string $localPath, string $caption = '')
    {
        $filename = realpath($localPath);
        $type = mime_content_type($filename);
        if (!strstr($type, 'image/')) {
            return false;
        }

        $MULTIPART_BOUNDARY = '--------------------------'.microtime(true);
        $FORM_FIELD = 'photo';

        $header = 'Content-Type: multipart/form-data; boundary='.$MULTIPART_BOUNDARY;

        $file_contents = file_get_contents($filename);

        $content = '--'.$MULTIPART_BOUNDARY."\r\n".
            'Content-Disposition: form-data; name="'.$FORM_FIELD.'"; filename="'.basename($filename)."\"\r\n".
            "Content-Type: application/zip\r\n\r\n".
            $file_contents."\r\n";

        $content .= '--'.$MULTIPART_BOUNDARY."\r\n".
            "Content-Disposition: form-data; name=\"caption\"\r\n\r\n".
            "$caption\r\n";

        $content .= '--'.$MULTIPART_BOUNDARY."\r\n".
            "Content-Disposition: form-data; name=\"chat_id\"\r\n\r\n".
            "$this->recipient\r\n";

        $content .= '--'.$MULTIPART_BOUNDARY."--\r\n";

        $context = stream_context_create([
            'http' => [
                'method'  => 'POST',
                'header'  => $header,
                'content' => $content,
            ],
        ]);

        $url = "https://api.telegram.org/bot$this->botToken/sendPhoto?chat_id=$this->recipient";
        $result = file_get_contents($url, false, $context);

        if ($result !== false) {
            return true;
        }

        return false;
    }

    public function sendAudio(string $localPath, string $caption = '')
    {
        $filename = realpath($localPath);
        $type = mime_content_type($filename);
        if (!strstr($type, 'audio/mpeg')) {
            return false;
        }

        $MULTIPART_BOUNDARY = '--------------------------'.microtime(true);
        $FORM_FIELD = 'audio';

        $header = 'Content-Type: multipart/form-data; boundary='.$MULTIPART_BOUNDARY;

        $file_contents = file_get_contents($filename);

        $content = '--'.$MULTIPART_BOUNDARY."\r\n".
            'Content-Disposition: form-data; name="'.$FORM_FIELD.'"; filename="'.basename($filename)."\"\r\n".
            "Content-Type: application/zip\r\n\r\n".
            $file_contents."\r\n";

        $content .= '--'.$MULTIPART_BOUNDARY."\r\n".
            "Content-Disposition: form-data; name=\"caption\"\r\n\r\n".
            "$caption\r\n";

        $content .= '--'.$MULTIPART_BOUNDARY."\r\n".
            "Content-Disposition: form-data; name=\"chat_id\"\r\n\r\n".
            "$this->recipient\r\n";

        $content .= '--'.$MULTIPART_BOUNDARY."--\r\n";

        $context = stream_context_create([
            'http' => [
                'method'  => 'POST',
                'header'  => $header,
                'content' => $content,
            ],
        ]);

        $url = "https://api.telegram.org/bot$this->botToken/sendAudio?chat_id=$this->recipient";
        $result = file_get_contents($url, false, $context);

        if ($result !== false) {
            return true;
        }

        return false;
    }
}
