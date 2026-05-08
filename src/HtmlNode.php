<?php

declare(strict_types=1);

namespace KeruyPHP\KeruyHtml;

use Stringable;

interface HtmlNode extends Stringable
{

    public function __toString(): string;
}