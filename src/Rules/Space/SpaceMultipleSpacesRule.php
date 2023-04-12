<?php

namespace zoibana\Typograph\Rules\Space;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class SpaceMultipleSpacesRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Удаление лишних пробельных символов и табуляций';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/([ \t])+/',
			' ',
			$text
		);
	}
}