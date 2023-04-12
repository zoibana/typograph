<?php

namespace zoibana\Typograph\Groups;

use zoibana\Typograph\Rules\Symbols\SymbolsApostropheRule;
use zoibana\Typograph\Rules\Symbols\SymbolsArrowsRule;
use zoibana\Typograph\Rules\Symbols\SymbolsCopySignRule;
use zoibana\Typograph\Rules\Symbols\SymbolsDegreeFRule;
use zoibana\Typograph\Rules\Symbols\SymbolsEuroRule;
use zoibana\Typograph\Rules\Symbols\SymbolsRSignRule;
use zoibana\Typograph\Rules\Symbols\SymbolsTmSignRule;
use zoibana\Typograph\RuleGroupInterface;

class SymbolsRuleGroup extends AbstractRuleGroup implements RuleGroupInterface
{
	public function getName(): string
	{
		return 'Специальные символы';
	}

	public function rules(): array
	{
		return [
			SymbolsTmSignRule::class,
			SymbolsRSignRule::class,
			SymbolsCopySignRule::class,
			SymbolsApostropheRule::class,
			SymbolsDegreeFRule::class,
			SymbolsEuroRule::class,
			SymbolsArrowsRule::class,
		];
	}
}