<?php

namespace App\Helpers\Typograph\Groups;

use App\Helpers\Typograph\Rules\Text\TextAutoLinksRule;
use App\Helpers\Typograph\Rules\Text\TextBreaksRule;
use App\Helpers\Typograph\Rules\Text\TextEmailRule;
use App\Helpers\Typograph\Rules\Text\TextNoRepeatWordsRule;
use App\Helpers\Typograph\Rules\Text\TextParagraphsRule;
use App\Helpers\Typograph\RuleGroupInterface;

class TextRuleGroup extends AbstractRuleGroup implements RuleGroupInterface
{
	public function getName(): string
	{
		return "Текст и абзацы";
	}

	public function rules(): array
	{
		return [
			TextAutoLinksRule::class,
			TextEmailRule::class,
			TextNoRepeatWordsRule::class,
			TextParagraphsRule::class,
			TextBreaksRule::class
		];
	}
}