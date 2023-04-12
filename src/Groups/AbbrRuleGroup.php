<?php

namespace App\Helpers\Typograph\Groups;

use App\Helpers\Typograph\Rules\Abbr\AbbrAcronymRule;
use App\Helpers\Typograph\Rules\Abbr\AbbrBeforeUnitRule;
use App\Helpers\Typograph\Rules\Abbr\AbbrBeforeWeightUnitRule;
use App\Helpers\Typograph\Rules\Abbr\AbbrEtcRule;
use App\Helpers\Typograph\Rules\Abbr\AbbrGostRule;
use App\Helpers\Typograph\Rules\Abbr\AbbrLocationsRule;
use App\Helpers\Typograph\Rules\Abbr\AbbrMoneyAbbrRevRule;
use App\Helpers\Typograph\Rules\Abbr\AbbrMoneyAbbrRule;
use App\Helpers\Typograph\Rules\Abbr\AbbrOrgRule;
use App\Helpers\Typograph\Rules\Abbr\AbbrPsRule;
use App\Helpers\Typograph\Rules\Abbr\AbbrRule;
use App\Helpers\Typograph\Rules\Abbr\AbbrSmImRule;
use App\Helpers\Typograph\Rules\Abbr\AbbrTeRule;
use App\Helpers\Typograph\Rules\Abbr\AbbrVoltUnitRule;
use App\Helpers\Typograph\RuleGroupInterface;

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