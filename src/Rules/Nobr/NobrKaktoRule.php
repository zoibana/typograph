<?php

namespace zoibana\Typograph\Rules\Nobr;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class NobrKaktoRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Неразрывный пробел в как то';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/как то:/ui',
			"как&nbsp;то:",
			$text
		);
	}
}