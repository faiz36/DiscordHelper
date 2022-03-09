<?php

declare(strict_types=1);

namespace Flugins\DiscordHelper;

use Flugins\DiscordHelper\Element\Embed;
use Flugins\DiscordHelper\Element\WebhookData;
use Flugins\DiscordHelper\AsyncTask\SendWebhookAsyncTsak;

use pocketmine\Server;

use function json_encode;

final class DiscordHelper
{
    public function __construct(private string $webhook) {}

    private array $datas = [];

    public function setUserName(string $userName) : void
    {
        $this->datas['username'] = $userName;
    }

    public function setContent(string $content) : void
    {
        $this->datas['content'] = $content;
    }

    public function addEmbed(Embed $embed) : void
    {
        $this->datas['embeds'][] = $embed->getEmbedData();
    }

    public function send() : void
    {
        Server::getInstance()->getAsyncPool()->submitTask(new SendWebhookAsyncTsak($this->webhook,json_encode($this->datas)));
    }
}