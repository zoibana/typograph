<?php

namespace zoibana\Typograph\Rules\Quotes;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class QuotesCloseExtRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Закрывающая кавычка особые случаи';
	}

	public function apply(string $text): string
	{
		$text = preg_replace_callback(
			'/([a-zа-яё0-9]|\.|&hellip;|!|\?|>|\)|:|\+|%|@|#|\$|\*)((\"|&laquo;)+)(<[^>]+>)(\.|&hellip;|;|:|\?|!|,|\)|<\/|$| )/ui',
			static function ($m) {
				return $m[1] . str_repeat(self::QUOTE_FIRS_CLOSE, substr_count($m[2], "\"") + substr_count($m[2], "&laquo;")) . $m[4] . $m[5];
			},
			$text
		);
		$text = preg_replace_callback(
			'/([a-zа-яё0-9]|\.|&hellip;|!|\?|>|\)|:|\+|%|@|#|\$|\*)(\s+)((\")+)(\s+)(\.|&hellip;|;|:|\?|!|,|\)|<\/|$| )/ui',
			static function ($m) {
				return $m[1] . $m[2] . str_repeat(self::QUOTE_FIRS_CLOSE, substr_count($m[3], "\"") + substr_count($m[3], "&laquo;")) . $m[5] . $m[6];
			},
			$text
		);

		$text = preg_replace(
			'/>(&laquo;)\.($|\s|<)/ui',
			'>&raquo;.\2',
			$text
		);

		$text = preg_replace(
			'/>(&laquo;),($|\s|<|\S)/ui',
			'>&raquo;,\2',
			$text
		);

		$text = preg_replace(
			'/>(&laquo;):($|\s|<|\S)/ui',
			'>&raquo;:\2',
			$text
		);

		$text = preg_replace(
			'/>(&laquo;);($|\s|<|\S)/ui',
			'>&raquo;;\2',
			$text
		);

		$text = preg_replace(
			'/>(&laquo;)\)($|\s|<|\S)/ui',
			'>&raquo;)\2',
			$text
		);

		$text = preg_replace_callback(
			'/((\")+)$/u',
			static function ($m) {
				return str_repeat(self::QUOTE_FIRS_CLOSE, substr_count($m[1], "\""));
			},
			$text
		);

		return preg_replace_callback(
			'/(\S)((\")+)(\.|&hellip;|;|:|\?|!|,|\s|\)|<\/|<|$)/ui',
			static function ($m) {
				return $m[1] . str_repeat(self::QUOTE_FIRS_CLOSE, substr_count($m[2], "\"")) . $m[4];
			},
			$text
		);

	}
}