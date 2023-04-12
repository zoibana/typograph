<?php

namespace zoibana\Typograph\Rules\Space;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class SpaceNoSpaceBeforePunctuationRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Удаление пробела перед точкой, запятой, двоеточием, точкой с запятой';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/((\040|\t|&nbsp;)+)([,:.;?])(\s+|$)/',
			'\3\4',
			$text
		);
	}
}