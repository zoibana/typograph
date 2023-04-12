<?php

namespace zoibana\Typograph\Rules\Number;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class NumberTimesRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Замена x на символ × в размерных единицах';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/([^a-zA-Z><]|^)(&times;)?(\d+)(\040*)([xх])(\040*)(\d+)([^a-zA-Z><]|$)/u',
			'\1\2\3&times;\7\8',
			$text
		);
	}
}