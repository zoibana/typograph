<?php

namespace zoibana\Typograph\Rules\Space;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class SpaceAfterCommaRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Пробел после запятой';
	}

	public function apply(string $text): string
	{
		$text = preg_replace(
			'/(\040|\t|&nbsp;),([а-яёa-z0-9])/iu',
			', \2',
			$text
		);

		return preg_replace(
			'/(\D),([а-яёa-z0-9])/iu',
			'\1, \2',
			$text
		);
	}
}