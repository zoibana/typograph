<?php

namespace App\Helpers\Typograph\Groups;

use App\Helpers\Typograph\Rules\Number\NumberFractionsRule;
use App\Helpers\Typograph\Rules\Number\NumberMathRule;
use App\Helpers\Typograph\Rules\Number\NumberMinusBetweenNumsRule;
use App\Helpers\Typograph\Rules\Number\NumberNOnumberRule;
use App\Helpers\Typograph\Rules\Number\NumberSectNumberRule;
use App\Helpers\Typograph\Rules\Number\NumberSubRule;
use App\Helpers\Typograph\Rules\Number\NumberSupRule;
use App\Helpers\Typograph\Rules\Number\NumberTimesRule;
use App\Helpers\Typograph\Rules\Number\NumberTriadsRule;
use App\Helpers\Typograph\RuleGroupInterface;

class NumberRuleGroup extends AbstractRuleGroup implements RuleGroupInterface
{
	public function getName(): string
	{
		return 'Числа, дроби, математические знаки';
	}

	public function rules(): array
	{
		return [
			NumberMinusBetweenNumsRule::class,
			NumberTimesRule::class,
			NumberSubRule::class,
			NumberSupRule::class,
			NumberFractionsRule::class,
			NumberMathRule::class,
			NumberTriadsRule::class,
			NumberNOnumberRule::class,
			NumberSectNumberRule::class,
		];
	}
}