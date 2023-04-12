<?php

namespace zoibana\Typograph\Rules\Date;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

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