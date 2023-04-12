<?php

namespace App\Helpers\Typograph\Rules\Punctuation;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

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