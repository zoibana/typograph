<?php

namespace App\Helpers\Typograph\Rules\Symbols;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

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