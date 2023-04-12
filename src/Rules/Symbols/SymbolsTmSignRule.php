<?php

namespace App\Helpers\Typograph\Rules\Symbols;

use App\Helpers\Typograph\RuleInterface;
use App\Helpers\Typograph\Rules\AbstractBaseRule;

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