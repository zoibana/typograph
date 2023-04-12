<?php

namespace zoibana\Typograph\Rules\Abbr;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

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