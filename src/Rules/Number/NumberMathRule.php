<?php

namespace zoibana\Typograph\Rules\Number;

use zoibana\Typograph\Rules\AbstractBaseRule;
use zoibana\Typograph\RuleInterface;

class NumberMathRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Математические знаки больше/меньше/плюс минус/неравно';
	}

	public function apply(string $text): string
	{
		$patterns = [
			'/!=/' => '&ne;',
			'/\<=/' => '&le;',
			'/([^=]|^)\>=/' => '\1&ge;',
			'/~=/' => '&cong;',
			'/\+-/' => '&plusmn;',
		];

		foreach ($patterns as $pattern => $replacement) {
			$text = preg_replace($pattern, $replacement, $text);
		}

		return $text;
	}
}