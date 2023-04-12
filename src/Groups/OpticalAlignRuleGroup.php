<?php

namespace App\Helpers\Typograph\Groups;

use App\Helpers\Typograph\Rules\OpticalAlign\OpticalAlignBracketsRule;
use App\Helpers\Typograph\Rules\OpticalAlign\OpticalAlignQuoteExtraRule;
use App\Helpers\Typograph\Rules\OpticalAlign\OpticalAlignQuotesRule;
use App\Helpers\Typograph\RuleGroupInterface;

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