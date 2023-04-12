<?php

namespace zoibana\Typograph\Rules\Space;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class SpaceAfterPunctuationRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Пробел после знаков пунктуации, кроме точки';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/(\040|\t|&nbsp;|^|\n)([a-zа-яё0-9]+)(\040|\t|&nbsp;)?(:|\)|,|&hellip;|(?:!|\?)+)([а-яёa-z])/iu',
			'\1\2\4 \5',
			$text
		);
	}
}