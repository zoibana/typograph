<?php

namespace App\Helpers\Typograph\Rules\Number;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

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