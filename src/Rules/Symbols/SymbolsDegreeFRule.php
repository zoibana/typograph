<?php

namespace App\Helpers\Typograph\Rules\Symbols;

use App\Helpers\Typograph\Rules\AbstractBaseRule;
use App\Helpers\Typograph\RuleInterface;

class SymbolsDegreeFRule extends AbstractBaseRule implements RuleInterface
{
	public function getDescription(): string
	{
		return 'Градусы по Фаренгейту';
	}

	/**
	 * @throws \Exception
	 */
	public function apply(string $text): string
	{
		return preg_replace_callback(
			'/(\d+)F($|\s|\.|,|;|:|&nbsp;|\?|!)/u',
			function ($m) {
				return $this->tag($m[1] . " &deg;F", "span", ["class" => "nowrap"]) . $m[2];
			},
			$text
		);
	}

	public function getClasses(): array
	{
		return [
			'nowrap' => 'word-spacing:nowrap;',
		];
	}
}