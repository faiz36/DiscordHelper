<?php

declare(strict_types=1);

namespace Flugins\DiscordHelper\Element;

use function date;
use function time;
use function hexdec;

final class Embed
{
    private array $embedData = [];

    public function __construct()
    {
        $this->embedData['type'] = 'rich';
    }

    public function getEmbedData() : array
    {
        return $this->embedData;
    }

    public function setTitle(string $title) : void
    {
        $this->embedData['title'] = $title;
    }

    public function setTimestamp() : void
    {
        $this->embedData['timestamp'] = date('c',time());
    }

    public function setColor(string $hex) : void
    {
        $this->embedData['color'] = hexdec($hex);
    }

    public function setDescription(string $description) : void
    {
        $this->embedData['description'] = $description;
    }

    public function setUrl(string $url) : void
    {
        $this->embedData['url'] = $url;
    }

    public function setFooter(string $text,string $icon_url = '') : void
    {
        $this->embedData['footer'] = ['text' => $text,'icon_url' => $icon_url];
    }

    public function setImage(string $image_url) : void
    {
        $this->embedData['image'] = ['url' => $image_url];
    }

    public function setAuthor(string $name,string $url) : void
    {
        $this->embedData['author'] = ['name' => $name,'url' => $url];
    }

    public function addField(string $name,string $value,bool $inline) : void
    {
        $this->embedData['fields'][] = ['name' => $name,'value' => $value,'inline' => $inline];
    }
}