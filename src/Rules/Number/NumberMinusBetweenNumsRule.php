<?php

namespace zoibana\Typograph\Rules\Number;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class NumberMinusBetweenNumsRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Расстановка знака минус между числами';
	}

	public function apply(string $text): string
	{
		return preg_replace('/(\d+)-(\d)/', '\1&minus;\2', $text);
	}
}