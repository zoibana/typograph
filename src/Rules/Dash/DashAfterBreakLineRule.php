<?php

namespace zoibana\Typograph\Rules\Dash;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class DashAfterBreakLineRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Тире после переноса строки';
	}

	public function apply(string $text): string
	{
		return preg_replace(
			'/(\n|\r|^|>)(-|&mdash;)([\t ])/',
			'\1&mdash;&nbsp;',
			$text
		);
	}
}