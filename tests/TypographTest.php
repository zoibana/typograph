<?php

namespace zoibana\Typograph\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use zoibana\Typograph\Typograph;

final class TypographTest extends TestCase
{
    private function apply(string $text): string
    {
        return (new Typograph())->setText($text)->apply();
    }

    /**
     * Строки замены в двойных кавычках превращали "\1" в chr(1): текст пропадал.
     *
     * @return array<string, array{string, string}>
     */
    public static function unitTexts(): array
    {
        return [
            'weight unit' => ['вес 10 кг', "вес 10\u{A0}кг"],
            'length unit' => ['шаг 5 см', "шаг 5\u{A0}см"],
            'volt unit' => ['сеть 220 В', "сеть 220\u{A0}В"],
            'celsius' => ['за окном 25 °C', "за\u{A0}окном 25\u{A0}°C"],
            'print resolution' => ['печать 300 dpi', "печать 300\u{A0}dpi"],
            'page abbreviation' => ['см. стр. 5 книги', "см.\u{A0}стр.\u{A0}5 книги"],
            'see abbreviation' => ['см. выше', "см.\u{A0}выше"],
        ];
    }

    #[DataProvider('unitTexts')]
    public function testKeepsNumbersAndAbbreviationsWithUnits(string $text, string $expected): void
    {
        $result = $this->apply($text);

        $this->assertDoesNotMatchRegularExpression('/[\x00-\x08\x0B\x0C\x0E-\x1F]/', $result);
        $this->assertSame("<p>{$expected}</p>", $result);
    }

    public function testReplacesTypographicEntitiesWithCharacters(): void
    {
        $this->assertSame("<p>Текст\u{A0}— тире</p>", $this->apply('Текст - тире'));
        $this->assertSame('<p>«Кавычки» тут</p>', $this->apply('"Кавычки" тут'));
    }

    /**
     * @return array<string, array{string}>
     */
    public static function escapedMarkup(): array
    {
        return [
            'named' => ['текст &lt;b&gt;жирный&lt;/b&gt;'],
            'decimal' => ['текст &#60;b&#62;жирный&#60;/b&#62;'],
            'hex' => ['текст &#x3C;b&#x3E;жирный&#x3C;/b&#x3E;'],
        ];
    }

    /**
     * Экранированная разметка остаётся экранированной: раскодированные &lt;/&gt; стали бы тегами.
     */
    #[DataProvider('escapedMarkup')]
    public function testKeepsEscapedMarkupEscaped(string $text): void
    {
        $this->assertSame("<p>{$text}</p>", $this->apply($text));
    }

    public function testDoesNotAppendPeriodAtTheEnd(): void
    {
        $this->assertSame('<p>Заголовок без точки</p>', $this->apply('Заголовок без точки'));
    }

    /**
     * @return array<string, array{string, string}>
     */
    public static function plainTexts(): array
    {
        return [
            'edge spaces kept' => [' Привет, ', ' Привет, '],
            'units' => ['вес 10 кг', "вес 10\u{A0}кг"],
            'quotes and dash as characters' => ['Итог - "ок"', "Итог\u{A0}— «ок»"],
            'markup characters stay text' => ['a < b > c & d &lt; e', 'a < b > c & d &lt; e'],
            'tag-like text stays text' => ['<b>не тег</b>', '<b>не тег</b>'],
            'no period appended' => ['Заголовок', 'Заголовок'],
            'domain and email intact' => ['сайт example.com и почта a@b.ru', "сайт example.com и\u{A0}почта a@b.ru"],
            'url with query intact' => ['ссылка https://example.com/a?b=1&c=2 тут', 'ссылка https://example.com/a?b=1&c=2 тут'],
            'missing space after sentence fixed' => ['один.два', 'один. два'],
            'blank text untouched' => ['  ', '  '],
        ];
    }

    #[DataProvider('plainTexts')]
    public function testAppliesToPlainText(string $text, string $expected): void
    {
        $this->assertSame($expected, (new Typograph())->applyToPlainText($text));
    }
}
