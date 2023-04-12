<?php

namespace App\Helpers\Typograph\Rules\Dash;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

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