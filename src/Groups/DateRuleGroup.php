<?php

namespace App\Helpers\Typograph\Groups;

use App\Helpers\Typograph\Rules\Date\DateDaysIntervalRule;
use App\Helpers\Typograph\Rules\Date\DateMonthsIntervalRule;
use App\Helpers\Typograph\Rules\Date\DateNbspAfterYearRule;
use App\Helpers\Typograph\Rules\Date\DateNoBrYearRule;
use App\Helpers\Typograph\Rules\Date\DateSpaceAfterYearRule;
use App\Helpers\Typograph\Rules\Date\DateYearsRule;
use App\Helpers\Typograph\RuleGroupInterface;

class DateRuleGroup extends AbstractRuleGroup implements RuleGroupInterface
{
	public function getName(): string
	{
		return 'Даты и дни';
	}

	public function rules(): array
	{
		return [
			DateYearsRule::class,
			DateMonthsIntervalRule::class,
			DateDaysIntervalRule::class,
			DateNoBrYearRule::class,
			DateSpaceAfterYearRule::class,
			DateNbspAfterYearRule::class,
		];
	}
}