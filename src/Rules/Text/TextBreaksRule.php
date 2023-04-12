<?php

namespace App\Helpers\Typograph\Rules\Text;

use App\Helpers\Typograph\EntitiesHelper;
use App\Helpers\Typograph\RuleInterface;
use App\Helpers\Typograph\Rules\AbstractBaseRule;

class TextBreaksRule extends AbstractBaseRule implements RuleInterface
{
	public const BASE64_BREAKLINE_TAG = 'YnIgLw==='; // br / (с пробелом и слэшем)

	public function getDescription(): string
	{
		return 'Простановка переносов строк';
	}

	public function apply(string $text): string
	{
		$text = preg_replace_callback(
			'/(\\/' . AbstractBaseRule::BASE64_PARAGRAPH_TAG . '>)([\r\n \t]+)(<' . AbstractBaseRule::BASE64_PARAGRAPH_TAG . '>)/ms',
			static function ($matches) {
				return $matches[1] . EntitiesHelper::encodeBlock($matches[2]) . $matches[3];
			},
			$text
		);

		if (!preg_match('/<' . self::BASE64_BREAKLINE_TAG . '>/', $text)) {
			$text = str_replace(["\r\n", "\r", "\n"], ["\n", "\n", "<" . self::BASE64_BREAKLINE_TAG . ">\n"], $text);
		}

		return $text;
	}
}