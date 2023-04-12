<?php

namespace zoibana\Typograph\Groups;

use zoibana\Typograph\Rules\Number\NumberFractionsRule;
use zoibana\Typograph\Rules\Number\NumberMathRule;
use zoibana\Typograph\Rules\Number\NumberMinusBetweenNumsRule;
use zoibana\Typograph\Rules\Number\NumberNOnumberRule;
use zoibana\Typograph\Rules\Number\NumberSectNumberRule;
use zoibana\Typograph\Rules\Number\NumberSubRule;
use zoibana\Typograph\Rules\Number\NumberSupRule;
use zoibana\Typograph\Rules\Number\NumberTimesRule;
use zoibana\Typograph\Rules\Number\NumberTriadsRule;
use zoibana\Typograph\RuleGroupInterface;

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