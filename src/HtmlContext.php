<?php

namespace KeruyPHP\KeruyHtml;

final class HtmlContext
{
    private static array $stack = [];

    public static function current(): ?HtmlNode
    {
        return end(self::$stack) ?: null;
    }

    public static function pop(): void
    {
        array_pop(self::$stack);
    }

    public static function push(HtmlNode $node): void
    {
        self::$stack[] = $node;
    }
}