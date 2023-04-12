<?php

namespace App\Helpers\Typograph\Rules\Abbr;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class AbbrRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Расстановка пробелов перед сокращениями dpi, lpi';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/(\s+|^|>)(\d+)([ \t])*(dpi|lpi)([\s;.?!:(]|$)/i',
			"\1\2&nbsp;\4\5",
			$text
		);
	}
}