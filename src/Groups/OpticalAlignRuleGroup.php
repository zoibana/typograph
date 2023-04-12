<?php

namespace zoibana\Typograph\Groups;

use zoibana\Typograph\Rules\OpticalAlign\OpticalAlignBracketsRule;
use zoibana\Typograph\Rules\OpticalAlign\OpticalAlignQuoteExtraRule;
use zoibana\Typograph\Rules\OpticalAlign\OpticalAlignQuotesRule;
use zoibana\Typograph\RuleGroupInterface;

class OpticalAlignRuleGroup extends AbstractRuleGroup implements RuleGroupInterface
{
	public function getName(): string
	{
		return 'Оптическое выравнивание';
	}

	public function rules(): array
	{
		return [
			OpticalAlignQuotesRule::class,
			OpticalAlignQuoteExtraRule::class,
			OpticalAlignBracketsRule::class,
		];
	}
}