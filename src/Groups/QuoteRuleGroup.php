<?php

namespace App\Helpers\Typograph\Groups;

use App\Helpers\Typograph\Rules\Quotes\QuotesCloseExtRule;
use App\Helpers\Typograph\Rules\Quotes\QuotesCloseRule;
use App\Helpers\Typograph\Rules\Quotes\QuotesNestedRule;
use App\Helpers\Typograph\Rules\Quotes\QuotesOpenExtRule;
use App\Helpers\Typograph\Rules\Quotes\QuotesOpenRule;
use App\Helpers\Typograph\Rules\Quotes\QuotesOutsideLinkRule;
use App\Helpers\Typograph\RuleGroupInterface;

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