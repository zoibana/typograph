<?php

namespace zoibana\Typograph\Rules\Punctuation;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class PunctuationHellipRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Замена трех точек на знак многоточия';
	}

	public function apply(string $text): string
	{
		return str_replace('...', '&hellip;', $text);
	}
}