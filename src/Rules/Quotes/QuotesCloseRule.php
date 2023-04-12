<?php

namespace zoibana\Typograph\Rules\Quotes;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class QuotesCloseRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Закрывающая кавычка';
	}

	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/([a-zа-яё0-9]|\.|&hellip;|!|\?|>|\)|:|\+|%|@|#|\$|\*)((\")+)(\.|&hellip;|;|:|\?|!|,|\s|\)|<\/|<|$)/ui',
			static function ($m) {
				return $m[1] . str_repeat(self::QUOTE_FIRS_CLOSE, substr_count($m[2], "\"")) . $m[4];
			},
			$text
		);
	}
}