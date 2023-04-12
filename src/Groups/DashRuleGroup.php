<?php

namespace zoibana\Typograph\Groups;

use zoibana\Typograph\Rules\Dash\DashAfterBreakLineRule;
use zoibana\Typograph\Rules\Dash\DashAfterMarksRule;
use zoibana\Typograph\Rules\Dash\DashIzZaRule;
use zoibana\Typograph\Rules\Dash\DashKaDeKasRule;
use zoibana\Typograph\Rules\Dash\DashKakRule;
use zoibana\Typograph\Rules\Dash\DashRule;
use zoibana\Typograph\Rules\Dash\DashSymbolToHtmlMdashRule;
use zoibana\Typograph\Rules\Dash\DashToLiboRule;
use zoibana\Typograph\RuleGroupInterface;

class DashRuleGroup extends AbstractRuleGroup implements RuleGroupInterface
{
	public function getName(): string
	{
		return 'Дефисы и тире';
	}

	public function rules(): array
	{
		return [
			DashSymbolToHtmlMdashRule::class,
			DashRule::class,
			DashAfterBreakLineRule::class,
			DashAfterMarksRule::class,
			DashIzZaRule::class,
			DashToLiboRule::class,
			DashKakRule::class,
			DashKaDeKasRule::class,
		];
	}
}