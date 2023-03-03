<?php

namespace App\Services;

use App\Services\Contracts\Parser;

class ParserService implements Parser
{
    private string $link;

    public function setLink(string $link): self
    {
        $this->link = $link;

        return $this;
    }

    public function getParseData(): array
    {
        $xml = XmlParser::load($link);
       $data = $xml->parse([
        'title' => [
            'uses' => 'channel.title'
        ],
        'link' => [
            'uses' => 'channel.link'
        ],
        'description' => [
            'uses' => 'channel.description'
        ],
        'image' => [
            'uses' => 'channel.image.url'
        ],
        'news' => [
            'uses' => 'channel.item[title,link,guid,description,pubDate]'
        ],
    ]);
    }
}