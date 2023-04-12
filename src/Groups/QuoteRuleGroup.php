<?php

namespace zoibana\Typograph\Groups;

use zoibana\Typograph\Rules\Quotes\QuotesCloseExtRule;
use zoibana\Typograph\Rules\Quotes\QuotesCloseRule;
use zoibana\Typograph\Rules\Quotes\QuotesNestedRule;
use zoibana\Typograph\Rules\Quotes\QuotesOpenExtRule;
use zoibana\Typograph\Rules\Quotes\QuotesOpenRule;
use zoibana\Typograph\Rules\Quotes\QuotesOutsideLinkRule;
use zoibana\Typograph\RuleGroupInterface;

class QuoteRuleGroup extends AbstractRuleGroup implements RuleGroupInterface
{
	public function getName(): string
	{
		return 'Кавычки';
	}

	public function rules(): array
	{
		return [
			QuotesOutsideLinkRule::class,
			QuotesOpenRule::class,
			QuotesOpenExtRule::class,
			QuotesCloseRule::class,
			QuotesCloseExtRule::class,
			QuotesNestedRule::class,
		];
	}
}