<?php

declare(strict_types=1);

namespace KeruyPHP\KeruyHtml\Tags;

/**
 * <form> element.
 *
 * @method $this action(string $value)
 * @method $this autocomplete(string $value)
 * @method $this enctype(string $value)
 * @method $this method(string $value)
 * @method $this name(string $value)
 * @method $this novalidate(bool $value = true)
 * @method $this target(string $value)
 */
class TagForm extends Tag
{
    public function acceptCharset(string $value): static
    {
        return $this->attrs(['accept-charset' => $value]);
    }
}