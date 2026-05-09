<?php

declare(strict_types=1);

namespace KeruyPHP\KeruyHtml;

final class HtmlUtil
{
    private function __construct()
    {
    }

    public static function escape(string $value, int $flags = ENT_QUOTES | ENT_HTML5): string
    {
        return htmlspecialchars($value, $flags, 'UTF-8');
    }

    public static function raw(string ...$parts): HtmlRaw
    {
        return new HtmlRaw(implode(PHP_EOL, $parts));
    }

    public static function text(string $value): HtmlRaw
    {
        return new HtmlRaw(self::escape($value));
    }
}