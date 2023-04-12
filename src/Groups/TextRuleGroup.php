<?php

namespace zoibana\Typograph\Groups;

use zoibana\Typograph\Rules\Text\TextAutoLinksRule;
use zoibana\Typograph\Rules\Text\TextBreaksRule;
use zoibana\Typograph\Rules\Text\TextEmailRule;
use zoibana\Typograph\Rules\Text\TextNoRepeatWordsRule;
use zoibana\Typograph\Rules\Text\TextParagraphsRule;
use zoibana\Typograph\RuleGroupInterface;

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