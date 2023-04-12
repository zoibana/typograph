<?php

namespace zoibana\Typograph\Rules\Punctuation;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class PunctuationBaseLimitRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Лишние запятые, двоеточия, точки с запятой';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/([,:;]){2,}/',
			'\1',
			$text
		);
	}
}