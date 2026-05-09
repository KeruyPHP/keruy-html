<?php

declare(strict_types=1);

namespace KeruyPHP\KeruyHtml;

use Closure;
use Generator;
use JsonException;
use Stringable;

/**
 * @method HtmlElement class(string $string)
 */
class HtmlElement implements HtmlNode
{
    private const array RAW_TEXT = ['script', 'style'];
    private const array VOID = [
        'area',
        'base',
        'br',
        'col',
        'embed',
        'hr',
        'img',
        'input',
        'link',
        'meta',
        'param',
        'source',
        'track',
        'wbr',
    ];
    /** @var array<string, callable(HtmlElement): mixed> */
    private static array $extensions = [];
    /** @var list<HtmlNode> */
    protected array $children = [];
    private array $attrs = [];
    private bool $pretty = false;
    private string $prettyIndent = '  ';
    private bool $rawText;
    private string $tag;
    private bool $void;

    public function __construct(string $tag)
    {
        if ($parent = HtmlContext::current()) {
            $parent->append($this);
        }
        $tag = trim($tag);
        $this->tag = $tag;
        $low = strtolower($tag);
        $this->void = in_array($low, self::VOID, true);
        $this->rawText = in_array($low, self::RAW_TEXT, true);
    }

    public static function extend(string $name, callable $factory): void
    {
        self::$extensions[$name] = $factory;
    }

    public function __call(string $name, array $args): static
    {
        $this->setAttr($name, array_key_exists(0, $args) ? $args[0] : true);
        return $this;
    }

    /**
     * @throws JsonException
     */
    public function __toString(): string
    {
        return $this->pretty
            ? $this->renderPretty(0)
            : $this->renderMinified();
    }

    public function append(mixed ...$children): static
    {
        if ($this->void) {
            return $this;
        }

        foreach ($children as $child) {
            $this->appendOne($child);
        }

        return $this;
    }

    public function aria(string $key, mixed $value = true): static
    {
        /** @noinspection PhpUnnecessaryCurlyVarSyntaxInspection */
        return $this->prop("aria-{$key}", $value);
    }

    public function attrs(array $attrs): static
    {
        foreach ($attrs as $name => $value) {
            if (is_int($name)) {
                $this->attrs[(string)$value] = true;
            } else {
                $this->setAttr($name, $value);
            }
        }
        return $this;
    }

    public function bulma(): \KeruyPHP\KeruyBulma\Bulma
    {
        return (self::$extensions['bulma'])($this);
    }

    public function data(string $key, mixed $value): static
    {
        /** @noinspection PhpUnnecessaryCurlyVarSyntaxInspection */
        return $this->prop("data-{$key}", $value);
    }

    public function pretty(string $indent = '  '): static
    {
        $this->pretty = true;
        $this->prettyIndent = $indent;
        return $this;
    }

    public function prop(string $key, mixed $value): static
    {
        $this->attrs[$key] = $value;
        return $this;
    }

    public function raw(string ...$parts): static
    {
        return $this->append(...array_map(static fn(string $part): HtmlRaw => HtmlUtil::raw($part), $parts));
    }

    public function text(string ...$parts): static
    {
        return $this->append(...$parts);
    }

    /**
     * @throws JsonException
     */
    protected function buildAttrs(): string
    {
        $parts = [];

        foreach ($this->attrs as $name => $value) {
            if (!is_string($value) && is_callable($value)) {
                $value = $value($name, $this);
            }

            if ($value === false || $value === null) {
                continue;
            }

            if ($value === true) {
                $parts[] = HtmlUtil::escape($name, ENT_QUOTES);
                continue;
            }

            if (is_array($value)) {
                $value = $this->resolveArrayAttr($name, $value);
                if ($value === null) {
                    continue;
                }
            }

            if (str_starts_with($name, 'data-') && !is_scalar($value)) {
                $value = json_encode($value, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);
            }

            $parts[] = sprintf(
                '%s="%s"',
                HtmlUtil::escape($name, ENT_QUOTES),
                HtmlUtil::escape((string)$value),
            );
        }

        return $parts === [] ? '' : ' ' . implode(' ', $parts);
    }

