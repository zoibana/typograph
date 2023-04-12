<?php

namespace zoibana\Typograph\Rules\Symbols;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class SymbolsArrowsRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Замена стрелок вправо-влево на html коды';
	}

	public function apply(string $text): string
	{
		return str_replace(['->', '<-', '→', '←'], ['&rarr;', '&larr;', '&rarr;', '&larr;'], $text);
	}
}