<?php

namespace zoibana\Typograph\Rules\Nobr;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class NobrNbspInTheEndRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Привязка союзов и предлогов к предыдущим словам в случае конца предложения';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/([a-zа-яё0-9\-]{3,}) ([a-zа-яё]{1,2})\.( [A-ZА-ЯЁ]|$)/ui',
			'\1&nbsp;\2.\3',
			$text
		);
	}
}