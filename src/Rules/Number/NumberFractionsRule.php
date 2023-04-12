<?php

namespace zoibana\Typograph\Rules\Number;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class NumberFractionsRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Замена дробей 1/2, 1/4, 3/4 на соответствующие символы';
	}

	public function apply(string $text): string
	{
		$text = preg_replace(
			'/(^|\D)1\/([24])(\D)/',
			'\1&frac1\2;\3',
			$text
		);

		return preg_replace(
			'/(^|\D)3\/4(\D)/',
			'\1&frac34;\2',
			$text
		);
	}
}