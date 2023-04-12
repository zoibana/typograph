<?php

namespace zoibana\Typograph\Rules\Number;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class NumberSectNumberRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Пробел между параграфом и числом';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/(§|&sect;)(\s|&nbsp;)*(\d+|[IVX]+|[a-zа-яё]+)/ui',
			'&sect;&thinsp;\3',
			$text
		);
	}
}