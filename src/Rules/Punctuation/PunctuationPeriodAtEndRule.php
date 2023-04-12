<?php

namespace zoibana\Typograph\Rules\Punctuation;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class PunctuationPeriodAtEndRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Точка в конце текста, если её там нет';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/([a-zа-яё0-9])(\040|\t|&nbsp;)*$/ui',
			'\1.',
			$text
		);
	}
}