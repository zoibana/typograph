<?php

namespace zoibana\Typograph\Rules\Dash;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

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