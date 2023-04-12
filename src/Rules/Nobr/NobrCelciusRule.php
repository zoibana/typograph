<?php

namespace App\Helpers\Typograph\Rules\Nobr;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class NobrCelciusRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Привязка градусов к числу';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/(\s|^|>|&nbsp;)(\d+)( |&nbsp;)?(°|&deg;)([CС])(\s|\.|!|\?|,|$|&nbsp;|;)/iu',
			"\1\2&nbsp;\4C\6",
			$text
		);
	}
}