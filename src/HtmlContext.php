<?php

namespace KeruyPHP\KeruyHtml;

final class HtmlContext
{
    /** @var list<HtmlElement> */
    private static array $stack = [];

    public static function current(): ?HtmlElement
    {
        return end(self::$stack) ?: null;
    }

    public static function pop(): void
    {
        array_pop(self::$stack);
    }

    public static function push(HtmlElement $node): void
    {
        self::$stack[] = $node;
    }
}