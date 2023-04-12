<?php

namespace App\Helpers\Typograph\Rules\Number;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

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