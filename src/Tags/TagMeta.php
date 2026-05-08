<?php

declare(strict_types=1);

namespace KeruyPHP\KeruyHtml\Tags;

/**
 * <meta> element.
 *
 * @method $this charset(string $value)
 * @method $this name(string $value)
 * @method $this content(string $value)
 */
class TagMeta extends Tag
{
    /** Sets the http-equiv attribute. */
    public function httpEquiv(string $value): static
    {
        return $this->attrs(['http-equiv' => $value]);
    }
}