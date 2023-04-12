<?php

namespace zoibana\Typograph\Rules\Dash;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

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