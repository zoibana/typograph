<?php

namespace zoibana\Typograph\Groups;

use zoibana\Typograph\Rules\Space\Space2symAbbrRule;
use zoibana\Typograph\Rules\Space\SpaceAfterCommaRule;
use zoibana\Typograph\Rules\Space\SpaceAfterHellipRule;
use zoibana\Typograph\Rules\Space\SpaceAfterHellipsRule;
use zoibana\Typograph\Rules\Space\SpaceAfterPeriodRule;
use zoibana\Typograph\Rules\Space\SpaceAfterPunctuationRule;
use zoibana\Typograph\Rules\Space\SpaceAfterYearRule;
use zoibana\Typograph\Rules\Space\SpaceAtEndRule;
use zoibana\Typograph\Rules\Space\SpaceBeforeOpenQuoteRule;
use zoibana\Typograph\Rules\Space\SpaceBeforePercentRule;
use zoibana\Typograph\Rules\Space\SpaceMultipleSpacesRule;
use zoibana\Typograph\Rules\Space\SpaceNoSpaceBeforePunctuationRule;
use zoibana\Typograph\RuleGroupInterface;

class SpaceRuleGroup extends AbstractRuleGroup implements RuleGroupInterface
{
	public function getName(): string
	{
		return 'Расстановка и удаление пробелов';
	}

	public function rules(): array
	{
		return [
			Space2symAbbrRule::class,
			SpaceNoSpaceBeforePunctuationRule::class,
			SpaceAfterCommaRule::class,
			SpaceAfterPunctuationRule::class,
			SpaceAfterPeriodRule::class,
			SpaceAfterHellipsRule::class,
			SpaceMultipleSpacesRule::class,
			SpaceBeforePercentRule::class,
			SpaceBeforeOpenQuoteRule::class,
			SpaceAtEndRule::class,
			SpaceAfterHellipRule::class,
			SpaceAfterYearRule::class,
		];
	}
}