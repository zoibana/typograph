<?php

namespace zoibana\Typograph\Rules\Number;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class NumberNOnumberRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Пробел между симоволом номера и числом';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/(№|&#8470;)(\s|&nbsp;)*(\d)/iu',
			'&#8470;&thinsp;\3',
			$text
		);
	}
}