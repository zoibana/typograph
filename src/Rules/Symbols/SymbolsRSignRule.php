<?php

namespace App\Helpers\Typograph\Rules\Symbols;

use App\Helpers\Typograph\RuleInterface;
use App\Helpers\Typograph\Rules\AbstractBaseRule;

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