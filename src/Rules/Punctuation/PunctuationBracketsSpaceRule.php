<?php

namespace zoibana\Typograph\Rules\Punctuation;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class PunctuationBracketsSpaceRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Пробел перед открывающей скобочкой';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/([a-zа-яё])(\()/iu',
			'\1 \2',
			$text
		);
	}
}