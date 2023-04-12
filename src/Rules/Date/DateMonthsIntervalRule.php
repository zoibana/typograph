<?php

namespace zoibana\Typograph\Rules\Date;

use zoibana\Typograph\RuleInterface;
use zoibana\Typograph\Rules\AbstractBaseRule;

class DateMonthsIntervalRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Расстановка тире и объединение в неразрывные периоды месяцев';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/((январ|феврал|сентябр|октябр|ноябр|декабр)([ьяюе]|[её]м)|(апрел|июн|июл)([ьяюе]|ем)|(март|август)([ауе]|ом)?|ма[йяюе]|маем)\-((январ|феврал|сентябр|октябр|ноябр|декабр)([ьяюе]|[её]м)|(апрел|июн|июл)([ьяюе]|ем)|(март|август)([ауе]|ом)?|ма[йяюе]|маем)/iu',
			'\1&mdash;\8',
			$text
		);
	}
}