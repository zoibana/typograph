<?php

namespace zoibana\Typograph\Groups;

use zoibana\Typograph\Rules\Date\DateDaysIntervalRule;
use zoibana\Typograph\Rules\Date\DateMonthsIntervalRule;
use zoibana\Typograph\Rules\Date\DateNbspAfterYearRule;
use zoibana\Typograph\Rules\Date\DateNoBrYearRule;
use zoibana\Typograph\Rules\Date\DateSpaceAfterYearRule;
use zoibana\Typograph\Rules\Date\DateYearsRule;
use zoibana\Typograph\RuleGroupInterface;

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