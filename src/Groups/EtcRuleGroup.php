<?php

namespace App\Helpers\Typograph\Groups;

use App\Helpers\Typograph\Rules\Etc\EtcAcuteAccentRule;
use App\Helpers\Typograph\Rules\Etc\EtcCenturyPeriodRule;
use App\Helpers\Typograph\Rules\Etc\EtcExpandNoNbspInNobrRule;
use App\Helpers\Typograph\Rules\Etc\EtcNobrToNbspRule;
use App\Helpers\Typograph\Rules\Etc\EtcSplitNumberToTriadsAccentRule;
use App\Helpers\Typograph\Rules\Etc\EtcTimeIntervalRule;
use App\Helpers\Typograph\Rules\Etc\EtcWordSupRule;
use App\Helpers\Typograph\RuleGroupInterface;

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