<?php

namespace zoibana\Typograph\Rules\Symbols;

use zoibana\Typograph\RuleInterface;
use zoibana\Typograph\Rules\AbstractBaseRule;

class SymbolsCopySignRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Замена (c) на символ копирайт';
	}

	public function apply(string $text): string
	{
		$text = preg_replace('/\(([cс])\)\s+/iu', '&copy;&nbsp;', $text);

		return preg_replace('/\(([cс])\)($|\.|,|!|\?)/iu', '&copy;\2', $text);
	}
}