<?php

namespace zoibana\Typograph\Rules\Punctuation;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

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