<?php

declare(strict_types=1);

namespace KeruyPHP\KeruyHtml;

/**
 * # Root
 * @method static \KeruyPHP\KeruyHtml\Tags\TagHtml html(array $attrs = [], mixed ...$children)
 *
 * # Metadata
 * @method static \KeruyPHP\KeruyHtml\Tags\TagBase base(array $attrs = [])
 * @method static \KeruyPHP\KeruyHtml\Tags\TagHtml head(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagLink link(array $attrs = [])
 * @method static \KeruyPHP\KeruyHtml\Tags\TagMeta meta(array $attrs = [])
 * @method static \KeruyPHP\KeruyHtml\Tags\TagStyle style(array $attrs = [], mixed ...$children)
 * @method static HtmlElement title(array $attrs = [], mixed ...$children)
 *
 * # Sections
 * @method static HtmlElement address(array $attrs = [], mixed ...$children)
 * @method static HtmlElement article(array $attrs = [], mixed ...$children)
 * @method static HtmlElement aside(array $attrs = [], mixed ...$children)
 * @method static HtmlElement body(array $attrs = [], mixed ...$children)
 * @method static HtmlElement footer(array $attrs = [], mixed ...$children)
 * @method static HtmlElement header(array $attrs = [], mixed ...$children)
 * @method static HtmlElement h1(array $attrs = [], mixed ...$children)
 * @method static HtmlElement h2(array $attrs = [], mixed ...$children)
 * @method static HtmlElement h3(array $attrs = [], mixed ...$children)
 * @method static HtmlElement h4(array $attrs = [], mixed ...$children)
 * @method static HtmlElement h5(array $attrs = [], mixed ...$children)
 * @method static HtmlElement h6(array $attrs = [], mixed ...$children)
 * @method static HtmlElement nav(array $attrs = [], mixed ...$children)
 * @method static HtmlElement section(array $attrs = [], mixed ...$children)
 *
 * # Grouping
 * @method static HtmlElement blockquote(array $attrs = [], mixed ...$children)
 * @method static HtmlElement dd(array $attrs = [], mixed ...$children)
 * @method static HtmlElement div(array $attrs = [], mixed ...$children)
 * @method static HtmlElement dl(array $attrs = [], mixed ...$children)
 * @method static HtmlElement dt(array $attrs = [], mixed ...$children)
 * @method static HtmlElement figcaption(array $attrs = [], mixed ...$children)
 * @method static HtmlElement figure(array $attrs = [], mixed ...$children)
 * @method static HtmlElement hr(array $attrs = [])
 * @method static \KeruyPHP\KeruyHtml\Tags\TagLi li(array $attrs = [], mixed ...$children)
 * @method static HtmlElement main(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagOl ol(array $attrs = [], mixed ...$children)
 * @method static HtmlElement p(array $attrs = [], mixed ...$children)
 * @method static HtmlElement pre(array $attrs = [], mixed ...$children)
 * @method static HtmlElement ul(array $attrs = [], mixed ...$children)
 *
 * # Text-level semantics
 * @method static \KeruyPHP\KeruyHtml\Tags\TagA a(array $attrs = [], mixed ...$children)
 * @method static HtmlElement abbr(array $attrs = [], mixed ...$children)
 * @method static HtmlElement b(array $attrs = [], mixed ...$children)
 * @method static HtmlElement bdi(array $attrs = [], mixed ...$children)
 * @method static HtmlElement bdo(array $attrs = [], mixed ...$children)
 * @method static HtmlElement br(array $attrs = [])
 * @method static HtmlElement cite(array $attrs = [], mixed ...$children)
 * @method static HtmlElement code(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagData data(array $attrs = [], mixed ...$children)
 * @method static HtmlElement dfn(array $attrs = [], mixed ...$children)
 * @method static HtmlElement em(array $attrs = [], mixed ...$children)
 * @method static HtmlElement i(array $attrs = [], mixed ...$children)
 * @method static HtmlElement kbd(array $attrs = [], mixed ...$children)
 * @method static HtmlElement mark(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagQ q(array $attrs = [], mixed ...$children)
 * @method static HtmlElement rb(array $attrs = [], mixed ...$children)
 * @method static HtmlElement rp(array $attrs = [], mixed ...$children)
 * @method static HtmlElement rt(array $attrs = [], mixed ...$children)
 * @method static HtmlElement rtc(array $attrs = [], mixed ...$children)
 * @method static HtmlElement ruby(array $attrs = [], mixed ...$children)
 * @method static HtmlElement s(array $attrs = [], mixed ...$children)
 * @method static HtmlElement samp(array $attrs = [], mixed ...$children)
 * @method static HtmlElement small(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\Tag span(array $attrs = [], mixed ...$children)
 * @method static HtmlElement strong(array $attrs = [], mixed ...$children)
 * @method static HtmlElement sub(array $attrs = [], mixed ...$children)
 * @method static HtmlElement sup(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagTime time(array $attrs = [], mixed ...$children)
 * @method static HtmlElement u(array $attrs = [], mixed ...$children)
 * @method static HtmlElement wbr(array $attrs = [])
 *
 * # Edits
 * @method static \KeruyPHP\KeruyHtml\Tags\TagDel del(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagIns ins(array $attrs = [], mixed ...$children)
 *
 * # Interactive
 * @method static \KeruyPHP\KeruyHtml\Tags\TagDetails details(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagDialog dialog(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagMenu menu(array $attrs = [], mixed ...$children)
 * @method static HtmlElement summary(array $attrs = [], mixed ...$children)
 *
 * # Scripting
 * @method static \KeruyPHP\KeruyHtml\Tags\TagCanvas canvas(array $attrs = [], mixed ...$children)
 * @method static HtmlElement noscript(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagScript script(array $attrs = [], mixed ...$children)
 * @method static HtmlElement template(array $attrs = [], mixed ...$children)
 *
 * # Tables
 * @method static HtmlElement caption(array $attrs = [], mixed ...$children)
 * @method static HtmlElement col(array $attrs = [])
 * @method static HtmlElement colgroup(array $attrs = [], mixed ...$children)
 * @method static HtmlElement table(array $attrs = [], mixed ...$children)
 * @method static HtmlElement tbody(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagTd td(array $attrs = [], mixed ...$children)
 * @method static HtmlElement tfoot(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagTh th(array $attrs = [], mixed ...$children)
 * @method static HtmlElement thead(array $attrs = [], mixed ...$children)
 * @method static HtmlElement tr(array $attrs = [], mixed ...$children)
 *
 * # Forms
 * @method static \KeruyPHP\KeruyHtml\Tags\TagButton button(array $attrs = [], mixed ...$children)
 * @method static HtmlElement datalist(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagFieldset fieldset(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagForm form(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagInput input(array $attrs = [])
 * @method static \KeruyPHP\KeruyHtml\Tags\TagLabel label(array $attrs = [], mixed ...$children)
 * @method static HtmlElement legend(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagMeter meter(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagOptgroup optgroup(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagOption option(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagOutput output(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagProgress progress(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagSelect select(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagTextarea textarea(array $attrs = [], mixed ...$children)
 *
 * # Embedded content
 * @method static \KeruyPHP\KeruyHtml\Tags\TagArea area(array $attrs = [])
 * @method static \KeruyPHP\KeruyHtml\Tags\TagAudio audio(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagEmbed embed(array $attrs = [])
 * @method static HtmlElement iframe(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagImg img(array $attrs = [])
 * @method static \KeruyPHP\KeruyHtml\Tags\TagMap map(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagObject object(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagParam param(array $attrs = [])
 * @method static HtmlElement picture(array $attrs = [], mixed ...$children)
 * @method static \KeruyPHP\KeruyHtml\Tags\TagSource source(array $attrs = [])
 * @method static \KeruyPHP\KeruyHtml\Tags\TagTrack track(array $attrs = [])
 * @method static \KeruyPHP\KeruyHtml\Tags\TagVideo video(array $attrs = [], mixed ...$children)
 */
