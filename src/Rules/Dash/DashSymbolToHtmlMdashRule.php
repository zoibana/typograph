<?php

namespace App\Helpers\Typograph\Rules\Dash;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class DashSymbolToHtmlMdashRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Замена символа тире на html конструкцию';
	}

	public function apply(string $text): string
	{
		return preg_replace('/—/u', '&mdash;', $text);
	}
}