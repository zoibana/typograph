<?php

namespace zoibana\Typograph\Rules\Symbols;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

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