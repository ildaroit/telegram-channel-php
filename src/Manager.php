<?php

namespace naffiq\telegram\channel;

use Longman\TelegramBot\Request;
use Longman\TelegramBot\Telegram;

/**
 * Class that makes the magic happen!
 */
class Manager {
    /**
     * @var string bot api key, given by `@BotFather`
     */
    private $botApiKey;

    /**
     * @var string
     */
    private $botName;

    /**
     * @var string channel name
     */
    private $channelName;

    /**
     * @var Telegram telegram bot client instance
     */
    private $telegramClient;

    /**
     * Channel manager constructor
     * 
     * @var string $botApiKey
     * @var string $channelName
     */
    function __construct($botApiKey, $channelName, $botName)
    {
        $this->botApiKey = $botApiKey;
        $this->channelName = $channelName;

        $this->telegramClient = new Telegram($this->botApiKey);
    }

    /**
     * Send message to your telegram channel
     *
     * @var string $message
     * @var string|null $attachmentPath
     */
    public function postMessage($message, $attachmentPath = null)
    {
        return Request::sendMessage([
            'chat_id' => $this->channelName,
            'text' => $message
        ]);
    }
}