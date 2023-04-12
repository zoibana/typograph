<?php

namespace App\Helpers\Typograph\Rules\Punctuation;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class PunctuationAutoCommaRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Расстановка запятых перед а, но';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/([a-zа-яё])(\s|&nbsp;)(но|а)(\s|&nbsp;)/iu',
			'\1,\2\3\4',
			$text
		);
	}
}