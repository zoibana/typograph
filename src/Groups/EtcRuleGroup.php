<?php

namespace zoibana\Typograph\Groups;

use zoibana\Typograph\Rules\Etc\EtcAcuteAccentRule;
use zoibana\Typograph\Rules\Etc\EtcCenturyPeriodRule;
use zoibana\Typograph\Rules\Etc\EtcExpandNoNbspInNobrRule;
use zoibana\Typograph\Rules\Etc\EtcNobrToNbspRule;
use zoibana\Typograph\Rules\Etc\EtcSplitNumberToTriadsAccentRule;
use zoibana\Typograph\Rules\Etc\EtcTimeIntervalRule;
use zoibana\Typograph\Rules\Etc\EtcWordSupRule;
use zoibana\Typograph\RuleGroupInterface;

class EtcRuleGroup extends AbstractRuleGroup implements RuleGroupInterface
{
	public function getName(): string
	{
		return 'Прочее';
	}

	public function rules(): array
	{
		return [
			EtcAcuteAccentRule::class,
			EtcWordSupRule::class,
			EtcCenturyPeriodRule::class,
			EtcTimeIntervalRule::class,
			EtcSplitNumberToTriadsAccentRule::class,
			EtcExpandNoNbspInNobrRule::class,
			EtcNobrToNbspRule::class,
		];
	}
}