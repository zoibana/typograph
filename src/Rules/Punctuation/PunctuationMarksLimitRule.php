<?php

namespace App\Helpers\Typograph\Rules\Punctuation;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class PunctuationMarksLimitRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Лишние восклицательные, вопросительные знаки и точки';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/([!.?]){4,}/',
			'\1\1\1',
			$text
		);
	}
}