<?php

namespace zoibana\Typograph\Groups;

use zoibana\Typograph\Rules\Punctuation\PunctuationAutoCommaRule;
use zoibana\Typograph\Rules\Punctuation\PunctuationBaseLimitRule;
use zoibana\Typograph\Rules\Punctuation\PunctuationBracketsRule;
use zoibana\Typograph\Rules\Punctuation\PunctuationBracketsSpaceRule;
use zoibana\Typograph\Rules\Punctuation\PunctuationFixExclMarkRule;
use zoibana\Typograph\Rules\Punctuation\PunctuationHellipRule;
use zoibana\Typograph\Rules\Punctuation\PunctuationMarksLimitRule;
use zoibana\Typograph\Rules\Punctuation\PunctuationMultipleRule;
use zoibana\Typograph\Rules\Punctuation\PunctuationPeriodAtEndRule;
use zoibana\Typograph\RuleGroupInterface;

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