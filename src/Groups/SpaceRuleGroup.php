<?php

namespace App\Helpers\Typograph\Groups;

use App\Helpers\Typograph\Rules\Space\Space2symAbbrRule;
use App\Helpers\Typograph\Rules\Space\SpaceAfterCommaRule;
use App\Helpers\Typograph\Rules\Space\SpaceAfterHellipRule;
use App\Helpers\Typograph\Rules\Space\SpaceAfterHellipsRule;
use App\Helpers\Typograph\Rules\Space\SpaceAfterPeriodRule;
use App\Helpers\Typograph\Rules\Space\SpaceAfterPunctuationRule;
use App\Helpers\Typograph\Rules\Space\SpaceAfterYearRule;
use App\Helpers\Typograph\Rules\Space\SpaceAtEndRule;
use App\Helpers\Typograph\Rules\Space\SpaceBeforeOpenQuoteRule;
use App\Helpers\Typograph\Rules\Space\SpaceBeforePercentRule;
use App\Helpers\Typograph\Rules\Space\SpaceMultipleSpacesRule;
use App\Helpers\Typograph\Rules\Space\SpaceNoSpaceBeforePunctuationRule;
use App\Helpers\Typograph\RuleGroupInterface;

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