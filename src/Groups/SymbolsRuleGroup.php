<?php

namespace App\Helpers\Typograph\Groups;

use App\Helpers\Typograph\Rules\Symbols\SymbolsApostropheRule;
use App\Helpers\Typograph\Rules\Symbols\SymbolsArrowsRule;
use App\Helpers\Typograph\Rules\Symbols\SymbolsCopySignRule;
use App\Helpers\Typograph\Rules\Symbols\SymbolsDegreeFRule;
use App\Helpers\Typograph\Rules\Symbols\SymbolsEuroRule;
use App\Helpers\Typograph\Rules\Symbols\SymbolsRSignRule;
use App\Helpers\Typograph\Rules\Symbols\SymbolsTmSignRule;
use App\Helpers\Typograph\RuleGroupInterface;

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