    private function appendOne(mixed $value): void
    {
        if ($value === null || $value === false) {
            return;
        }

        if ($value instanceof Closure) {
            HtmlContext::push($this);
            try {
                $this->appendOne($value($this));
            } finally {
                HtmlContext::pop();
            }
            return;
        }

        if ($value instanceof Generator) {
            foreach ($value as $chunk) {
                $this->appendOne($chunk);
            }
            return;
        }

        if (is_array($value) && is_callable($value)) {
            $this->appendOne($value($this));
            return;
        }

        if (is_array($value)) {
            foreach ($value as $item) {
                $this->appendOne($item);
            }
            return;
        }

        if ($value instanceof HtmlNode) {
            $this->children[] = $value;
            return;
        }

        if ($value instanceof Stringable || is_object($value)) {
            $this->children[] = HtmlUtil::text((string)$value);
            return;
        }

        $str = (string)$value;
        $this->children[] = $this->rawText ? HtmlUtil::raw($str) : HtmlUtil::text($str);
    }

    /**
     * @throws JsonException
     */
    private function renderMinified(): string
    {
        $attrStr = $this->buildAttrs();

        if ($this->void) {
            /** @noinspection PhpUnnecessaryCurlyVarSyntaxInspection */
            return "<{$this->tag}{$attrStr}>";
        }

        $inner = implode(
            '',
            array_map(
                static fn(HtmlNode $n): string => (string)$n,
                $this->children,
            )
        );
        /** @noinspection PhpUnnecessaryCurlyVarSyntaxInspection */
        return "<{$this->tag}{$attrStr}>{$inner}</{$this->tag}>";
    }

    /**
     * @throws JsonException
     */
    private function renderPretty(int $depth): string
    {
        $pad = str_repeat($this->prettyIndent, $depth);
        $attrStr = $this->buildAttrs();

        if ($this->void) {
            /** @noinspection PhpUnnecessaryCurlyVarSyntaxInspection */
            return "{$pad}<{$this->tag}{$attrStr}>" . PHP_EOL;
        }

        if ($this->children === []) {
            /** @noinspection PhpUnnecessaryCurlyVarSyntaxInspection */
            return "{$pad}<{$this->tag}{$attrStr}></{$this->tag}>" . PHP_EOL;
        }

        if (count($this->children) === 1 && $this->children[0] instanceof HtmlRaw) {
            /** @noinspection PhpUnnecessaryCurlyVarSyntaxInspection */
            return "{$pad}<{$this->tag}{$attrStr}>{$this->children[0]}</{$this->tag}>" . PHP_EOL;
        }

        $childIndent = $this->prettyIndent;
        $inner = '';
        foreach ($this->children as $child) {
            if ($child instanceof self) {
                $child->pretty = true;
                $child->prettyIndent = $childIndent;
                $inner .= $child->renderPretty($depth + 1);
            } else {
                /** @noinspection PhpUnnecessaryCurlyVarSyntaxInspection */
                $inner .= "{$pad}{$childIndent}{$child}" . PHP_EOL;
            }
        }
        /** @noinspection PhpUnnecessaryCurlyVarSyntaxInspection */
        return "{$pad}<{$this->tag}{$attrStr}>\n{$inner}{$pad}</{$this->tag}>" . PHP_EOL;
    }

    private function resolveArrayAttr(string $name, array $values): ?string
    {
        if (str_starts_with($name, 'data-')) {
            return json_encode($values, JSON_THROW_ON_ERROR | JSON_UNESCAPED_UNICODE);
        }

        $result = [];

        foreach ($values as $k => $v) {
            if (is_int($k)) {
                if ($v !== '' && $v !== false && $v !== null) {
                    $result[] = (string)$v;
                }
            } elseif ($v) {
                $result[] = $k;
            }
        }

        return $result === [] ? null : implode(' ', $result);
    }

    private function setAttr(string $name, mixed $value): void
    {
        if (str_starts_with($name, 'data-') || str_starts_with($name, 'aria-')) {
            $this->attrs[$name] = $value;
            return;
        }

        if ($value === null || $value === false || $value === true) {
            $this->attrs[$name] = $value;
            return;
        }

        if (!is_string($value) && is_callable($value)) {
            $this->attrs[$name] = $value;
            return;
        }

        if (is_array($value)) {
            if (isset($this->attrs[$name]) && is_array($this->attrs[$name])) {
                foreach ($value as $k => $v) {
                    if (is_int($k)) {
                        $this->attrs[$name][] = $v;
                    } else {
                        $this->attrs[$name][$k] = $v;
                    }
                }
            } else {
                $this->attrs[$name] = $value;
            }
            return;
        }

        $str = (string)$value;
        if (isset($this->attrs[$name]) && is_array($this->attrs[$name])) {
            $this->attrs[$name][] = $str;
        } else {
            $this->attrs[$name] = [$str];
        }
    }
}