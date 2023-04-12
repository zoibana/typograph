<?php

namespace App\Helpers\Typograph\Groups;

use App\Helpers\Typograph\Rules\Punctuation\PunctuationAutoCommaRule;
use App\Helpers\Typograph\Rules\Punctuation\PunctuationBaseLimitRule;
use App\Helpers\Typograph\Rules\Punctuation\PunctuationBracketsRule;
use App\Helpers\Typograph\Rules\Punctuation\PunctuationBracketsSpaceRule;
use App\Helpers\Typograph\Rules\Punctuation\PunctuationFixExclMarkRule;
use App\Helpers\Typograph\Rules\Punctuation\PunctuationHellipRule;
use App\Helpers\Typograph\Rules\Punctuation\PunctuationMarksLimitRule;
use App\Helpers\Typograph\Rules\Punctuation\PunctuationMultipleRule;
use App\Helpers\Typograph\Rules\Punctuation\PunctuationPeriodAtEndRule;
use App\Helpers\Typograph\RuleGroupInterface;

class PunctuationRuleGroup extends AbstractRuleGroup implements RuleGroupInterface
{
	public function getName(): string
	{
		return 'Пунктуация и знаки препинания';
	}

	public function rules(): array
	{
		return [
			PunctuationAutoCommaRule::class,
			PunctuationMarksLimitRule::class,
			PunctuationBaseLimitRule::class,
			PunctuationHellipRule::class,
			PunctuationFixExclMarkRule::class,
			PunctuationMultipleRule::class,
			PunctuationBracketsRule::class,
			PunctuationBracketsSpaceRule::class,
			PunctuationPeriodAtEndRule::class,
		];
	}
}