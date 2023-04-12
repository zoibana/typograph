<?php

namespace App\Helpers\Typograph\Rules\Punctuation;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

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