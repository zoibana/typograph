<?php

namespace App\Helpers\Typograph\Groups;

use App\Helpers\Typograph\Rules\Dash\DashAfterBreakLineRule;
use App\Helpers\Typograph\Rules\Dash\DashAfterMarksRule;
use App\Helpers\Typograph\Rules\Dash\DashIzZaRule;
use App\Helpers\Typograph\Rules\Dash\DashKaDeKasRule;
use App\Helpers\Typograph\Rules\Dash\DashKakRule;
use App\Helpers\Typograph\Rules\Dash\DashRule;
use App\Helpers\Typograph\Rules\Dash\DashSymbolToHtmlMdashRule;
use App\Helpers\Typograph\Rules\Dash\DashToLiboRule;
use App\Helpers\Typograph\RuleGroupInterface;

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