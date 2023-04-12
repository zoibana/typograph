<?php

namespace zoibana\Typograph\Rules\Text;

use zoibana\Typograph\EntitiesHelper;
use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class TextParagraphsRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Простановка параграфов';
	}

	public function apply(string $text): string
	{
		$r = mb_strpos($text, '<' . AbstractBaseRule::BASE64_PARAGRAPH_TAG . '>');
		$p = EntitiesHelper::rstrpos($text, '</' . AbstractBaseRule::BASE64_PARAGRAPH_TAG . '>');

		if ($r !== false && $p !== false) {
			$beg = mb_substr($text, 0, $r);
			$end = mb_substr($text, $p + mb_strlen('</' . AbstractBaseRule::BASE64_PARAGRAPH_TAG . '>'));

			$text =
				(trim($beg) ? $this->makeParagraphs($beg) . "\n" : "") . '<' . AbstractBaseRule::BASE64_PARAGRAPH_TAG . '>' .
				mb_substr($text, $r + mb_strlen('<' . AbstractBaseRule::BASE64_PARAGRAPH_TAG . '>'), $p - ($r + mb_strlen('<' . AbstractBaseRule::BASE64_PARAGRAPH_TAG . '>'))) . '</' . AbstractBaseRule::BASE64_PARAGRAPH_TAG . '>' .
				(trim($end) ? "\n" . $this->makeParagraphs($end) : "");
		} else {
			$text = $this->makeParagraphs($text);
		}

		return $text;
	}

	protected function makeParagraphs($text): string
	{
		$text = str_replace(["\r\n", "\r"], "\n", $text);

		$text = '<' . AbstractBaseRule::BASE64_PARAGRAPH_TAG . '>' . trim($text) . '</' . AbstractBaseRule::BASE64_PARAGRAPH_TAG . '>';

		$text = preg_replace_callback(
			'/([\040\t]+)?(\n)+([\040\t]*)(\n)+/',
			static function ($matches) {
				return $matches[1] . "</" . AbstractBaseRule::BASE64_PARAGRAPH_TAG . ">" . EntitiesHelper::encodeBlock($matches[2] . $matches[3]) . "<" . AbstractBaseRule::BASE64_PARAGRAPH_TAG . ">";
			},
			$text
		);

		return preg_replace('#<' . AbstractBaseRule::BASE64_PARAGRAPH_TAG . '>(' . EntitiesHelper::INTERNAL_BLOCK_OPEN . '[a-zA-Z0-9/=]+?' . EntitiesHelper::INTERNAL_BLOCK_CLOSE . ')?<\/' . AbstractBaseRule::BASE64_PARAGRAPH_TAG . '>#s', "", $text);
	}
}