<?php

namespace zoibana\Typograph\Rules\Symbols;

use zoibana\Typograph\RuleInterface;
use zoibana\Typograph\Rules\AbstractBaseRule;

class SymbolsApostropheRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Расстановка правильного апострофа в текстах';
	}

	public function apply(string $text): string
	{
		return preg_replace('/(\s|^|>|&rsquo;)([a-zа-яё]{1,})\'([a-zа-яё]+)/ui', '\1\2&rsquo;\3', $text);
	}
}