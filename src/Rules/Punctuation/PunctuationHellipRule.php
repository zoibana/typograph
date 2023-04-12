<?php

namespace App\Helpers\Typograph\Rules\Punctuation;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

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