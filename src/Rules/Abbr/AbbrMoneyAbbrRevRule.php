<?php

namespace App\Helpers\Typograph\Rules\Abbr;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class AbbrMoneyAbbrRevRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Привязка валюты к числу спереди';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/(€|&euro;|\$)\s?(\d)/iu',
			'\1&nbsp;\2',
			$text
		);
	}
}