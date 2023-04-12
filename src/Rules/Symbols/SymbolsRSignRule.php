<?php

namespace zoibana\Typograph\Rules\Symbols;

use zoibana\Typograph\RuleInterface;
use zoibana\Typograph\Rules\AbstractBaseRule;

class SymbolsRSignRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Замена (R) на символ зарегистрированной торговой марки';
	}

	public function apply(string $text): string
	{
		return preg_replace_callback('/(.|^)\(r\)(.|$)/i',
			static function ($m) {
				return $m[1] . "&reg;" . $m[2];
			}, $text);
	}
}