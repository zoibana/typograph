<?php

namespace zoibana\Typograph\Groups;

use zoibana\Typograph\Rules\Abbr\AbbrAcronymRule;
use zoibana\Typograph\Rules\Abbr\AbbrBeforeUnitRule;
use zoibana\Typograph\Rules\Abbr\AbbrBeforeWeightUnitRule;
use zoibana\Typograph\Rules\Abbr\AbbrEtcRule;
use zoibana\Typograph\Rules\Abbr\AbbrGostRule;
use zoibana\Typograph\Rules\Abbr\AbbrLocationsRule;
use zoibana\Typograph\Rules\Abbr\AbbrMoneyAbbrRevRule;
use zoibana\Typograph\Rules\Abbr\AbbrMoneyAbbrRule;
use zoibana\Typograph\Rules\Abbr\AbbrOrgRule;
use zoibana\Typograph\Rules\Abbr\AbbrPsRule;
use zoibana\Typograph\Rules\Abbr\AbbrRule;
use zoibana\Typograph\Rules\Abbr\AbbrSmImRule;
use zoibana\Typograph\Rules\Abbr\AbbrTeRule;
use zoibana\Typograph\Rules\Abbr\AbbrVoltUnitRule;
use zoibana\Typograph\RuleGroupInterface;

class AbbrRuleGroup extends AbstractRuleGroup implements RuleGroupInterface
{
	public function getName(): string
	{
		return 'Сокращения';
	}

	public function rules(): array
	{
		return [
			AbbrRule::class,
			AbbrAcronymRule::class,
			AbbrSmImRule::class,
			AbbrLocationsRule::class,
			AbbrBeforeUnitRule::class,
			AbbrBeforeWeightUnitRule::class,
			AbbrVoltUnitRule::class,
			AbbrPsRule::class,
			AbbrEtcRule::class,
			AbbrTeRule::class,
			AbbrMoneyAbbrRule::class,
			AbbrMoneyAbbrRevRule::class,
			AbbrOrgRule::class,
			AbbrGostRule::class,
		];
	}
}