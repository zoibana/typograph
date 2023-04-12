<?php

namespace App\Helpers\Typograph\Rules\Space;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class SpaceBeforePercentRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Удаление пробела перед символом процента';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/(\d+)([\t\040]+)%/',
			'\1%',
			$text
		);
	}
}