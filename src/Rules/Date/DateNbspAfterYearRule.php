<?php

namespace zoibana\Typograph\Rules\Date;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class DateNbspAfterYearRule extends AbstractBaseRule implements RuleInterface
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
			'/(^|\040|&nbsp;|\"|&laquo;)(\d{3,4})[ ]?(г\.)([^a-zа-яё]|$)/ui',
			'\1\2&nbsp;\3\4',
			$text
		);
	}
}