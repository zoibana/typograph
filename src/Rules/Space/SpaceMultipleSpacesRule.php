<?php

namespace App\Helpers\Typograph\Rules\Space;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

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