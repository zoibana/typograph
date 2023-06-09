<?php

namespace zoibana\Typograph\Rules\Etc;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class EtcSplitNumberToTriadsAccentRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Разбиение числа на триады';
	}

	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/([^a-zA-Z0-9<)]|^)(\d{5,})([^a-zA-Z>(]|$)/ui',
			static function ($m) {
				return $m[1] . str_replace(" ", "&thinsp;", number_format($m[2], 0, '', ' ')) . $m[3];
			},
			$text
		);
	}
}