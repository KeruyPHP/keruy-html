# KeruyHtml

Simple fluent PHP DSL for building HTML.

## Installation

```bash
composer require keruyphp/keruy-html
```

## Quick start

```php
<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use KeruyPHP\KeruyHtml\Html;

echo Html::div(['class' => 'box'], 'Hello world');
```

## Passing content

You can build children in a few different ways.

### 1. As an array

> The first array argument is treated as attributes. Pass an empty attribute array if you want to send children as an array.

```php
echo Html::ul([], [
	Html::li('One'),
	Html::li('Two'),
	Html::li('Three'),
]);
```

### 2. With a closure

```php
echo Html::ul(function () {
	Html::li('One');
	Html::li('Two');
	Html::li('Three');
});
```

### 3. As trailing arguments

```php
echo Html::ul(
	Html::li('One'),
	Html::li('Two'),
	Html::li('Three'),
);
```

## Output styles

You can render the same structure using an array or a closure.

### Array-based output

```php
echo Html::div(['class' => 'card'], [
	Html::h2('Title'),
	Html::p('Text from array children.'),
]);
```

### Closure-based output

```php
echo Html::div(function () {
	Html::h2('Title');
	Html::p('Text from closure children.');
});
```

## Core methods

### `append()`

`append()` is the universal child API. It accepts strings, nodes, arrays, generators and closures.

String values are treated as text and escaped automatically.

```php
echo Html::div(function (\KeruyPHP\KeruyHtml\Tags\Tag $div) {
	$div->append(
		'Hello ',
		Html::strong('world'),
		'!',
	);
});
```

### `text()`

`text()` is the explicit text helper. It is a semantic alias for appending escaped string content.

```php
echo Html::p(function (\KeruyPHP\KeruyHtml\Tags\Tag $p) {
	$p->text('Price: ', '100 UAH');
});
```

### `raw()`

`raw()` appends trusted HTML fragments without escaping.

```php
echo Html::div(function (\KeruyPHP\KeruyHtml\Tags\Tag $div) {
	$div->raw('<strong>Trusted HTML</strong>');
});
```

Use `raw()` only for HTML you already trust.

## Setting attributes and classes

You can add attributes and classes in three common ways.

### 1. In the attribute array

```php
echo Html::div([
	'class' => 'box',
	'id' => 'main',
], 'Hello');
```

### 2. Inside a closure

```php
echo Html::div(function (\KeruyPHP\KeruyHtml\Tags\Tag $div) {
	$div->class('box');
	$div->prop('id', 'main');

	Html::span('Hello');
});
```

### 3. At the end of the chain

```php
echo Html::div('Hello')
	->class('box')
	->prop('id', 'main');
```

### `class()`

The `class()` method is the main shortcut for CSS classes.

```php
echo Html::div('Hello')
	->class('box')
	->class('has-background-light');
```

### `prop()`

Use `prop()` for any attribute.

```php
echo Html::a('Profile')
	->prop('href', '/profile')
	->prop('target', '_blank');
```

You can also combine it with regular attribute arrays:

```php
echo Html::input(['type' => 'text'])
	->prop('name', 'email')
	->prop('placeholder', 'Email');
```

## Pretty output

Call `pretty()` if you want formatted HTML instead of minified output.

```php
echo Html::div(['class' => 'card'], function () {
	Html::h2('Title');
	Html::p('Formatted output example.');
})->pretty();
```

## Notes

- Strings are escaped automatically.
- Use `HtmlElement::raw()` or `HtmlUtil::raw()` if you need raw HTML.
- Use `HtmlElement::text()` or `HtmlUtil::text()` if you want explicit escaped text.