<?php

namespace zoibana\Typograph\Rules\Date;

use zoibana\Typograph\RuleInterface;
use zoibana\Typograph\Rules\AbstractBaseRule;

class DateYearsRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Установка тире и пробельных символов в периодах дат';
	}

	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/(с|по|период|середины|начала|начало|конца|конец|половины|в|между|\([cс]\)|&copy;)(\s+|&nbsp;)(\d{4})(-|&mdash;|&minus;)(\d{4})(( |&nbsp;)?(г\.г\.|гг\.|гг|г\.|г)([^а-яёa-z]))?/ui',
			static function ($m) {
				return $m[1] . $m[2] . ((int)$m[3] >= (int)$m[5] ? $m[3] . $m[4] . $m[5] : $m[3] . "&mdash;" . $m[5]) . (isset($m[6]) ? "&nbsp;гг." : "") . ($m[9] ?? "");
			},
			$text
		);
	}
}