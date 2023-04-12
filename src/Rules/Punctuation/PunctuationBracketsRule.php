<?php

namespace App\Helpers\Typograph\Rules\Punctuation;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class PunctuationBracketsRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Лишние пробелы после открывающей скобочки и перед закрывающей';
	}

	public function apply(string $text): string
	{
		$text = preg_replace(
			'/(\()([ \t])+/',
			'\1',
			$text
		);

		return preg_replace(
			'/([ \t])+(\))/',
			'\2',
			$text
		);
	}
}