class Html
{
    private static array $tagClasses = [
        'html' => Tags\TagHtml::class,
        'base' => Tags\TagBase::class,
        'link' => Tags\TagLink::class,
        'meta' => Tags\TagMeta::class,
        'style' => Tags\TagStyle::class,
        'li' => Tags\TagLi::class,
        'ol' => Tags\TagOl::class,
        'a' => Tags\TagA::class,
        'data' => Tags\TagData::class,
        'q' => Tags\TagQ::class,
        'time' => Tags\TagTime::class,
        'ins' => Tags\TagIns::class,
        'del' => Tags\TagDel::class,
        'dialog' => Tags\TagDialog::class,
        'details' => Tags\TagDetails::class,
        'menu' => Tags\TagMenu::class,
        'canvas' => Tags\TagCanvas::class,
        'script' => Tags\TagScript::class,
        'td' => Tags\TagTd::class,
        'th' => Tags\TagTh::class,
        'button' => Tags\TagButton::class,
        'fieldset' => Tags\TagFieldset::class,
        'form' => Tags\TagForm::class,
        'input' => Tags\TagInput::class,
        'label' => Tags\TagLabel::class,
        'meter' => Tags\TagMeter::class,
        'optgroup' => Tags\TagOptgroup::class,
        'option' => Tags\TagOption::class,
        'output' => Tags\TagOutput::class,
        'progress' => Tags\TagProgress::class,
        'select' => Tags\TagSelect::class,
        'textarea' => Tags\TagTextarea::class,
        'area' => Tags\TagArea::class,
        'audio' => Tags\TagAudio::class,
        'embed' => Tags\TagEmbed::class,
        'img' => Tags\TagImg::class,
        'map' => Tags\TagMap::class,
        'param' => Tags\TagParam::class,
        'object' => Tags\TagObject::class,
        'source' => Tags\TagSource::class,
        'track' => Tags\TagTrack::class,
        'video' => Tags\TagVideo::class,
    ];

    private function __construct()
    {
    }

    public static function __callStatic(string $tag, array $args): HtmlElement
    {
        return self::tag($tag, $args);
    }

    public static function doctype(): HtmlRaw
    {
        return HtmlUtil::raw('<!DOCTYPE html>' . PHP_EOL);
    }

    public static function registerTag(string $tag, string $class): void
    {
        self::$tagClasses[strtolower($tag)] = $class;
    }

    public static function tag(string $tag, array $args): HtmlElement
    {
        $class = self::$tagClasses[strtolower($tag)] ?? Tags\Tag::class;
        $el = new $class($tag);

        if (isset($args[0]) && is_array($args[0]) && !is_callable($args[0])) {
            $el->attrs(array_shift($args));
        }

        if ($args !== []) {
            $el->append(...$args);
        }

        return $el;
    }
}