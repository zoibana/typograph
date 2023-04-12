<?php

namespace App\Helpers\Typograph\Rules\Space;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class SpaceBeforeMonthRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Неразрывный пробел в датах перед числом и месяцем';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/(\d)(\s)+(января|февраля|марта|апреля|мая|июня|июля|августа|сентября|октября|ноября|декабря)([^<]|$)/iu',
			'\1&nbsp;\3\4',
			$text
		);
	}
}