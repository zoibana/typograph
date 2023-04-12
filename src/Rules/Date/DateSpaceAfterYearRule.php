<?php

namespace App\Helpers\Typograph\Rules\Date;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class DateSpaceAfterYearRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Пробел после года';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		return preg_replace(
			'/(^|\040|&nbsp;)(\d{3,4})(год([ауе]|ом)?)([^a-zа-яё]|$)/ui',
			'\1\2 \3\5',
			$text
		);
	}
}