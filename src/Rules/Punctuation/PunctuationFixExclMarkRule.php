<?php

namespace zoibana\Typograph\Rules\Punctuation;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class PunctuationFixExclMarkRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Замена восклицательного и вопросительного знаков местами';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/([a-zа-яё0-9])!\?(\s|$|<)/ui',
			'\1?!\2',
			$text
		);
	}
}