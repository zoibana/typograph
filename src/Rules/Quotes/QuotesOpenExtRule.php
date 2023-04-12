<?php

namespace zoibana\Typograph\Rules\Quotes;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class QuotesOpenExtRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Открывающая кавычка особые случаи';
	}

	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/(^|\(|\s|>)(\")(\s)(\S+)/u',
			static function ($m) {
				return $m[1] . self::QUOTE_FIRS_OPEN . $m[4];
			},
			$text
		);
	}
}