<?php

namespace zoibana\Typograph\Rules\Quotes;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class QuotesOpenRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Открывающая кавычка';
	}

	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/(^|\(|\s|>|-)((\")+)(\S+)/u',
			static function ($m) {
				return $m[1] . str_repeat(self::QUOTE_FIRS_OPEN, substr_count($m[2], "\"")) . $m[4];
			},
			$text
		);
	}
}