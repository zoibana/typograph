<?php

namespace App\Helpers\Typograph\Rules\Number;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

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