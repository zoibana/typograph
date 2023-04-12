<?php

namespace zoibana\Typograph\Rules\Abbr;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class AbbrVoltUnitRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Установка пробельных символов в сокращении вольт';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/(\d+)([вВ]| В)(\s|\.|!|\?|,|$)/u',
			"\1&nbsp;В\3",
			$text
		);
	}
}