<?php

namespace zoibana\Typograph\Rules\Symbols;

use zoibana\Typograph\RuleInterface;
use zoibana\Typograph\Rules\AbstractBaseRule;

class SymbolsTmSignRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Замена (tm) на символ торговой марки';
	}

	public function apply(string $text): string
	{
		return preg_replace('/([\040\t])?\(tm\)/i', '&trade;', $text);
	}
}