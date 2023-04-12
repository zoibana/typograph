<?php

namespace App\Helpers\Typograph\Rules\Punctuation;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class PunctuationMultipleRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Замена сдвоенных знаков препинания на одинарные';
	}

	public function apply(string $text): string
	{
		$text = preg_replace(
			'/([^!?])\.\./',
			'\1.',
			$text
		);
		$text = preg_replace(
			'/([a-zа-яё0-9])(!|.)(!|.|\?)(\s|$|<)/ui',
			'\1\2\4',
			$text
		);

		return preg_replace(
			'/([a-zа-яё0-9])(\?)(\?)(\s|$|<)/ui',
			'\1\2\4',
			$text
		);
	}
}