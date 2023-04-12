<?php

namespace App\Helpers\Typograph\Rules\Abbr;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class AbbrBeforeWeightUnitRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Замена символов и привязка сокращений в весовых величинах: г, кг, мг…';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/(\s|^|>|&nbsp;|,)(\d+)( |&nbsp;)?(г|кг|мг|т)(\s|\.|!|\?|,|$|&nbsp;|;)/iu',
			"\1\2&nbsp;\4\5",
			$text
		);
	}
}