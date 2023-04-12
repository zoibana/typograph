<?php

namespace zoibana\Typograph\Rules\Number;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class NumberTriadsRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Объединение триад чисел полупробелом';
	}

	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/(\d{1,3}( \d{3})+)(.|$)/u',
			static function ($m) {
				return ($m[3] === "-" ? $m[0] : str_replace(" ", "&thinsp;", $m[1]) . $m[3]);
			},
			$text
		);
	}
}