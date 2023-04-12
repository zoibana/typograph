<?php

namespace App\Helpers\Typograph\Rules\Dash;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class DashRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Тире после кавычек, скобочек, пунктуации';
	}

	public function apply(string $text): string
	{
		$text = preg_replace(
			'/([a-zа-яё0-9]+|,|:|\)|&(ra|ld)quo;|\|\"|>)([ \t])(—|-|&mdash;)(\s|$|<)/ui',
			'\1&nbsp;&mdash;\5',
			$text
		);

		return preg_replace(
			'/([,:)"])(—|-|&mdash;)(\s|$|<)/ui',
			'\1&nbsp;&mdash;\3',
			$text
		);
	}
}