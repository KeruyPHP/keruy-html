<?php

declare(strict_types=1);

namespace KeruyPHP\KeruyHtml;

final readonly class HtmlRaw implements HtmlNode
{
    public function __construct(private string $html)
    {
    }

    public function __toString(): string
    {
        return $this->html;
    }
}