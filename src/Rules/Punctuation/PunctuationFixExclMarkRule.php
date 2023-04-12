<?php

namespace App\Helpers\Typograph\Rules\Punctuation;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

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