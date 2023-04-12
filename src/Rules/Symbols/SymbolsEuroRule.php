<?php

namespace App\Helpers\Typograph\Rules\Symbols;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class SymbolsEuroRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Символ евро';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		return str_replace('€', '&euro;', $text);
	}
}